<?php

define('PHP_INI_PATH', 'config/php.ini');
define('DB_NAME', 'saemathai_bdd');

$debug = true;
$conf = parse_ini_file(PHP_INI_PATH, true);

if (!is_array($conf)) {
    throw new DatabaseException('Erreur de chargement de configuration');
}

$conf = $conf['base_donee'];
$dsn = $conf['driver'] . ':dbname=' . DB_NAME . ';host=' . $conf['host'];
$connection = new PDO($dsn, $conf['name'], $conf['mdp']);
?>