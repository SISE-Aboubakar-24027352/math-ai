<?php
require_once __DIR__ . "/../../Core/Constants.php";
$message = $A_view['message'];
if(!empty($message)){
    echo '<p style="color: red;">'. htmlspecialchars($error[0]) .'</p>';
}
echo '<h1>Mot de passe oublié</h1>';
if(!empty($error)){
    echo '<p style="color: red;">'. htmlspecialchars($error[0]) .'</p>';
}
echo '<span>';
echo    '<form action="/index.php?url=forgottenpassword/forgottenpassword" method="post">';
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