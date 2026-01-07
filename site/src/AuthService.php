<?php

final class AuthService
{
    public function __construct(private UserRepository $users)
    {
    }

    public function login(string $userId, string $password): bool
    {
        $userId = trim($userId);
        if ($userId === '' || $password === '') {
            return false;
        }

        $row = $this->users->findById($userId);
        if (!$row) {
            return false;
        }

        $stored = (string)($row['userPwd'] ?? '');
        $ok = false;

        // Backward compat: old rows are MD5 hashes (32 hex chars).
        if (preg_match('/^[a-f0-9]{32}$/i', $stored) === 1) {
            $ok = hash_equals(strtolower($stored), strtolower(md5($password)));
        } else {
            $ok = password_verify($password, $stored);
        }

        if (!$ok) {
            return false;
        }

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        session_regenerate_id(true);
        $_SESSION['id'] = $userId;
        return true;
    }

    public function logout(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $p = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], (bool)$p['secure'], (bool)$p['httponly']);
        }
        session_destroy();
    }

    public function signup(string $userId, string $password, string $password2): array
    {
        $userId = trim($userId);
        if ($userId === '' || $password === '' || $password2 === '') {
            return ['ok' => false, 'message' => 'Champs manquants.'];
        }
        if (!preg_match('/^[A-Za-z0-9_\-]{3,32}$/', $userId)) {
            return ['ok' => false, 'message' => "Identifiant invalide (3-32 caractères, lettres/chiffres/_-)."];
        }
        if ($password !== $password2) {
            return ['ok' => false, 'message' => 'Les mots de passe ne correspondent pas.'];
        }
        if (strlen($password) < 6) {
            return ['ok' => false, 'message' => 'Mot de passe trop court (min. 6).'];
        }
        if ($this->users->findById($userId)) {
            return ['ok' => false, 'message' => 'Identifiant déjà utilisé.'];
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $ok = $this->users->create($userId, $hash);
        return $ok ? ['ok' => true, 'message' => 'Compte créé. Vous pouvez vous connecter.']
                   : ['ok' => false, 'message' => 'Erreur lors de la création.'];
    }
}
