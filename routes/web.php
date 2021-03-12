<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitanteController;


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


// Route::get('/', 'VisitanteController@index');

/* A las siguientes rutas les paso el registro que hay que modificar */
Route::get('/visitantes/{visitante}', 'VisitanteController@edit')->name('visitantes.edit');

Route::resource('/visitantes', 'VisitanteController');

Route::view('/', 'welcome')->name('index');