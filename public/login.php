<?php
session_start();
$utilisateur = $_SESSION['username'] ?? null;
if (isset($utilisateur)) {
    generateHeader('Connexion',$utilisateur);
    exit;
}

require __DIR__ . '/../app/vues/includes/header.php';



include_once "base_de_donnees.php";
$dsn = 'mysql:host=postgresql-saemathai.alwaysdata.net;dbname=saemathai_bdd';
$pdo = base_de_donnees($dsn);
$erreur = null;
$email = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($utilisateur && password_verify($password, $utilisateur['password'])) {
        $_SESSION['utilisateur'] = ['email' => $utilisateur['email']];
        header('Location: index.php');
        exit;
    }
    else $erreur = 'E-mail ou mot de passe incorrect';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="login.php">Connexion</a>
        <a href="register.php">Inscription</a>
    </nav>

    <h1>Connexion</h1>
    <?php
    if ($erreur !== null) {
        echo '<p> ,$erreur, </p>';
    }
    ?>
    <ul>
        <form action="login.php" method="post">
            <ul>
                <li>
                    <p>
                        <label id = "label" for = "email">E-mail</label>
                        <input type="email" name="email" required>
                    </p>
                </li>
                <li>
                    <p>
                        <label id = "label" for = "password">Mot de passe</label>
                        <input type="password" name="password" required>
                    </p>
                </li>
                <li>
                    <button type="submit">Se connecter</button>
                </li>
            </ul>
        </form>
    </ul>
</body>
</html>


