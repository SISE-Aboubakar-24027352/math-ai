<?php
final class ForgottenPasswordController
{
    public function defaultAction(array $parameters, array $postParams)
    {
        header('Location: /index.php?url=home');
        exit;
    }
    public function forgottenPasswordAction(array $parameters, array $postParams): void
    {
        $message = '';
        global $pdo;
        if (!empty($postParams["email"])) {
            $email = filter_var(trim($postParams["email"]), FILTER_VALIDATE_EMAIL);
            $repository = new UserRepository();
            if (!$repository->emailExists($email)) {
                $message = 'Si votre adresse e-mail est correcte, un email de réinitialisation a été envoyé.';
            } else {
                $token = bin2hex(random_bytes(32));
                $expiry = (new DateTimeImmutable('+15 minutes'))->format('Y-m-d H:i:s');
                $repository->setResetToken($email, $token, $expiry);
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
        echo View::show('ForgottenPassword', [
            'message' => $message,
            'formData' => $postParams,
        ]);
    }
}