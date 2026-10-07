<?php

use User;
use PDO;

final class UserRepository {
    public function __construct() {
        $this->pdo = $pdo ?? Db::getPdo();
    }


    public function findByEmail(string $email): ?User{
        $stmt = $this->pdo->prepare('SELECT id,email,password FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user){return null;}
        else{return new User($user['id'], $user['email'], $user['password']);}
    }

    public function emailExists(string $email): bool {
        $stmt = $this->pdo->prepare('SELECT id FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch() ? true : false;
    }

    public function createUser(string $email, string $password): User {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
        $stmt->execute(['email' => $email, 'password' => $hashed_password]);
        $id = $this->pdo->lastInsertId();
        return new User ($id, $email, $hashed_password);
    }

    public function updateUser(string $email, string $password): User {
        $user = $this->findByEmail($email);
        if ($user === null) {
            throw new InvalidArgumentException('Aucun utilisateur trouvé pour cet email.');
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare('UPDATE users SET password = :password, reset_token = NULL, reset_token_expiry = NULL WHERE email = :email');
        $stmt->execute(['password' => $hashed_password,'email' => $email]);
        $id = $user->getId(id);
        return new User ($id, $email, $hashed_password);
    }

    public function setResetToken($email, $token, $expiry) {
        $stmt = $this->pdo->prepare('UPDATE users SET reset_token = :token, reset_token_expiry = :expiry WHERE email = :email');
        return $stmt->execute(['token' => $token, 'expiry' => $expiry,'email' => $email]);
    }

    public function findByToken($reset_token): ?User {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE reset_token = :token');
        $stmt->execute(['token' => $reset_token]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) return null;
        else return new User($user['id'], $user['email'], $user['password']);
    }
}
