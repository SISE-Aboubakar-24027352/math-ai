<?php

define('PHP_INI_PATH', 'config/php.ini');

$debug = true;
$conf = parse_ini_file(PHP_INI_PATH, true);

if (!is_array($conf)) {
    throw new Exception('Erreur de chargement de configuration');
}

$conf = $conf['base_donnee'];
$dsn = sprintf('%s:host=%s;port=5432;dbname=%s', $conf['driver'], $conf['host'], $conf['dbname']);
$connection = new PDO($dsn, $conf['name'], $conf['mdp']);
?>