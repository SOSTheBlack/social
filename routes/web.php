<?php

use App\Http\Components\BlankPageComponent;
use App\Http\Components\HomeComponent;
use App\Http\Components\Settings\SocialMedias\Instagram\NewInstagramComponent;
use App\Http\Controllers\LanguageController;
use GuzzleHttp\Client;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Facades\Http;
use InstagramScraper\Instagram;
use Phpfastcache\Helper\Psr16Adapter;

Route::get('/test', function () {
    $instagram = Instagram::withCredentials(new Client(), 'buzzinasocial', '250863', app(Repository::class));
    dump($instagram->login());

//    $responseHome = Http::get('https://www.instagram.com');
//
//    preg_match('/"csrf_token":"(.*?)"/', $responseHome->body(), $match);
//    $csrfToken = isset($match[1]) ? $match[1] : '';
//
//    $cookies = collect($responseHome->cookies()->toArray());
//    // "ig_cb=1; csrftoken=upElvCOYH2uMNLnJq4Hip3OB5CuDvVL5; mid=YDJfpgAEAAHUMvVTdltYj6v3coBk"
//
//    $cookieString = 'ig_cb=1';
//    $cookieArray = ['ig_cb' => 1];
//


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
    
    dd(collect($post->cookies()->toArray())->implode('Name', '; '));

    $headers = [
        'cookie'      => $cookieString,
        'referer'     => 'https://www.instagram.com/',
        'x-csrftoken' => $csrftoken,
        //        'X-CSRFToken' => $csrftoken,
        'user-agent'  => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36',
    ];

    $account = Http::asForm()
        ->withHeaders($headers)
        ->post('https://www.instagram.com/lilitrancas_boxbraids/?__a=1');

    dd($headers, (string) $account->body());
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
