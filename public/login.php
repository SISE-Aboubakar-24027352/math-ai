<?php
session_start();
$user = $_SESSION['username'] ?? null;
if (isset($user)) {
    //generateHeader('Connexion',$user);
    exit;
}

require __DIR__ . '/../app/vues/includes/header.php';
generateHeader('Connexion',null);

require __DIR__ . '/../app/vues/includes/db.php';
/** @var PDO $pdo */
//Pour récupérer la variable dans le try

$erreur = null;
$email = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = ['email' => $user['email']];
        header('Location: index.php');
        exit;
    }
    else $erreur = 'E-mail ou mot de passe incorrect';
}
?>
    <h1>Connexion</h1>
    <?php
    if ($erreur !== null) {
        echo '<p>' ,$erreur, '</p>';
    }
    ?>
            <ul>
                <form action="login.php" method="post">
                    <ul>
                        <li>
                            <p>
                                <label id = "label" for = "email">E-mail</label>
                                <input type="email" name="email" required>
                            </p>
                        </li>
                        <li>
                            <p>
                                <label id = "label" for = "password">Mot de passe</label>
                                <input type="password" name="password" required>
                            </p>
                        </li>
                        <li>
                            <button type="submit">Se connecter</button>
                        </li>
                    </ul>
                </form>
            </ul>
    </body>
</html>


