<?php
class ControllerManga {
    
    public function allMangas() {
        $modelManga = new ModelManga();
        $mangas = $modelManga->getMangas(); // liste tous les mangas

        require './view/page/mangaspage.php'; // assure-toi que ce fichier existe
    }

    public function oneManga($id) {
        $modelManga = new ModelManga();
        $manga = $modelManga->getMangaById($id);

        if ($manga === null) {
            http_response_code(404);
            require './view/404.php';
            exit;
        }

        require './view/manga/mangapage.php';
    }
}

