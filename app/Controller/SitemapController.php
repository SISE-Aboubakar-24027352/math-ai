<?php

final class SitemapController
{
    /**
     * @param array<string, mixed> $parameters
     * @param array<string, mixed> $postParams
     */
    public function defaultAction(array $parameters, array $postParams): void
    {
        echo View::show('SiteMap');
    }
}