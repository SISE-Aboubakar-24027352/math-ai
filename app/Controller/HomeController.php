<?php
final class HomeController{
    /**
     * @param array<string, mixed> $parameter
     */
    public function defaultAction(Array $parameter): void
    {
        echo View::show('Home');
    }
}
