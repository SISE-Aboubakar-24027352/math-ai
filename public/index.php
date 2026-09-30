<?php
$user = $_SESSION['username'] ?? null;
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: index.php');
    exit;
}

require __DIR__ . '/../noyau/Vue.php';
$A_vue = [
    'title' => 'Accueil - MathsAI',
    'body' => '<h1>Maths AI</h1><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit excepturi repellendus cum corrupti aliquid. Doloribus quibusdam reiciendis voluptatum sapiente explicabo dolorem ad distinctio, quia ducimus excepturi, maiores minus totam cumque?</p>',
];
echo Vue::show('body', $A_vue);

