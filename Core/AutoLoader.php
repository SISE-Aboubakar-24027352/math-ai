<?php

require __DIR__ . '/Constants.php';

final class AutoLoader
{
    public static function loadClass($S_className)
    {
        $directory = [Constants::rootRepository(),
            Constants::coreRepository(),
            Constants::exceptionRepository(),
            Constants::viewRepository(),
            Constants::modelRepository(),
            Constants::controllerRepository(),
            Constants::configRepository()];
        foreach ($directory as $dir) {
            $S_file = $dir . $S_className . '.php';
            if (file_exists($S_file)) {
                require $S_file;
                return true;
            }
        }
        return false;
    }
}

spl_autoload_register('AutoLoader::loadClass');





