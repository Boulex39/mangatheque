<?php
class Manga
{
    private int $id_manga = 1;
    private string $titre = 'JJK';
    private string $auteur = "Gege Akutami";
    private int $annee = 2018;
    private string $genre = "Shonen";
    private int $nb_vol = 25;
    private string $resume = 'résumé';
    private string $statut = 'En cours';
    private string $couverture = 'jjk.jpeg';
    private string $note = '8.7';
    private DateTimeImmutable $date_ajout;



     public function __construct(array $datas)
    {
        $this->date_ajout = new \DateTimeImmutable();
        $this->hydrate($datas);
    }

    private function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId_manga(): int
    {
        return $this->id_manga;
    }

    public function setId_manga(int $id_manga): void
    {
        $this->id_manga = $id_manga;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getAuteur(): string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): void
    {
        $this->auteur = $auteur;
    }

    public function getAnnee(): int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): void
    {
        $this->annee = $annee;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    public function getNb_vol(): int
    {
        return $this->nb_vol;
    }

    public function setNb_vol(int $nb_vol): void
    {
        $this->nb_vol = $nb_vol;
    }

     public function getResume(): string
    {
        return $this->resume;
    }

    public function setResume(string $resume): void
    {
        $this->resume = $resume;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }

    public function getCouverture(): string
    {
        return $this->couverture;
    }

    public function setCouverture(string $couverture): void
    {
        $this->couverture = $couverture;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    public function getDate_ajout(): DateTimeImmutable
    {
        return $this->date_ajout;
    }

    public function setDate_ajout(string $date_ajout): void
    {
        $this->date_ajout = new \DateTimeImmutable($date_ajout);
    }
}