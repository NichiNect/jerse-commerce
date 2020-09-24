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
	Route::get('admin/users', 'UserController@index')->name('admin.users.index');
});