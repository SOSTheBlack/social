<?php

namespace App\Http\Components;

use App\Helpers\Http\Components\BuildComponent;
use Illuminate\Contracts\View\View;

use Livewire\Component;

/**
 * Class Dashboard
 *
 * @package App\Http\Components
 */
final class HomeComponent extends Component
{
    use BuildComponent;

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
        $this->setBreadcrumbs([['name' => self::PAGE_TITLE]])->setPageTitle(self::PAGE_TITLE);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.home');
    }
}
