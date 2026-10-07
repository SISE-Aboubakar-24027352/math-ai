<?php
require_once __DIR__ . "/../../Core/Constants.php";
$isLogged = isset($_SESSION['user_email']);
echo '<section class="homepage">';
echo    '<h1>Home Page</h1>';
echo    '<div class="homepage-liens">';
    if($isLogged){
        echo '<h2> Bonjour, ' . $_SESSION['user_email'] . '</h2>';
    }else{
        echo '<h2> Bienvenue !</h2>';
    }
echo    '</div>';
echo '</section>';
