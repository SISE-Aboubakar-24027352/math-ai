<?php

define('PHP_INI_PATH', 'config/php.ini');

$debug = true;
$conf = parse_ini_file(PHP_INI_PATH, true);

if (!is_array($conf)) {
    throw new Exception('Erreur de chargement de configuration');
}

try {
    $conf = $conf['database'];
    $dsn = $conf['driver'] . ':dbname=' . $conf['dbname'] . ';host=' . $conf['host'];
    $pdo = new PDO($dsn, $conf['name'], $conf['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('CREATE TABLE IF NOT EXISTS users (
        id INT NOT NULL AUTO_INCREMENT,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(250) NOT NULL,
        PRIMARY KEY(id),reset_token VARCHAR(255), reset_token_expiry DATETIME
    )');
}catch (PDOException $e){
    die ("Erreur :". $e->getMessage());
}

?>