<?php
// Paramètres de configuration de la base de données
define('DB_DSN', 'mysql:host=localhost;dbname=forum_db;charset=utf8');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

try {

    $pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {

    error_log("Erreur de connexion à la base de données : " . $e->getMessage());
    exit('La connexion à la base de données a échoué.'); 
}
?>
