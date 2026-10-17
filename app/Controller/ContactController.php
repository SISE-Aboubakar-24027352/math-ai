<?php
namespace App\Controller;
use core\View;
final class ContactController{

    public function contactForm(): void{
        echo View::show('Contact');
    }
}
