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
Route::get('storage/{archivo}', function ($archivo) {
    $public_path = public_path();
    $url = $public_path.'/cedulones/'.$archivo;
    //verificamos si el archivo existe y lo retornamos
    if (Storage::exists($archivo))
    {
      return response()->download($url);
    }
    //si no se encuentra lanzamos un error 404.
    abort(404);

});
