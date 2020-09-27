<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::livewire('/', 'home')->name('home');
Route::livewire('/products', 'product-index')->name('products.index');
Route::livewire('/products/liga/{ligaID}', 'product-liga')->name('products.liga');
Route::livewire('/products/{id}', 'product-detail')->name('products.detail');
Route::livewire('/keranjang', 'keranjang')->name('keranjang');
Route::livewire('/checkout', 'checkout')->name('checkout')->middleware('auth');
Route::livewire('/history', 'history')->name('history')->middleware('auth');
Route::livewire('/user/profile/{id}', 'user.user-profile')->name('user.profile');


Route::namespace('Admin')->middleware('auth')->group(function() {
	Route::get('admin/dashboard', 'DashboardController@index')->name('admin.dashboard');
	// users 
	Route::middleware('auth')->group(function() {
		Route::get('admin/users', 'UserController@index')->name('admin.users.index');
		Route::get('/admin/users/tambah-user-baru', 'UserController@create')->name('admin.users.create');
		Route::post('/admin/users/store', 'UserController@store')->name('admin.users.store');
		Route::get('/admin/users/{user}/edit', 'UserController@edit')->name('admin.users.edit');
		Route::patch('/admin/users/{user}/update', 'UserController@update')->name('admin.users.update');
		Route::delete('/admin/users/{id}/delete', 'UserController@destroy')->name('admin.users.delete');
		Route::get('/admin/users/{user}/show', 'UserController@show')->name('admin.users.show');
		Route::get('/admin/users/{user}/change-password', 'UserController@changepassword')->name('admin.users.changepassword');
		Route::put('/admin/users/{user}/changepassword', 'UserController@putChangePassword')->name('admin.users.putchangepassword');
		Route::get('admin/get-all-users/ajax', 'UserController@getAllUsers')->name('admin.users.getajax');
		Route::get('admin/get-role-admin/ajax', 'UserController@getAdminRoleUsers')->name('admin.users.getajaxadmin');
		Route::get('admin/get-role-user/ajax', 'UserController@getUserRoleUsers')->name('admin.users.getajaxuser');
	});
});