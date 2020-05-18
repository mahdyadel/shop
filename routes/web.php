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
//FrontEnd Routes.....................
Route::get('/', 'Front\HomeController@index');
//User Registretion
Route::get('/user/register', 'Front\RegistrationController@index');
Route::post('/user/register', 'Front\RegistrationController@store');
Route::get('/user/profile', 'Front\ProfileController@index');
Route::get('/user/order/{id}', 'Front\ProfileController@show');


//User Login
Route::get('/user/login' , 'Front\SessionsController@index');
Route::post('/user/login' , 'Front\SessionsController@store');

//User Logout
Route::get('/user/logout' , 'Front\SessionsController@logout');

//cart
 Route::get('/cart' , 'Front\CartController@index');
 Route::post('/cart' , 'Front\CartController@store')->name('cart');
 Route::patch('/cart/update/{product}' , 'Front\CartController@update')->name('cart.update');
 Route::delete('/cart/remove/{product}' , 'Front\CartController@destroy')->name('cart.destroy');
 Route::post('/cart/saveLater/{product}' , 'Front\CartController@saveLater')->name('cart.saveLater');
 Route::post('/cart/moveToCart/{product}' , 'Front\CartController@movecart')->name('cart.movecart');

//Check out
 Route::get('/checkout' , 'Front\CheckoutController@index')->name('cart.checkout');
 Route::post('/checkout' , 'Front\CheckoutController@store')->name('checkout');



 Route::get('/empty' , function(){
 	Cart::instance('default')->destroy();
 });





















//BackEnd Routes...........................
//Admin Routes
Route::prefix('admin')->group(function(){

Route::get('/dashboard' , 'DashboardController@index');
Route::get('/logout' , 'AdminController@logout');



// Route Order
Route::resource('/orders' , 'OrderController');
Route::get('/confirm/{id}' , 'OrderController@confirm')->name('order.confirm');
Route::get('/pending/{id}' , 'OrderController@pending')->name('order.pending');
Route::get('/details/{id}' , 'OrderController@details')->name('order.details');

//Route Users
Route::resource('/users' , 'UserController');
Route::get('/details/{id}' , 'UserController@show')->name('user.details');

//Route Products
Route::resource('/products' , 'ProductController');

//Amin login
Route::get('/login' , 'AdminController@index');
Route::post('/login' , 'AdminController@store');

});




