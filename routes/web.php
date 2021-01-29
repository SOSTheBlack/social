<?php

use App\Http\Components\BlankPage;
use App\Http\Components\Home;
use App\Http\Components\Settings\SocialMedias\Instagram\NewInstagramComponent as InstagramCreateComponent;
use App\Http\Controllers\LanguageController;

Auth::routes(['verify' => true]);

Route::get('logout')->uses('App\Http\Controllers\Auth\LoginController@logout')->name('auth.logout');

Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::group(['middleware' => 'guest'], function () {
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/')->uses(Home::class)->name('home');

    Route::get('/settings/social_medias/instagram/new', InstagramCreateComponent::class)->name('settings.social_medias.instagram.new');

    Route::get('/blank-page', BlankPage::class)->name('blank');
});
