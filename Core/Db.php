<?php
final class Db {
    private static ?PDO $pdo = null;

    public static function getPDO(): PDO{
        require_once __DIR__  . '/env.php';
        chargerEnv(__DIR__.'/../.env');
        try {
            // Construction du DSN (Data Source Name)
            $dsn = env('DB_DRIVER') . ':dbname=' . env('DB_NAME') . ';host=' . env('DB_HOST') . ';charset=utf8mb4';

            // Options PDO pour plus de sécurité
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            // Création de la connexion PDO
            self::$pdo = new PDO($dsn,env('DB_USERNAME'),env('DB_PASSWORD'),$options);
            return self::$pdo;

        }catch (PDOException $e){
            die ("Erreur :". $e->getMessage());
        }

    }
}


?>