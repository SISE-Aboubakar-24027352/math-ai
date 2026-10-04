<?php
$user = $_SESSION['username'] ?? null;
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: mentions.php');
    exit;
}

require __DIR__ . '/../Core/View.php';
$A_view = [
    'title' => 'Mentions légales - MathsAI',
    'body' => '<h1>Maths AI</h1>

    <ul>
        <li>
        <h2>Identité <h/2>
        <p> Ce site à été créé par un groupe de 5 étudiants du
        BUT Informatique d\'Aix-en-Provence dans le cadre d\'un projet de
        deuxième année.
        </p>
        </li>

        <li>
        <h2>Coordonnées <h/2>
        <p> Puisqu\'il s\'agit d\'un projet universitaire, nous d\'avons pas de
        coordonées pour que vous puissiez nous contacter</p>
        </li>

        <li>
        <h2>Mentions relative à la propriété intellectuelle<h/2>
        <p> Il n\'y a eu aucune utilisation d\'oeuvre protégée par 
        la propriétée intellectuelle.  </p>
        </li>

        <li>
        <h2>Mentions relatives à l\'hébérgement du site <h/2>
        <p> Ces site est hébérgé sur Always data, disponible à 
        l\'adresse suivante : <a href = "https://www.alwaysdata.com/fr/"> 
        91 rue Faubourg St Honoré 75008 Paris,
        Création de sites, hébergement.
        </p>
        </li>

    </ul>
    
    <p>  </p>',
];
echo View::show('layout', $A_view);

