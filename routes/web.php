<?php

use App\Http\Components\BlankPageComponent;
use App\Http\Components\HomeComponent;
use App\Http\Components\Settings\SocialMedias\Instagram\NewInstagramComponent;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Http;
use Phpfastcache\Helper\Psr16Adapter;

Route::get('test', function () {
//    $instagramApi = new App\SocialMedias\Instagram\Instagram();
//
//    dd($instagramApi->auth()->login('buzzinasocial', '250863'));

    dd(
        app(\App\Repositories\Contracts\SocialMediaRepository::class)->findWhereOrFail(['slug' => 'instagram'])
    );
});

Route::get('/test-ok', function () {
    $csrftoken = md5(uniqid());
    $headers = [
        'referer'     => 'https://www.instagram.com/',
        'x-csrftoken' => $csrftoken,
        //        'X-CSRFToken' => $csrftoken,
        'user-agent'  => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36',
    ];

    $post = Http::asForm()
        ->withHeaders($headers)
        ->post('https://www.instagram.com/accounts/login/ajax/', ['username' => 'buzzinasocial', 'enc_password' => '#PWD_INSTAGRAM_BROWSER:0:'.time().':'.'250863']);

    dump((string) $post->body());

    $cookieString = '';
    foreach (collect($post->cookies()->toArray()) as $cookie) {
        $cookieString .= vsprintf('; %s=%s', [$cookie['Name'], $cookie['Value']]);
        $cookieArray[$cookie['Name']] = $cookie['Value'];
    }

    $headers = [
        'cookie'      => $cookieString,
        'referer'     => 'https://www.instagram.com/',
        'x-csrftoken' => $csrftoken,
        //        'X-CSRFToken' => $csrftoken,
        'user-agent'  => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36',
    ];

    $account = Http::asForm()
        ->withHeaders($headers)
        ->get('https://www.instagram.com/lilitrancas_boxbraids/?__a=1');

    dd($headers, json_decode($account->body()));
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
