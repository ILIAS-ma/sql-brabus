<?php
session_start();
include 'admin_check.php'; 
include 'config.php'; 


if (isset($_GET['post_id'])) {
    $postId = $_GET['post_id'];
    
    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = :post_id");

    try {
        $stmt->execute(['post_id' => $postId]);
        header("Location: admin_dashboard.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression du post : " . htmlspecialchars($e->getMessage());
    }
} else {
    echo "Aucun ID de post spécifié.";
}
?>
