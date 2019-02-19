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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','ProductosController@index')->name('productos');
Route::get('descargar-productos-pdf','ProductosController@pdf')->name('productos.pdf');
Route::get('descargar-productos-excel','ProductosController@excel')->name('productos.excel');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/import','ProductosController@cargarexcel')->name('vista-import-excel');
Route::post('/importado','ProductosController@import')->name('import');

Route::get('/grafico','ProductosController@grafico');
