<?php

final class Constantes
{

    const REPERTOIRE_VUES        = '/app/vues/';

    const REPERTOIRE_MODELE      = '/app/modele/';

    const REPERTOIRE_NOYAU       = '/noyau/';

    const REPERTOIRE_EXCEPTIONS  = '/noyau/exceptions/';

    const REPERTOIRE_CONTROLEURS = '/app/controleurs/';

    const REPERTOIRE_CONFIG = '/noyau/config/';

    public static function repertoireRacine(): string|false {
        return realpath(__DIR__ . '/../');
    }

    public static function repertoireNoyau(): string {
        return self::repertoireRacine() . self::REPERTOIRE_NOYAU;
    }

    public static function repertoireExceptions(): string {
        return self::repertoireRacine() . self::REPERTOIRE_EXCEPTIONS;
    }

    public static function repertoireVues(): string {
        return self::repertoireRacine() . self::REPERTOIRE_VUES;
    }

    public static function repertoireModele(): string {
        return self::repertoireRacine() . self::REPERTOIRE_MODELE;
    }

    public static function repertoireControleurs(): string {
        return self::repertoireRacine() . self::REPERTOIRE_CONTROLEURS;
    }

    public static function repertoireConfig(): string {
        return self::repertoireRacine() . self::REPERTOIRE_CONFIG;
    }

}
?>