<?php
session_start();

$titre="votre page ";
$titre_header="votre page"; ?>



<?php

require_once '../connection.php';
$connection = new connection();
if (isset($_SESSION["name"])) {
    
    $titreH1="bienvenue ".$_SESSION["name"];
} else {
  $_SESSION["error"] = "vous devez vous connecter pour acceder à cette page ";
  header("Location: login.php");
    
}
?>

<h1> <?php echo $titreH1 ?> </h1>
<a href="index.php"> découvrir des films </a>
<a href="seeMovie.php"> Liste de films vue  </a>
<a href="whishlist.php"> Whishlist </a>




</body>
</html>

