<?php
namespace actions\Controller;
final class HomeController{
    public function homeAction(Array $parameter){
        echo View::show('Home');
}
}
