<?php

namespace actions\Controller;

final class ContactController{
    public function contactAction(Array $parameter){
        echo View::show('Contact');
    }
}
