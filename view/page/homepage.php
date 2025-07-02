<?php

// Définition du titre de la page
$title = "Page d'accueil !";

// Démarrage de la temporisation de sortie (bufferisation)
// Cela permet de capturer le contenu HTML généré pour le stocker dans une variable
ob_start();

// Boucle sur le tableau $users qui contient des objets User
foreach($users as $user) :
?>
<!-- Bloc HTML représentant un utilisateur -->
<div class="user">
    <!-- Affiche le pseudo de l'utilisateur via la méthode getPseudo() -->
    <h2><?= $user->getPseudo() ?></h2>

    <!-- Affiche l'email de l'utilisateur via la méthode getEmail() -->
    <p>Email : <?= $user->getEmail() ?></p>

    <!-- Lien pour "voir le user" (à compléter avec une URL dynamique si nécessaire) -->
    <p><a href="user/<?= $user->getId() ?>">Voir le user</a></p>
</div>
<?php
// Fin de la boucle foreach
endforeach;

// Récupère tout le contenu généré depuis ob_start() et le stocke dans la variable $content
$content = ob_get_contents();

// Termine la temporisation et nettoie le buffer de sortie
ob_end_clean();

// Inclut le fichier de base HTML (layout) qui va utiliser la variable $title et $content
require_once './view/base-html.php';

// ob_start() / ob_get_contents() / ob_end_clean() te permettent de capturer du HTML généré et de l'injecter ensuite dans un layout (pratique pour le templating).

// < ?= ... ? > est un raccourci de < ?php echo ... ? >, utilisé pour afficher rapidement une variable ou le résultat d'une méthode.

// require_once est utilisé ici pour inclure une structure HTML principale, souvent avec un <DOCTYPE html>, <head>, etc., où seront insérés $title et $content.