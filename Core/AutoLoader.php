<?php
namespace Core;

spl_autoload_register(function (string $classe): void {
    $fichier = __DIR__ . '/../' . str_replace('\\', '/', $classe) . '.php';
    if (is_file($fichier)) {
        require $fichier;
    }
});


/*
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
*/




