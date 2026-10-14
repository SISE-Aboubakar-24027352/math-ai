<?php
final class UserRepository {
    public function __construct(private readonly PDO $pdo) {}

    public function findByEmail(string $email): ?User {
        $stmt = $this::$pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function emailExists(string $email): bool {
        return ($this::findByEmail($email));
    }

    public function create(string $email, string $password): User {

    }





}