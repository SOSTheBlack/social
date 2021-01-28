<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ResetPasswordController
 *
 * @package App\Http\Controllers\Auth
 */
class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param Request    $request
     * @param string|null $token
     *
     * @return View
     */
    public function showResetForm(Request $request, ?string $token = null): View
    {
        $pageConfigs = ['bodyCustomClass' => 'login-bg', 'isCustomizer' => false];

        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email, 'pageConfigs' => $pageConfigs, 'pageTitle' => trans('locale.Forgot Your Password')]
        );
    }
}
