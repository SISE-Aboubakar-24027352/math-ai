<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="/res/image/logoMathAi.ico">
    <title><?= htmlspecialchars($title ?? 'MathIA') ?></title>
    <link rel="stylesheet" href= "/res/css/style.css">
</head>

<body>
<header>
    <nav>
        <?php $user = $_SESSION['username'] ?? null; if ($user === null) { ?>
            <a href="/">MathsAI</a>
            | <a href="/login">Connexion</a>
            | <a href="/register">Inscription</a>
        <?php } else { ?>
            | <a href="index.php?action=logout">Déconnexion</a>
        <?php } ?>
    </nav>
</header>

<main>
    <?= $A_view['body'] ?>
</main>

<footer class="footer">
    <ul>
        <li> <a href="/">Accueil</a></li>
        <li> <a href="/sitemap"> Plan du site</a></li>
        <li> <a href="/contact"> Nous contacter</a> </li>
        <li> <a href="/mentions"> Mentions légales </a></li>                    
    </ul>
</footer>
</body>
</html>