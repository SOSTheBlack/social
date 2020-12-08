<?php

use App\Http\Components\BlankPage;
use App\Http\Controllers\LanguageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */


// Page Route
Route::get('/', 'App\Http\Controllers\PageController@blankPage');
Route::get('/page-blank', 'App\Http\Controllers\PageController@blankPage');
Route::get('/page-collapse', 'App\Http\Controllers\PageController@collapsePage');

// locale route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Auth::routes(['verify' => true]);

Route::get('/blank-page', BlankPage::class);
