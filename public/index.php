<?php
$utilisateur = $_SESSION['utilisateur'] ?? null;

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: index.php');
    exit;
}

include __DIR__ . '/../app/vues/includes/header.php';
include __DIR__ . '/../app/vues/includes/footer.php';