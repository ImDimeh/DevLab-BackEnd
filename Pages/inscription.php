<?php
require_once '../composants/user.php';
require_once '../composants/dao_user.php';
require_once '../composants/db_connection.php';

session_start();

$dbname="album";
$dbhost ="localhost";
$dbuser ='root';
$dbpwd = "";

$existeuser = false;

if(isset($_POST["mode"]) && $_POST["mode"] == "inscrire"){
    $con = new ConnectionBDD($dbname, $dbhost, $dbuser, $dbpwd);
    $user = new User();

    $user->email  = $_POST["email"];
    $user->password = $_POST["password"];
    $user->firstname = $_POST["firstname"];
    $user->lastname  = $_POST["lastname"];

    $user_dao = new DaoUser($con);

    $userlu = $user_dao->read($user);

    if($userlu == null) {
        $user_id = $user_dao->insert($user);
        $userlu = $user_dao->read($user);
        $_SESSION["userid"] = $userlu->id;
        header('Location: ./compte.php?userid=' . $userlu->id);
    }else{
        $existeuser = true;
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
    <title>Inscription</title>
    <link rel="stylesheet" href="../style-tailwind/style-tailwind.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
</head>
<body class="h-[100vh] bg-gradient-to-b from-blue-one to-blue-two h-max opacity-20" >
<header class="flex bg-gray-dark-2 p-5 items-center justify-center gap-5 text-blue-one h-[8vh]">
    <nav class="flex gap-[20px] text-[white] font-bold font-monserrat ">
        <a class="p-1 px-5 hover:text-green-one" href="./accueil.php">ACCUEIL</a>
        <a class="p-1 px-5 hover:text-green-one" href="./films.php?mode=consulter">FILMS</a>
        <a class="p-1 px-5 hover:text-green-one" href="./compte.php">MON COMPTE</a>
        <a class="p-1 px-5 hover:text-green-one" href="./users.php">USERS</a>
    </nav>
</header>
<main class="w-[70%] m-auto" >
        <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-xl">INSCRIPTION</p>

        <?php if($existeuser == true){?>

        <div class="bg-green-one p-2">
            <p class="text-amber-200 text-center">Vos identfiants existent déja !</p>
        </div>

        <?php }?>
        <div class="mt-5" style="display:flex;flex-direction:column; align-items: center; justify-content: center;height: 100%;">

            <form class="" action="./inscription.php" method="POST"
                  style="width: 50%;display: flex;flex-direction: column;gap:20px;margin-top: 20px;color:white;">
                <div style="text-align: center;">
                    <input class="" type="text" name="firstname" placeholder="Saisir votre nom"
                           style="text-align:center;padding: 10px;outline:none;border:none;background-color: transparent;border-bottom: 2px solid MediumSeaGreen;">
                </div>
                <div style="text-align: center;">
                    <input class="" type="text" name="lastname" placeholder="Saisir votre prénom"
                           style="text-align:center;padding: 10px;outline:none;border:none;background-color: transparent;border-bottom: 2px solid MediumSeaGreen;">
                </div>
                <div style="text-align: center;">
                    <input class="" type="email" name="email" placeholder="Saisir votre email"
                           style="text-align:center;padding: 10px;outline:none;border:none;background-color: transparent;border-bottom: 2px solid MediumSeaGreen;">
                </div>
                <div style="text-align: center;">
                    <input class="" name="password" type="password" placeholder="Saisir votre mot de passe"
                           style="text-align:center;padding: 10px;outline:none;border:none;background-color: transparent;border-bottom: 2px solid MediumSeaGreen;">
                </div>
                <input type="hidden" name="mode" value="inscrire">

                <input class="rounded-[20px] bg-green-one p-2 text-white hover:text-black" type="submit" value="S'inscrire"
                       style="width:200px;margin:auto;margin-top: 40px;">
            </form>
        </div>
    </main>
</body>
</html>
