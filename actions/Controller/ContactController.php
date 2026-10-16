<?php

namespace actions\Controller;
use Core\View;
final class ContactController{
    /**
     * @param array<string, mixed> $parameter
     */
    public function contactForm(){
        echo View::show('Contact');
    }
}
