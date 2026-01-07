<?php
require_once __DIR__ . '/../src/bootstrap.php';

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    Utils::json(['ok' => false, 'message' => 'Méthode non autorisée.'], 405);
    exit;
}

if (!Utils::isSameOriginPost()) {
    Utils::json(['ok' => false, 'message' => 'Origine invalide.'], 400);
    exit;
}

if (!Csrf::verify($_POST['csrf'] ?? null)) {
    Utils::json(['ok' => false, 'message' => 'Jeton CSRF invalide.'], 400);
    exit;
}

$userId = (string)($_POST['userId'] ?? '');
$password = (string)($_POST['password'] ?? '');

try {
    $auth = new AuthService(new UserRepository());
    $ok = $auth->login($userId, $password);
    Utils::json(['ok' => $ok, 'message' => $ok ? 'Connecté.' : 'Identifiants incorrects.'], $ok ? 200 : 401);
} catch (Throwable $e) {
    Utils::json(['ok' => false, 'message' => 'Erreur serveur.'], 500);
}
