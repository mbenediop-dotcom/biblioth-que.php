<?php
require_once "Database.php";
require_once "Categorie.php";

$database = new Database();
$db = $database->connect();

$categorie = new Categorie($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];

    if ($categorie->ajouter($nom)) {
        echo "Catégorie ajoutée avec succès";
    } else {
        echo "Erreur";
    }
}
?>

<form method="POST">
    Nom catégorie : <input type="text" name="nom"><br><br>
    <button type="submit">Ajouter</button>
</form>