<?php

//require 'noyau/Constantes.php';

declare(strict_types=1);
spl_autoload_register(function (string $nom_classe) {
    $prefixe = 'app';
    $base_dossier = __DIR__;
    if (!str_starts_with($nom_classe, $prefixe)) {
        return;
    }
    $relative = substr($nom_classe, strlen($prefixe));
    $fichier =$base_dossier . str_replace('\\', '/', $relative) . '.php';
    if (file_exists($fichier)) {
        require_once $fichier;
    }
});