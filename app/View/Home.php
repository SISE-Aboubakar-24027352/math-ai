<?php
require_once __DIR__ . "/../../Core/Constants.php";
$isLogged = isset($_SESSION['email']);
?>

<h1>Accueil</h1>

<?php
if(!empty($error)){
    echo '<p style="color: red;">'. htmlspecialchars($error[0]) .'</p>';
}
?>

<p id="homeDescription">Bienvenue sur Math-Ai, le premier site de cours de mathématique programme lycée entièrement géré par l’intelligence artificielle ! Il va comporter grand nombre de cours et exercices, qui seront entièrement générés par l’intelligence artificielle !</p>';
<div class="infoCard-grid">';
<?php for ($i = 1; $i <= 12; $i++) { ?>
    <a class="cardTitle" href="/">
        <div class="infoCard">
            <h2>Title<?= $i ?></h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, voluptates explicabo.
            </p>
        </div>
    </a>
    <?php } ?>
</div>

