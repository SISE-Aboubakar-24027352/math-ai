<?php
function base_de_donnees(String $dsn) : ?PDO {
    try {
        $pdo = new PDO($dsn, 'saemathai', 'Projet-sae@');
        $pdo->exec('SET CHARACTER SET utf8');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT NOT NULL UNIQUE,
        password TEXT NOT NULL
        )');
    }
    catch (PDOException $e) {
        die ('Erreur : ' . $e->getMessage());
    }

    return $pdo;
}

function verifieEmail (PDO $pdo, String $email) {
    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    return $stmt;
}

function ajouteId (PDO $pdo, String $email, String $password) {
    $stmt = $pdo->prepare('INSERT INTO users (email,password) VALUES (:email,:password)');
    $stmt->execute(['email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)]);
}
$dsn = 'mysql:host=postgresql-saemathai.alwaysdata.net;dbname=saemathai_bdd';

