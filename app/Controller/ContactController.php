<?php

final class ContactController{
    /**
     * @param array<string, mixed> $parameter
     */
    public function defaultAction(Array $parameter): void
    {
        echo View::show('Contact');
    }
}
