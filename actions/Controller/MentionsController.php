<?php
namespace actions\Controller;
use Core\View;
final class MentionsController
{
    /**
     * @param array<string, mixed> $parameters
     * @param array<string, mixed> $postParams
     */
    public function mentionsForm()
    {
        echo View::show('Mentions');
    }
}