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
    return view('welcome');
});



	Route::post('upstream','ShareController@upStream');

	Route::post('store','ShareController@store');

	Route::get('sindex','ShareController@index');


Route::get('mindex','ShareController@mindex');
Route::post('downstream','ShareController@downStream');

	Route::get('allcontacts','ShareController@allcontacts');




Route::post('tokenupdate','ShareController@tokenUpdate');

Route::post('SecondaryIdUpdate','ShareController@SecondaryIdUpdate');




