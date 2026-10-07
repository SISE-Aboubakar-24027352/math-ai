<?php

final class LoginController
{
    public function loginAction(array $parameters, array $postParams)
    {
        $errors = [];

        if (!empty($postParams)) {
            $email = filter_var(trim($postParams['email'] ?? ''),FILTER_VALIDATE_EMAIL);
            $password = $postParams['password'] ?? '';
            
            if ($email === false) {
                $errors[] = 'L\'adresse email est invalide.';
            }

            if (empty($errors)) {
                $repository = new UserRepository();
                $user = $repository->findByEmail($email);

                if ($user !== null && $user->verifyPassword($password)) {
                    $_SESSION['id'] = $user->id;
                    $_SESSION['email'] = $user->email;
                    header('Location: /index.php?url=home/home');
                    exit;
                } else {
                    $errors[] = 'Email ou mot de passe incorrect.';
                }
            }
        }
        echo View::show('Login', array('errors' => $errors, 'formData' => $postParams));
    }
    public function logoutAction(array $parameters, array $postParams)
    {
        session_destroy();
        header('Location: /index.php?url=home/home');
        exit;
    }
}