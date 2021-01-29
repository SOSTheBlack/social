<?php

namespace App\Http\Components\Settings\SocialMedias\Instagram;

use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * Class NewInstagramComponent
 *
 * @package App\Http\Components\Dashboard\Settings\SocialMedias\Instagram
 */
class NewInstagramComponent extends Component
{
    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.settings.social_medias.instagram.create-component');
    }
}
