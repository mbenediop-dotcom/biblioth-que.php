<?php
require_once "Database.php";
require_once "Auteur.php";

$database = new Database();
$db = $database->connect();

$auteur = new Auteur($db);
$resultat = $auteur->lire();
?>

<h2>Liste des auteurs</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Nationalité</th>
        <th>Actions</th>
    </tr>

    <?php while($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["nom"] ?></td>
            <td><?= $row["prenom"] ?></td>
            <td><?= $row["nationalite"] ?></td>
            <td>
    <a href="supprimer_auteur.php?id=<?= $row["id"] ?>">Supprimer</a>
</td>
        </tr>
    <?php } ?>
</table>