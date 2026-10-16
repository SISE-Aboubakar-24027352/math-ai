<?php
final class HomeController{
    /**
     * @param array<string, mixed> $parameter
     */
    public function homeAction(Array $parameter){
        echo View::show('Home');
}
}
