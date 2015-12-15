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


Route::get('/', [ 'middleware' => 'guest', function () 
{
	$title = "Welcome to Skinner Supply";
    return view('welcome')->with(compact('title'));
}]);

// Authentication routes...
Route::get('auth/login', ['as' => 'getLogin'  , 'uses' => 'Auth\AuthController@getLogin' ]);
Route::post('auth/login',['as' => 'postLogin' , 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout',['as' => 'getLogout' , 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', ['as' => 'getRegister' , 'uses' => 'Auth\AuthController@getRegister' ]);
Route::post('auth/register',['as' => 'postRegister', 'uses' => 'Auth\AuthController@postRegister']);

// admin side
Route::get('home', [ 'as' => 'home', 'uses' => 'AdminController@index']);
Route::post('home/customer',['as' => 'addCustomer', 'uses' => 'AdminController@addCustomer']);
Route::post('home/product' ,['as' => 'addProduct', 'uses' => 'AdminController@addProduct']);
Route::post('home/invoice' ,['as' => 'addCashInvoice' , 'uses' => 'AdminController@addCashInvoice' ]);


Route::post('testAjax' , 'AdminController@test');
Route::post('getItem' ,  'AdminController@getItem');
Route::get('getAllItem' , 'AdminController@listProduct');



