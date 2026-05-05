<?php
require_once "Database.php";
require_once "Auteur.php";

$database = new Database();
$db = $database->connect();

$auteur = new Auteur($db);

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    if ($auteur->supprimer($id)) {
        header("Location: liste_auteurs.php");
        exit();
    } else {
        echo "Erreur lors de la suppression";
    }
}
?>