<?php

$title = "Manga : " . htmlspecialchars($manga->getTitre());

ob_start();
?>

<div class="manga">
    <img class="couverture" src="./assets/jjk.jpg"<?= htmlspecialchars($manga->getCouverture()) ?>" alt="<?= htmlspecialchars($manga->getTitre()) ?>">
    <h2><?= htmlspecialchars($manga->getTitre()) ?></h2>
    <p>Auteur : <?= htmlspecialchars($manga->getAuteur()) ?></p>
    <p>Nombre de volumes : <?= htmlspecialchars($manga->getNb_vol()) ?></p>
    <p>Note : <?= htmlspecialchars($manga->getNote()) ?> ⭐</p>
    <p>Année de publication : <?= htmlspecialchars($manga->getAnnee()) ?></p>
    <p>Statut : <?= htmlspecialchars($manga->getStatut()) ?></p>
    <h3>Résumé :</h3>
    <p><?= nl2br(htmlspecialchars($manga->getResume())) ?></p>
</div>

<?php
$content = ob_get_clean();
ob_end_clean();
require_once './view/base-html.php';
