<?php
require_once "Database.php";
require_once "livre.php";

$database = new Database();
$db = $database->connect();

$livre = new Livre($db);

if(isset($_GET['id'])) {
    $livre->supprimer($_GET['id']);
}

header("Location: liste_livres.php");
exit();
?>