<?php

namespace App\Http\Components\Auth;

use App\Http\Components\BaseComponent;

/**
 * Class Login
 *
 * @package App\Http\Components\Auth
 */
class Login extends BaseComponent
{

    public function render()
    {
//        $this->setPageTitle(trans('locale.Sing In'));

        parent::baseRender();
        return view('components.auth.login')->layout('layouts.fullLayoutMaster');
    }
}
