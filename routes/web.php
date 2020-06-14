<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes(['verify' => true]);

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/cp', 'middleware' => ['auth']], function() {
    Route::get('{path?}', function() {
        return view('cp');
    })->where('path', '[\/\w\.-]*');
});

// Users Routes
Route::group(['prefix' => '/json/v1', 'namespace' => 'Admin'], function() {
    Route::resource('/users', 'UserController');
});

Route::group(['prefix' => '/json/v1', 'middleware' => ['auth']], function() {
    Route::get('country', 'CountryController@getAllCountries');
    Route::post('country', 'CountryController@store');
    Route::get('country/{id}/edit', 'CountryController@edit');
    Route::put('country/{id}', 'CountryController@update');
});
