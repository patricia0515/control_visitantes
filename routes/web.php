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

// Route::get('/visitantes', 'VisitanteController@create')->name('visitantes.create');
// Route::post('/visitantes', 'VisitanteController@store')->name('visitantes.store');

/* Route::get('/', 'VisitanteController@index');
Route::get('/visitantes', 'VisitanteController@create')->name('visitantes.create');
Route::post('/visitantes', 'VisitanteController@store')->name('visitantes.store');

Route::post('/', 'VisitanteController@index')->name('visitantes.index'); */

/* A las siguientes rutas les paso el registro que hay que modificar */
/* Route::get('/visitantes/{visitante}', 'VisitanteController@edit')->name('visitantes.edit');
Route::post('/visitantes/{visitante}', 'VisitanteController@update')->name('visitantes.update');
Route::delete('/visitantes/{visitante}', 'VisitanteController@destroy')->name('visitantes.destroy'); */

// Vamos a crear una ruta de tipo Resource para el manejo de la CRUD visitantes
// Pero inicialmente hay que asegurarnos que el controlador exista
Route::get('/', 'VisitanteController@index');


Route::resource('/visitantes', 'VisitanteController');

Route::view('/welcome', 'welcome')->name('index');