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
	
	Route::get('login/github', 'ManageSocialAuthController@redirectToProvider')->name('login.github');
	Route::get('login/github/callback', 'ManageSocialAuthController@handleProviderCallback');

	// Login
	Route::get('/', 'ManageAuthController@login')->name('login.get');
	Route::post('/', 'ManageAuthController@postLogin')->name('login.post');
	// Inside System Group - protected by middleware
	Route::group(['prefix' => '/ads', 'middleware' => 'managerAdmin'], function(){

		// View Ads(Categories and Banners)
		Route::get('/', 'ManageAdsController@index')->name('ads.index');
		
		// Add Category CRUD - protected by middleware
		Route::group(['prefix' => '/cat'], function(){
			// Add View
			Route::get('/add', 'ManageAdsController@catIndex')->name('cat.getAdd');
			// Add Post
			Route::post('/add', 'ManageAdsController@catAdd')->name('cat.postAdd');
			// Edit
			Route::get('/edit/{id}', 'ManageAdsController@catEdit')->name('cat.edit');
			// Update
			Route::post('/edit/{id}', 'ManageAdsController@catUpdate')->name('cat.update');
			// Delete
			Route::delete('/del/{id}', 'ManageAdsController@catDelete')->name('cat.delete');
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
		Route::get('/logout', 'ManageAuthController@logout')->name('logout');
	});
});