<?php
/*Ce code PHP gère la connexion des utilisateurs en vérifiant leur e-mail et mot de passe.
 Il commence par démarrer une session, puis récupère et nettoie l'e-mail soumis. Ensuite, il cherche l'utilisateur dans la base de données.
  Si l'utilisateur existe et que le mot de passe est correct, il enregistre l'identifiant de l'utilisateur et le redirige vers le tableau de bord approprié.
   Sinon, il affiche un message d'erreur en cas d'e-mail non trouvé ou de mot de passe incorrect.*/ 
session_start();
include 'config.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['is_admin'] = $user['is_admin'];

            // Redirection based on role
            header("Location: " . ($user['is_admin'] == 1 ? "admin_dashboard.php" : "user_dashboard.php"));
            exit();
        } else {
            $error_message = "Mot de passe incorrect.";
        }
    } else {
        $error_message = "Aucun utilisateur trouvé avec cet email.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr" data-barba="wrapper">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="./css/loader.css">
</head>

<body>
   
    <div class="loader">
        <h1>Loading</h1>
        <div class="dots">
            <span class="dot z"></span>
            <span class="dot f"></span>
            <span class="dot s"></span>
            <span class="dot t"></span>
            <span class="dot l"></span>
        </div>
    </div>

    <div class="video-background">
        <video autoplay loop muted>
            <source src="https://www.brabus.com/_Resources/Persistent/8/c/f/2/8cf2fc132e602d8683baef1887ee9ae927979c8f/WEBTEASER_BRABUS_700_Blue_Sky.mp4" type="video/mp4">
            Votre navigateur ne prend pas en charge la lecture de vidéos.
        </video>
    </div>
    
    <div class="login-box">
        <h2>Connexion</h2>
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?= htmlspecialchars($error_message) ?></div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="user-box">
                <input type="email" name="email" id="email" required>
                <label for="email">Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password" required>
                <label for="password">Mot de passe</label>
            </div>
            <button type="submit">Se connecter</button>
        </form>
        <a href="register.php" class="switch-form">Pas encore de compte ? S'inscrire</a>
    </div>

    <script>
        window.addEventListener("load", function() {
            document.body.classList.add("loaded");
        });
    </script>
    <script src="https://unpkg.com/@barba/core"></script>
    <script src="./main.js"></script>
</body>
</html>
