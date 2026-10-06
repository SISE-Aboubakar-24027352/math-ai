<?php

final class Constants
{

    const VIEW_REPOSITORY           = '/app/View/';

    const MODEL_REPOSITORY          = '/app/Model/';

    const CORE_REPOSITORY           = '/Core/';

    const EXCEPTION_REPOSITORY      = '/Core/exceptions/';

    const CONTROLLER_REPOSITORY     = '/app/Controller/';

    const CONFIG_REPOSITORY         = '/Core/config/';
    
    const INCLUDE_REPOSITORY        = '/Core/includes/';

    // renvoie la chemin du dossier racine du projet
    public static function rootRepository(): string|false {
        return realpath(__DIR__ . '/../');
    }

    // renvoie la chemin du dossier racine du projet
    public static function CoreRepository(): string {
        return self::rootRepository() . self::CORE_REPOSITORY;
    }

    public static function ExceptionRepository(): string {
        return self::rootRepository() . self::EXCEPTION_REPOSITORY;
    }

    public static function ViewRepository(): string {
        return self::rootRepository() . self::VIEW_REPOSITORY;
    }

    public static function ModelRepository(): string {
        return self::rootRepository() . self::MODEL_REPOSITORY;
    }

    public static function ControllerRepository(): string {
        return self::rootRepository() . self::CONTROLLER_REPOSITORY;
    }

    public static function ConfigRepository(): string {
        return self::rootRepository() . self::CONFIG_REPOSITORY;
    }

    public static function IncludeRepository() : String{
        return self::rootRepository() .self::INCLUDE_REPOSITORY;
    }
}
?>