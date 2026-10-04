<?php 
require_once __DIR__ . '/Constants.php';
final class View
{
    public static function openBuffer(): void
    {
        ob_start();
    }

    public static function getBufferContent():string|false
    {
        return ob_get_clean();
        // ob_get_clean() equivalent a ob_get_contents() + ob_end_clean()
    }

    /**
     * @param array<string, mixed> $A_array
     */
    public static function show(string $S_location,array $A_array = []):string|false
    {
        $S_file = Constants::viewRepository() . $S_location . '.php';
        
        $A_view = $A_array;
        ob_start();
        include $S_file;
        return ob_get_clean();
    }
}
?>