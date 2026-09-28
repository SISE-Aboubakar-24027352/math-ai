<?php
function generateHeader($title,$utilisateur = null){
    $pageTitle = 'MathsAI - ' . $title;
    $links = ($utilisateur === null) ? '| <a href="/login.php">Connexion</a> | <a href="/register.php">Inscription</a>'
        : '| <a href="index.php?action=logout">Déconnexion</a>';

    echo "<!DOCTYPE html>
        <html lang=\"fr\">
        <head>
            <meta charset=\"UTF-8\"> 
            <title>{$pageTitle}</title>
        </head>
        <body>
            <nav>
                <a href=\"index.php\">MathsAI</a>
                {$links}
            </nav>";
}



