<?php
final class RegisterController {
    public function registerAction(Array $parameters, Array $postParams)
    {
        $errors = [];
        $success = false;

        if (!empty($postParams)) {
            $email =filter_var(trim($postParams['email'] ?? ''),FILTER_VALIDATE_EMAIL);
            $password = $postParams['password'] ?? '';
            $confirmation = $postParams['confirmation'] ?? '';
            //$s_name = trim($A_postParams['name'] ?? '');

            $userValidate = new UserValidate($email,$password,$confirmation);
            
            $emailError = $userValidate->checkEmailValidity();
            $passwordError = $userValidate->checkPasswordLength();
            $confirmationError = $userValidate->passwordConfirmation();
            
            if (!empty($emailError)) $errors[] = $emailError;
            if (!empty($passwordError)) $errors[] = $passwordError;
            if (!empty($confirmationError)) $errors[] = $confirmationError;

            if (empty($errors)) {
                $repository = new UserRepository();
                if ($repository->emailExists($email)) {
                    $errors[] = 'Un compte existe déjà avec cet email.';
                }else{
                    $user = $repository->createUser($email, $password);
                    $success = true;
                    $_SESSION['id'] = $user->id;
                    $_SESSION['email'] = $user->email;
                    header('Location: index.php?action=login');
                    exit;
                }
            }
        }
        echo View::show('Register', array( 'errors' => $errors,'success' => $success, 'formData' => $postParams));
    }
}