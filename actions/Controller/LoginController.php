<?php
namespace actions\Controller;
use Core\View;
use actions\Model\UserRepository;
final class LoginController
{
    /**
     * @param array<string, mixed> $parameters
     * @param array<string, mixed> $postParams
     */
    public function __construct(private readonly UserRepository $repository) {}
    public function loginAction()
    {
        $errors = [];

        if (!empty($_POST)) {
            $email = filter_var(trim($_POST['email'] ?? ''),FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'] ?? '';
            
            if ($email === false) {
                $errors[] = 'L\'adresse email est invalide.';
            }

            if (empty($errors)) {
                $user = $this->repository->findByEmail($email);

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
        echo View::show('Login', array('errors' => $errors, 'formData' => $_POST));
    }

    public function loginForm() {
        echo View::show('Login', array('errors' => [], 'formData' => []));
    }
    public function logoutAction(array $parameters, array $postParams)
    {
        session_destroy();
        header('Location: /home');
        exit;
    }
}