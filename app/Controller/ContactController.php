<?php

final class ContactController{
    public function defaultAction(Array $parameter){
        echo View::show('Contact');
    }
}
