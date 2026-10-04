<?php
final class UserResetPassword {
    public function __construct(private readonly string $password) {}

    public function checkPasswordValidity(): string {
        $errors = '';

        if (strlen($this->password) < 8) {
            $errors = 'Le mot de passe doit contenir au moins 8 caractères.';
        }

        return $errors;
    }

    // On pourra ajouter plus tard une vérification indiquant que le mot de passe
    // ne doit pas être identique à l'ancien.
}