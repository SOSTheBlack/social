<?php

namespace App\Http\Components;

use Livewire\Component;

class Dashboard extends BaseComponent
{
    public function render()
    {
        $this->pageTitle = trans('locale.dashboard.page-title');

        parent::baseRender();

        return view('components.dashboard');
    }
}
