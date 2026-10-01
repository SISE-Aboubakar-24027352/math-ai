<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'MathIA') ?></title>
    //<link rel="stylesheet" href="chemin vers le css a mettre">
</head>

<body>
<header>
    <nav>
        <?php $user = $_SESSION['username'] ?? null; if ($user === null) { ?>
            <a href="/index.php">MathsAI</a>
            | <a href="/login.php">Connexion</a>
            | <a href="/register.php">Inscription</a>
        <?php } else { ?>
            | <a href="index.php?action=logout">Déconnexion</a>
        <?php } ?>
    </nav>
</header>

<main>
    <?= $content ?>
</main>

<footer class="footer">
    <div class="div-footer">
        <h3>
            <ul>
                <li> <a href="/">Accueil</a></li>
                <li> <a href="/about.php"> A propos</a></li>
                <li> <a href="/contact.php"> Nous contacter</a> </li>
                <li> <a href="/mentions.php"> Mentions légales </a></li>                    
            </ul>
        </h3>
    </div>
</footer>
</body>
</html