<?php
require_once '../composants/user.php';
require_once '../composants/db_connection.php';
require_once '../composants/dao_user.php';

session_start();

$dbname="album";
$dbhost ="localhost";
$dbuser ='root';
$dbpwd = "";

$user_authentifier = false;

if(isset($_GET["mode"]) && $_GET["mode"] == "authentifier"){
    $con = new ConnectionBDD($dbname, $dbhost, $dbuser, $dbpwd);
    $user = new User();
    $user->email =$_GET["email"];
    $user->password =$_GET["password"];

    $user_dao = new DaoUser($con);

    $userlu = $user_dao->read($user);

    if($userlu != null){
        $user_authentifier = true;
        $_SESSION["userid"] = $userlu->id;
        header('Location: ./compte.php?userid=' . $userlu->id);
    }

    $con->close();
}

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
<body class="bg-gradient-to-t from-blue-one to-blue-two" style="height: 100vh;">
<header class="flex bg-gray-dark-2" style="background: #252424; display: flex; gap: 20px; color: white; padding: 20px;align-items: center;justify-content: center;">
    <nav class="flex" style="display: flex; flex-direction:row; gap: 20px;">
        <a class="p-1 px-5 hover:text-green-one" href="./accueil.php">ACCUEIL</a>
        <a class="p-1 px-5 hover:text-green-one"  href="./films.php">FILMS</a>
        <a class="p-1 px-5 hover:text-green-one"  href="./compte.php">MON COMPTE</a>
        <a class="p-1 px-5 hover:text-green-one"  href="./users.php">USERS</a>
    </nav>
</header>
<main class="" >
    <div class="" style="padding:50px;">
        <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-xl">CONNEXION</p>

        <?php if($user_authentifier == false){?>

        <div class="bg-green-one p-2">
            <p class="text-amber-200 text-center">Il n'existe pas de compte correspondant à vos identifiants !</p>
        </div>

        <?php }?>

        <form class="mt-5" action="./connection.php" style="text-align: center;color:white;" method="GET">
            <div style="margin-top: 20px;">
                <input class="" type="email" name="email" placeholder="Saisir votre email" required
                       style="text-align:center;padding: 10px;outline:none;border:none;background-color: transparent;border-bottom: 2px solid MediumSeaGreen;">
            </div>
            <div style="margin-top: 20px;">
                <input class="" type="password" name="password" placeholder="Saisir votre mot de passe" required
                       style="text-align:center;padding: 10px;outline:none;border:none;background-color: transparent;border-bottom: 2px solid MediumSeaGreen;">
            </div>
            <input type="hidden" name="mode" value="authentifier">
            <input class="" type="submit" value="Se connecter"
                   style="width:150px;margin-top: 50px;background-color: MediumSeaGreen;padding:10px;color:white;">
        </form>
        <div class="" style="text-align: center;margin-top: 20px;color:white;">
            <p>
                <a href="./inscription.php" style="color:orangered;">S'INSCRIRE</a> <span>si vous n'êtes pas déja inscrit !!!</span>
            </p>
        </div>
    </div>
</main>
</body>
</html>

