<?php
require_once __DIR__ . '/src/bootstrap.php';
$pageTitle = 'Produits — Scierie';
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
    <h1>Nos produits</h1>

    <div id="products-root" data-products aria-live="polite">
      <p>Chargement…</p>
    </div>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
</div>
</body>
</html>
