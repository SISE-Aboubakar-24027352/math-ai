<?php
namespace actions\Controller;
use Core\View;
final class SitemapController
{
    public function sitemapForm()
    {
        echo View::show('Sitemap');
    }
}