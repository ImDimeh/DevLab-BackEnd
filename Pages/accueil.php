<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <link rel="stylesheet" href="../style-tailwind/style-tailwind.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
</head>
<body class="h-[8vh]" >
    <header class="flex bg-gray-dark-2 p-5 items-center justify-center gap-5 text-blue-one h-[8vh]">
        <nav class="flex gap-[20px] text-[white] font-bold font-monserrat ">
            <a class="p-1 px-5 hover:text-green-one" href="./accueil.php">ACCUEIL</a>
            <a class="p-1 px-5 hover:text-green-one" href="./films.php?mode=consulter">FILMS</a>
            <a class="p-1 px-5 hover:text-green-one" href="compte.php">MON COMPTE</a>
            <a class="p-1 px-5 hover:text-green-one" href="users.php">USERS</a>
        </nav>
    </header>
    <main class="bg-gradient-to-b from-blue-one to-blue-two h-max opacity-20" >
        <div class="flex  pt-24">
           <img src="../images/OIP (4).jpg" alt="" class="rounded-full h-[350px] w-[350px] m-auto">
        </div>
        <p class="font-bold text-white flex justify-center padding text-lg font-monserrat pt-8">
            L’appli multifonction indispensable pour les fans de cinéma
        </p>
        <div class="flex text-center">
            <a href="connection.php" class="bg-green-one p-4 font-bold text-white hover:text-black place-content-center bg-opacity-90 font-monserrat mt-5 mb-10 text-center m-auto " >
                Se connecter / S'inscrire
            </a>
        </div>
        <div  class="flex-col p-5 mb-5">
            <div class="bg-special-white bg-opacity-60 p-10 mb-52 flex rounded-md gap-20 relative w-max m-auto" >
                <img src="../images/into-film-plus-catalogue-image-07-22.jpg " alt="" class="w-[500px]">
                <h1 class="text-[white] font-bold font-monserrat text-black"> rien</h1>
            </div>
            <div class="bg-special-white bg-opacity-60 p-10 flex relative rounded-md gap-20 relative w-max m-auto">
                <img src="../images/istockphoto-1131420125-170667a.jpg" alt="" class="">
                <h1 class="text-[white] font-bold font-monserrat text-black"> rien</h1>
            </div>
        </div>
    </main>
</body>
</html>
