<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
 */

Route::get('/', function()
{
	return View::make('head');
});

//Route::resource('users', 'UsersController');
Route::get('users/index', array('before'=> 'csrf_json','uses'=>'UsersController@index'));
Route::get('users/show/{aicher}', array('before'=> 'csrf_json','uses'=>'UsersController@show'));
Route::post('users/store', array('before'=> 'csrf_json','uses'=>'UsersController@store'));
Route::post('users/update', array('before'=> 'csrf_json','uses'=>'UsersController@update'));
//Route::resource('session', 'SessionsController');
Route::post('/auth/login', array('before'=> 'csrf_json', 'uses'=> 'AuthController@login'));

