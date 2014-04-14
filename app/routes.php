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

// Users must be logged in to access the dashboard
Route::group(array('before' => 'guest'), function() {
	Route::get('/', array('as'=>'users/login', 'uses'=>'UsersController@getLogin'));
});

Route::resource('invoice', 'InvoicesController');
Route::get('forgot/reset/{token}', 'PasswordsController@reset');
Route::post('forgot/reset/{token}', 'PasswordsController@postReset');
Route::resource('forgot', 'PasswordsController');
Route::resource('advertiser', 'AdvertisersController');

Route::controller('users', 'UsersController');
Route::get('dashboard', 'HomeController@getDashboard');

View::composer(['invoices.create', 'invoices.edit', 'invoices.show', 'invoices.index'], function($view)
{
    $user_options = User::select(DB::raw('concat (first_name," ",last_name) as full_name,id'))->lists('full_name', 'id');
	$advertiser_options = Advertiser::all()->lists('advertiser', 'id');
	$size_options = DB::table('invoice_items_sizes')->lists('size', 'id');

    $view->with('user_options', $user_options)
    	 ->with('advertiser_options', $advertiser_options)
    	 ->with('size_options', $size_options);
});