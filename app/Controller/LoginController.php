<?php
final class LoginController
{
    public function LoginController(array $parameters, array $postParams)
    {
        $errors = [];
        if (!empty($postParams)) {
            $email = filter_var(trim($postParams['email'] ?? ''),
                FILTER_VALIDATE_EMAIL);
            $password = $postParams['password'] ?? '';

            $repository = new UserRepository($pdo);
            $user = $repository->findByEmail($email);
            if ($user !== null && $user->verifyPassword($password)) {
                header('Location: index.php?action=login');
                exit;
            } else {
                $errors[] = 'Email ou mot de passe incorrect.';
            }
        }
        echo View::show('login', array('errors' => $errors, 'formData' => $postParams));
    }
}