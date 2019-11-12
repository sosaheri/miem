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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('gestionUsuarios', 'UserController@index')->name('gestionUsuarios');
Route::get('verUsuario/{id}', 'UserController@ver')->name('verUsuario');
Route::post('updateUsuario/{id}', 'UserController@update')->name('updateUsuario');
Route::get('eliminarUsuario/{id}', 'UserController@eliminar');

Route::get('miUsuario/{id}', 'UserController@verPerfil')->name('miUsuario');

Route::post('iniciarFinanciamiento', 'UserController@financiamiento')->name('iniciarFinanciamiento');
Route::post('planillaFinanciamiento', 'FinanciamientoController@llenado')->name('planillaFinanciamiento');
Route::get('checkout/{monto}', 'FinanciamientoController@checkout')->name('checkout');

Route::get('callback', 'FinanciamientoController@callback')->name('callback');

