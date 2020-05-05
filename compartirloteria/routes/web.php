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


Route::get('/login',function(){
	return view('auth.login');
});
Route::redirect('/grupo','/login');
Route::redirect('/home','/');
Route::get('/grupo/{id}','GrupoController@getShow')->middleware('auth');
Route::get('/grupo/{id}','GrupoController@getUsers')->middleware('auth');


Route::get('/user','GrupoController@addUser')->middleware('auth');
Route::post('/user','GrupoController@postCreateUser');


Route::get('/boleto','GrupoController@addBoleto')->middleware('auth');
Route::post('/boleto','GrupoController@postCreateBoleto');


Route::get('/imprimir','GrupoController@generatePDF')->name('imprimir')->middleware('auth');


Auth::routes();
Route::get('/','HomeController@getIndex');