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

Route::get('/', function () {
    return view('inicio.index');
});

// Route::get('/visitantes', function () {
//     return view('visitantes.create');
// });

Route::resource('visitas', 'VisitsController');

Route::resource('/visitantes', 'VisitanteController');

// Route::view('/consulta', 'visitantes.index');



