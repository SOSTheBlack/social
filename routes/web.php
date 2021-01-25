<?php

use App\Http\Components\BlankPage;
use App\Http\Components\Dashboard\Home;
use App\Http\Controllers\LanguageController;

//dd
//(
//    vsprintf('https://ui-avatars.com/api/?name=%s&background=000&color=fff&bold=true', [Str::slug('Jean Cesar Garcia', '+')])
//);

//$user = (new \Database\Factories\Entities\UserFactory())->create();
//
//dd(
//    $user,
//    $user->profile
//);

//dd(
//    app('gravatar')->get('jeancesargarcia@gmail.com', ['small-secure'])
//);

Auth::routes(['verify' => true]);
Route::get('logout')->uses('App\Http\Controllers\Auth\LoginController@logout')->name('auth.logout');

Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::group(['middleware' => 'guest'], function () {
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/')->uses(Home::class)->name('dashboard.home');

    Route::get('/blank-page', BlankPage::class)->name('blank');
});
