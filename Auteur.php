<?php
require_once "Database.php";

class Auteur {
    private $conn;
    private $table = "auteurs";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function ajouter($nom, $prenom, $nationalite) {
        $sql = "INSERT INTO auteurs(nom, prenom, nationalite)
                VALUES(:nom, :prenom, :nationalite)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":nationalite", $nationalite);

        return $stmt->execute();
    }

    public function lire() {
        $sql = "SELECT * FROM auteurs";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function supprimer($id) {
        $sql = "DELETE FROM auteurs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
    public function modifier($id, $nom, $prenom, $nationalite) {
    $sql = "UPDATE auteurs 
            SET nom = :nom, prenom = :prenom, nationalite = :nationalite
            WHERE id = :id";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":prenom", $prenom);
    $stmt->bindParam(":nationalite", $nationalite);

    return $stmt->execute();
}
}
?>