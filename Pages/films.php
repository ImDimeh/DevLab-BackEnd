<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>films</title>
    <link rel="stylesheet" href="../style-tailwind/style-tailwind.css">
</head>
<body>
    <header class="flex bg-gray-dark-2 p-5 items-center justify-center gap-5 text-[white]">
        <form action="">
            <input type="text" class="rounded-[20px]">
        </form>
        <nav class="flex gap-[20px] text-[white] font-bold font-monserrat">
            <a class="p-1 px-5 hover:text-green-one" href="./accueil.php">ACCUEIL</a>
            <a class="p-1 px-5 hover:text-green-one" href="./films.php">FILMS</a>
            <a class="p-1 px-5 hover:text-green-one" href="">MON COMPTE</a>
            <a class="p-1 px-5 hover:text-green-one" href="">USERS</a>
        </nav>
    </header>
    <main class="bg-gradient-to-b from-blue-one to-blue-two h-max opacity-20 flex-col p-60">
        <p class="font-monserrat font-bold text-[white] text-4xl text-center">FILMS</p>
        <div class="">
            <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-4xl"> Films du moment <a
                        href="" class="font-monserrat text-[white] text-lg ml-[62rem]"> afficher plus</a></p>
        </div>

        <div class="">
            <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-4xl"> Rechercher un film par </p>
            <div class="flex-col">
                <div class="bg-gray-600 mb-10">
                    <img src="../images/2180999-elements-de-genre-de-film-vectoriel.jpg" alt="" class="w-[500px]">
                </div>
                <div class="bg-gray-600 mb-10">
                    <img src="../images/black%20and%20white.jpg" alt="" class="w-max">
                </div>
                <div class="bg-gray-600">
                    <img src="../images/Popularity.jpg" alt="">
                </div>
            </div>

        </div>
        <div class="">

        </div>
    </main>
</body>
</html>