<?php

namespace App\Http\Components\Dashboard\Settings\Integrations\Instagram;

use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * Class CreateComponent
 *
 * @package App\Http\Components\Dashboard\Settings\Integrations\Instagram
 */
class CreateComponent extends Component
{
    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.dashboard.settings.integrations.instagram.create-component');
    }
}
