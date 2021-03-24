<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class Alert.
 *
 * @package App\View\Components
 */
class AlertSession extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('plugins.session-alert');
    }
}
