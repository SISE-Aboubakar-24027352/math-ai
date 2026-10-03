<?php

use PDO;

final class UserRepository {
    public function __construct(private readonly \PDO $pdo) {}

    public function findByEmail(string $email): ?User{
        $stmt = $this->pdo->prepare('SELECT id,email,password FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!user) return null;
        else return new User($user['id'], $user['email'], $user['password']);
    }

    public function emailExists(string $email): bool {
        $stmt = $this->pdo->prepare('SELECT id FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch() ? true : false;
    }

    public function createUser(string $email, string $password): User {
        $stmt = $this->pdo->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
        $stmt->execute(['email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)]);
        $id = $this->pdo->lastInsertId();
        return new User ($id, $email, password_hash($password, PASSWORD_DEFAULT));
    }

    public function updateUser(string $email, string $password): User {
        $stmt = $this->pdo->prepare('UPDATE users SET password = :password WHERE id = :id');
        $stmt->execute(['password' => password_hash($password, PASSWORD_DEFAULT)]);
        $id = $this->pdo->lastInsertId();
        return new User ($id, $email, password_hash($password, PASSWORD_DEFAULT));
    }
}
