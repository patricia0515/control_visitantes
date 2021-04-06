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

/* Retorna los metodos del controlador visitanteController */
Route::resource('/visitantes', 'VisitanteController')
        ->except('edit', 'update', 'destroy');

/* Retorna los metodos del controlador visitsController */
Route::resource('/visitas', 'VisitsController')
        ->except('create', 'edit', 'destroy');

/* Retorna las imagenes del slide de reportes */
Route::get('/slider', 'VisitsController@slider');

/* Retorna el punto de entrada de la aplicacion */
Route::get('/', 'AppMasterController@appmaster');

/* Retorna a la vista principal */
Route::view('/inicio', 'welcome')->name('index');

/* Retorna la tabla de los visitantes */
Route::view('/visitor', 'visitantes/index')->name('visitor');

/* Retorna la tabla de las visitas */
Route::view('/visits', 'visitas/index')->name('visits');

/* Retorna la vista de reportes */
Route::view('/reportes', 'reportes');

/* Aqui pongo la ruta para generar el excel */
Route::post('visit-list-excel', 'VisitsController@exportExcel')->name('visitas.excel');

/* Ruta para el metodo checkStateVisit */
Route::get('/visitaComprobante/{id}', 'VisitsController@checkStateVisit');

/* grafica de barras */
Route::get('filter/{data}', 'VisitanteController@filter');

/* grafica de Doughnut */
Route::get('lastDays', 'VisitanteController@lastDays');

/* Carrusel */
Route::get('slider', 'VisitsController@slider');
