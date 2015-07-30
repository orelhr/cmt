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

Route::get('/', 'HomeController@index');
Route::get('/contact', 'WelcomeController@Contact');
Route::get('/about', 'PagesController@about');
Route::get('/pages/directory','PagesController@directory');
Route::get('/home', 'HomeController@index');

Route::resource('equipment','EquipmentController');
Route::resource('perfil','PerfilController');
Route::resource('auto','AutoController');

// Directorios ruteo
Route::get('/directory/countries','DirectoryController@countries');
Route::get('/directory/states/{id}','DirectoryController@states');
Route::get('/directory/cities/{id}','DirectoryController@cities');
Route::get('/directory/locations/{id}','DirectoryController@locations');
Route::get('/directory/dependency/{id}','DirectoryController@dependency');
Route::get('/directory/characterByDailyId/{id}','DirectoryController@characterByDailyId');
Route::get('/directory/locationByDailyId/{id}','DirectoryController@locationByDailyId');

// ruteo asignacion de equipo

Route::get('/manage/index/{id}', 'ManageController@index');

// ruteo de evaluación y control

Route::get('/monitoring/showappointment/{id}','MonitoringController@show');

Route::patch('/monitoring/update/{name}/{id}','MonitoringController@update');
Route::get('/monitoring/editappointment/{id}','MonitoringController@edit');
Route::get('/monitoring/week/{id}','MonitoringController@week');
Route::get('/monitoring/createappointment/{name}/{id}','MonitoringController@createappointment');
Route::post('/monitoring/store/{name}/{id}','MonitoringController@store');
Route::get('/monitoring/{name?}','MonitoringController@index');

// ruteo maps
Route::get('/maps','MapsController@index');
Route::get('/maps/getLocations/{date?}', 'MapsController@getLocations');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



