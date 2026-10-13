<?php
namespace app\Controller;
final class MentionsController
{
    public function mentionsAction(array $parameters, array $postParams)
    {
        echo View::show('Mentions');
    }
}