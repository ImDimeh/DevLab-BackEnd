<?php
  require_once '../composants/dao_album.php';
  //require_once '../composants/db_connection.php';

  $dbname="album";
  $dbhost ="localhost";
  $dbuser ='root';
  $dbpwd = "";

  $userid = "";
  $albums = null;

  $con = new ConnectionBDD($dbname, $dbhost, $dbuser, $dbpwd);

  if(isset($_SESSION["userid"])){
      $userid = $_SESSION["userid"];
  }

  if(isset($_GET["mode"]) && $_GET["mode"]=="rechercher-albums") {

      $titre = $_GET["titre"];
      $thematique = $_GET["thematique"];
      $album_dao = new DaoAlbum($con);

      if($titre != "" && $thematique != "") {
          $titre = "%" . $titre . "%";
          $albums = $album_dao->searchByThematiqueAndTitre($thematique, $titre);
      }else if($titre!=""){
          $titre = "%" . $titre . "%";
          $albums = $album_dao->searchByTitre($titre);
      }else if($thematique!=""){
          $albums = $album_dao->searchByThematique($thematique);
      }

  }else{
      $album_dao = new DaoAlbum($con);
      $albums = $album_dao->readAlbumsByUser($userid);
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
    <title>compte</title>
    <link rel="stylesheet" href="../style-tailwind/style-tailwind.css">
</head>
<body>
<header class="flex bg-gray-dark-2 p-5 items-center justify-center gap-5 text-[white]">
    <nav class="flex gap-[20px] text-[white] font-bold font-monserrat">
        <a class="p-1 px-5 hover:text-green-one" href="./accueil.php">ACCUEIL</a>
        <a class="p-1 px-5 hover:text-green-one" href="./films.php">FILMS</a>
        <a class="p-1 px-5 hover:text-green-one" href="./compte.php">MON COMPTE</a>
        <a class="p-1 px-5 hover:text-green-one" href="./users.php">USERS</a>
    </nav>
</header>
<main class="bg-gradient-to-b from-blue-one to-blue-two h-max opacity-20 p-10">
    <img src="../images/albums.png" alt="" class="rounded-full h-[350px] w-[350px] m-auto">

    <form id="form-album" action="./compte.php" method="GET">
        <div class="p-10 mt-9 text-center">
            <div>
                <input name="titre" class="" type="text"
                   style="padding:5px;outline:none;border:none; background-color:transparent; color:white; border-bottom: 2px solid MediumSeaGreen;text-align:center;"
                   placeholder="Saisir le titre de l'album">
            </div>
            <div class="mt-5">
                <select name="thematique" class="" style="padding:5px;outline:none;border:none; color:white;background-color:transparent; border-bottom: 2px solid MediumSeaGreen;">
                    <option class="text-left text-white text-center" value="-1">Choisir la thématique de l'album</option>
                    <option class="text-black text-left text-center" value="Horreur">Horreur</option>
                    <option class="text-black text-left text-center" value="Aventure">Aventure</option>
                </select>
            </div>
        </div>
        <div class="w-[70%] m-auto text-center mt-5">
            <input id="mode" type="hidden" name="mode" value="rechercher-albums">
            <button type="submit"
               class="rounded-[20px] bg-green-one p-2 pl-4 pr-4 text-white hover:text-black place-content-center bg-opacity-90 font-monserrat mt-5 mb-10 text-center m-auto " >
                Lancer la recherche !
            </button>
            <button onclick="creerAlbum();"
               class="rounded-[20px] ml-[20px] bg-green-one p-2 pl-4 pr-4 text-white hover:text-black place-content-center bg-opacity-90 font-monserrat mt-5 mb-10 text-center m-auto " >
                Créer un nouvel album !
            </button>
        </div>
    </form>
    <div class="w-[70%] m-auto">
        <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-2xl"> Mes albums </p>
        <div class="p-10 flex flex-wrap gap-[20px] justify-center">
            <!-- mettre la liste d'albums ici -->

            <?php foreach ($albums  as $album) { ?>

               <div class="w-[22%] bg-amber-50" style="border-top-left-radius:10px;border-top-right-radius:10px;">
                   <div >
                       <img src="">
                   </div>
                   <div class="p-2">
                       <p><span class="font-bold">Titre : </span><?= $album->titre ?></p>
                       <p><span class="font-bold">Titre long : </span><?= $album->titre_long ?></p>
                       <p><span class="font-bold">Thematique : </span><?= $album->thematique ?></p>
                   </div>
                   <div >
                       <a href="./album.php?mode=lire&albumId=<?= $album->id ?>">Consulter</a>
                   </div>
               </div>

            <?php } ?>

        </div>
        <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-2xl"> Mes albums partagés </p>
        <div class="p-10">
            <!-- mettre la liste d'album partagés ici -->
        </div>
        <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-2xl"> Autres albums </p>
        <div class="p-10">
            <!-- mettre les autres albums ici -->
        </div>
    </div>
</main>

<script>

    function creerAlbum(){
        //href="./album.php?mode=creer"
        // changer l'action et la methode du formulaire
        let form = document.querySelector("#form-album");
        form.action="./album.php";
        form.method="POST";
        let mode = document.querySelector("#mode");
        mode.value="creer";
        form.submit();
    }

</script>
</body>
</html>
