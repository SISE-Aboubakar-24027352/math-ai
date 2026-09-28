<?php

try {
    $dsn = 'mysql:host=postgresql-saemathai.alwaysdata.net;dbname=saemathai_bdd';
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
