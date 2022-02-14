<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\EmpleadoController;
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
    return view('madre');
});

//RUTAS DEL CONTROLADOR DE SERVICIOS

Route::get('/ListaServicios',[ServicioController::class, 'ListaServicios'])
->name('Servicio.lista');

Route::get('/NuevoServicio',[ServicioController::class, 'create'])
->name('Servicio.nuevo');

Route::post('/NuevoServicio',[ServicioController::class, 'store'])
->name('Servicio.guardar');

//RUTAS PARA EDITAR SERVICIO
Route::get('/servicio/{id}/editar', 'App\Http\Controllers\ServicioController@editar')
    ->name('Servicio.editar')->where('id', '[0-9]+');

Route::put('/servicio/{id}/editar', 'App\Http\Controllers\ServicioController@update')
    ->name('Servicio.update')->where('id', '[0-9]+');

//RUTA PARA VER LOS DETALLES DE UN SERVICIO
Route::get('/servicio/{id}', 'App\Http\Controllers\ServicioController@show')
    ->name('Servicio.ver')->where('id', '[0-9]+');

//RUTAS DE EMPLEADO
Route::get('empleado',[EmpleadoController::class, 'index'])->name('empleado.index');

Route::get('/empleado/nuevo',[EmpleadoController::class, 'create'])->name('empleado.nuevo');

Route::post('empleado/nuevo',[EmpleadoController::class, 'store']);

//EDITAR EMPLEADO
Route::get('/empleado/{id}/editar', 'App\Http\Controllers\EmpleadoController@edit')
    ->name('empleado.edit')->where('id', '[0-9]+');

Route::put('/empleado/{id}/editar', 'App\Http\Controllers\EmpleadoController@update')
    ->name('empleado.update')->where('id', '[0-9]+');

//VER INFORMACIÓN DEL EMPLEADO
Route::get('/empleado/{id}', 'App\Http\Controllers\EmpleadoController@show')
    ->name('empleado.ver')
    ->where('id', '[0-9]+');
