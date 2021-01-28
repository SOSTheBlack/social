<?php

use App\Http\Components\BlankPage;
use App\Http\Components\Dashboard\Home;
use App\Http\Components\Dashboard\Settings\Integrations\Instagram\CreateComponent as InstagramCreateComponent;
use App\Http\Controllers\LanguageController;

Auth::routes(['verify' => true]);

Route::get('logout')->uses('App\Http\Controllers\Auth\LoginController@logout')->name('auth.logout');

Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::group(['middleware' => 'guest'], function () {
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/')->uses(Home::class)->name('dashboard.home');

    Route::get('/settings/integrations/instagram/new', InstagramCreateComponent::class)->name('dashboard.settings.integrations.instagram.new');

    Route::get('/blank-page', BlankPage::class)->name('blank');
});
