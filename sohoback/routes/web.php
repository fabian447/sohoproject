<?php

use GuzzleHttp\Middleware;
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

Route::get('/', 'ProjectController@index')->name('projects.index');

Auth::routes();

Route::prefix('admin')->middleware('auth')->group( function(){

	Route::get('/projects', 'ProjectController@index')->name('projects.index');
	Route::post('/projects', 'ProjectController@store')->name('projects.store');
	Route::get('/projects/{id}/edit', 'ProjectController@edit')->name('projects.edit');
	Route::put('/projects/{id}', 'ProjectController@update')->name('projects.update');
	Route::get('/projects/{id}/destroy', 'ProjectController@destroy')->name('projects.destroy');

});
