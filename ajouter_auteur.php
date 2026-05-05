<?php
require_once "Database.php";
require_once "Auteur.php";

$database = new Database();
$db = $database->connect();

$auteur = new Auteur($db);

if (isset($_POST["ajouter"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $nationalite = $_POST["nationalite"];

    if ($auteur->ajouter($nom, $prenom, $nationalite)) {
        echo "Auteur ajouté avec succès";
    } else {
        echo "Erreur lors de l'ajout";
    }
}
?>

<form method="POST">
    <label>Nom :</label><br>
    <input type="text" name="nom"><br><br>

    <label>Prénom :</label><br>
    <input type="text" name="prenom"><br><br>

    <label>Nationalité :</label><br>
    <input type="text" name="nationalite"><br><br>

    <button type="submit" name="ajouter">Ajouter</button>
</form>