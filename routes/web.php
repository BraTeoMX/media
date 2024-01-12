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
    return redirect('/login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    // Todas las rutas aquí requieren autenticación.
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Añadir esta nueva ruta para la vista de reporte de etiquetas
    Route::get('/reporte_etiqueta', [App\Http\Controllers\ReporteEtiquetaController::class, 'index'])->name('reporte_etiqueta');
    //seccion para pruebas de la seccion multimedia 
	Route::get('/video', 'App\Http\Controllers\VideoController@video')->name('video.video');

	Route::get('/videoMostrar', 'App\Http\Controllers\videoController@videoMostrar')->name('video.videoMostrar');
	Route::post('/registroVideo', 'App\Http\Controllers\VideoController@registroVideo')->name('registroVideo');
	// Ruta para actualizar el estatus de un video 
	Route::patch('/video/{id}/update-status', 'App\Http\Controllers\VideoController@ActualizarEstatus')->name('video.ActualizarEstatus');
	Route::patch('/video/{id}/update-status-categoria', 'App\Http\Controllers\VideoController@ActualizarEstatusCategoria')->name('categoria.ActualizarEstatusCategoria');
	Route::patch('/video/{id}/update-status-subcategoria', 'App\Http\Controllers\VideoController@ActualizarEstatusSubCategoria')->name('categoria.ActualizarEstatusSubCategoria');

	//apartado para las 4 secciones de multimedia (podrian ser mas)
	Route::get('/calidad', 'App\Http\Controllers\videoController@calidad')->name('video.calidad');
	Route::get('/induccion', 'App\Http\Controllers\videoController@induccion')->name('video.induccion');
	Route::get('/maquinariayEquipos', 'App\Http\Controllers\videoController@maquinariayEquipos')->name('video.maquinariayEquipos');
	Route::get('/metodos', 'App\Http\Controllers\videoController@metodos')->name('video.metodos');
	Route::get('/altaCategoriaSub', 'App\Http\Controllers\videoController@altaCategoriaSub')->name('video.altaCategoriaSub');

	//apartado apra las categorias y sub-categoria 
	Route::post('/categoria/store', 'App\Http\Controllers\videoController@storeCategoria')->name('categoria.store');
	Route::post('/subcategoria/store', 'App\Http\Controllers\videoController@storeSubcategoria')->name('subcategoria.store');
	// En routes/web.php
	Route::get('/video/{categoriaId}', 'App\Http\Controllers\videoController@obtenerSubcategorias');


	// ruta para los videos
	Route::get('/video/{filename}', 'VideoController@stream')->name('video.stream');
	Route::get('/video/{filename}', 'VideoStreamController@streamVideo');



});