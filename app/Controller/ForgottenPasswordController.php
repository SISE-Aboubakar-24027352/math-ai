<?php

final class ForgottenPasswordController {
    public function ForgottenPasswordController(array $parameters, array $postParams)
    {
        global $pdo;

        $errors = [];
        $success = false;

        if (!empty($postParams)) {
            $email = filter_var(trim($postParams['email'] ?? ''), FILTER_VALIDATE_EMAIL);
            $password = $postParams['password'] ?? '';
            $confirmation = $postParams['confirmation'] ?? '';

            $repository = new UserRepository($pdo);
            $userResetPassword = new UserResetPassword($password);

            if ($email === false) {
                $errors[] = 'L\'adresse email est invalide.';
            }

            $errors[] = $userResetPassword->checkPasswordValidity();

            if ($password !== $confirmation) {
                $errors[] = 'Les deux mots de passe ne correspondent pas.';
            }

            if ($email !== false && empty(array_filter($errors, static fn ($error) => $error !== ''))) {
                if (!$repository->emailExists($email)) {
                    $errors[] = 'Aucun compte n\'existe avec cet email.';
                }
            }

            if (empty(array_filter($errors, static fn ($error) => $error !== ''))) {
                $repository->updateUser($email, $password);
                $success = true;
                header('Location: index.php?action=login');
                exit;
            }
        }

        echo View::show('forgottenPassword', [
            'errors' => $errors,
            'success' => $success,
            'formData' => $postParams,
        ]);
    }
}