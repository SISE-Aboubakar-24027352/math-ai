<?php

require __DIR__ . '/Constants.php';

final class AutoLoader
{
    public static function loadCoreClass($S_className)
    {
        $S_file = Constants::coreRepository() . "$S_className.php";
        return static::_load($S_file);
    }

    public static function loadExceptionClass ($S_className)
    {
        $S_file = Constants::exceptionRepository() . "$S_className.php";

        return static::_load($S_file);
    }

    public static function loadModelClass ($S_className)
    {
        $S_file = Constants::modelRepository() . "$S_className.php";

        return static::_load($S_file);
    }


    public static function loadViewClass ($S_className)
    {
        $S_file = Constants::viewRepository() . "$S_className.php";

        return static::_load($S_file);
    }

    public static function loadControllerClass ($S_className)
    {
        $S_file = Constants::controllerRepository() . "$S_className.php";

        return static::_load($S_file);
    }
    private static function _load ($S_file)
    {
        if (is_readable($S_file))
        {
            require $S_file;
        }
    }
}

spl_autoload_register('AutoLoader::loadCoreClass');
spl_autoload_register('AutoLoader::loadExceptionClass');
spl_autoload_register('AutoLoader::loadModelClass');
spl_autoload_register('AutoLoader::loadViewClass');
spl_autoload_register('AutoLoader::loadControllerClass');
