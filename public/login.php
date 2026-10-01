<?php
session_start();
$user = $_SESSION['username'] ?? null;
if (isset($user)) {
    exit;
}
require __DIR__ . '/../noyau/Vue.php';
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

$A_vue = [
    'title' => 'Connexion - MathsAI',
    'body' => '
        <h1>Connexion</h1>
    <?php if ($erreur !== null): ?>
        <p style="color: red;"><?= htmlspecialchars($erreur) ?></p>
    <?php endif; ?>

    <form action="/public/login.php" method="post">
        <ul>
            <li>
                <p>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" value="' . htmlspecialchars($email) . '" required>
                </p>
            </li>
            <li>
                <p>
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" required>
                </p>
            </li>
            <li>
                <button type="submit">Se connecter</button>
            </li>
        </ul>
    </form>
    '
];
echo Vue::show('body', $A_vue);

?>


