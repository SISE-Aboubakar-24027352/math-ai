<?php
final class HomeController{
    public function defaultAction(Array $parameter){
        echo View::show('Home');
    }
}
