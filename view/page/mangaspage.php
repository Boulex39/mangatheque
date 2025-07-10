<?php

$title = "Liste des mangas";
ob_start();

foreach ($mangas as $manga) :
?>
<div class="manga">
    <img class="cover" src="./assets/jjk.jpg"<?= htmlspecialchars($manga->getCouverture()) ?>" alt="<?= htmlspecialchars($manga->getTitre()) ?>">
    <h2><?= htmlspecialchars($manga->getTitre()) ?></h2>
    <p>Nombre de volumes : <?= htmlspecialchars($manga->getNb_vol()) ?></p>
    <p><a href="/mangatheque/mangas/<?= $manga->getId_manga() ?>">Plus d'info</a></p>
</div>
<?php
endforeach;

$content = ob_get_clean();
ob_end_clean();
require_once './view/base-html.php';
