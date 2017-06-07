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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/cargo', 'Admin\\CargoController');
Route::resource('admin/partido', 'Admin\\PartidoController');
Route::resource('admin/eleicao', 'Admin\\EleicaoController');
Route::resource('admin/candidato', 'Admin\\CandidatoController');
