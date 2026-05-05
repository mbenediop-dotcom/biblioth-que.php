<?php
require_once "Database.php";

class Categorie {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function ajouter($nom) {
$sql = "INSERT INTO categories(libelle) VALUES(:nom)";        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nom", $nom);
        return $stmt->execute();
    }

    public function lire() {
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
}
?>