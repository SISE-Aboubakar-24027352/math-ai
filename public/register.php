<?php
function chercheErreur(PDO $pdo, String $email, String $password,String $confirmation): array
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
        if (verifieEmail($pdo,$email)->fetch()) {
            $erreurs[] = 'Cet e-mail est déjà inscrit.';
        }
    }
    return $erreurs;

}

session_start();
include_once "base_de_donnees.php";
$dsn = 'mysql:host=localhost;dbname=my_dbname';
$pdo = base_de_donnees($dsn);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmation = $_POST['confirmation'] ?? '';
    $succes = false;
    $erreurs = chercheErreur($pdo, $email, $password, $confirmation);
    if (empty($erreurs)) {
        ajouteId($pdo, $email, $password);
        $succes = true;
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="login.php">Connexion</a>
        <a href="register.php">Inscription</a>
    </nav>

    <h1>Inscription</h1>
    <?php
    if ($succes) {
        echo '<p> Votre compte a bien été créé. <a href="login.php">Connectez-vous</a></p>';
    }
    else {
        if (!empty($erreurs)) {
            for ($i = 0; $i < sizeof($erreurs); ++$i) {
                echo '<li>', $erreurs[$i], '</li>';
            }
        }
    }
    ?>
    <ul>
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
                    <button type="submit">S'inscrire</button>
                </li>
            </ul>
        </form>
    </ul>
</body>
</html>