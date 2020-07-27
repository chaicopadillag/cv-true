<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

App::setLocale('es');

Route::get('/', function () {
    return view('modulos.inicio');
})->name('inicio');

Auth::routes()
;
Route::get('/perfil', 'UsuariosController@edit')->name('perfil');
Route::resource('usuarios', 'UsuariosController');
Route::resource('estudios', 'EstudiosController');

//rutas estaticas
Route::view('/acerca-de-cv-true', 'estaticas.cv-true')->name('acerca-de');
Route::view('/ayuda', 'estaticas.preguntas-frecuentes')->name('ayuda');
Route::view('/aviso-legal', 'estaticas.aviso-legal')->name('aviso-legal');
Route::view('/politicas-de-privacidad', 'estaticas.politicas-de-privacidad')->name('politicas-de-privacidad');
Route::view('/politicas-de-cookies', 'estaticas.politicas-de-cookies')->name('politicas-de-cookies');
