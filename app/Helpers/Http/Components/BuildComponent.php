<?php

namespace App\Helpers\Http\Components;

/**
 * Trait BuildComponent.
 *
 * @package App\Helpers
 */
trait BuildComponent
{
    /**
     * Title of Page.
     *
     * @var string
     */
    public string $pageTitle;

    /**
     * Breadcrumbs of content.
     *
     * @var array
     */
    public array $breadcrumbs;

    /**
     * @param  array  $breadcrumbs
     *
     * @return BuildComponent
     */
    public function setBreadcrumbs(array $breadcrumbs): self
    {
        $this->breadcrumbs[] = ['name' => config('app.name'), 'link' => route('home')];

        foreach ($breadcrumbs as $breadcrumb) {
            $this->breadcrumbs[] = ['name' => $breadcrumb['name'], 'link' => $breadcrumb['link'] ?? ''];
        }

        view()->share('breadcrumbs', $this->breadcrumbs);

        return $this;
    }

    /**
     * @param  mixed  $pageTitle
     *
     * @return BuildComponent
     */
    public function setPageTitle(string $pageTitle): self
    {
        $this->pageTitle = $pageTitle;

        view()->share('pageTitle', $this->pageTitle);

        return $this;
    }
}