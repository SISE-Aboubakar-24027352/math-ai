<?php

final class Constants
{

    const VIEW_REPOSITORY        = '/app/View/';

    const MODEL_REPOSITORY      = '/app/Model/';

    const CORE_REPOSITORY       = '/Core/';

    const EXCEPTION_REPOSITORY  = '/Core/exceptions/';

    const CONTROLLER_REPOSITORY = '/app/Controller/';

    const CONFIG_REPOSITORY = '/Core/config/';
    

    public static function rootRepository(): string|false {
        return realpath(__DIR__ . '/../');
    }

    public static function coreRepository(): string {
        return self::rootRepository() . self::CORE_REPOSITORY;
    }

    public static function exceptionRepository(): string {
        return self::rootRepository() . self::EXCEPTION_REPOSITORY;
    }

    public static function viewRepository(): string {
        return self::rootRepository() . self::VIEW_REPOSITORY;
    }

    public static function modelRepository(): string {
        return self::rootRepository() . self::MODEL_REPOSITORY;
    }

    public static function controllerRepository(): string {
        return self::rootRepository() . self::CONTROLLER_REPOSITORY;
    }

    public static function configRepository(): string {
        return self::rootRepository() . self::CONFIG_REPOSITORY;
    }
}
?>