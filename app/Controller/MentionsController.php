<?php

final class MentionsController
{
    public function defaultAction(array $parameters, array $postParams)
    {
        echo View::show('Mentions');
    }
}