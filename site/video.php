<?php
require_once __DIR__ . '/src/bootstrap.php';
$pageTitle = 'Vidéo — Scierie';
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
    <h1>Vidéo</h1>
    <p>Cliquez sur la miniature pour ouvrir la vidéo.</p>

    <a class="hero" href="https://www.youtube.com" target="_blank" rel="noopener noreferrer" aria-label="Ouvrir la vidéo sur YouTube">
      <picture>
        <source type="image/webp" srcset="assets/img/img1.webp" />
        <img src="assets/img/img1.jpg" width="960" height="540" alt="Miniature de la vidéo" loading="lazy" decoding="async">
      </picture>
      <div class="notice" style="margin:0;">
        <strong>Voir la vidéo</strong>
        
      </div>
    </a>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
</div>
</body>
</html>
