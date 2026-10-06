<?php
require_once __DIR__ . "/../../Core/Constants.php";

echo '<h1>Inscription</h1>';
if($error !== null){
    echo '<p style="color: red;">'. htmlspecialchars($error) .'</p>';
}
echo '<ul>';
echo    '<form action="' . Constants::rootRepository() . '/public/index.php' .'" method="post">';
echo        '<li>';
echo            '<p>';
echo                '<label id = "label" for = "email">E-mail</label>';
echo                '<input type="email" name="email" required>';
echo            '</p>';
echo        '</li>';
echo        '<li>';
echo            '<p>';
echo                '<label id = "label" for = "password" >Mot de passe</label>';
echo                '<input type="password" name="password" value="" required>';
echo            '</p>';
echo        '</li>';
echo        '<li>';
echo            '<p>';
echo                '<label id = "label" for = "confirmation">Confirmation du mot de passe</label>';
echo                '<input type="password" name="confirmation" value="" required>';
echo            '</p>';
echo        '</li>';
echo        '<button type="submit">S\'inscrire</button>';
echo    '</form>';
echo '</ul>';
