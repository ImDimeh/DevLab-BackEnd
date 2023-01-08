<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se connecter / S'inscrire</title>
    <link rel="stylesheet" href="../style-tailwind/style-tailwind.css">
</head>
<body style="height: 100vh;background: linear-gradient(#3B75CD, #0D202B);">
<header class="flex bg-gray-dark-2" style="background: #252424; display: flex; gap: 20px; color: white; padding: 20px;align-items: center;justify-content: center;">
    <form action="">
        <input class="" type="text" style="border-radius:20px;">
    </form>
    <nav class="flex" style="display: flex; flex-direction:row; gap: 20px;">
        <a class="p-1 px-5 hover:text-green-one" href="./accueil.php">ACCUEIL</a>
        <a class="p-1 px-5 hover:text-green-one"  href="./films.php">FILMS</a>
        <a class="p-1 px-5 hover:text-green-one"  href="./compte.php">MON COMPTE</a>
        <a class="p-1 px-5 hover:text-green-one"  href="./users.php">USERS</a>
    </nav>
</header>
<main class="bg-gradient-to-t from-blue-one to-blue-two" >

    <div class="" >
        <h1 >SE CONNECTER ...</h1>

        <form class="" action="">
            <div >
                <input class="" type="email" placeholder="Saisir votre email" required >
            </div>
            <div style="text-align: center;">
                <input class="" type="password" placeholder="Saisir votre mot de passe" required >
            </div>
            <input class="" type="submit" value="Se connecter" >
        </form>
        <div class="" >
            <p>
                <a href="inscription.php" >S'INSCRIRE</a> si vous n'êtes pas déja inscrit !!!
            </p>
        </div>
    </div>
</main>
</body>
</html>

