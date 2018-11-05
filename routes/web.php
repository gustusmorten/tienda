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
Route::get('/', 'shopController@index')->name('home');

Route::get('producto/{id}', 'shopController@indexProducto')->name('producto');

Route::resource('shopingCart', 'cartController');
Route::get('shopingCart/{id}/add',['uses' => 'cartController@add','as' => 'shopingCart.add']);
Route::get('shopingCart/{id}/less',['uses' => 'cartController@less','as' => 'shopingCart.less']);
Route::get('shopingCart/{id}/delete',['uses' => 'cartController@delete','as' => 'shopingCart.delete']);
Route::get('shopingCart/{id}/clearCart',['uses' => 'cartController@clearCart','as' => 'shopingCart.clearCart']);
Route::post('shopingCart',['uses' => 'cartController@store','as' => 'shopingCart.store']);


Route::prefix('cliente')->group(function() {
    Route::get('/login', 'Auth\clienteLoginController@showLoginForm')->name('cliente.login');
    Route::post('/login', 'Auth\clienteLoginController@login')->name('cliente.login.submit');

    Route::post('/logout', 'Auth\clienteLoginController@logout')->name('cliente.logout');

    Route::get('/register', 'Auth\clienteRegisterController@showRegisterForm')->name('cliente.register');
    Route::post('/register', 'Auth\clienteRegisterController@register')->name('cliente.register.submit');
});

Route::group(['prefix' => 'admin'], function () {


    Route::get('/', function () {return view('admin.dashboard');});

    Route::resource('cliente', 'clientesController');
    Route::get('cliente/{id}/destroy',['uses' => 'clientesController@destroy','as' => 'cliente.destroy']);

    Route::resource('user', 'usersController');
    Route::get('user/{id}/destroy',['uses' => 'usersController@destroy','as' => 'user.destroy']);

    Route::resource('tienda', 'tiendasController');
    Route::get('tienda/{id}/destroy',['uses' => 'tiendasController@destroy','as' => 'tienda.destroy']);

    Route::resource('producto', 'productosController');
    Route::get('producto/{id}/destroy',['uses' => 'productosController@destroy','as' => 'producto.destroy']);

    Route::resource('venta', 'ventasController');
    Route::get('venta/{id}/destroy',['uses' => 'ventasController@destroy','as' => 'venta.destroy']);
    Route::get('venta/{id}/add',['uses' => 'ventasController@add','as' => 'venta.add']);
    Route::get('venta/{id}/less',['uses' => 'ventasController@less','as' => 'venta.less']);
    Route::get('venta/{id}/delete',['uses' => 'ventasController@delete','as' => 'venta.delete']);
    Route::get('venta/{id}/clearCart',[ 'uses' => 'ventasController@clearCart','as' => 'venta.clearCart']);

});

Auth::routes();

Route::get('/homeAdmin', 'HomeController@index')->name('home.admin');
