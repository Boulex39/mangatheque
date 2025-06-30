<?php
class ModelUser
{
    // Méthode publique qui retourne un tableau d'utilisateurs
    public function getUsers(): array
    {
        

        // Requête SQL pour récupérer toutes les données utiles des utilisateurs
        try {
            // Connexion à la base de données avec PDO (ici à MySQL, sur localhost)
        $db = new PDO('mysql:host=localhost;dbname=mangatheque', 'root');
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        $query = $db->query('SELECT id, pseudo, email, password, created_at FROM user');

        // Tableau vide qui contiendra les objets User
        $arrayUser = [];

        // Boucle qui parcourt chaque enregistrement retourné par la requête
        while($user = $query->fetch(PDO::FETCH_ASSOC)) {
            // Création d'un nouvel objet User avec les données récupérées
            $arrayUser[] = new User($user['id'], $user['pseudo'], $user['email'], $user['password']);
        }

        // Retourne le tableau d'objets User
        return $arrayUser;
    }
}
// class ModelUser
// {
//     public function getUsers(): array
//     {
//         $db = new PDO('mysql:host=localhost;dbname=mangatheque', 'root');
//         $query = $db->query('SELECT id, pseudo, email, password, created_at FROM user');

//         $arrayUser = [];
//         while($user = $query->fetch(PDO::FETCH_ASSOC)){
//             $arrayUser[] = new User($user['id'], $user['pseudo'], $user['email'], $user['password']);
//         }

//         return $arrayUser;
//     }
// }
