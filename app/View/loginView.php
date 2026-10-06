<?php
require_once __DIR__ . "/../../Core/Constants.php";

echo '<h1>Connexion</h1>';
if($error !== null){
    echo '<p style="color: red;">'. htmlspecialchars($error) .'</p>';
}
echo '<span>';
echo    '<form action="'. '/index.php' . '" method="post">';
echo        '<ul>';
echo            '<li>';
echo                '<p>';
echo                    '<label for="email">E-mail</label>';
echo                    '<input type="email" name="email" value="" required>';
echo                '</p>';
echo            '</li>';
echo            '<li>';
echo                '<p>';
echo                    '<label for="password">Mot de passe</label>';
echo                    '<input type="password" name="password" required>';
echo                '</p>';
echo            '</li>';
echo            '<button type="submit">Se connecter</button>';
echo        '</ul>';
echo    '</form>';
echo    '<p>vous n\'avez pas de compte ? Inscrivez-vous <a href="/index.php?url=login/login">ici</a>.</p>';
echo    '<p><a href="/index.php?url=forgottenpassword/Forgottenpassword">mot de passe oublié</a> ?';
echo '</span>';