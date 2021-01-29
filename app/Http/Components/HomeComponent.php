<?php

namespace App\Http\Components;

use Illuminate\Contracts\View\View;

/**
 * Class Dashboard
 *
 * @package App\Http\Components
 */
final class HomeComponent extends BaseComponent
{
    /**
     * Title of Page.
     *
     * @const string
     */
    private const PAGE_TITLE = 'Home';

    /**
     * @return void
     */
    public function mount(): void
    {
        $this->pushBreadcrumbs(self::PAGE_TITLE)->setPageTitle(self::PAGE_TITLE);

        parent::mount();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.home');
    }
}
