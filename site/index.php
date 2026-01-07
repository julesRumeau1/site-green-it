<?php
require_once __DIR__ . '/src/bootstrap.php';
$pageTitle = 'Accueil — Scierie';
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
    <h1>Scierie — bois local, usage durable</h1>

    <section class="hero" aria-label="Présentation">
      <div>
        <p>
          Ce site a été refondu pour réduire son impact : HTML et CSS simplifiés, moins de scripts,
          images optimisées et chargement asynchrone.
        </p>
        <p>
          <a class="btn" href="produits.php">Voir les produits</a>
        </p>
      </div>

      <picture>
        <source type="image/webp" srcset="assets/img/img4.webp" />
        <img src="assets/img/img4.jpg" alt="Planche de bois" loading="lazy" decoding="async">
      </picture>
    </section>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
</div>
</body>
</html>
