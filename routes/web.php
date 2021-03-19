<?php

use Illuminate\Support\Facades\Route;
use control_visitantes\Exports\VisitsExport;




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

Route::resource('/visitantes', 'VisitanteController');

Route::resource('/visitas', 'VisitsController');


/* Retorna la vista base */
Route::view('/', 'welcome')->name('index');


/* Retorna la tabla de los visitantes */
Route::view('/visitor', 'visitantes/index')->name('visitor');

/* Retorna la tabla de las visitas */
Route::view('/visits', 'visitas/index')->name('visits');
Route::view('reportes', 'reportes');

/* Aqui pongo la ruta para generar el excel */
Route::post('visit-list-excel', 'VisitsController@exportExcel')->name('visitas.excel');
