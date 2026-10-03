<?php 
    $error = $A_vue['Erreur'] ?? null;
    $email = trim($_POST['email'] ?? '');

    echo '<h1>Connexion</h1>';
    if($error !== null){
        echo '<p style="color: red;"><?='. htmlspecialchars($erreur).' ?></p>';
    }
    echo '<form action="/public/login.php" method="post">';
    echo   '<label for="email">E-mail</label>';
    echo   '<input type="email" name="email" value="' . htmlspecialchars($email) . '" required>';
    echo   '<label for="password">Mot de passe</label>';
    echo   '<input type="password" name="password" required>';
    echo   '<button type="submit">Se connecter</button>';
    echo '</form>';
