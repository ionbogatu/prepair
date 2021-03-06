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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', 'UserController@login');
Route::get('/flights', 'UserController@flights');
Route::get('/profile', 'UserController@profile');
Route::get('/statistics', 'UserController@statistics');

Route::auth();

Route::post('/flights', 'UserController@searchForFlights');
Route::post('/loadAirportsList', 'UserController@loadAirportsList');
Route::post('/loadAllAirportsList', 'UserController@loadAllAirportsList');
Route::post('/loadAllAirlinesList', 'UserController@loadAllAirlinesList');
Route::post('/loadAllRoutesList', 'UserController@loadAllRoutesList');
Route::post('/deletePreference', 'UserController@deletePreference');
Route::post('/addPreferences', 'UserController@addPreferences');
Route::post('/updatePersonalInformation', 'UserController@updatePersonalInformation');
Route::post('/getUserByFBId', 'UserController@getUserByFBId');
Route::post('/linkWithFacebook', 'UserController@linkWithFacebook');
Route::post('/get-user-location', 'UserController@getUserLocation');

/* REST API */

Route::group(['namespace' => 'Api', 'prefix' => 'api'], function(){
    Route::get('/', 'ApiController@index');
});

/* Administration part */

Route::group(['namespace' => 'Admin', 'prefix' => 'admins', 'middleware' => 'admin'], function(){
    Route::get('/', ['as' => 'admin_index', 'uses' => 'AdminController@index']);
    Route::get('/db/import', 'AdminController@dbImport');
    Route::get('/event/create', 'AdminController@createEvent');
});

/* Testing */

Route::get('/test/weather', 'TestController@testWeather');
Route::get('/googleapi', function(){
    return view('test');
});