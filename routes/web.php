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
    return view('dashboard');
});

Auth::routes(['verify' => true]);

//Auth::routes(['register' => false]);

 //Route::get('/home', 'HomeController@index')->name('home');




Route::middleware(['auth'])->group(function(){

    //Answer Routes
   Route::get('answers', 'AnswerController@index');
   Route::get('answers/{id}', 'AnswerController@show')->name('answers.show');
   Route::get('answers/create','AnswerController@create')->name('answers.create');
   Route::post('answers/create', 'AnswerController@store')->name('answers.store');
   Route::post('answers', 'AnswerController@update')->name('answers.update');
   Route::delete('answers/{id}', 'AnswerController@destory')->name('answers.destory');
   //City Routes
   Route::get('cities', 'CityController@index');
   Route::get('cities/{id}', 'CityController@show')->name('cities.show');
   Route::get('cities/create','CityController@create')->name('cities.create');
   Route::post('cities/create', 'CityController@store')->name('cities.store');
   Route::post('cities', 'CityController@update')->name('cities.update');
   Route::delete('cities/{id}', 'CityController@destory')->name('cities.destory');

   //Country Routes
   Route::get('countries', 'CountryController@index');
   Route::get('countries/{id}', 'CountryController@show')->name('countries.show');
   Route::get('countries/create','CountryController@create')->name('countries.create');
   Route::post('countries/create', 'CountryController@store')->name('countries.store');
   Route::post('countries', 'CountryController@update')->name('countries.update');
   Route::delete('countries/{id}', 'CountryController@destory')->name('countries.destory');

    //Level Routes
    Route::get('levels', 'LevelController@index');
    Route::get('levels/{id}', 'LevelController@show')->name('levels.show');
    Route::get('levels/create','LevelController@create')->name('levels.create');
    Route::post('levels/create', 'LevelController@store')->name('levels.store');
    Route::post('levels', 'LevelController@update')->name('levels.update');
    Route::delete('levels/{id}', 'LevelController@destory')->name('levels.destory');

     //Question Routes
     Route::get('questions', 'QuestionController@index');
     Route::get('questions/{id}', 'QuestionController@show')->name('questions.show');
     Route::get('questions/create','QuestionController@create')->name('questions.create');
     Route::post('questions/create', 'QuestionController@store')->name('questions.store');
     Route::post('questions', 'QuestionController@update')->name('questions.update');
     Route::delete('questions/{id}', 'QuestionController@destory')->name('questions.destory');
      //State Routes
      Route::get('states', 'StateController@index');
      Route::get('states/{id}', 'StateController@show')->name('states.show');
      Route::get('states/create','StateController@create')->name('states.create');
      Route::post('states/create', 'StateController@store')->name('states.store');
      Route::post('states', 'StateController@update')->name('states.update');
      Route::delete('states/{id}', 'StateController@destory')->name('states.destory');

       //Subject Routes
       Route::get('subjects', 'SubjectController@index');
       Route::get('subjects/{id}', 'SubjectController@show')->name('states.show');
       Route::get('subjects/create','SubjectController@create')->name('states.create');
       Route::post('subjects/create', 'SubjectController@store')->name('states.store');
       Route::post('subjects', 'SubjectController@update')->name('states.update');
       Route::delete('subjects/{id}', 'SubjectController@destory')->name('states.destory');

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);
Auth::routes();
