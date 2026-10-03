<?php
final class UserResetPassword {
    public function __construct(string $password) {}
    public function checkPasswordValidity(): String {
        $errors = '';

        if (strlen($this->password) < 8) {
            $errors = 'Le mot de passe doit contenir au moins 8 caractères.';
        }
        return $errors;
    }
    //On implémentera un système vérifiant que le nouveau mot de passe doit être différent du précédent.

}