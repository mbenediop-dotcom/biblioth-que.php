<link rel="stylesheet" href="style.css">

<?php
require_once "Database.php";

$database = new Database();
$db = $database->connect();

$mot = "";

$sql = "SELECT livres.*,
               auteurs.nom AS auteur_nom,
               categories.libelle AS categorie_nom
        FROM livres
        JOIN auteurs ON livres.auteur_id = auteurs.id
        JOIN categories ON livres.categorie_id = categories.id";

if(isset($_POST['rechercher'])) {
    $mot = $_POST['mot'];

    $sql .= " WHERE livres.titre LIKE :mot
              OR auteurs.nom LIKE :mot
              OR categories.libelle LIKE :mot";
}

$stmt = $db->prepare($sql);

if(isset($_POST['rechercher'])) {
    $search = "%".$mot."%";
    $stmt->bindParam(":mot", $search);
}

$stmt->execute();
?>

<div class="container">
    <h2>Liste des livres</h2>

    <form method="POST">
        <input type="text" name="mot" placeholder="Rechercher par titre, auteur ou catégorie..." value="<?php echo $mot; ?>">
        <button type="submit" name="rechercher">Rechercher</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>ISBN</th>
            <th>Année</th>
            <th>Quantité</th>
            <th>Auteur</th>
            <th>Catégorie</th>
            <th>Action</th>
        </tr>

        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['titre'] ?></td>
                <td><?= $row['isbn'] ?></td>
                <td><?= $row['annee'] ?></td>
                <td><?= $row['quantite'] ?></td>
                <td><?= $row['auteur_nom'] ?></td>
                <td><?= $row['categorie_nom'] ?></td>
                <td>
                    <a href="modifier_livre.php?id=<?= $row['id'] ?>">Modifier</a> |
                    <a href="supprimer_livre.php?id=<?= $row['id'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <a href="index.php" class="retour">← Retour à l'accueil</a>
</div>