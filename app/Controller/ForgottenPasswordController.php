<?php

final class ForgottenPasswordController
{
    public function ForgottenPasswordController(array $parameters, array $postParams): void
    {
        global $pdo;
        if (!empty($postParams["email"])) {
            $email = filter_var(trim($postParams["email"]), FILTER_VALIDATE_EMAIL);
            $repository = new UserRepository($pdo);
            if (!$repository->emailExists($email)) {
                $message = 'Si votre adresse e-mail est correcte, un email de réinitialisation a été envoyé.';
            }
            else {
                $token = bin2hex(random_bytes(32));
                $expiry = (new DateTimeImmutable('+15 minutes'))->format('Y-m-d H:i:s');
                $repository->setResetToken($email, $token, $expiry);
                $resetLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https://' : 'http://')
                    . ($_SERVER['HTTP_HOST'] ?? 'localhost')
                    . '/index.php?url=forgottenPassword/reset&token=' . urlencode($token);
                $userMail = new UserMail($email);
                $content = $userMail->createResetPasswordMessage($email,$resetLink);
                if ($userMail->sendMail($content)) {
                    $message = 'Si votre adresse e-mail est correcte, un email de réinitialisation a été envoyé.';
                }
                else $message = 'Une erreur est survenue lors de l\'envoi de l\'email.';
            }
        }

    }
/*
    public function forgotForm(array $parameters, array $postParams): void
    {
        global $pdo;

        $errors = [];
        $message = '';

        if (!empty($postParams)) {
            $email = filter_var(trim((string) ($postParams['email'] ?? '')), FILTER_VALIDATE_EMAIL);

            if ($email === false) {
                $errors[] = 'L\'adresse email est invalide.';
            } else {
                $repository = new UserRepository($pdo);

                if (!$repository->emailExists($email)) {
                    $errors[] = 'Aucun compte n\'existe avec cet email.';
                } else {
                    $token = bin2hex(random_bytes(32));
                    $expiry = (new DateTimeImmutable('+15 minutes'))->format('Y-m-d H:i:s');

                    $update = $pdo->prepare(
                        'UPDATE users SET reset_token = :token, reset_token_expiry = :expiry WHERE email = :email'
                    );

                    if ($update->execute([
                        'token' => $token,
                        'expiry' => $expiry,
                        'email' => $email,
                    ])) {
                        $resetLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https://' : 'http://')
                            . ($_SERVER['HTTP_HOST'] ?? 'localhost')
                            . '/index.php?url=forgottenPassword/reset&token=' . urlencode($token);

                        $this->sendResetEmail($email, $resetLink);
                        $message = 'Un email de réinitialisation a été envoyé.';
                    } else {
                        $errors[] = 'Impossible de générer le lien de réinitialisation.';
                    }
                }
            }
        }

        echo '<h1>Mot de passe oublié</h1>';

        foreach ($errors as $error) {
            if ($error !== '') {
                echo '<p style="color:red;">' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</p>';
            }
        }

        if ($message !== '') {
            echo '<p style="color:green;">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</p>';
        }

        echo '<form method="post" action="/index.php?url=forgottenPassword">
            <label for="email">Votre email</label>
            <input type="email" name="email" required value="' . htmlspecialchars((string) ($postParams['email'] ?? ''), ENT_QUOTES, 'UTF-8') . '">
            <button type="submit">Envoyer le lien</button>
        </form>';
    }

    public function reset(array $parameters, array $postParams): void
    {
        global $pdo;

        $token = trim((string) ($_GET['token'] ?? $postParams['token'] ?? ''));

        if ($token === '' || !preg_match('/^[a-f0-9]{64}$/', $token)) {
            echo '<p style="color:red;">Le token de réinitialisation est invalide.</p>';
            $this->forgotForm($parameters, []);
            return;
        }

        $stmt = $pdo->prepare('SELECT id, email, reset_token_expiry FROM users WHERE reset_token = :token');
        $stmt->execute(['token' => $token]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user === false) {
            echo '<p style="color:red;">Ce lien de réinitialisation n\'est pas valide.</p>';
            $this->forgotForm($parameters, []);
            return;
        }

        $expiry = $user['reset_token_expiry'] ?? null;
        if ($expiry === null || new DateTimeImmutable($expiry) < new DateTimeImmutable('now')) {
            echo '<p style="color:red;">Ce lien a expiré. Demandez un nouveau mot de passe.</p>';
            $this->forgotForm($parameters, []);
            return;
        }

        echo '<h1>Définir un nouveau mot de passe</h1>';
        echo '<form method="post" action="/index.php?url=forgottenPassword">
            <input type="hidden" name="token" value="' . htmlspecialchars($token, ENT_QUOTES, 'UTF-8') . '">
            <p>
                <label for="password">Nouveau mot de passe</label>
                <input type="password" name="password" required>
            </p>
            <p>
                <label for="confirmation">Confirmer le mot de passe</label>
                <input type="password" name="confirmation" required>
            </p>
            <button type="submit">Valider</button>
        </form>';
    }

    public function updatePassword(array $parameters, array $postParams): void
    {
        global $pdo;

        $token = trim((string) ($postParams['token'] ?? ''));
        $password = (string) ($postParams['password'] ?? '');
        $confirmation = (string) ($postParams['confirmation'] ?? '');
        $errors = [];

        if ($token === '' || !preg_match('/^[a-f0-9]{64}$/', $token)) {
            $errors[] = 'Le token de réinitialisation est invalide.';
        }

        if (strlen($password) < 8) {
            $errors[] = 'Le mot de passe doit contenir au moins 8 caractères.';
        }

        if ($password !== $confirmation) {
            $errors[] = 'Les deux mots de passe ne correspondent pas.';
        }

        if (!empty($errors)) {
            echo '<h1>Définir un nouveau mot de passe</h1>';
            foreach ($errors as $error) {
                echo '<p style="color:red;">' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</p>';
            }

            echo '<form method="post" action="/index.php?url=forgottenPassword">
                <input type="hidden" name="token" value="' . htmlspecialchars($token, ENT_QUOTES, 'UTF-8') . '">
                <p>
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" name="password" required>
                </p>
                <p>
                    <label for="confirmation">Confirmer le mot de passe</label>
                    <input type="password" name="confirmation" required>
                </p>
                <button type="submit">Valider</button>
            </form>';
            return;
        }

        $stmt = $pdo->prepare('SELECT id, reset_token_expiry FROM users WHERE reset_token = :token');
        $stmt->execute(['token' => $token]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user === false) {
            echo '<p style="color:red;">Ce lien de réinitialisation n\'est plus valide.</p>';
            $this->forgotForm($parameters, []);
            return;
        }

        $expiry = $user['reset_token_expiry'] ?? null;
        if ($expiry === null || new DateTimeImmutable($expiry) < new DateTimeImmutable('now')) {
            echo '<p style="color:red;">Ce lien de réinitialisation a expiré.</p>';
            $this->forgotForm($parameters, []);
            return;
        }

        $repository = new UserRepository($pdo);
        $email = $this->getUserEmailByToken($pdo, $token);

        if ($email === null) {
            echo '<p style="color:red;">Ce lien de réinitialisation n\'est plus valide.</p>';
            $this->forgotForm($parameters, []);
            return;
        }

        $repository->updateUser($email, $password);

        echo '<h1>Mot de passe mis à jour</h1>';
        echo '<p style="color:green;">Votre mot de passe a bien été modifié.</p>';
        echo '<p><a href="/index.php?action=login">Se connecter</a></p>';
    }

    private function getUserEmailByToken(PDO $pdo, string $token): ?string
    {
        $stmt = $pdo->prepare('SELECT email FROM users WHERE reset_token = :token');
        $stmt->execute(['token' => $token]);
        $email = $stmt->fetchColumn();

        return $email === false ? null : (string) $email;
    }
    private function sendResetEmail(string $email, string $resetLink): void
    {
        $subject = 'Réinitialisation de votre mot de passe';
        $message = "Bonjour,\n\n";
        $message .= "Pour réinitialiser votre mot de passe, cliquez sur ce lien :\n";
        $message .= $resetLink . "\n\n";
        $message .= "Ce lien expirera dans 15 minutes.\n";

        $headers = "From: no-reply@math-ai.local\r\n";
        $headers .= "Reply-To: no-reply@math-ai.local\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        mail($email, $subject, $message, $headers);
    }
*/
}
