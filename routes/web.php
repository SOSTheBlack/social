<?php

use App\Http\Components\BlankPage;
use App\Http\Components\Dashboard\Home;
use App\Http\Controllers\LanguageController;

use Illuminate\Support\Facades\Storage;

//dd(
//    asset('images/avatar/avatar-0.png')
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
