<link rel="stylesheet" href="style.css">

<?php
require_once "Database.php";

$message = "";

if(isset($_POST['connexion'])) {
    $database = new Database();
    $db = $database->connect();

    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "SELECT * FROM admins WHERE email = :email AND mot_de_passe = :mot_de_passe";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mot_de_passe', $mot_de_passe);
    $stmt->execute();

    if($stmt->rowCount() > 0){
    session_start();
    $_SESSION['admin'] = $email;

    header("Location: index.php");
    exit();
}
}
?>

<div class="container">
    <div class="logo">🔐</div>
    <h2>Connexion Admin</h2>

    <p style="color:red; text-align:center;"><?php echo $message; ?></p>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>

        <button type="submit" name="connexion">Se connecter</button>
    </form>
</div>