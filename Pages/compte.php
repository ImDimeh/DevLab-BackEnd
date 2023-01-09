<?php
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
    <img src="" alt="" class="rounded-full h-[350px] w-[350px] m-auto">
    <div class="p-10 mt-9 flex gap-[20px] justify-center">
        <input type="text"
               style="padding:5px;outline:none;border:none; background-color:transparent; color:white; border-bottom: 2px solid MediumSeaGreen;text-align:center;"
               placeholder="Recherche par Titre"
               onchange="">
        <select class="" style="padding:5px;outline:none;border:none; color:white;background-color:transparent; border-bottom: 2px solid MediumSeaGreen;"
                onchange="">
                <option class="text-left text-white" value="-1">Flitre par thématique</option>
                <option class="text-black text-left" value="Horreur">Horreur</option>
                <option class="text-black text-left" value="Aventure">Aventure</option>
        </select>
    </div>
    <div class="flex text-center">
        <a href="./album.php"
           class="bg-green-one p-4 font-bold text-white hover:text-black place-content-center bg-opacity-90 font-monserrat mt-5 mb-10 text-center m-auto " >
            Créer un album
        </a>
    </div>
    <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-4xl"> Mes albums </p>
    <div class="p-10">
        <!-- mettre la liste d'albums ici -->
    </div>
    <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-4xl"> Mes albums partagés </p>
    <div class="p-10">
        <!-- mettre la liste d'album partagés ici -->
    </div>
    <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-4xl"> Autres albums </p>
    <div class="p-10">
        <!-- mettre les autres albums ici -->
    </div>
</main>

<script>

</script>
</body>
</html>
