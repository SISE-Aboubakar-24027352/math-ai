<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title ?? 'MathIA') ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
<header>
    <nav>
        <?php $user = $_SESSION['username'] ?? null; ?>
        <?php if ($user === null): ?>
            <a href="/index.php">MathsAI</a>
            <a href="/login.php">Connexion</a>
            <a href="/register.php">Inscription</a>
        <?php else: ?>
            <a href="index.php?action=logout">Déconnexion</a>
        <?php endif; ?>
    </nav>
</header>

<main>
    <?= $A_view['body'] ?>
</main>

<footer class="footer">
    <div class="div-footer">
        <ul>
            <li> <a href="/">Accueil</a></li>
            <li> <a href="/about.php"> A propos</a></li>
            <li> <a href="/contact.php"> Nous contacter</a> </li>
            <li> <a href="/mentions.php"> Mentions légales </a></li>                    
        </ul>
    </div>
</footer>
</body>
</html>