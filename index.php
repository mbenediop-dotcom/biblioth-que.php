<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
?>

<link rel="stylesheet" href="style.css">

<?php
require_once "Database.php";

$database = new Database();
$db = $database->connect();

$nbAuteurs = $db->query("SELECT COUNT(*) FROM auteurs")->fetchColumn();
$nbCategories = $db->query("SELECT COUNT(*) FROM categories")->fetchColumn();
$nbLivres = $db->query("SELECT COUNT(*) FROM livres")->fetchColumn();
?>

<div class="container">
    <div class="logo">📖</div>
    <h2>Gestion de Bibliothèque</h2>

    <div class="stats">
        <div class="card">✍️ Auteurs : <?php echo $nbAuteurs; ?></div>
        <div class="card">🏷️ Catégories : <?php echo $nbCategories; ?></div>
        <div class="card">📚 Livres : <?php echo $nbLivres; ?></div>
    </div>

    <a class="btn" href="ajouter_auteur.php">Ajouter un auteur</a>
    <a class="btn" href="liste_auteurs.php">Liste des auteurs</a>
    <a class="btn" href="ajouter_categorie.php">Ajouter une catégorie</a>
    <a class="btn" href="ajouter_livre.php">Ajouter un livre</a>
    <a class="btn" href="liste_livres.php">Liste des livres</a>
    <a class="btn" href="logout.php">Déconnexion</a>
</div>