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


Route::get('visitantes', function () {
    return view('visitantes.create');
});
Route::get('inicio', function () {
    return view('inicio.index');
});


/* Route::get('/', function () {
    return view('visitantes.index');
}); */

// Route::get('/', 'VisitanteController@index');

Route::get('visitas', function(){
    return view('visitas.index');
});

Route::resource('/visitantes', 'VisitanteController');


//Retorna la vista base
Route::view('/', 'welcome')->name('index');

//Retorna la tabla de los visitantes
Route::view('/visitor', 'visitantes/index')->name('visitor');