<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Http\Controllers\WelcomeController;

Route::get('/', 'WelcomeController@index');
Route::get('/lookup/{entry}', 'WelcomeController@lookup');
Route::get('/search/{term}', 'WelcomeController@search');
