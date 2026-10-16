<?php
namespace actions\Controller;
use Core\View;
final class HomeController{
    public function homeForm()
    {
        echo View::show('Home');
    }
}