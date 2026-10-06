<?php
require_once __DIR__ . "/../../../Core/Constants.php";

echo '<h1>Mot de passe oublié</h1>';
if($error !== null){
    echo '<p style="color: red;">'. htmlspecialchars($error) .'</p>';
}
echo '<span>';
echo    '<form action="' . '/index.php?url=register/register' .'" method="post">';
echo        '<ul>';
echo            '<li>';
echo                '<p>';
echo                    '<label id = "label" for = "email">E-mail</label>';
echo                    '<input type="email" name="email" required>';
echo                '</p>';
echo            '</li>';
echo            '<button type="submit">Réinitialiser votre mot de passe</button>';
echo        '</ul>';
echo    '</form>';
echo    '<p>retour à la <a href="/index.php?url=login/login">connection</a></p>';
echo '</span>';