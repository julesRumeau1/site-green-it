<?php
require_once __DIR__ . '/../src/bootstrap.php';

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'GET') {
    Utils::json(['ok' => false, 'message' => 'Méthode non autorisée.'], 405);
    exit;
}

try {
    $repo = new ProductRepository();
    $items = $repo->list();
    Utils::json(['ok' => true, 'items' => $items]);
} catch (Throwable $e) {
    Utils::json(['ok' => false, 'message' => 'Erreur serveur.'], 500);
}
