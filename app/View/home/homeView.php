<?php
require_once __DIR__ . "/../../../Core/Constants.php";
echo '<h1>Accueil</h1>';
echo '<p id="homeDescription">Bienvenue sur Math-Ai, le premier site de cours de mathématique programme lycée entièrement géré par l’intelligence artificielle ! Il va comporter grand nombre de cours et exercices, qui seront entièrement générés par l’intelligence artificielle !</p>';
echo '<div class="infoCard-grid">';
for ($i = 1; $i <= 12; $i++) {
    echo '<a class="cardTitle" href="/login.php?url="title'. $i .'">';
    echo    '<div class="infoCard">';
    echo        '<h2>Title' . $i . '</h2>';
    echo        '<p>';
    echo            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, voluptates explicabo. Tenetur quas repellendus quisquam, earum quae temporibus doloribus eveniet iste fuga iure quam voluptatem facere, itaque expedita dolore cum';
    echo        '</p>';
    echo    '</div>';
    echo '</a>';
}
echo '</div>';
?>

