<?php
require_once __DIR__ . "/../../Core/Constants.php";
$isLogged = isset($_SESSION['username']);
?>
<section class="homepage">
    <h1>Home Page</h1>
    <div class="homepage-liens">
        <a href="/register">Créer un compte</a>
        <a href="/login">Se connecter</a>
    </div>
</section>
