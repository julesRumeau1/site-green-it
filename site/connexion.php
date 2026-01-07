<?php
require_once __DIR__ . '/src/bootstrap.php';
$pageTitle = 'Connexion — Scierie';
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
    <h1>Connexion</h1>

    <?php if ($loggedIn): ?>
      <p class="notice">Vous êtes déjà connecté en tant que <strong><?= Utils::e($_SESSION['id']) ?></strong>.</p>
    <?php endif; ?>

    <section class="grid">
      <div class="notice">
        <h2>Se connecter</h2>
        <form class="form" data-auth="login" method="post" action="api/auth.php" novalidate>
          <input type="hidden" name="csrf" value="<?= Utils::e(Csrf::token()) ?>">
          <label for="userId">Identifiant</label>
          <input id="userId" name="userId" autocomplete="username" required>
          <label for="password">Mot de passe</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required>
          <br/>
          <br/>
          <button class="btn" type="submit">Connexion</button>
          <p id="auth-status" class="muted" aria-live="polite"></p>
        </form>
      </div>

      <div class="notice">
        <h2>Créer un compte</h2>
        <form class="form" data-auth="signup" method="post" action="api/signup.php" novalidate>
          <input type="hidden" name="csrf" value="<?= Utils::e(Csrf::token()) ?>">
          <label for="newUserId">Identifiant</label>
          <input id="newUserId" name="userId" autocomplete="username" required>
          <label for="newPassword">Mot de passe</label>
          <input id="newPassword" name="password" type="password" autocomplete="new-password" required>
          <label for="newPassword2">Confirmer</label>
          <input id="newPassword2" name="password2" type="password" autocomplete="new-password" required>
          <br/>
          <br/>
          <button class="btn" type="submit">Inscription</button>
          <p id="signup-status" class="muted" aria-live="polite"></p>
        </form>
      </div>
    </section>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
</div>
</body>
</html>
