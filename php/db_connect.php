<?php
// Paramètres de connexion à la base de données
$host = "localhost"; // Adresse du serveur MySQL
$db_name = "isil"; // Nom de la base de données
$username = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL

try {
    // Établir la connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Définir le jeu de caractères
    $pdo->exec("SET NAMES utf8");
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher un message d'erreur
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
