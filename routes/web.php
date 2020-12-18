<?php

use App\Http\Components\BlankPage;
use App\Http\Components\Dashboard;
use App\Http\Controllers\LanguageController;

Auth::routes(['verify' => true]);

Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::group(['middleware' => 'guest'], function() {

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/')->uses(Dashboard::class)->name('home');
    Route::get('/blank-page', BlankPage::class)->name('blank');
});
