<?php

namespace App\Http\Components;

use Illuminate\Support\Arr;
use Livewire\Component;

/**
 * Class BaseComponent
 *
 * @package App\Http\Components
 */
abstract class BaseComponent extends Component
{
    /**
     * Title of Page.
     *
     * @var string
     */
    private string $pageTitle;

    /**
     * Breadcrumbs of content.
     *
     * @var array
     */
    private array $breadcrumbs;

    /**
     * Runs once, immediately after the component is instantiated, but before render() is called.
     *
     * @void
     */
    protected function mount(): void
    {
        $this->breadcrumbs[] = ['name' => config('app.name'), 'link' => 'home'];

        view()->share('breadcrumbs', array_reverse($this->breadcrumbs));
        view()->share('title', $this->pageTitle);
    }

    /**
     * @param  string  $name
     * @param  string  $link
     *
     * @return BaseComponent
     */
    public function pushBreadcrumbs(string $name, string $link = ''): BaseComponent
    {
        $this->breadcrumbs[] = ['name' => $name, 'link' => $link];

        return $this;
    }

    /**
     * @param  mixed  $pageTitle
     *
     * @return BaseComponent
     */
    public function setPageTitle(string $pageTitle): BaseComponent
    {
        $this->pageTitle = $pageTitle;

        return $this;
    }
}
