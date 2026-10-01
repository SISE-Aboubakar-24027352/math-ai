<?php


 function findError(PDO $pdo, String $email, String $password,String $confirmation): array
{
    $erreurs = [];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = 'L\'adresse email est invalide.';
    }
    if (strlen($password) < 8 ) {
        $erreurs[] = 'Votre mot de passe doit contenir au moins 8 caractères.';
    }
    if ($password !== $confirmation) {
        $erreurs[] = 'Les deux mots de passe ne correspondent pas.';
    }
    if (empty($erreurs)) {
        if (checkEmail($pdo,$email)->fetch()) {
            $erreurs[] = 'Cet e-mail est déjà inscrit.';
        }
    }
    return $erreurs;

}

function checkEmail (PDO $pdo, String $email) {
    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    return $stmt;
}

function addId (PDO $pdo, String $email, String $password) {
    $stmt = $pdo->prepare('INSERT INTO users (email,password) VALUES (:email,:password)');
    $stmt->execute(['email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)]);
}

session_start();

require __DIR__ . '/../noyau/Connect_bd.php';
/** @var PDO $pdo */
//Pour récupérer la variable dans le try
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmation = $_POST['confirmation'] ?? '';
    $success = false;
    $erreurs = findError($pdo, $email, $password, $confirmation);
    if (empty($erreurs)) {
        addId($pdo, $email, $password);
        $success = true;
    }
}
?>
    <?php
    if ($success) {
        echo '<p> Votre compte a bien été créé. <a href="login.php">Connectez-vous</a></p>';
    }
    else {
        if (!empty($erreurs)) {
            for ($i = 0; $i < sizeof($erreurs); ++$i) {
                echo '<p>', $erreurs[$i], '</p>';
            }
        }
    }

require __DIR__ . '/../noyau/Vue.php';
$A_vue = [
    'title' => 'Inscription - MathsAI',
    'body'=>'
            <h1>Inscription</h1>
            <form action="register.php" method="post">
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
                        <p>
                            <label id = "label" for = "confirmation">Confirmation du mot de passe</label>
                            <input type="password" name="confirmation" required>
                        </p>
                    </li>
                    <li>
                        <button type="submit">S\'inscrire</button>
                    </li>
                </ul>
            </form>
'
];
echo Vue::show('body',$A_vue);
?>
