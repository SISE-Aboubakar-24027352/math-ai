<?php

final class SitemapController
{
    public function defaultAction(array $parameters, array $postParams)
    {
        echo View::show('SiteMap');
    }
}