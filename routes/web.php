<?php

/*
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
Route::get('user/{id}', 'UserController@show');
Route::get('passport/{id}', 'UserController@showPassport');

// many to many relation
Route::get('lessons/create', 'UserController@createLessons');
Route::get('lessons/delete', 'UserController@deleteLessons');
Route::get('lessons/{id}', 'UserController@showLessons');

// Insert realtion
Route::get('forums/create', 'UserController@createForum');
// update||delete realation
Route::get('forums/update', 'UserController@updateForum');
Route::get('forums/delete', 'UserController@deleteForum');


Route::get('forums/{id}', 'UserController@showForums');