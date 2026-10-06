<?php
function chargerEnv(string $chemin): void
{
    if (!is_file($chemin)) {
        throw new RuntimeException("Fichier de configuration introuvable : $chemin\n"
            . "Copiez .env.example vers .env puis adaptez les valeurs.");
    }
    foreach (file($chemin, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $ligne) {
        // ignorer commentaires, découper sur le premier "=", retirer les guillemets,
        // ne rien écraser si la variable existe déjà (getenv() ou $_ENV)...
        $_ENV[$cle] = $valeur;
        putenv("$cle=$valeur");
    }
}

function env(string $cle, ?string $defaut = null): ?string
{
    $valeur = $_ENV[$cle] ?? getenv($cle);   // le fichier .env, sinon l'environnement du système

    return $valeur === false ? $defaut : $valeur;
}