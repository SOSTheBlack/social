<?php

namespace App\Http\Components;

use App\Http\Components\BaseComponent;
use Illuminate\View\View;

/**
 * Class Dashboard
 *
 * @package App\Http\Components
 */
class Home extends BaseComponent
{
    protected string $pageTitle;
    /**
     * @return View
     */
    public function render(): View
    {
        $this->pageTitle = trans('locale.dashboard.home.page-title');

        parent::baseRender();

        return view('components.home');
    }
}
