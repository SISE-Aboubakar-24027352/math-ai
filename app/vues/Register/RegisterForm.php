<?php 
    require __DIR__ . "/../../../Core/Constants.php";
    $error = $A_vue['error'] ?? null;
    $email = trim($A_postParams['email'] ?? '');
    $password = $A_vue['password'] ?? '';

    echo '<h1>Inscription</h1>';
    if($error !== null){
        echo '<p style="color: red;">' . htmlspecialchars($error) . '</p>';
    }
    echo '<form action="'. Constants::rootRepository().'/public/index.php' .'" method="post">';
    echo    '<label id = "label" for = "email">E-mail</label>';
    echo    '<input type="email" name="email" required>';
    echo    '<label id = "label" for = "password" >Mot de passe</label>';
    echo    '<input type="password" name="password" value="'. htmlspecialchars($password).'" required>';
    echo    '<label id = "label" for = "confirmation">Confirmation du mot de passe</label>';
    echo    '<input type="password" name="confirmation" value="" required>';
    echo    '<button type="submit">S\'inscrire</button>';
    echo '</form>';
