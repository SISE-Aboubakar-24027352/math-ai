<?php

define('PHP_INI_PATH', 'config/php.ini');

$debug = true;
$conf = parse_ini_file(PHP_INI_PATH, true);

if (!is_array($conf)) {
    throw new Exception('Erreur de chargement de configuration');
}

try {
    $conf = $conf['base_donnee'];
    $dsn = $conf['driver'] . ':dbname=' . $conf['dbname'] . ';host=' . $conf['host'];
    $connection = new PDO($dsn, $conf['name'], $conf['mdp']);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->exec('CREATE TABLE IF NOT EXISTS users (
        id INT NOT NULL AUTO_INCREMENT,
        nom VARCHAR(50) NOT NULL,
        mail VARCHAR(100) NOT NULL UNIQUE,
        mdp VARCHAR(250) NOT NULL,
        PRIMARY KEY(id)
    )');
}catch (PDOException $e){
    die ("Erreur :". $e->getMessage());
}

?>