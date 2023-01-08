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
        <nav class="flex" style="display: flex; flex-direction:row; gap: 20px;">
            <a class="" style="padding: 5px; padding-left: 20px; padding-right: 20px;" href="./accueil.php">ACCUEIL</a>
            <a class="" style="padding: 5px; padding-left: 20px; padding-right: 20px;" href="">FILMS</a>
            <a class="" style="padding: 5px; padding-left: 20px; padding-right: 20px;" href="">MON COMPTE</a>
            <a class="" style="padding: 5px; padding-left: 20px; padding-right: 20px;" href="">USERS</a>
        </nav>
    </header>
    <main class="bg-gradient-to-t from-blue-one to-blue-two"
          style="padding: 20px;height: 80vh;">
        <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-xl">CONNEXION</p>
        <div class="" style="display:flex;flex-direction:column; align-items: center; justify-content: center;height: 100%;">

            <form class="" action="" style="width: 50%;display: flex;flex-direction: column;gap:20px;margin-top: 20px;color:white;">
                <div style="text-align: center;">
                    <input class="" type="text" placeholder="Saisir votre nom"
                           style="text-align:center;padding: 10px;outline:none;border:none;background-color: transparent;border-bottom: 2px solid MediumSeaGreen;">
                </div>
                <div style="text-align: center;">
                    <input class="" type="text" placeholder="Saisir votre prénom"
                           style="text-align:center;padding: 10px;outline:none;border:none;background-color: transparent;border-bottom: 2px solid MediumSeaGreen;">
                </div>
                <div style="text-align: center;">
                    <input class="" type="email" placeholder="Saisir votre email"
                           style="text-align:center;padding: 10px;outline:none;border:none;background-color: transparent;border-bottom: 2px solid MediumSeaGreen;">
                </div>
                <div style="text-align: center;">
                    <input class="" type="password" placeholder="Saisir votre mot de passe"
                           style="text-align:center;padding: 10px;outline:none;border:none;background-color: transparent;border-bottom: 2px solid MediumSeaGreen;">
                </div>
                <input class="" type="submit" value="S'inscrire"
                       style="width:200px;margin:auto;padding:10px; padding-right: 20px;padding-left: 20px;background-color: MediumSeaGreen; color:white;margin-top: 40px;">
            </form>
        </div>
    </main>
</body>
</html>
