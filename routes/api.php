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

        //Institution Type Routes
        Route::get('institutiontypes', 'InstitutionTypeController@index');
        Route::get('institutiontypes/{id}', 'InstitutionTypeController@show');
        Route::post('institutiontypes/create', 'InstitutionTypeController@store');
        Route::post('institutiontypes', 'InstitutionTypeController@update');
        Route::delete('institutiontypes/{id}', 'InstitutionTypeController@destory');

        //Level Routes
        Route::get('levels', 'LevelController@index');
        Route::get('levels/{id}', 'LevelController@show');
        Route::post('levels/create', 'LevelController@store');
        Route::post('levels', 'LevelController@update');
        Route::delete('levels/{id}', 'LevelController@destory');

          //Qualification Routes
          Route::get('qualifications', 'QualificationController@index');
          Route::get('qualifications/{id}', 'QualificationController@show');
          Route::post('qualifications/create', 'QualificationController@store');
          Route::post('qualifications', 'QualificationController@update');
          Route::delete('qualifications/{id}', 'QualificationController@destory');

           //Question Routes
           Route::get('questions', 'QuestionController@index');
           Route::get('questions/{id}', 'QuestionController@show');
           Route::post('questions/create', 'QuestionController@store');
           Route::post('questions', 'QuestionController@update');
           Route::delete('questions/{id}', 'QuestionController@destory');

            //Quize Routes
            Route::get('quizes', 'QuizeController@index');
            Route::get('quizes/{id}', 'QuizeController@show');
            Route::post('quizes/create', 'QuizeController@store');
            Route::post('quizes', 'QuizeController@update');
            Route::delete('quizes/{id}', 'QuizeController@destory');

             //State Routes
             Route::get('states', 'StateController@index');
             Route::get('states/{id}', 'StateController@show');
             Route::post('states/create', 'StateController@store');
             Route::post('states', 'StateController@update');
             Route::delete('states/{id}', 'StateController@destory');

              //Subject Routes
              Route::get('subjects', 'SubjectController@index');
              Route::get('subjects/{id}', 'SubjectController@show');
              Route::post('subjects/create', 'SubjectController@store');
              Route::post('subjects', 'SubjectController@update');
              Route::delete('subjects/{id}', 'SubjectController@destory');

               //User Type Routes
               Route::get('usertypes', 'UserTypeController@index');
               Route::get('usertypes/{id}', 'UserTypeController@show');
               Route::post('usertypes/create', 'UserTypeController@store');
               Route::post('usertypes', 'UserTypeController@update');
               Route::delete('usertypes/{id}', 'UserTypeController@destory');
 



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


