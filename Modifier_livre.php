<?php
require_once "Database.php";
require_once "livre.php";

$database = new Database();
$db = $database->connect();

$livre = new Livre($db);

if(isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $isbn = $_POST['isbn'];
    $annee = $_POST['annee'];
    $quantite = $_POST['quantite'];

    $livre->modifier($id, $titre, $isbn, $annee, $quantite);

    header("Location: liste_livres.php");
    exit();
}
?>

<form method="POST">
    ID : <input type="number" name="id"><br><br>
    Titre : <input type="text" name="titre"><br><br>
    ISBN : <input type="text" name="isbn"><br><br>
    Année : <input type="number" name="annee"><br><br>
    Quantité : <input type="number" name="quantite"><br><br>

    <button type="submit" name="modifier">Modifier</button>
</form>