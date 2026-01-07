<?php
require_once __DIR__ . '/src/bootstrap.php';
$pageTitle = 'Contact — Scierie';
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
    <h1>Nous contacter</h1>

    <section class="contact-grid" aria-label="Informations de contact">
      <div class="card">
        <p class="card-title">Email</p>
        <p class="card-text">
          <a class="link" href="mailto:scierie.gineste@wanadoo.fr">scierie.gineste@wanadoo.fr</a>
        </p>
      </div>

      <div class="card">
        <p class="card-title">Téléphone</p>
        <p class="card-text">
          <a class="link" href="tel:+33970355409">+33 9 70 35 54 09</a>
        </p>
      </div>

      <div class="card">
        <p class="card-title">Adresse</p>
        <p class="card-text">
          Route de Rodez<br>
          12220 Montbazens<br>
          France
        </p>
        <p class="muted" style="margin-top:.5rem;">
          <a class="link" target="_blank" rel="noopener"
             href="https://www.google.com/maps/search/?api=1&query=Route%20de%20Rodez%2012220%20Montbazens">
            Voir sur la carte
          </a>
        </p>
      </div>
    </section>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
</div>
</body>
</html>
