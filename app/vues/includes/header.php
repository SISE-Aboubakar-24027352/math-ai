<?php
echo '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> 
    <title><?php echo isset($pageTitle) $ pageTitile : "MathsAI"; $></title>
</head>
<body>
    <nav>
        <a href="index.php">MathsAI</a>
        <?php if ($utilisateur === null): ?>
            | <a href="/login.php">Connexion</a>
            | <a href="/register.php">Inscription</a>
        <?php else: ?>
            | <a href="index.php?action=logout">Déconnexion</a>
        <?php endif; ?>
    </nav>';


