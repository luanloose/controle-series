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

//Login
Auth::routes();


//Posts
Route::post('/series/criar', 'SeriesController@store')->middleware('autenticador');
Route::post('/series/{id}/editaNome', 'SeriesController@editaNome')->middleware('autenticador');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->middleware('autenticador');
Route::post('/entrar', 'EntrarController@entrar');
Route::post('/registrar', 'RegistroController@store');

//Get
Route::get('/series', 'SeriesController@index')->name('listar_series');
Route::get('/series/criar', 'SeriesController@create')->name('form_criar_serie')->middleware('autenticador');
Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');
Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/entrar', 'EntrarController@index')->name('entrar');
Route::get('/registrar', 'RegistroController@create');
Route::get('/sair', 'EntrarController@sair');


//Delete
Route::delete('/series/{id}', 'SeriesController@destroy');


