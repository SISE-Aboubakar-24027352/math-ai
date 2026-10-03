<?php
final class RegisterController {
    public function register(Array $parameters, Array $postParams)
    {
        $errors = [];
        $success = false;

        if (!empty($postParams)) {
            $email =filter_var(trim($postParams['email'] ?? ''),
                FILTER_VALIDATE_EMAIL);
            $password = $postParams['password'] ?? '';
            $confirmation = $postParams['confirmation'] ?? '';
            //$s_name = trim($A_postParams['name'] ?? '');
            /*
        if (!$name) {
            $errors[] = 'Nom manquant.';

        }
        */

            $repository = new UserRepository($pdo);
            $userErrors = new UserErrors($email,$password,$confirmation);

            $errors = [];
            $errors[] = $userErrors->checkEmailValidity();
            $errors[] = $userErrors->checkPasswordlength();
            $errors[] = $userErrors->passwordConfirmation();

            if (empty($errors)) {
                if ($repository->emailExists($email)) {
                    $errors[] = 'Un compte existe déjà avec cet email.';
                }
            }
            if (empty($errors))
            {
                $repository->createUser($email, $password);
                $success = true;
                header('Location: index.php?action=login');
                exit;
            }
        }
        echo Vue::show('register/RegisterForm', array( 'errors' => $errors,'success' => $success, 'formData' => $postParams ));
    }
}
