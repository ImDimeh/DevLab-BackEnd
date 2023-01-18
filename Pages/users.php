<?php

session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>users</title>
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
<main class="bg-gradient-to-b from-blue-one to-blue-two h-max opacity-20 ">
    <div class="flex gap-[20px] text-[white] font-bold font-monserrat text-7xl place-content-center p-32"> MON COMPTE </div>
    <img src="" alt="" class="rounded-full h-[350px] w-[350px] m-auto">
    <div class="p-60">
        <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-4xl"> Album 1 </p>
    </div>

    <div class="p-60">
        <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-4xl"> Amis </p>

    </div>
</main>
</body>
</html>

