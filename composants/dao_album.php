<?php
require_once 'Album.php';
require_once 'db_connection.php';
class DaoAlbum
{
    public ConnectionBDD $condb;

    public function __construct($con){
        $this->condb = $con;
    }

    public function insert(Album $album)
    {
        $query = 'INSERT INTO album (titre , titre_long, thematique, user_id) values (:titre , :titre_long , :thematique, :userid)';
        $statement = $this->condb->pdo->prepare($query);

        $statement->execute([
            'titre' => $album->titre,
            'titre_long' => $album->titre_long,
            'thematique' => $album->thematique,
            'userid' => $album->userid
        ]);

        return $this->condb->pdo->lastInsertId();
    }

    public function readAlbumsByUser($userid)
    {
        $query = 'SELECT titre , titre_long, thematique, id FROM album WHERE user_id = :userid';
        $statement =  $this->condb->pdo->prepare($query);
        $statement->execute([
                'userid' => $userid
            ]
        );
        return $statement->fetchAll(PDO::FETCH_CLASS, "Album");
    }

    public function insertFilm($albumId, $filmId)
    {
        $query = 'INSERT INTO album_film (album_id, film_id) values (:albumId , :filmId)';
        $statement = $this->condb->pdo->prepare($query);

        $statement->execute([
            'albumId' => $albumId,
            'filmId' => $filmId
        ]);

        return $this->condb->pdo->lastInsertId();
    }

    public function readFilmsByAlbumlId($albumId)
    {
        $query = 'SELECT film_id, album_id FROM album_film WHERE album_id = :albumId';
        $statement =  $this->condb->pdo->prepare($query);
        $statement->execute([
                'albumId' => $albumId
            ]
        );
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readById($IdAlbum)
    {
        $query = 'SELECT titre , titre_long, thematique FROM album WHERE album.id = :IdAlbum';
        $statement =  $this->condb->pdo->prepare($query);
        $statement->execute([
                'IdAlbum' => $IdAlbum
            ]
        );
        return $statement->fetchAll(PDO::FETCH_CLASS, "Album");
    }

    public function supprimerFilm($IdAlbum, $IdFilm)
    {
        $query = 'DELETE FROM album_film WHERE album_id = :IdAlbum AND film_id = :IdFilm';
        $statement = $this->condb->pdo->prepare($query);
        $statement->execute([
                'IdAlbum' => $IdAlbum,
                'IdFilm' => $IdFilm
            ]
        );
        return 0;
    }

    public function searchByTitre($titre){
        $query = 'SELECT titre , titre_long, thematique FROM album WHERE album.titre LIKE :titre';
        $statement =  $this->condb->pdo->prepare($query);
        $statement->execute([
                'titre' => $titre
            ]
        );
        return $statement->fetchAll(PDO::FETCH_CLASS, "Album");
    }

    public function searchByThematique($thematique){
        $query = 'SELECT titre , titre_long, thematique FROM album WHERE album.thematique = :thematique';
        $statement =  $this->condb->pdo->prepare($query);
        $statement->execute([
                'thematique' => $thematique
            ]
        );
        return $statement->fetchAll(PDO::FETCH_CLASS, "Album");
    }

    public function searchByThematiqueAndTitre($thematique, $titre){
        $query = 'SELECT titre , titre_long, thematique FROM album WHERE album.thematique = :thematique AND album.titre LIKE :titre';
        $statement =  $this->condb->pdo->prepare($query);
        $statement->execute([
                'thematique' => $thematique,
                'titre' => $titre
            ]
        );
        return $statement->fetchAll(PDO::FETCH_CLASS, "Album");
    }
}

?>

