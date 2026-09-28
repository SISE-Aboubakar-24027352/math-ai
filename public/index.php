<?php
$utilisateur = $_SESSION['utilisateur'] ?? null;

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: index.php');
    exit;
}

require __DIR__ . '/../app/vues/includes/header.php';
generateHeader('Accueil',$utilisateur);
include __DIR__ . '/../app/vues/includes/footer.php';