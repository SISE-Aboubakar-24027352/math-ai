<?php
final class HomeController{
    public function homeAction(Array $parameter){
        echo View::show(‘home/homeView’);
}
}
