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

$nom = trim((string)($_POST['nom'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$sujet = trim((string)($_POST['sujet'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));

if ($nom === '' || $email === '' || $sujet === '' || $message === '') {
    Utils::json(['ok' => false, 'message' => 'Merci de remplir tous les champs.'], 400);
    exit;
}
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    Utils::json(['ok' => false, 'message' => 'Email invalide.'], 400);
    exit;
}

try {
    $repo = new SupportRepository();
    $ok = $repo->create($nom, $email, $sujet, $message);
    Utils::json(['ok' => $ok, 'message' => $ok ? 'Message envoyé.' : 'Échec de l\'envoi.']);
} catch (Throwable $e) {
    Utils::json(['ok' => false, 'message' => 'Erreur serveur.'], 500);
}
