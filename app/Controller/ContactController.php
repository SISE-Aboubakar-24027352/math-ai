<?php

final class ContactController{
    public function contactAction(Array $parameter){
        echo View::show('Contact');
    }
}
