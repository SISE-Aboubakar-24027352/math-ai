<?php
namespace actions\Controller;
use Core\View;
use actions\Model\UserRepository;
final class ForgottenpasswordController
{

    public function __construct(private readonly UserRepository $repository) {}
    public function forgottenpasswordAction(): void
    {
        $message = '';
        global $pdo;
        if (!empty($_POST["email"])) {
            $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
            if (!$this->repository->emailExists($email)) {
                $message = 'Si votre adresse e-mail est correcte, un email de réinitialisation a été envoyé.';
            } else {
                $token = bin2hex(random_bytes(32));
                $expiry = (new DateTimeImmutable('+15 minutes'))->format('Y-m-d H:i:s');
                $this->repository->setResetToken($email, $token, $expiry);
                $resetLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https://' : 'http://')
                    . ($_SERVER['HTTP_HOST'] ?? 'localhost')
                    . '/index.php?url=forgottenPassword/reset&token=' . urlencode($token);
                $userMail = new UserMail($email);
                $content = $userMail->createResetPasswordMessage($email, $resetLink);
                if ($userMail->sendMail($content)) {
                    $message = 'Si votre adresse e-mail est correcte, un email de réinitialisation a été envoyé.';
                } else $message = 'Une erreur est survenue lors de l\'envoi de l\'email.';
            }
        }
        echo View::show('Forgottenpassword', [
            'message' => $message,
            'formData' => $_POST
        ]);
    }
    public function forgottenpasswordForm():void {
        echo View::show('Forgottenpassword', [
            'message' => '',
            'formData' => []
        ]);
    }
}
