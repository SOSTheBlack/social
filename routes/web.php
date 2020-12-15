<?php

use App\Http\Components\BlankPage;
use App\Http\Controllers\LanguageController;

Auth::routes(['verify' => true]);

Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::group(['middleware' => 'guest'], function() {

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'App\Http\Controllers\PageController@blankPage')->name('home');
    Route::get('/dashboard', 'App\Http\Controllers\PageController@blankPage')->name('dashboard');
    Route::get('/blank-page', BlankPage::class)->name('blank');
});
