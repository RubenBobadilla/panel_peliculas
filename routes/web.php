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

Route::get('/', function () {
    return view('welcome');
});

// GENERALES
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

// PELICULAS
Route::get('/subir-pelicula', 'PeliculaController@crear')->name('pelicula.crear');
Route::post('/pelicula/save', 'PeliculaController@save')->name('pelicula.save');
Route::get('/caratula/file/{filename}', 'PeliculaController@getCaratula')->name('caratula.file');
Route::get('/ultimos/estrenos', 'PeliculaController@caratulaX_Novedades')->name('novedades');
Route::get('/categoriaA/{id}', 'PeliculaController@categoria')->name('categoria.A');
Route::get('/categoriaC/{id}', 'PeliculaController@categoriaC')->name('categoria.C');
Route::get('/categoriaT/{id}', 'PeliculaController@categoriaT')->name('categoria.T');
Route::get('/busc/{search?}', 'PeliculaController@index')->name('pelicula.buscar');
Route::get('/pelicula/{id}', 'PeliculaController@detail')->name('pelicula.detail');


// NOVEDADES
Route::post('/nov/save', 'NovedadController@save')->name('novedad.save');





