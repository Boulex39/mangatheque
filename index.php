<?php
// On inclut l'autoloader généré par Composer pour charger automatiquement les classes nécessaires
require 'vendor/autoload.php';
// On inclut manuellement la classe AltoRouter (nécessaire si elle n'est pas bien autoloadée)
// require 'vendor/altorouter/altorouter/AltoRouter.php';

$router = new AltoRouter();
$router->setBasePath('/mangatheque');

$router->map('GET', '/', 'ControllerPage#homePage', 'homepage');
// User
$router->map('GET', '/user/[i:id]', 'ControllerUser#oneUserById', 'userPage');
$router->map('GET', '/user/delete/[i:id]', 'ControllerUser#deleteUserById','userDelete');
$router->map('GET|POST', '/user/update/[i:id]', 'ControllerUser#updateUser', 'userUpdate');

// Routes Manga
$router->map('GET', '/mangas', 'ControllerManga#allMangas', 'mangasList');             // Liste tous les mangas
$router->map('GET', '/mangas/[i:id]', 'ControllerManga#oneManga', 'mangaShow');        // Fiche d'un manga
$router->map('GET', '/mangas/create', 'ControllerManga#createMangaForm', 'mangaCreateForm'); // Formulaire ajout manga
$router->map('POST', '/mangas/store', 'ControllerManga#storeManga', 'mangaStore');     // Traitement ajout manga
$router->map('GET', '/mangas/[i:id]/edit', 'ControllerManga#editMangaForm', 'mangaEditForm'); // Formulaire édition
$router->map('POST', '/mangas/[i:id]/update', 'ControllerManga#updateManga', 'mangaUpdate');  // Traitement édition
$router->map('POST', '/mangas/[i:id]/delete', 'ControllerManga#deleteManga', 'mangaDelete');  // Suppression

$match = $router->match();

// Si une correspondance est trouvée (match est un tableau)
if(is_array($match)){
    
    // On sépare le nom de la classe et le nom de la méthode à appeler
    list($controller, $action) = explode("#", $match['target']);

    // On crée dynamiquement une instance de la classe contrôleur
    $obj = new $controller();

    // On vérifie si la méthode spécifiée est bien accessible dans cette classe
    if(is_callable(array($obj, $action))){
        
        // On appelle la méthode avec les paramètres capturés dans l'URL (si il y en a)
        call_user_func_array(array($obj, $action), $match['params']);
    
    } else {
        // Si la méthode n'existe pas ou n'est pas accessible, on renvoie une erreur 404
        http_response_code(404);
    }
}
