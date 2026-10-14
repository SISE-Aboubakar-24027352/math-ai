<?php

namespace actions\Controller;
use Core\View;
final class ContactController{
    public function contactForm(){
        echo View::show('Contact');
    }
}
