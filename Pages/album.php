<?php
require_once '../composants/Album.php';
require_once '../composants/dao_album.php';
require_once '../composants/db_connection.php';

session_start();

$dbname="album";
$dbhost ="localhost";
$dbuser ='root';
$dbpwd = "";

$con = new ConnectionBDD($dbname, $dbhost, $dbuser, $dbpwd);

$methode = $_SERVER['REQUEST_METHOD'];

$album = null;
$chaineId = "";

$mode = "";

$albumId = "";

if($methode == 'POST'){
    $mode = $_POST["mode"];
    if(isset($mode) && $mode == "enregistrer"){
        $album = new Album();

        $album->titre  = $_POST["titre"];
        $album->titre_long  = $_POST["titre_long"];
        $album->thematique  = $_POST["thematique"];
        $album->userid  = $_SESSION["userid"];

        $album_dao = new DaoAlbum($con);
        $albumid = $album_dao->insert($album);

        // redirecton vers la page film pour choisir les films
        header('Location: ./films.php?mode=choisir-films&albumId=' . $albumid);

    }else if(isset($mode) && $mode == "modifier"){
        echo "modifier album";

    }else if(isset($mode) && $mode == "ajouter-films"){
        $filmsId = $_POST["filmsId"];
        $albumId = $_POST["albumId"];

        // idfim1;idfilm2 : découper la chaine par rapport au séparateur ";"
        $tabfilmsId = explode(";",$filmsId);

        //enregistrer les films
        $album_dao = new DaoAlbum($con);

        // ajouter les films à l'album
        foreach ($tabfilmsId as $filmId) {
            $album_dao->insertFilm($albumId, $filmId);
        }

        // je récupère tous les films de l'album
        $album = $album_dao->readById($albumId);
        $films = $album_dao->readFilmsByAlbumlId($albumId);

        if ($films != null) {
            $chaineId = "";
            foreach ($films as $film) {
                if ($chaineId != "") {
                    $chaineId = $chaineId . ',';
                }
                $chaineId = $chaineId . $film['film_id'];
            }
        }
    }
}else if(isset($_GET["mode"])){

    $mode = $_GET["mode"];

    if($mode=="lire") {
        $albumId = $_GET["albumId"];
        $album_dao = new DaoAlbum($con);
        $album = $album_dao->readById($albumId);
        $films = $album_dao->readFilmsByAlbumlId($albumId);

        if ($films != null) {
            $chaineId = "";
            foreach ($films as $film) {
                if ($chaineId != "") {
                    $chaineId = $chaineId . ',';
                }
                $chaineId = $chaineId . $film['film_id'];
            }
        }

    }else if ($mode=="ajouter-films"){
        echo "ajouter film";

    }else if($mode=="rechercher") {


    }else if($mode=="creer") {
        // on passe en mode création, ne rien faire ici

    }else if($mode == "supprimer-filme"){
        $album_dao = new DaoAlbum($con);
        $albumId = $_GET["aldumId"];
        $filmId = $_GET["filmId"];
        $album_dao->supprimerFilm($albumId, $filmId);

        // je récupère tous les films de l'album
        $album = $album_dao->readById($albumId);
        $films = $album_dao->readFilmsByAlbumlId($albumId);

        if ($films != null) {
            $chaineId = "";
            foreach ($films as $film) {
                if ($chaineId != "") {
                    $chaineId = $chaineId . ',';
                }
                $chaineId = $chaineId . $film['film_id'];
            }
        }
    }
}

$con->close();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Album</title>
    <link rel="stylesheet" href="../style-tailwind/style-tailwind.css">
</head>
<body class="">
<header class="flex bg-gray-dark-2 p-5 items-center justify-center gap-5 text-[white]">
    <nav class="flex gap-[20px] text-[white] font-bold font-monserrat">
        <a class="p-1 px-5 hover:text-green-one" href="./accueil.php">ACCUEIL</a>
        <a class="p-1 px-5 hover:text-green-one" href="./films.phpode=consulter">FILMS</a>
        <a class="p-1 px-5 hover:text-green-one" href="./compte.php">MON COMPTE</a>
        <a class="p-1 px-5 hover:text-green-one" href="./users.php">USERS</a>
    </nav>
