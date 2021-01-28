<?php

namespace App\Plugins\Pages;

use stdClass;

/**
 * Class BreadcrumbsPlugin
 *
 * @package App\Plugins\Pages
 */
class BreadcrumbsPlugin
{
    private array $breadcrumbs = [];
    private stdClass $breadcrumb;

    public function pushBreadcrumb(string $name, string $link): void
    {
        if (empty($this->breadcrumbs)) {
            $this->initializeBreadcrumb($name, $link);
        }
    }

    private function initializeBreadcrumb()
    {
//        $this->breadcrumb[] = ['name' => $name, 'link' => $link];
    }
}
