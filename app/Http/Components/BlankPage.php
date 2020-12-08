<?php

namespace App\Http\Components;

use Illuminate\View\View;

/**
 * Class BlankPage
 *
 * @package App\Http\Components
 */
class BlankPage extends BaseComponent
{
    public $pageTitle = 'dddd';

    /**
     * Breadcrumbs of content.
     *
     * @var array
     */
    protected $breadcrumbs = [
        ['link' => "modern", 'name' => "Home"],
        ['link' => "javascript:void(0)", 'name' => "Pages"],
        ['name' => "Blank Page"],
    ];

    /**
     * @return View
     */
    public function render(): View
    {
        parent::baseRender();

        return view('components.blank-page');
    }

    public function __call($method, $params)
    {
        return parent::__call($method, $params);
    }
}
