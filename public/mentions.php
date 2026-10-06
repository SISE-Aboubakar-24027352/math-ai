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

    
    
    <p>  </p>',
];
echo View::show('layout', $A_view);

