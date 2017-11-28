<?php

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/register', 'RegistrationsController@create')->name('register');
Route::post('/register', 'RegistrationsController@store')->name('register');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store')->name('login');
Route::get('/logout', 'SessionsController@destroy')->name('logout');

Route::get('/calendar', function() {return view('calendar.show');})->name('calendar');

Route::get('/recipe/{id}', 'RecipeController@show')->name('recipes');
Route::get('/recipe', 'RecipeController@index')->name('recipes');

Route::post('/recipe/{recipeId}/comment/', 'CommentController@store');
