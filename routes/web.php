<?php

use Illuminate\Support\Facades\Route;


/*
guest routes except authenticate
*/
Route::get('/', function(){
	return redirect()->route('login');
});

//login routes
Route::get('/login', 'Auth\VendorLogin@login_form')->name('login');
//Route::get('vendor/login', function(){ return redirect()->route('login'); });
Route::post('vendor/login', 'Auth\VendorLogin@login')->name('vendor.login.post');

//logout routes
Route::get('logout', function(){ return abort(404); });
Route::post('logout', 'Auth\VendorLogout@logout')->name('logout');

//reset password
Route::get('reset/passoword/{token?}/{email?}', 'Auth\ForgotPassword@pass_reset_form')->name('resetPassForm.get');
Route::post('send/pass-reset/link', 'Auth\ForgotPassword@send_reset_link')->name('sendPassResetLink.post');
Route::post('reset/passoword', 'Auth\ForgotPassword@password_reset_post')->name('passwordReset.post');




/*
authenticate routes for vendors with vendor Middleware
All authenticate routes will go here
*/
Route::group(['as'=>'vendor.', 'prefix'=>'vendor', 'middleware' => ['vendorMW']], function(){
	//vendor controller
	Route::resource('vendors', 'Vendor\VendorController');
	Route::get('dashboard', 'Vendor\VendorController@dashboard')->name('dashboard.get');
	Route::get('profile', 'Vendor\VendorController@profile')->name('profile.get');
	Route::post('vendor-password','Vendor\VendorController@update_vendor_pass')->name("passUpdate.post");
	// add product ..

});


Route::get('add-product',function(){
	return view("vendors.product.addproduct");
});

Route::get("/enventory",function(){
	return view("vendors.enventory");
});




/*
Route::prefix('vendor')->group(function (){

	Route::get('/login','VendorController@vendor_login_form')->name('vendor.loginForm.get');
	Route::post('/login','VendorController@vendor_login');
	Route::post('/logout','VendorController@logout');
	Route::get('/registration','VendorController@register');
	Route::post('/registration','VendorController@vendor_register');

	
	
	Route::get('/profile','VendorController@profile_setup');
	Route::post('/profile_setup','VendorController@post_profile');
	Route::post('/profile_setup_address','VendorController@post_addresses');
	Route::post('/profile_setup_business','VendorController@post_business');
	Route::post('/bank_details','VendorController@post_bank');

	// Category Routes
	Route::get('/create-category','CategoryController@category_view');
	Route::post('/create-category','CategoryController@create_category');
	// Slider Routes
	Route::get('/create-slider','CategoryController@slider_view');
	Route::post('/create-slider','CategoryController@create_slider');

});
*/