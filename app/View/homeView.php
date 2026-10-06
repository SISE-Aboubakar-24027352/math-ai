<?php
require_once __DIR__ . "/../../Core/Constants.php";
$isLogged = isset($_SESSION['username']);
echo'<section class ="homepage">';
echo'    <h1>Home Page</h1>';       
echo'    <div class="homepage-liens">';
echo'        <a href="/register">Commencer gratuitement</a>';
echo'        <a href="/login">Se connecter</a>';
echo'    </div>';
echo'</section>';
