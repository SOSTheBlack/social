<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class Errors.
 *
 * @package App\View\Components
 */
class Errors extends Component
{
    /**
     * Define if exit icon is visible.
     *
     * @var bool
     */
    public bool $exit;

    /**
     * Create a new component instance.
     *
     * @param  bool  $exit
     */
    public function __construct(bool $exit = true)
    {
        $this->exit = $exit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('plugins.errors');
    }
}
