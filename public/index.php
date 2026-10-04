<?php
    require __DIR__ . '/../Core/AutoLoader.php';

    $S_urlToParse = isset($_GET['url']) ? $_GET['url'] : "default";
    $A_postParams = isset($_POST) ? $_POST : null;

    View::openBuffer(); // on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans

    try
    {

        $O_controller = new Controller($S_urlToParse, $A_postParams);
        $O_controller->execute();

    }
    catch (ControllerException $O_exception)
    {
        echo ('Une erreur s\'est produite : ' . $O_exception->getMessage());
    }


    $contenuPourAffichage = View::getBufferContent();
    View::show('layout', array('body' => $contenuPourAffichage));