</header>
<main class="bg-gradient-to-b from-blue-one to-blue-two h-max opacity-20 p-10">
    <img src="../images/albums.png" alt="" class="rounded-full h-[350px] w-[350px] m-auto">
    <form method="POST" action="./album.php">
        <div class="p-10 mt-5 text-center">
            <div>
                <input name="titre" class="" type="text"
                       style="padding:5px;outline:none;border:none; background-color:transparent;
                       color:white; border-bottom: 2px solid MediumSeaGreen;text-align:center;"
                       placeholder="Saisir le titre de l'Album"
                       onchange="">
            </div>
            <div>
                <textarea name="titre_long" class="mt-2" type="text"
                       style="padding:5px;outline:none;border:none; background-color:transparent;
                       color:white; border-bottom: 2px solid MediumSeaGreen;text-align:left;"
                       rows="3" cols="33" maxlength="200"
                       placeholder="Saisir le titre long de l'Album"
                       onchange="">
                </textarea>
            </div>
            <div class="mt-5">
                <select name="thematique" class="" style="padding:5px;outline:none;border:none; color:white;background-color:transparent; border-bottom: 2px solid MediumSeaGreen;"
                        onchange="">
                    <option class="text-left text-white text-center" value="-1">Choisir la thématique de l'album</option>
                    <option class="text-black text-left text-center" value="Horreur">Horreur</option>
                    <option class="text-black text-left text-center" value="Aventure">Aventure</option>
                </select>
            </div>
            <input type="hidden" name="mode" value="enregistrer">
        </div>
        <div class="flex text-center">

            <button type="submit"
               class="bg-green-one rounded-[20px] p-2 pl-4 pr-4 text-white hover:text-black place-content-center bg-opacity-90 font-monserrat mt-5 mb-10 text-center m-auto " >
                Enregistrer le nouvel album
            </button>
        </div>

    </form>

    <div class="w-[70%] m-auto">
        <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-3xl"> Films </p>

        <?php if($mode != "creer") { ?>

        <div id="app">

            <!-- mettre les films ici -->
            <div class="">
                <div class="mt-[10px] flex gap-[10px] overflow-auto p-[20px] flex-wrap justify-center bg-transparent"
                     style="margin-top:10px;display:flex;gap:10px;overflow:auto;padding:20px;flex-wrap: wrap;justify-content:center;background-color: transparent;">
                    <film v-for="film in films"
                          :title="film.original_title"
                          :path_backdrop="film.backdrop_path"
                          :src="'https://image.tmdb.org/t/p/w300/' + film.backdrop_path"
                          :poster_path="film.poster_path"
                          :srcposter="'https://image.tmdb.org/t/p/w342/' + film.poster_path"
                          :popularity="film.popularity"
                          :date="film.release_date"
                          :id="film.id"
                          :idfilm="film.id"
                          style="width:20%;background-color:white;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></film>
                </div>
            </div>

        </div>

        <?php }?>

    </div>
</main>

<!-- Importer axios -->
<script src="https://cdn.jsdelivr.net/npm/axios@0.12.0/dist/axios.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/vue@2"></script> -->
<script src="https://unpkg.com/vue@2"></script>

<script>

    var appF = new Vue({
        el: '#app',
        data: {
            films:[],
            idFilms:[
                <?= $chaineId ?>
            ]
        }
    })

    Vue.component('film', {
        props: ['title', 'path_backdrop', 'src', 'popularity', 'date', 'poster_path', 'srcposter','idfilm'],
        template:`
              <div class="relative" style="position:relative;border-top-left-radius:10px 10px; border-top-right-radius:10px 10px;">

                  <div class="absolute" style="position: absolute;top:5%;left:5%;">
                    <a href="javascript:void();" :id="'consulter-' + idfilm" onclick="consultationFilm(this.id);"
                       class=""
                        style="background-color:orangered;color:white;border-radius:20px;padding:5px;padding-left: 20px;padding-right: 20px;">Consulter</a>

                    <a href="javascript:void();" :id="'supprimer-' + idfilm" onclick="supprimerFilm(this.id);"
                       style="background-color:orangered;color:white;border-radius:20px;padding:5px;padding-left: 20px;padding-right: 20px;">Supprimer</a>
                  </div>

                  <div style="border-top-left-radius:10px 10px; border-top-right-radius:10px 10px;">
                    <img v-if="path_backdrop!=null" :src="src" width="100%" style="border-top-left-radius:10px 10px; border-top-right-radius:10px 10px;">
                    <img v-else-if="poster_path!=null" :src="srcposter" width="100%" style="border-top-left-radius:10px 10px; border-top-right-radius:10px 10px;">
                    <p style="padding-left:5px;">Titre : {{ title }}</p>
                    <p style="padding-left:5px;">Popularité : {{ popularity }}</p>
                    <p style="padding-left:5px;">Date : {{ date }}</p>
                  </div>
              </div>
            `
    })

    function getFilms(pos, total){
        let id = appF.idFilms[pos];
        let url = "https://api.themoviedb.org/3/movie/" + id + "?api_key=698099b300e1dd87a14b503850a01e56";
        axios.get(url)
            .then(function (response) {
                appF.films.push(response.data);

                // poursuivre ?

                if(pos < total){
                    pos = pos + 1;
                    getFilms(pos, total);
                }
            })
            .catch(function (error) {
                mess  = "Erreur ! Impossible d'accéder à l'API." + error
            })
    }

    function consultationFilm(idfilm){
        let reg = new RegExp("[-]");
        window.location = "./consultation-film.php?filmId=" + idfilm.split(reg)[1];
    }

    //getFilms(-1);

    function afficherFilms(){
        appF.films = [];
        if(appF.idFilms.length>0){
            getFilms(0, appF.idFilms.length-1);
        }
    }

    function supprimerFilm(idfilm){
        let reg = new RegExp("[-]");
        window.location = "./album.php?mode=supprimer-filme&aldumId=" + "<?= $albumId ?>" + "&filmId=" + idfilm.split(reg)[1];
    }

    afficherFilms();

</script>
</body>
</html>

