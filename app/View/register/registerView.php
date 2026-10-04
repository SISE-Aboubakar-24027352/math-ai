<?php
require __DIR__ . "/../../Core/Constants.php";
/*
$error = $A_view['error'] ?? null;
$email=trim(A_postParams['email'] ?? '');
$password = $A_view['password'] ?? '';
*/
?>
<h1>Inscription</h1>
<?php if($error !== null){?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>';
<?php
}
?>
<ul>
    <form action="<?php echo Constants::rootRepository() . '/public/index.php'; ?>" method="post">
        <li>
            <p>
                <label id = "label" for = "email">E-mail</label>
                <input type="email" name="email" required>
            </p>
        </li>
        <li>
            <p>
                <label id = "label" for = "password" >Mot de passe</label>
                <input type="password" name="password" value="<?= htmlspecialchars($password) ?>" required>
            </p>
        </li>
        <li>
            <p>
                <label id = "label" for = "confirmation">Confirmation du mot de passe</label>
                <input type="password" name="confirmation" value="" required>
            </p>
        </li>
        <button type="submit">S'inscrire</button>
    </form>
</ul>
