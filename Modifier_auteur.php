<?php
require_once "Database.php";
require_once "Auteur.php";

$database = new Database();
$db = $database->connect();

$auteur = new Auteur($db);

if (isset($_POST["modifier"])) {
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $nationalite = $_POST["nationalite"];

    if ($auteur->modifier($id, $nom, $prenom, $nationalite)) {
        header("Location: liste_auteurs.php");
        exit();
    } else {
        echo "Erreur de modification";
    }
}
?>

<form method="POST">
    <label>ID :</label><br>
    <input type="number" name="id"><br><br>

    <label>Nom :</label><br>
    <input type="text" name="nom"><br><br>

    <label>Prénom :</label><br>
    <input type="text" name="prenom"><br><br>

    <label>Nationalité :</label><br>
    <input type="text" name="nationalite"><br><br>

    <button type="submit" name="modifier">Modifier</button>
</form>