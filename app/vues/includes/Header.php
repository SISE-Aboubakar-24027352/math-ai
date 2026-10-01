<nav>
    <?php $user = $_SESSION['username'] ?? null; if ($user === null) { ?>
        <a href="/index.php">MathsAI</a>
        | <a href="/login.php">Connexion</a>
        | <a href="/register.php">Inscription</a>
    <?php } else { ?>
        | <a href="index.php?action=logout">Déconnexion</a>
    <?php } ?>
</nav>



