<?php

namespace Core;
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
        $S_file = __DIR__ . '/../actions/View/' . $S_location . '.php';
        extract($A_array);
        $A_view = $A_array;
        self::openBuffer();
        require $S_file;
        return self::getBufferContent();
    }
}
?>