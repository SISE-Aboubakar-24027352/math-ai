<?php
namespace actions\Controller;
use Core\View;
final class MentionsController
{
    public function mentionsForm()
    {
        echo View::show('Mentions');
    }
}