<?php
    require __DIR__ . '/../noyau/AutoLoader.php';

    $S_urlToParse = isset($_GET['url']) ? $_GET['url'] : "default";
    $A_postParams = isset($_POST) ? $_POST : null;
    
    Vue::openBuffer(); // on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans
    
    try
    {   
        
        $O_controleur = new Controleur($S_urlToParse, $A_postParams);
        $O_controleur->executer();
        
    }
    catch (ControleurException $O_exception)
    {
        echo ('Une erreur s\'est produite : ' . $O_exception->getMessage());
    }


    $contenuPourAffichage = Vue::getBufferContent();
    Vue::show('layout', array('body' => $contenuPourAffichage));