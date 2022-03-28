<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\contadoVentaController;
use App\Http\Controllers\creditoventaController;
use App\Http\Controllers\DetalleServicioController;
use App\Http\Controllers\PagosController;

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

//ruta de botón de ventas de tipo de servicio en SERVICIOS
Route::get('listadoVentaTipoServicio/{id}',[DetalleServicioController::class, 'index'])
->name('tipoServicio.index')->where('id', '[0-9]+');

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

//DESACTIVAR EMPLEADO
Route::delete('empleado/{id}/desactivar', 'App\Http\Controllers\EmpleadoController@destroy')
    ->name('empleado.desactivar')
    ->where('id', '[0-9]+');

//VER INFORMACIÓN DE LOS EMPLEADOS DESACTIVADOS
Route::get('/listadoEmpleadosDesactivados',
    'App\Http\Controllers\EmpleadoController@listadoEmpleadosDesactivados')
    ->name('listado.empleados.desactivados');

//VER INFORMACIÓN DEL EMPLEADO DESACTIVADO
Route::get('/empleadoDesactivado/{id}',
    'App\Http\Controllers\EmpleadoController@verEmpleadoDesactivado')
    ->name('empleado.desactivado')
    ->where('id', '[0-9]+');

//HABILITAR EMPLEADO DESACTIVADO
Route::delete('/empleadoDesactivado/{id}/Habilitar',
    'App\Http\Controllers\EmpleadoController@habilitarEmpleadoDesactivado')
    ->name('empleado.habilitar')
    ->where('id', '[0-9]+');


//RUTAS DEL CONTROLADOR CLIENTE
Route::get('/listadoClientes', 'App\Http\Controllers\ClienteController@index')
    ->name('listado.clientes');

Route::get('/cliente/nuevo/{cliente?}', 'App\Http\Controllers\ClienteController@create')
    ->name('cliente.nuevo');

Route::post('/cliente/nuevo/{cliente?}', 'App\Http\Controllers\ClienteController@store')
    ->name('cliente.guardar');

// RUTAS EDITAR CLIENTE
Route::get('/cliente/{id}/editar', 'App\Http\Controllers\ClienteController@edit')
    ->name('cliente.edit')->where('id', '[0-9]+');

Route::put('/cliente/{id}/editar', 'App\Http\Controllers\ClienteController@update')
    ->name('cliente.update')->where('id', '[0-9]+');

//RUTAS DETALLES DEL CLIENTE
Route::get('/cliente/{id}', 'App\Http\Controllers\ClienteController@show')
    ->name('cliente.ver')
    ->where('id', '[0-9]+');

//RUTAS DE INVENTARIO
Route::get('inventario', 'App\Http\Controllers\InventarioController@home')
->name('inventario.home');

Route::get('productosInventario', 'App\Http\Controllers\InventarioController@index')
->name('inventario.index');
//ruta de historial
Route::get('historialInventario', 'App\Http\Controllers\InventarioController@index')
->name('historialinventario.index');

Route::get('productosInventario/nuevo/', 'App\Http\Controllers\InventarioController@create')
->name('inventario.create');

Route::post('productosInventario/nuevo/', 'App\Http\Controllers\InventarioController@store')
->name('inventario.store');

Route::get('ListadoProductosenInventario', 'App\Http\Controllers\InventarioController@verProductosEnInventario')
    ->name('inventario.verProductos');

//RUTAS DE VENTAS
//Rutas de creación y validación de ventas
Route::get('listadoVentasContado',[contadoVentaController::class, 'index'])
->name('listadoVentas.index');

Route::get('/NuevaVentaDeContado{ident?}',[contadoVentaController::class, 'create'])
->name('VentaContado.nueva');

Route::post('/NuevaVentaDeContado{ident?}',[contadoVentaController::class, 'store'])
->name('VentaContado.guardar');

Route::get('/ventaContado/detalles/{id}',  'App\Http\Controllers\contadoVentaController@show')
    ->name('contadoVenta.ver')
    ->where('id', '[0-9]+');

Route::get('/ventasContado/crearPDF/{id}', 'App\Http\Controllers\contadoVentaController@pdf')
    ->name('contadoVenta.pdf')
    ->where('id', '[0-9]+');

//Ruta para ver la página principal de ventas
Route::get('/ventas', 'App\Http\Controllers\contadoVentaController@home')
    ->name('ventas.index');

//RUTAS DE VENTAS AL CREDITO
Route::get('/NuevaVentaAlCredito', 'App\Http\Controllers\creditoventaController@create')
    ->name('ventaCredito.nueva');

Route::post('/NuevaVentaAlCredito{newcl?}', 'App\Http\Controllers\creditoventaController@store')
    ->name('ventaCredito.guardar');

Route::get('/listadoVentasCredito', 'App\Http\Controllers\creditoventaController@index')
    ->name('ventasCredito.index');

Route::get('/ventaCredito/detalles/{id}', 'App\Http\Controllers\creditoventaController@show')
    ->name('ventaCredito.ver')
    ->where('id', '[0-9]+');

Route::get('/ventaCredito/crearPDF/{id}', 'App\Http\Controllers\creditoventaController@pdf')
    ->name('creditoVenta.pdf')
    ->where('id', '[0-9]+');

//RUTAS DE NUEVO PAGO
Route::get('/nuevoPago/{id}',[PagosController::class, 'create'])->name('nuevoPagos.nuevo');

Route::post('/nuevoPago/{id}',[PagosController::class, 'store'])->name('nuevoPagos.guardar');

Route::get('historialPagos', 'App\Http\Controllers\PagosController@historialPagos')
    ->name('pagos.historialPagos');

Route::get('/historialPagos/cuotas/{id}',  'App\Http\Controllers\PagosController@show')
    ->name('pagos.ver')
    ->where('id', '[0-9]+');

Route::get('/detallesPago/{id}', 'App\Http\Controllers\PagosController@details')
    ->name('pagos.pagoDetalles')
    ->where('id', '[0-9]+');