<?php

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

Route::get('/', 'pagesController@home');
Route::get('/signin', 'pagesController@signin');

Route::get('/forgot', function () {
		return view('forgot');
});

//admin dashboard
Route::get('/admin', function () {
		return view('/admin/home');
})->middleware('admin'); //Enable Admin middleware by removing comment around "->middleware('admin')"

// return error 404 page
Route::get('/404', function(){
	return view('404');
});

Route::get('/about', function(){
	return view('about');
});

Route::get('/banks', 'BanksController@banks');

//Route::view('/balance', 'get-wallet');

//Route::view('/balance', 'get-wallet');
Route::get('/transfer', 'pagesController@transfer');

Route::get('/balance', 'pagesController@balance');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	// Handles Transfers
	Route::get('/dashboard', 'UsersController@index')->name('dashboard');
	Route::get('/dashboard/transfer', 'UsersController@transfer')->name('transfer');
	Route::post('/dashboard/transfer', 'UsersController@processTransfer');

	// Transaction histories
	Route::get('/dashboard/history', 'UsersController@history');

	// Wallet Funding
	Route::post('/dashboard/fundwallet', 'UsersController@processFundWallet');
	Route::get('/dashboard/fundwallet', 'UsersController@fundWallet')->name('fundwallet');
});


Route::group(['middleware' => ['auth', 'admin']], function() {


	Route::get('/admin', 'AdminController@index');

	// Set rules that users will transfer with
	Route::get('/admin/setrule', 'AdminController@setRule');
	Route::post('/admin/setrule', 'AdminController@saveRule');

	// New Rule Creation
	Route::get('/admin/createrule', 'AdminController@createRule');
	Route::post('/admin/createrule', 'AdminController@saveNewRule');

	// Edit Company Details
	Route::get('/admin/setting', 'AdminController@settings');
});


//Route::group(['middleware' => ['auth']])
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/banks', 'BanksController@banks');

Route::get('/ball', function() {

});

Auth::routes();
