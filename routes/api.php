<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
   
    Route::get('register', 'Auth\RegisterController@index')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    

    


    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

    //Profile Routes
    Route::get('profiles', 'ProfileController@index');
    Route::get('profiles/{id}', 'ProfileController@show');
    Route::post('profiles/create', 'ProfileController@store');
    Route::post('profiles', 'ProfileController@update');
    Route::delete('profiles/{id}', 'ProfileController@destory');

     //City Routes
     Route::get('cities', 'CityController@index');
     Route::get('cities/{id}', 'CityController@show');
     Route::post('cities/create', 'CityController@store');
     Route::post('cities', 'CityController@update');
     Route::delete('cities/{id}', 'CityController@destory');

     //Country Routes
     Route::get('countries', 'CountryController@index');
     Route::get('countries/{id}', 'CountryController@show');
     Route::post('countries/create', 'CountryController@store');
     Route::post('countries', 'CountryController@update');
     Route::delete('countries/{id}', 'CountryController@destory');

      //Degree Routes
      Route::get('degrees', 'DegreeController@index');
      Route::get('degrees/{id}', 'DegreeController@show');
      Route::post('degrees/create', 'DegreeController@store');
      Route::post('degrees', 'DegreeController@update');
      Route::delete('degrees/{id}', 'DegreeController@destory');

       //Institution Routes
       Route::get('institutions', 'InstitutionController@index');
       Route::get('institutions/{id}', 'InstitutionController@show');
       Route::post('institutions/create', 'InstitutionController@store');
       Route::post('institutions', 'InstitutionController@update');
       Route::delete('institutions/{id}', 'InstitutionController@destory');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


