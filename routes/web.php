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
//control
Route::get('popup-dont-show', function(){return abort(404);});
Route::post('popup-dont-show', 'Popup\PopupController@dont_show')->name('popUpDontShow.post');


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
	
	// deals
	Route::resource('deals','Deal\DealController');
	Route::get('ajax-get-deals-product/fetch','Deal\DealController@get_products');
	Route::get('delete-deal/{id}','Deal\DealController@delete_deal')->name('deals.deleteDeal');

	//products
	Route::get('add-new-product','product\ProductController@index')->name('addNewProduct.get');
	Route::post('add-product-images/{product_image_id}','product\ProductController@addProductImages');
	Route::get('ajax-get-category/fetch','product\ProductController@getCategories');
	Route::get('ajax-get-category-customfields/fetch','product\ProductController@getCustomFields');

	Route::get('ajax-get-category-warranty/fetch','product\ProductController@getWarranty');
	Route::get('ajax-get-variant-options/fetch','product\ProductController@getVariationsOptions');
	Route::get('ajax-get-secondvariant-options/fetch','product\ProductController@getSecondVariationsOptions');
	Route::get('ajax-get-variant-options-options/fetch','product\ProductController@getThirdVariationsOptions');
	Route::post('add-product','product\ProductController@addProduct');
	Route::post('delete-product-image','product\ProductController@removeProductImage');
	Route::post('products/sku_combination','product\ProductController@skuCombinations')->name('products.sku_combination');

	//add existing product
	Route::get('search-existing-products', 'product\ProductController@search_existing_product')->name("searchExistingProduct.get");
	Route::get('ajax-search-existing-products/fetch', 'product\ProductController@ajax_fetch_existing_products')->name("searchExistingProduct.ajaxPgination");
	Route::get('view-existing-product/{vendor_products_tbl_id}', 'product\ProductController@view_existing_product')->name("viewExistingProduct.get");
	Route::post('save-existing-product/{vendor_products_tbl_id}', 'product\ProductController@save_existing_product')->name("saveExistingProduct.post");

	//pending routes
	Route::get('products/pending','product\ProductController@get_pending')->name('pendingProducts.get');
	Route::get('product/detail/{id}','product\ProductController@product_details')->name('productDetails.get');
	Route::get('ajax-get-products/fetch','product\ProductController@fetch_data')->name('products.ajaxPgination');


	Route::get("/inventory", "Inventory\InventoryController@inventory_page")->name('inventory.page.get');
	Route::post("/inventory/update", "Inventory\InventoryController@update_inventory_data")->name('updateInventoryData.post');
	Route::get("/inventory-ajax-paginate/fetch", "Inventory\InventoryController@ajax_fetch_data")->name('inventory.ajaxPgination');

	//orders
	Route::resource('orders', 'order\OrderController');
	Route::get('ajax-orders/fetch', 'order\OrderController@fetch_orders_list')->name('orders.ajaxPgination');
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