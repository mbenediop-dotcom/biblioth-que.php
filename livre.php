<?php
require_once "Database.php";

class Livre {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function ajouter($titre, $isbn, $annee, $quantite, $auteur_id, $categorie_id) {
        $sql = "INSERT INTO livres(titre, isbn, annee, quantite, auteur_id, categorie_id)
                VALUES(:titre, :isbn, :annee, :quantite, :auteur_id, :categorie_id)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":titre", $titre);
        $stmt->bindParam(":isbn", $isbn);
        $stmt->bindParam(":annee", $annee);
        $stmt->bindParam(":quantite", $quantite);
        $stmt->bindParam(":auteur_id", $auteur_id);
        $stmt->bindParam(":categorie_id", $categorie_id);

        return $stmt->execute();
    }

    public function lire() {
        $sql = "SELECT livres.*, 
                       auteurs.nom AS auteur_nom,
                       categories.libelle AS categorie_nom
                FROM livres
                JOIN auteurs ON livres.auteur_id = auteurs.id
                JOIN categories ON livres.categorie_id = categories.id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function supprimer($id) {
        $sql = "DELETE FROM livres WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function modifier($id, $titre, $isbn, $annee, $quantite) {
        $sql = "UPDATE livres 
                SET titre = :titre, isbn = :isbn, annee = :annee, quantite = :quantite
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":titre", $titre);
        $stmt->bindParam(":isbn", $isbn);
        $stmt->bindParam(":annee", $annee);
        $stmt->bindParam(":quantite", $quantite);

        return $stmt->execute();
    }
}
?>