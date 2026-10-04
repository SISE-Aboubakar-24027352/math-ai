<?php
final class RegisterController {
    public function registerAction(Array $parameters, Array $postParams)
    {
        $errors = [];
        $success = false;

        if (!empty($postParams)) {
            $email =filter_var(trim($postParams['email'] ?? ''),
                FILTER_VALIDATE_EMAIL);
            $password = $postParams['password'] ?? '';
            $confirmation = $postParams['confirmation'] ?? '';
            //$s_name = trim($A_postParams['name'] ?? '');
            $repository = new UserRepository($pdo);
            $userValidate = new UserValidate($email,$password,$confirmation);
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
        echo View::show('register/registerView', array( 'errors' => $errors,'success' => $success, 'formData' => $postParams ));
    }
}
