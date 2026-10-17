<?php
namespace App\Controller;
use core\View;
final class HomeController{
    public function homeForm(): void
    {
        echo View::show('Home');
    }
}