<?php

namespace App\Http\Components;

use Illuminate\View\View;
use Livewire\Component;

/**
 * Class BaseComponent
 *
 * @package App\Http\Components
 */
abstract class BaseComponent extends Component
{
    /**
     * Title of page.
     *
     * @var string
     */
    protected string $pageTitle;

    /**
     * Breadcrumbs of content.
     *
     * @var array
     */
    protected array $breadcrumbs = [];

    /**
     * Render your view.
     *
     * @return View|void
     */
    public function baseRender()
    {
        view()->share('pageTitle', $this->pageTitle);
        view()->share('breadcrumbs', $this->breadcrumbs);
    }

    /**
     * @param  string  $pageTitle
     *
     * @return BaseComponent
     */
    public function setPageTitle(string $pageTitle): BaseComponent
    {
        $this->pageTitle = $pageTitle;

        return $this;
    }

    /**
     * @param  array  $breadcrumbs
     *
     * @return BaseComponent
     */
    public function setBreadcrumbs(array $breadcrumbs): BaseComponent
    {
        $this->breadcrumbs = $breadcrumbs;

        return $this;
    }

    public function pushBreadcrumbs(string $name, string $link): void
    {
        if (empty($this->breadcrumbs)) {
//            $this->breadcrumbs[] = ['name' => env('APP_NAME'), 'link']
        }
    }
}
