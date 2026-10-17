<?php
namespace App\Controller;
use core\View;
final class SitemapController
{
    public function sitemapForm(): void
    {
        echo View::show('Sitemap');
    }
}