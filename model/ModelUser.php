<?php
class ModelUser extends Model
{
    // Méthode publique qui retourne un tableau d'utilisateurs
    public function getUsers(): array
    {

        $query = $this->getDb()->query('SELECT id, pseudo, email, password, created_at FROM user');

        // Tableau vide qui contiendra les objets User
        $arrayUser = [];

        // Boucle qui parcourt chaque enregistrement retourné par la requête
        while ($user = $query->fetch(PDO::FETCH_ASSOC)) {
            // Création d'un nouvel objet User avec les données récupérées
            $arrayUser[] = new User($user);
        }

        // Retourne le tableau d'objets User
        return $arrayUser;
    }

    public function getOneUserByid(int $id) : ?User
    {
        // rajout d'un prepare car on a une variable
        $req = $this->getDb()->prepare('SELECT id, pseudo, email, password, created_at From user WHERE id = :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();

        // $user = $req->fetch(PDO::FETCH_ASSOC);
        // $foundUser = new User($user['id'], $user['pseudo'], $user['email'], $user['password']);

        // return $foundUser;
        // On récupère un seul résultat
        $user = $req->fetch(PDO::FETCH_ASSOC);

        return $user ? new User($user) : null;
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
