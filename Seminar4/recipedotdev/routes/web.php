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

// Default
Route::get('/', 'HomeController@index')->name('home');

// Registration
Route::get('/register', 'RegistrationsController@show')->name('register');
Route::post('/register', 'RegistrationsController@store')->name('register');

// Session
Route::get('/login', 'SessionsController@show')->name('login');
Route::post('/login', 'SessionsController@store')->name('login');
Route::post('/logout', 'SessionsController@destroy')->name('logout');

// Calendar
Route::get('/calendar', function() {
    return view('calendar.show');
})->name('calendar');

// Recipes
Route::get('/recipe/{id}', 'RecipeController@show')->name('recipes');
Route::get('/recipe', 'RecipeController@index')->name('recipes');

// Comments
Route::post('/recipe/{recipeId}/comment/{commentId}', 'CommentController@destroy');
Route::post('/recipe/{recipeId}/comment/', 'CommentController@store')->name('comments');
Route::get('/recipe/{recipeId}/comment/', 'CommentController@index')->name('comments');