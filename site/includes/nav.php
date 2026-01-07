<?php
$loggedIn = !empty($_SESSION['id']);
$current = basename($_SERVER['PHP_SELF'] ?? 'index.php');
function nav_active(string $file, string $current): string { return $file === $current ? ' aria-current="page"' : ''; }
?>
<header class="site-header">
  <a class="brand" href="index.php" aria-label="Retour à l'accueil">
    <svg class="brand__logo" width="28" height="28" viewBox="0 0 28 28" role="img" aria-hidden="true">
      <path d="M4 22V6h20v16H4zm2-2h16V8H6v12zm2-2h12v-2H8v2zm0-4h12v-2H8v2zm0-4h12V8H8v2z"/>
    </svg>
    <span class="brand__text">Scierie</span>
  </a>

  <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav">Menu</button>

  <nav id="site-nav" class="site-nav" aria-label="Navigation principale">
    <a href="index.php"<?= nav_active('index.php', $current) ?>>Accueil</a>
    <a href="produits.php"<?= nav_active('produits.php', $current) ?>>Produits</a>
    <a href="video.php"<?= nav_active('video.php', $current) ?>>Vidéo</a>
    <a href="contact.php"<?= nav_active('contact.php', $current) ?>>Contact</a>
    <?php if ($loggedIn): ?>
      <a href="administration.php"<?= nav_active('administration.php', $current) ?>>Administration</a>
      <a href="deconnexion.php">Déconnexion</a>
    <?php else: ?>
      <a href="connexion.php"<?= nav_active('connexion.php', $current) ?>>Connexion</a>
    <?php endif; ?>
  </nav>
</header>
