<?php
session_start();

$titre="votre page ";
$titre_header="votre page";
var_dump( $_SESSION["name"]);
?>

<h1> BIENVENUE <?php echo $_SESSION["name"] ?></h1>




<?php
require_once '../connection.php';
$connection = new connection();

?>
</body>
</html>

