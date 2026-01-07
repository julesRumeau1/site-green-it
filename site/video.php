<?php
require_once __DIR__ . '/src/bootstrap.php';
$pageTitle = 'Vidéo — Scierie';

// Je stocke l'ID de la vidéo ici pour l'utiliser dans le lien ET l'image
$videoId = 'dbHXPnhCicI';
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

        <a class="hero" href="https://www.youtube.com/watch?v=<?= $videoId ?>" target="_blank" rel="noopener noreferrer" aria-label="Ouvrir la vidéo sur YouTube">

            <img
                    src="https://img.youtube.com/vi/<?= $videoId ?>/maxresdefault.jpg"
                    width="960"
                    height="540"
                    alt="Miniature de la vidéo"
                    loading="lazy"
                    decoding="async"
                    style="object-fit: cover;"
            >
        </a>
    </main>

    <?php require_once __DIR__ . '/includes/footer.php'; ?>
</div>
</body>
</html>