<?php
require_once __DIR__ . "/../../Core/Constants.php";
$error = $A_view['errors'];
echo '<h1>Inscription</h1>';
if(!empty($error)){
    echo '<p style="color: red;">'. htmlspecialchars($error[0]) .'</p>';
}

echo '<span>';
echo    '<form action="/index.php?url=register/register" method="post">';
echo      '<ul>';
echo            '<li>';
echo               '<li>';
echo                 '<label id = "label" for = "email">E-mail</label>';
echo               '</li>';
echo              '<li>';
echo                  '<input class="textInput" type="email" name="email" required>';
echo              '</li>';
echo          '</li>';
echo          '<li>';
echo              '<li>';
echo                  '<label id = "label" for = "password" >Mot de passe</label>';
echo              '</li>';
echo              '<li>';
echo                 '<input class="textInput" type="password" name="password" value="" required>';
echo             '</li>';
echo         '</li>';
echo         '<li>';
echo             '<li>';
echo                 '<label id = "label" for = "confirmation">Confirmation du mot de passe</label>';
echo             '</li>';
echo             '<li>';
echo                 '<input class="textInput" type="password" name="confirmation" value="" required>';
echo             '</li>';
echo         '</li>';
echo         '<button type="submit">S\'inscrire</button>';
echo        '</ul>';
echo    '</form>';
echo    '<p>vous avez déjà un compte ? Connectez vous <a href="/index.php?url=login/login">ici</a></p>';
echo '</span>';