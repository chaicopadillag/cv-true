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

// TODO: rutas de dashboard
Route::get('/', function () {
    return view('modulos.inicio');
})->name('inicio');
Auth::routes();
Route::get('perfil', 'UsuarioController@edit')->name('perfil');
Route::get('configuracion', 'UsuarioController@EditConfig')->name('config');
Route::put('configuracion/{id}', 'UsuarioController@updateconfig')->name('updateconfig');
Route::resource('usuarios', 'UsuarioController');
Route::resource('estudios', 'EstudioController');
Route::resource('experiencias', 'ExperienciaController');
Route::resource('habilidades', 'HabilidadController');
Route::resource('proyectos', 'ProyectoController');
Route::resource('contactos', 'ContactoController');
Route::resource('software', 'SoftwareController');

//TODO: rutas de cv's
Route::get('cv-card/{url?}', 'CvController@CvCard')->where('url', '[a-z]+')->name('cv-card');
Route::get('cv-material/{url?}', 'CvController@Material')->where('url', '[a-z]+')->name('cv-material');
Route::get('cv-moderno/{url?}', 'CvController@Moderno')->where('url', '[a-z]+')->name('cv-moderno');
Route::get('cv-dark/{url?}', 'CvController@Dark')->where('url', '[a-z]+')->name('cv-dark');
Route::get('cv-clasica/{url?}', 'CvController@Clasica')->where('url', '[a-z]+')->name('cv-clasica');
Route::get('cv-gray/{url?}', 'CvController@Gray')->where('url', '[a-z]+')->name('cv-gray');

//FIXME: ruta directo cv user
Route::get('/{url}', 'CvController@UrlDirecto')->where('url', '[a-z]+')->name('url-directo');

//TODO: rutas estaticas
Route::view('acerca-de-cv-true', 'estaticas.cv-true')->name('acerca-de');
Route::view('ayuda', 'estaticas.preguntas-frecuentes')->name('ayuda');
Route::view('aviso-legal', 'estaticas.aviso-legal')->name('aviso-legal');
Route::view('politicas-de-privacidad', 'estaticas.politicas-de-privacidad')->name('politicas-de-privacidad');
Route::view('politicas-de-cookies', 'estaticas.politicas-de-cookies')->name('politicas-de-cookies');
