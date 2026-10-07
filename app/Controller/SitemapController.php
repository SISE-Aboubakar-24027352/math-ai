<?php

final class SitemapController
{
    public function sitemapAction(array $parameters, array $postParams)
    {
        echo View::show('SiteMap');
    }
}