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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/create', 'HomeController@createPublication')->name('publication.create'); // link to create post method
Route::get('/publication/{publication}', 'HomeController@editPublication')->name('publication.edit'); // link to edit a post
Route::put('/publication/{publication}', 'HomeController@updatePublication')->name('publication.update'); // link to store the changes
Route::delete('/publication/{publication}', 'HomeController@deletePublication')->name('publication.delete'); // link to delete the post