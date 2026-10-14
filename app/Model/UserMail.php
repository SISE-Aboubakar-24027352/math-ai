<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . '/../../vendor/autoload.php';

final class UserMail {
    public function __construct(private string $email) {}

    public function sendMail(array $content): bool
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = $_ENV['SMTP_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['SMTP_USER'];
            $mail->Password = $_ENV['SMTP_PASS'];
            $mail->SMTPSecure = 'tls';
            $mail->Port = (int) $_ENV['SMTP_PORT'];
            $mail->CharSet = 'UTF-8';

            $mail->setFrom($_ENV['SMTP_FROM'], 'MathAI');
            $mail->addAddress($this->email);

            $mail->Subject = $content['subject'] ?? 'Message';
            $mail->Body = $content['message'] ?? '';
            $mail->AltBody = strip_tags($content['message'] ?? '');

            return $mail->send();
        } catch (Exception $e) {
            return "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
        }
    }

    public function createResetPasswordMessage(string $email, string $resetLink): array
    {
        $resetLink = '';
        $subject = 'Réinitialisation de votre mot de passe';
        $message = "Bonjour,\n\n";
        $message .= "Pour réinitialiser votre mot de passe, cliquez sur ce lien :\n";
        $message .= $resetLink . "\n\n";
        $message .= "Ce lien expirera dans 15 minutes.\n";

        return [
            'subject' => $subject,
            'message' => $message,
            'to' => $email,
        ];
    }
}
