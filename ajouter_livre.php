<link rel="stylesheet" href="style.css">

<?php
require_once "Database.php";
require_once "livre.php";

$message = "";

if(isset($_POST['ajouter'])) {
    $database = new Database();
    $db = $database->connect();

    $livre = new Livre($db);

    $titre = $_POST['titre'];
    $isbn = $_POST['isbn'];
    $annee = $_POST['annee'];
    $quantite = $_POST['quantite'];
    $auteur_id = $_POST['auteur_id'];
    $categorie_id = $_POST['categorie_id'];

    if($livre->ajouter($titre, $isbn, $annee, $quantite, $auteur_id, $categorie_id)) {
        $message = "Livre ajouté avec succès";
    } else {
        $message = "Erreur lors de l'ajout";
    }
}
?>

<div class="container">
    <h2>Ajouter un livre</h2>

    <p><?php echo $message; ?></p>

    <form method="POST">
        <input type="text" name="titre" placeholder="Titre" required>
        <input type="text" name="isbn" placeholder="ISBN" required>
        <input type="number" name="annee" placeholder="Année" required>
        <input type="number" name="quantite" placeholder="Quantité" required>
        <input type="number" name="auteur_id" placeholder="ID Auteur" required>
        <input type="number" name="categorie_id" placeholder="ID Catégorie" required>

        <button type="submit" name="ajouter">Ajouter</button>
    </form>

    <a href="index.php" class="retour">← Retour à l'accueil</a>
</div>