<?php

class ModelManga extends Model
{
    public function getMangas(): array
    {
        $sql = "SELECT id_manga, titre, nb_vol FROM mangas";
        $query = $this->getDb()->query($sql);

        $arrayMangas = [];
        while ($manga = $query->fetch(PDO::FETCH_ASSOC)) {
            $arrayMangas[] = new Manga($manga);
        }

        return $arrayMangas;
    }

    public function getMangaById(int $id): ?Manga
    {
        $sql = "SELECT id_manga, titre, auteur, annee, genre, nb_vol, statut, resume, couverture, note, date_ajout
            FROM mangas
            WHERE id_manga = :id";
        $query = $this->getDb()->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new Manga($data);
        }

        return null;
    }
}


