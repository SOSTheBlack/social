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
    public $pageTitle;

    /**
     * Breadcrumbs of content.
     *
     * @var array
     */
    protected $breadcrumbs = [];

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
}
