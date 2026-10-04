<?php

require __DIR__ . "/../../Core/Constants.php";

echo '<h1>Connexion</h1>';
if($error !== null){
    echo '<p style="color: red;"><?= htmlspecialchars($error) ?></p>';
}
echo '<ul>';
echo    '<form action="'. Constants::rootRepository() . '/public/index.php' . '" method="post">';
echo        '<li>';
echo            '<p>';
echo                '<label for="email">E-mail</label>';
echo                '<input type="email" name="email" value="" required>';
echo            '</p>';
echo        '</li>';
echo        '<li>';
echo            '<p>';
echo                '<label for="password">Mot de passe</label>';
echo                '<input type="password" name="password" required>';
echo            '</p>';
echo        '</li>';
echo        '<button type="submit">Se connecter</button>';
echo    '</form>';
echo '</ul>';