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
	
	// Front end ads display
	Route::get('/', 'AdsController@index');
});

// Backend
Route::group(['prefix' => '/manage'], function(){
	
	// Login
	Route::get('/', 'ManageAuthController@login');
	
	// Inside System Group - protected by middleware
	Route::group(['prefix' => '/ads'], function(){

		// View Ads(Categories and Banners)
		Route::get('/', 'ManageAdsController@index');
		
		// Add Category CRUD - protected by middleware
		Route::group(['prefix' => '/cat'], function(){
			// Add
			Route::post('/add', 'ManageAdsController@catAdd');
			// Edit
			// Update
			// Delete
			Route::delete('/del/{id}', 'ManageAdsController@catDelete');
		});
		
		// Add Banner CRUD - protected by middleware
		Route::group(['prefix' => '/banner'], function(){
			// Add
			Route::post('/add', 'ManageAdsController@bannerAdd');
			// Edit
			// Update
			// Delete
			Route::delete('/del/{id}', 'ManageAdsController@bannerDelete');
		});
		
		// Add Admins
		
		// Add Advertiser
		
		// Logout
		Route::get('/logout', 'ManageAuthController@logout');
	});
});