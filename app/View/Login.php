<?php
require_once __DIR__ . "/../../Core/Constants.php";
$error = $A_view['errors'];
echo '<h1>Connexion</h1>';
if(!empty($error)){
    echo '<p style="color: red;">'. htmlspecialchars($error[0]) .'</p>';
}
echo '<span>';
echo    '<form action="/index.php?url=login/login" method="post">';
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
echo    '<p>vous n\'avez pas de compte ? Inscrivez-vous <a href="/index.php?url=register/register">ici</a>.</p>';
echo    '<p><a href="/index.php?url=forgottenpassword/forgottenpassword">mot de passe oublié</a> ?';
echo '</span>';