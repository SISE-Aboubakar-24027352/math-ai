<?php
final class ResetpasswordController
{
    /**
     * @param array<string, mixed> $parameters
     * @param array<string, mixed> $postParams
     */
    public function defaultAction(array $parameters, array $postParams):void
    {
        header('Location: /home');
        exit;
    }

    /**
     * @param array<string, mixed> $parameters
     * @param array<string, mixed> $postParams
     */
    public function resetpasswordAction(array $parameters, array $postParams): void
    {
        $errors = [];

        if (!empty($postParams)) {
            $email = filter_var(trim($postParams['email'] ?? ''),FILTER_VALIDATE_EMAIL);
            $password = $postParams['password'] ?? '';
            $confirmation = $postParams['confirmation'] ?? '';

            $userValidate = new UserValidate($email,$password,$confirmation);

            $passwordError = $userValidate->checkPasswordLength();
            $confirmationError = $userValidate->passwordConfirmation();

            if ($email === false) {
                $errors[] = 'L\'adresse email est invalide.';
            }

            if (!empty($passwordError)) $errors[] = $passwordError;
            if (!empty($confirmationError)) $errors[] = $confirmationError;

            if (empty($errors)) {
                $repository = new UserRepository();
                $user = $repository->updateUser($email,$password);

                if ($user !== null && $user->verifyPassword($password)) {
                    $_SESSION['id'] = $user->id;
                    $_SESSION['email'] = $user->email;
                    header('Location: /home');
                    exit;
                } else {
                    $errors[] = 'Email ou mot de passe incorrect.';
                }
            }
        }
        echo View::show('ResetPassword', array('errors' => $errors, 'formData' => $postParams));
    }

}
