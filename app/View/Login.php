<?php
require_once __DIR__ . "/../../Core/Constants.php";
$error = $A_view['errors'];
?>

<h1>Connexion</h1>';

<?php
if(!empty($error)){
    echo '<p style="color: red;">'. htmlspecialchars($error[0]) .'</p>';
}
?>

<span>
    <form action="/index.php?url=login/login" method="post">
    <ul>
        <li>
            <p>
                <label for="email">E-mail</label>
                <input type="email" name="email" value="" required>
            </p>
        </li>
        <li>
            <p>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" required>
            </p>
            </li>
        </ul>
        <button type="submit">Se connecter</button>
    </form>
    <p>vous n'avez pas de compte ? Inscrivez-vous <a href="/index.php?url=register/register">ici</a>.</p>
    <p><a href="/index.php?url=forgottenpassword/forgottenpassword">mot de passe oublié</a> ?
</span>