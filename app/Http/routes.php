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
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
	
	Route::get('/', 'IndexController@index');
	
	Route::post('login', 'IndexController@postLogin');
	Route::get('logout', 'IndexController@logout');
	 
	Route::get('dashboard', 'DashboardController@index');
	
	Route::get('profile', 'AdminController@profile');	
	Route::post('profile', 'AdminController@updateProfile');	
	Route::post('profile_pass', 'AdminController@updatePassword');

	
	Route::get('settings', 'SettingsController@settings');	
	Route::post('settings', 'SettingsController@settingsUpdates');	
	Route::post('homepage_settings', 'SettingsController@homepage_settings');	
	Route::post('aboutus_settings', 'SettingsController@aboutus_settings');
	Route::post('contactus_settings', 'SettingsController@contactus_settings');
	Route::post('terms_of_service', 'SettingsController@terms_of_service');
	Route::post('privacy_policy', 'SettingsController@privacy_policy');
	Route::post('addthisdisqus', 'SettingsController@addthisdisqus');	
	Route::post('headfootupdate', 'SettingsController@headfootupdate');
	  
	
	Route::get('users', 'UsersController@userslist');	
	Route::get('users/adduser', 'UsersController@addeditUser');	
	Route::post('users/adduser', 'UsersController@addnew');	
	Route::get('users/adduser/{id}', 'UsersController@editUser');	
	Route::get('users/delete/{id}', 'UsersController@delete');	
	
	 
 	Route::get('categories', 'CategoriesController@categories');	
	Route::get('categories/addcategory', 'CategoriesController@addeditCategory'); 
	Route::get('categories/addcategory/{id}', 'CategoriesController@editCategory');	
	Route::post('categories/addcategory', 'CategoriesController@addnew');	
	Route::get('categories/delete/{id}', 'CategoriesController@delete');

	Route::get('subcategories', 'SubCategoriesController@subcategories');	
	Route::get('subcategories/addsubcategory', 'SubCategoriesController@addeditSubCategory'); 
	Route::get('subcategories/addsubcategory/{id}', 'SubCategoriesController@editSubCategory');	
	Route::post('subcategories/addsubcategory', 'SubCategoriesController@addnew');	
	Route::get('subcategories/delete/{id}', 'SubCategoriesController@delete');	
	Route::get('ajax_subcategories/{id}', 'SubCategoriesController@ajax_subcategories');

	Route::get('locations', 'LocationController@locations');	
	Route::get('locations/addlocation', 'LocationController@addeditLocation'); 
	Route::get('locations/addlocation/{id}', 'LocationController@editLocation');	
	Route::post('locations/addlocation', 'LocationController@addnew');	
	Route::get('locations/delete/{id}', 'LocationController@delete');

	Route::get('listings', 'ListingsController@listings');	 
	Route::get('listings/featured_listing/{id}/{status}', 'ListingsController@featured_listing');
	Route::get('listings/status_listing/{id}/{status}', 'ListingsController@status_listing');
	Route::get('listings/delete_listing/{id}', 'ListingsController@delete');

	 
});

// Password reset link request routes...
/*Route::get('admin/password/email', 'Auth\PasswordController@getEmail');
Route::post('admin/password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('admin/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('admin/password/reset', 'Auth\PasswordController@postReset');*/


Route::get('/', 'IndexController@index');

Route::get('about', 'IndexController@about_us');

Route::get('contact', 'IndexController@contact_us');

Route::post('contact_send', 'IndexController@contact_send');

Route::get('about', 'IndexController@about_us');

Route::get('termsandconditions', 'IndexController@termsandconditions');

Route::get('privacypolicy', 'IndexController@privacypolicy');

//Social Login
Route::get('social/login/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('social/login/callback/{provider}', 'Auth\AuthController@handleProviderCallback');

Route::get('login', 'IndexController@login');

Route::post('login', 'IndexController@postLogin');

Route::get('register', 'IndexController@register');

Route::post('register', 'IndexController@postRegister');
 
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('dashboard', 'IndexController@dashboard');

Route::get('profile', 'IndexController@profile');

Route::post('profile', 'IndexController@editprofile');

Route::get('change_pass', 'IndexController@change_password');

Route::post('change_pass', 'IndexController@edit_password');

Route::get('logout', 'IndexController@logout');

Route::get('submit_listing', 'ListingsUserController@submit_listing');

Route::get('ajax_subcategories/{id}', 'ListingsUserController@ajax_subcategories');

Route::get('mylisting', 'ListingsUserController@user_listings');

Route::post('submit_listing', 'ListingsUserController@addnew');

Route::get('submit_listing/{id}', 'ListingsUserController@editlisting');

Route::get('delete_listing/{id}', 'ListingsUserController@delete');

Route::get('listing/galleryimage_delete/{id}', 'ListingsUserController@gallery_image_delete');

Route::get('listings', 'ListingsUserController@listings');

Route::get('listings/{listing_slug}/{id}', 'ListingsUserController@single_listing');

Route::post('submit_review', 'ListingsUserController@submit_review');

Route::post('inquiry_send', 'ListingsUserController@inquiry_send');

Route::get('{category_slug}/{sub_category_slug}/{sub_cat_id}', 'SubCategoriesController@subcategories');

Route::get('{category_slug}/{cat_id}', 'CategoriesController@categories');

Route::post('listings/search', 'ListingsUserController@search_listings');

Route::post('listings/search/filter', 'ListingsUserController@search_filter_listings');

 

/*Route::get('home', ['as' => 'home', 'uses' => function() {
	return view('home');
}]);*/


 
