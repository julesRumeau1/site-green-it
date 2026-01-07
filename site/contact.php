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

    <form class="form" data-contact method="post" action="api/contact.php" novalidate>
      <input type="hidden" name="csrf" value="<?= Utils::e(Csrf::token()) ?>">

      <label for="nom">Nom</label>
      <input id="nom" name="nom" autocomplete="name" required>

      <label for="email">Email</label>
      <input id="email" name="email" type="email" autocomplete="email" required>

      <label for="sujet">Sujet</label>
      <input id="sujet" name="sujet" required>

      <label for="message">Message</label>
      <textarea id="message" name="message" required></textarea>

      <button class="btn" type="submit">Envoyer</button>
      <p id="contact-status" class="muted" aria-live="polite"></p>
    </form>

    <section class="notice" aria-label="Astuce">
      <h2>Astuce</h2>
      <p class="muted">Le formulaire enregistre votre message dans la base (table <code>support</code>).</p>
    </section>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
</div>
</body>
</html>
