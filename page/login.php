<?php
session_start();

$titre="bienvenue sur la page de connexion";
$titre_header="page de login"
?>




<h1> Page De connexion</h1>


<div class="form_conainter">
   
    <form method="POST" class="form_inscription">
         <h3> INSCRIPTION</h3>
        <input type="email" name="email" placeholder="votre email">
        <input type="password" name="password1" placeholder="votre MDP 1">
        <input type="password" name="password2" placeholder="votre MDP (verification)">
        <input type="text" name="first_name" placeholder="votre prénom">
        <input type="text" name="last_name" placeholder="votre Nom">



        <input type="submit" name="inscription" value="m'inscrire">

    </form>

   
    <form method="POST" class="form_connexion">
        <h3> SE CONNECTER</h3>
        <input type="email" name="email" placeholder="votre email">
        <input type="password" name="password1" placeholder="votre MDP 1">




        <input type="submit" name="connexion" value="me connecter">

    </form>


</div>



<script src="https://kit.fontawesome.com/dd939f4e1e.js" crossorigin="anonymous"></script>
</body>
</html>
<?php
require_once '../user.php';
require_once '../connection.php';

if($_POST) {

    if (isset($_POST['inscription'])) {
        $user = new user(
            $_POST['email'],
            $_POST['password1'],
            $_POST['password2'],
            $_POST['first_name'],
            $_POST['last_name'],


        );
        if ($user->verify_incription()) {
            var_dump($user);
            $connection = new  connection();
            $result = $connection->insert($user);
            // save to database
            if ($result) {
                echo 'add to database succed';
            } else {
                echo 'error';
            }


        } else {
            echo 'there is an error in the form';
        }
    }
    if (isset($_POST['connexion'])) {

        $user = new user(
            $_POST['email'],
            $_POST['password1'],
            "",
            "",
            "",
            "",

        );
        if ($user->verify_connexion()) {
            //var_dump($user);

            $connection = new  connection();
            $result = $connection->connexion($user->email , $user->password);


            if ($result) {

                $_SESSION["data"]=$result ;
                $_SESSION["name"] =$result["first_name"];

                if($result["IsAdmin"]===1){
                   $_SESSION["IsAdmin"] = $isAdmin=$result["IsAdmin"];
                    $_SESSION["id"] = $result["id"];
                    header('Location: admin.php');
                }else{
                    $_SESSION["id"] = $result["id"];
                    header('Location: my-account.php');

                }

                echo 'connexion réussit';

            } else {

                echo 'error';
            }

        }
    }
}
?>