<?php

final class UserMail {
    public function __construct(private string $email){}
    public function sendMail($content) : bool {
        if(mail($content[0],$content[1],$content[2]))
            return true;
        return false;
    }
    public function createResetPasswordMessage($email,$resetLink): Array {
        $subject = 'Réinitialisation de votre mot de passe';
        $message = "Bonjour,\n\n";
        $message .= "Pour réinitialiser votre mot de passe, cliquez sur ce lien :\n";
        $message .= $resetLink . "\n\n";
        $message .= "Ce lien expirera dans 15 minutes.\n";

        $headers = "From: no-reply@math-ai.local\r\n";
        $headers .= "Reply-To: no-reply@math-ai.local\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $content = [];
        $content[] = $subject;
        $content[] = $message;
        $content[] = $headers;

        return $content;
    }

}
