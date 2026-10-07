<?php
require_once __DIR__ . "/../../Core/Constants.php";
$message = $A_view['message'];
?>

<h1>Mot de passe oublié</h1>

<?php
if(!empty($message)){
    echo '<p style="color: red;">'. htmlspecialchars($message) .'</p>';
}
?>

<span>
    <form action="/index.php?url=forgottenpassword/forgottenpassword" method="post">
        <ul>
            <li>
                <p>
                    <label id = "label" for = "email">E-mail</label>
                    <input type="email" name="email" required>
                </p>
            </li>
        </ul>
        <button type="submit">Réinitialiser votre mot de passe</button>
    </form>     
    <p>retour à la <a href="/index.php?url=login/login">connection</a></p>
</span>