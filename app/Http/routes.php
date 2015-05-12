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

Route::get('/', 'WelcomeController@index');
Route::get('/contact', 'WelcomeController@Contact');
Route::get('/about', 'PagesController@about');
Route::get('/pages/directory','PagesController@directory');
Route::get('/home', 'HomeController@index');

Route::resource('equipment','EquipmentController');
Route::resource('perfil','PerfilController');
Route::resource('auto','AutoController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



