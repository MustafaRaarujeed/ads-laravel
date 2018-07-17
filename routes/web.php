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

// Front Page to display ads (categories and banners)
Route::group(['prefix' => ''], function(){
	Route::get('/', '');
});

// Backend
Route::group(['prefix' => '/mange'], function(){
	// Login
	Route::get('/', '');
	
	// Inside System Group - protected by middleware
	Route::group(['prefix' => '/ads'], function(){
		// View Ads(Categories and Banners)
		Route::get('/', '');
		// Add Category CRUD - protected by middleware
		Route::group(['prefix' => '/cat'], function(){
			// Add
			Route::post('/add', '');
			// Edit
			// Update
			// Delete
			Route::delete('/del/{id}', '');
		});
		// Add Banner CRUD - protected by middleware
		Route::group(['prefix' => '/banner'], function(){
			// Add
			Route::post('/add', '');
			// Edit
			// Update
			// Delete
			Route::delete('/del/{id}', '');
		});
		// Add Admins
		// Add Advertiser
		// Logout
		Route::get('/logout', '');
	});
});