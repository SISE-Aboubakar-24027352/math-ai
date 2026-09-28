<?php 

final class Vue
{
    public static function ouvrirTampon(): void
    {
        ob_start();
    }

    public static function recupererContenuTampon():string|false
    {
        return ob_get_clean();
        // ob_get_clean() equivalent a ob_get_contents() + ob_end_clean()
    }

    /**
     * @param array<string, mixed> $A_tableau
     */
    public static function montrer(string $S_localisation,array $A_tableau = []):string|false
    {
        $S_fichier = Constantes::repertoireVues() . $S_localisation . '.php';

        $A_vue = $A_tableau;
        ob_start();
        include $S_fichier;
        return ob_get_clean();
    }
}
?>