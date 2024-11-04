/*Ce code PHP gère l'inscription d'un nouvel utilisateur. Il commence par inclure la config de la base de données et initialise une variable d'erreur. Il récupère les informations de l'utilisateur (email, mot de passe, pseudo) et les filtre. Il vérifie si l'email est valide et déjà utilisé. Si tout est bon, il hache le mot de passe et insère l'utilisateur dans la base. Si l'inscription réussit, l'utilisateur est redirigé vers la page de connexion, sinon un message d'erreur s'affiche.*/
<?php
include 'config.php';


$error_message = '';


$email = '';
$password = '';
$pseudo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $pseudo = filter_var($_POST['pseudo'], FILTER_SANITIZE_EMAIL); 


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Email invalide.";
    } else {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $error_message = "Cet email est déjà utilisé.";
        } else {
 
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (email, password, is_admin, pseudo) VALUES (?, ?, 0, ?)";
            $stmt = $pdo->prepare($sql);
            try {
                $stmt->execute([$email, $hashedPassword, $pseudo]);
                header("Location: login.php"); 
                exit(); 
            } catch (PDOException $e) {
                $error_message = "Erreur lors de l'inscription : " . $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr" data-barba="wrapper">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Inscription</title>
  
</head>
<body>
    <div class="video-background">
        <video autoplay loop muted>
            <source src="https://www.brabus.com/_Resources/Persistent/7/9/5/b/795b503258878cf660642ee16106131448b4e279/Teaser_Porsche_Peetch_10sek%20_900_WEBTEASER.mp4" type="video/mp4">
            Votre navigateur ne prend pas en charge la lecture de vidéos.
        </video>
    </div>

    <main data-barba="container" data-barba-namespace="register">
        <div class="login-box">
            <h2>Inscription</h2>
            <?php if (!empty($error_message)): ?>
                <div class="error-message"><?= htmlspecialchars($error_message) ?></div>
            <?php endif; ?>
            <form action="register.php" method="POST"> 
                <div class="user-box">
                    <input type="email" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="user-box">
                    <input type="text" name="pseudo" id="pseudo" required>
                    <label for="pseudo">Pseudo</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" id="password" required>
                    <label for="password">Mot de passe</label>
                </div>
                
                <button type="submit" class="animate-this button">S'inscrire</button>
            </form>
            <a href="login.php" class="switch-form">Déjà un compte ? Se connecter</a>
        </div>

    </main>


</body>
</html>
