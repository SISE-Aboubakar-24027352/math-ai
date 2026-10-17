<?php
namespace App\Controller;
use core\View;
final class MentionsController
{
    public function mentionsForm(): void
    {
        echo View::show('Mentions');
    }
}