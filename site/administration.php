<?php
require_once __DIR__ . '/src/bootstrap.php';
$pageTitle = 'Administration — Scierie';
$loggedIn = !empty($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php require_once __DIR__ . '/includes/head.php'; ?>
</head>
<body>
<div class="page">
  <?php require_once __DIR__ . '/includes/nav.php'; ?>

  <main class="container">
    <h1>Administration</h1>

    <?php if (!$loggedIn): ?>
      <p class="notice">Veuillez vous connecter pour accéder à cette page.</p>
    <?php else: ?>
      <section class="grid">
        <div class="notice">
          <h2>Contenu</h2>
          <p class="muted">Exemple d'emplacement pour gérer le contenu.</p>
          <button class="btn" type="button" disabled>Modifier (désactivé)</button>
        </div>
        <div class="notice">
          <h2>Produits</h2>
          <p class="muted">Exemple d'emplacement pour gérer les produits.</p>
          <button class="btn" type="button" disabled>Ajouter (désactivé)</button>
        </div>
      </section>
    <?php endif; ?>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
</div>
</body>
</html>
