<?php
    require __DIR__ . '/../Core/AutoLoader.php';
    require __DIR__ . '/../Core/Db.php';
    session_start();
    //récupère le paramètre url de la requête et si celle-ci est null, l'url sera celle de la page d'accueil
    $urlToParse = isset($_GET['url']) ? $_GET['url'] : 'home';
    $postParams = $_POST;
    // ouverture du Tampon
    View::openBuffer();

    try
    {
        // appel du contrôleur demandé
        $controller = new Controller($urlToParse, $postParams);
        $controller->execute();

    }
    catch (ControllerException $exception)
    {
        // renvoie une erreur dans le tampon si il y a un problème
        echo ('Une erreur s\'est produite : ' . $exception->getMessage());
    }

    // récupération du contenu et fermeture du tampon
    $ViewContent = View::getBufferContent();
    //affichage final de la vue demandée
    echo View::show('layout', array('body' => $ViewContent));