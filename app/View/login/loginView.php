<?php

require __DIR__ . "/../../Core/Constants.php";
/*
$error = $A_vue['Erreur'] ?? null;
$email=trim(A_vue['email'] ?? '');
*/
?>
    <h1>Connexion</h1>
<?php if($error !== null): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
    <ul>
        <form action="<?php echo Constants::rootRepository() . '/public/index.php'; ?>" method="post">
                <li>
                    <p>
                        <label for="email">E-mail</label>
                        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
                    </p>
                </li>
                <li>
                    <p>
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" required>
                    </p>
                </li>
                <button type="submit">Se connecter</button>
        </form>
    </ul>

<?php
