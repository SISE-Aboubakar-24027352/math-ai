<?php
require_once __DIR__ . "/../../Core/Constants.php";
?>
<section class="mdp">
    <h1>Mot de passe oublié</h1>
    <p>
        Entrez votre adresse email afin de recevoir un lien pour réinitialiser votre mot de passe.
    </p>
    <form action="'. Constants::rootRepository() . '/public/index.php' . '" method="post">';
        <p>
            <label for="email">E-mail</label>';
            <input type="email" name="email" value="" required>';
        </p>
        <button type="submit">Soumettre</button>
    </form>
</section>
