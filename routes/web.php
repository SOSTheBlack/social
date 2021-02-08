<?php

use App\Http\Components\BlankPageComponent;
use App\Http\Components\HomeComponent;
use App\Http\Components\Settings\SocialMedias\Instagram\NewInstagramComponent;
use App\Http\Controllers\LanguageController;
use Sostheblack\InstagramApi\Instagram;


Route::get('/test', function () {

    $instagram = new Instagram();

    $response = $instagram->login()
        ->setUsername('theblackmc.bodybuilder')
        ->setPassword('250863*131293')
//        ->setUsername('buzzinasocial')
//        ->setPassword('250863')
        ->execute();
    dump($instagram);

    $profile = $instagram->profile()->execute();



    dd($instagram, $response, json_decode((string) $profile->getBody()), 'web');

    return $response;
});

Auth::routes(['verify' => true]);

Route::get('logout')->uses('App\Http\Controllers\Auth\LoginController@logout')->name('auth.logout');

Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::group(['middleware' => 'guest'], function () {
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/')->uses(HomeComponent::class)->name('home');

    Route::get('/settings/social_medias/instagram/new')->uses(NewInstagramComponent::class)->name('settings.social_medias.instagram.new');

    Route::get('/blank-page')->uses(BlankPageComponent::class)->name('blank-page');
});
