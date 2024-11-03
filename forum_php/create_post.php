<?php
session_start();
include 'config.php'; 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit("Accès refusé : vous devez être connecté pour créer un post.");
}
$isEditing = false;
$titre = '';
$content = '';
$imageUrl = '';
$userId = $_SESSION['user_id'];
if (isset($_GET['post_id'])) {
    $postId = (int)$_GET['post_id'];
    $isEditing = true;

    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id AND user_id = :user_id");
    $stmt->execute(['id' => $postId, 'user_id' => $userId]);
    $post = $stmt->fetch();

    if ($post) {
        $titre = $post['titre'];
        $content = $post['content'];
        $imageUrl = $post['image_url'];
    } else {
        exit("Post non trouvé ou vous n'avez pas la permission de le modifier.");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = htmlspecialchars($_POST['titre']);
    $content = htmlspecialchars($_POST['content']);
    $imageUrl = htmlspecialchars($_POST['image_url']);

    try {
        if ($isEditing) {
            $stmt = $pdo->prepare("UPDATE posts SET titre = :titre, content = :content, image_url = :image_url WHERE id = :id AND user_id = :user_id");
            $stmt->execute([
                'titre' => $titre,
                'content' => $content,
                'image_url' => $imageUrl,
                'id' => $postId,
                'user_id' => $userId
            ]);
            $_SESSION['message'] = "Post modifié avec succès !";
        } else {
            // Insérer un nouveau post
            $stmt = $pdo->prepare("INSERT INTO posts (titre, content, image_url, user_id) VALUES (:titre, :content, :image_url, :user_id)");
            $stmt->execute([
                'titre' => $titre,
                'content' => $content,
                'image_url' => $imageUrl,
                'user_id' => $userId
            ]);
          
        }
        header("Location: admin_dashboard.php");
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de la création ou de la mise à jour du post : " . htmlspecialchars($e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
    <link rel="stylesheet" href="login.css">

<head>
    <meta charset="UTF-8">
<link rel="stylesheet" href="./css/create_post.css">

    <title><?= $isEditing ? 'Modifier' : 'Créer' ?> un Post</title>
</head>
<body>
<body>
    <video autoplay loop muted playsinline id="background-video">
        <source src="https://www.brabus.com/_Resources/Persistent/0/4/4/e/044eadb2e089bc6a80d3d3a5c82dbd7ccb4b7626/v02_WEBTEASER_GTS_small.mp4" type="video/mp4">
       
    </video>
    
    <?php if (isset($_SESSION['message'])): ?>
        <p><?= $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif; ?>

    <form method="post" action="">
    <h1><?= $isEditing ? 'Modifier' : 'Créer un Nouveau' ?> Post</h1>
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($titre) ?>" required>

        <label for="content">Contenu :</label>
        <textarea id="content" name="content" required><?= htmlspecialchars($content) ?></textarea>

        <label for="image_url">URL de l'image :</label>
        <input type="text" id="image_url" name="image_url" value="<?= htmlspecialchars($imageUrl) ?>" required>

        <button type="submit"><?= $isEditing ? 'Mettre à jour' : 'Créer' ?> le Post</button>

        <a href="admin_dashboard.php">Retour au tableau de bord</a>
        
    </form>
    
</body>

</html>
