<?php
session_start();
$_SESSION["id"]=11;
$titre= " centre de controle ";
$titre_header="PAGE D'ADMIN";
?>

<h1> BIENVENUE SUR LA PAGE ADMIN</h1>

<h1> LISTE  DE CHAQUE UTILISATEUR</h1>

<?php
require_once 'connection.php';
$connection = new connection();

$list_user = $connection->getAllUserData();

?>



</body>
</html>
