<?php
final class User {
    public function __construct(public readonly string $email, public string $passwordHash) {}
    public function verifPassword(string $password): bool {
        return password_verify($password, $this->passwordHash);
    }
}