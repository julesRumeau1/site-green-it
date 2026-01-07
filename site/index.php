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
    <h1>Scierie - bois local, usage durable</h1>

    <!-- Section Hero -->
    <section class="hero" aria-label="Présentation">
      <picture>
        <source type="image/webp" srcset="assets/img/img4.webp" />
        <img
          src="assets/img/img4.jpg"
          width="540"
          height="360"
          alt="Planche de bois"
          loading="lazy"
          decoding="async">
      </picture>
    </section>

    <!-- Section Présentation texte -->
    <section class="presentation" aria-label="Présentation de l'entreprise">
      <h2>Vous recherchez la meilleure essence de bois ?</h2>
      <p>
        La SCIERIE DU FARGAL vous donne toutes les solutions et vous fournit votre matériel.
        C'est une entreprise familiale comptant plus de 40 ans d'expérience dans la fourniture, la transformation
        et la livraison de bois pour les professionnels comme les particuliers. L'EURL GINESTE Laurent
        de MONTBAZENS (12) met tout son savoir-faire et son expertise à votre disposition. Profitez-en !
      </p>

      <h2>Votre expert en bois dans l'Aveyron</h2>
      <p>
        Nous avons le sens du service et nous sommes à votre écoute en vous indiquant le meilleur choix
        suivant votre utilisation pour concrétiser vos projets. Quelle que soit votre demande ou vos besoins,
        les Ets GINESTE Laurent vous assurent un accueil chaleureux et très professionnel
        pour répondre à toutes vos sollicitations et attentes.
      </p>
    </section>

  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
</div>
</body>
</html>
