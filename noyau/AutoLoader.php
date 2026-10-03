<?php

require __DIR__ . '/Constantes.php';

final class AutoLoader
{
    public static function chargerClassesNoyau ($S_nomDeClasse)
    {
        $S_fichier = Constantes::repertoireNoyau() . "$S_nomDeClasse.php";
        return static::_charger($S_fichier);
    }

    public static function chargerClassesException ($S_nomDeClasse)
    {
        $S_fichier = Constantes::repertoireExceptions() . "$S_nomDeClasse.php";

        return static::_charger($S_fichier);
    }

    public static function chargerClassesModele ($S_nomDeClasse)
    {
        $S_fichier = Constantes::repertoireModele() . "$S_nomDeClasse.php";

        return static::_charger($S_fichier);
    }


    public static function chargerClassesVue ($S_nomDeClasse)
    {
        $S_fichier = Constantes::repertoireVues() . "$S_nomDeClasse.php";

        return static::_charger($S_fichier);
    }

    public static function chargerClassesControleur ($S_nomDeClasse)
    {
        $S_fichier = Constantes::repertoireControleurs() . "$S_nomDeClasse.php";

        return static::_charger($S_fichier);
    }
    private static function _charger ($S_fichierACharger)
    {
        if (is_readable($S_fichierACharger))
        {
            require $S_fichierACharger;
        }
    }
}

spl_autoload_register('AutoLoader::chargerClassesNoyau');
spl_autoload_register('AutoLoader::chargerClassesException');
spl_autoload_register('AutoLoader::chargerClassesModele');
spl_autoload_register('AutoLoader::chargerClassesVue');
spl_autoload_register('AutoLoader::chargerClassesControleur');
