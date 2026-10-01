<?php
// includes/env.php
function chargerEnv(string $chemin): void
{
    if (!is_file($chemin)) {
        throw new RuntimeException(
            "Fichier de configuration introuvable : $chemin\n"
            . "Copiez .env.example vers .env puis adaptez les valeurs."
        );
    }

    foreach (file($chemin, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $ligne) {
        $ligne = trim($ligne);

        // Ignore comments and lines without "="
        if ($ligne === '' || $ligne[0] === '#' || !str_contains($ligne, '=')) {
            continue;
        }

        [$cle, $valeur] = explode('=', $ligne, 2);
        $cle = trim($cle);
        $valeur = trim($valeur);

        // Strip optional surrounding quotes: KEY="value" or KEY='value'
        if (strlen($valeur) >= 2 && in_array($valeur[0], ['"', "'"], true) && $valeur[0] === $valeur[-1]) {
            $valeur = substr($valeur, 1, -1);
        }

        $_ENV[$cle] = $valeur;
        putenv("$cle=$valeur");
    }
}

function env(string $cle, ?string $defaut = null): ?string
{
    // The .env file first, otherwise the system environment
    $valeur = $_ENV[$cle] ?? getenv($cle);

    return $valeur === false ? $defaut : $valeur;
}