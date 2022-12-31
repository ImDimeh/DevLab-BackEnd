<?php 

require_once "../page/components/header.php";

require_once '../connection.php';

$connection = new  connection();
$result = $connection->getAllUserSeeMovie();

print_r ($result);
?>