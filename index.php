<?php
$utilisateur = $_SESSION['utilisateur'] ?? null;

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>MathsAI - Accueil</title>
</head>
<body>
    <nav>
        <a href="index.php">MathsAI</a>
        <?php if ($utilisateur === null): ?>
            | <a href="/database/login.php">Connexion</a>
            | <a href="/database/register.php">Inscription</a>
        <?php else: ?>
            | <a href="index.php?action=logout">Déconnexion</a>
        <?php endif; ?>
    </nav>
</body>
</html>