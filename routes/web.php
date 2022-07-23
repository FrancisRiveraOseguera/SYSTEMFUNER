<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\contadoVentaController;
use App\Http\Controllers\creditoventaController;
use App\Http\Controllers\DetalleServicioController;
use App\Http\Controllers\jornadaLaboralController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PermissionController;


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

//inicio de la condición para que quien acceda a las rutas debe de estar logueado

Route::middleware("auth")->group(function () {

    Route::get('/', function () {
        return redirect()->route('madre');
    })->name('welcome');

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

    //ruta para ver las ventas al crédito de cada tipo de servicio desde el listado de SERVICIOS
    Route::get('/ventasCreditoDelServicio/{id}', 'App\Http\Controllers\DetalleServicioController@creditoVentas')
        ->where('id', '[0-9]+')->name('ventasCreditoDelServicio');

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

    //contancia de trabajo de empleado
    Route::get('/constanciaTrabajoPDF/{id}', 'App\Http\Controllers\EmpleadoController@pdfConstancia')
    ->name('constanciatrabajo.pdf')
    ->where('id', '[0-9]+');


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
    Route::get('empleado/desactivar/{id}', 'App\Http\Controllers\EmpleadoController@desactivar')
        ->name('empleado.desactivar')
        ->where('id', '[0-9]+')
    ;

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
    Route::get('/empleadoDesactivado/Habilitar/{id}',
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
    Route::get('listadoTodasLasVentas',[contadoVentaController::class, 'ventas'])
    ->name('listadotodaslas.ventas');

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

    Route::get('/todaslasventas/crearPDF', 'App\Http\Controllers\contadoVentaController@pdftodaslasventas')
        ->name('todaslasventas.pdf')
        ->where('id', '[0-9]+');

    //Ruta para ver la página principal de ventas
    Route::get('/ventas', 'App\Http\Controllers\contadoVentaController@home')
        ->name('ventas.index');

    //RUTAS DE VENTAS AL CREDITO
    Route::get('/NuevaVentaAlCredito{ident?}', 'App\Http\Controllers\creditoventaController@create')
        ->name('ventaCredito.nueva');

    Route::post('/NuevaVentaAlCredito{ident?}', 'App\Http\Controllers\creditoventaController@store')
        ->name('ventaCredito.guardar');

    Route::get('/listadoVentasCredito', 'App\Http\Controllers\creditoventaController@index')
        ->name('ventasCredito.index');

    Route::get('/ventaCredito/detalles/{id}', 'App\Http\Controllers\creditoventaController@show')
        ->name('ventaCredito.ver')
        ->where('id', '[0-9]+');

    Route::get('/ventaCredito/crearPDF/{id}', 'App\Http\Controllers\creditoventaController@pdf')
        ->name('creditoVenta.pdf')
        ->where('id', '[0-9]+');

    //Ruta para marcar como servicio usado en las ventas al crédito
    Route::get('/ventaCredito/marcarServicio/{id}/{idServicio}', 'App\Http\Controllers\creditoventaController@marcarServicio')
        ->name('creditoVenta.marcarServicio')
        ->where('id', '[0-9]+')
        ->where('idServicio', '[0-9]+');

    Route::get('/ventaCredito/serviciosUsados', 'App\Http\Controllers\creditoventaController@serviciosUsados')
        ->name('creditoVenta.serviciosUsados');

    Route::get('/ventaCredito/serviciosUsados/SaldoCero', 'App\Http\Controllers\creditoventaController@serviciosUsadosSaldo0')
        ->name('creditoVenta.serviciosUsados.saldoCero');


    //RUTAS DE NUEVO PAGO
    Route::get('/nuevoPago/{id}',[PagosController::class, 'create'])->name('nuevoPagos.nuevo');

    Route::post('/nuevoPago/{id}',[PagosController::class, 'store'])->name('nuevoPagos.guardar');

    Route::get('historialPagos', 'App\Http\Controllers\PagosController@historialPagos')
        ->name('pagos.historialPagos');

    Route::get('/cuotas-cliente/{id}/detalles', 'App\Http\Controllers\PagosController@pagoDetalles')
        ->name('pagos.pagoDetalles')
        ->where('id', '[0-9]+');

        Route::get('/pagodecuota/crearPDF/{id}', 'App\Http\Controllers\PagosController@pdf')
        ->name('pagodecuota.pdf')
        ->where('id', '[0-9]+');

    //RUTA PARA VER LA PANTALLA INICIAL
    Route::get('/inicio', function () {
        return view('pantallaInicial');
    })->name('madre');

    // RUTAS USUARIO
    Route::get('/nuevoUsuario', 'App\Http\Controllers\UsuarioController@create')
        ->name('usuarios.create');

    Route::post('/nuevoUsuario', 'App\Http\Controllers\UsuarioController@store')
        ->name('usuarios.store');


    Route::get('listadoUsuarios',[UsuarioController::class, 'index'])
    ->name('listado.usuario');

    //ELIMINAR USUARIO
    Route::delete('usuario/borrar/{id}',[UsuarioController::class, 'destroy'])
    ->name('usuario.borrar')-> where('id' ,'[0-9]+');

    //EDITAR usuario
    Route::get('/usuario/{id}/editar', 'App\Http\Controllers\UsuarioController@edit')
        ->name('usuario.edit')->where('id', '[0-9]+');

    Route::put('/usuario/{id}/editar', 'App\Http\Controllers\UsuarioController@update')
        ->name('usuario.update')->where('id', '[0-9]+');

    // RUTAS CARGOS
    Route::get('/listadoCargos', 'App\Http\Controllers\cargoController@index')
        ->name('listadoCargos.index');

    Route::get('/nuevoCargo', 'App\Http\Controllers\cargoController@create')
        ->name('cargos.nuevo');

    Route::post('/nuevoCargo', 'App\Http\Controllers\cargoController@store')
        ->name('cargos.store');

    // Rutas editar Cargo

    Route::get('/Cargo/{id}/editar', 'App\Http\Controllers\cargoController@editar')
        ->name('Cargo.editar')->where('id', '[0-9]+');

    Route::put('/Cargo/{id}/editar', 'App\Http\Controllers\cargoController@update')
        ->name('Cargo.update')->where('id', '[0-9]+');

    //Detalles del cargo
    Route::get('/cargo/detalles/{id}', 'App\Http\Controllers\cargoController@show')
        ->where('id', '[0-9]+')
        ->name('cargo.ver');

     // RUTAS GASTOS
    Route::get('/listadoGastos', 'App\Http\Controllers\GastoController@index')
        ->name('listadoGastos.index');

    Route::get('/nuevoGasto', 'App\Http\Controllers\GastoController@create')
        ->name('gastos.nuevo');

    Route::post('/nuevoGasto', 'App\Http\Controllers\GastoController@store')
        ->name('gastos.store');

    Route::get('/gasto/{id}', 'App\Http\Controllers\GastoController@show')
        ->name('gastos.ver')
        ->where('id', '[0-9]+');

    Route::get('/gastos/PDF', 'App\Http\Controllers\GastoController@gastosPDF')
        ->name('gastos.pdf');

    //RUTA PERMISOS
    Route::get('permisos',[PermissionController::class, 'index'])
    ->name('permisos.lista');

    Route::get('permisos/crear',[PermissionController::class, 'create'])
    ->name('permisos.create');

    Route::post('permisos/crear',[PermissionController::class, 'store'])
    ->name('permisos.store');

    //RUTAS EDITAR PERMISO

    Route::get('/permiso/{id}/editar', 'App\Http\Controllers\PermissionController@editar')
        ->name('permiso.editar')->where('id', '[0-9]+');

    Route::put('/permiso/{id}/editar', 'App\Http\Controllers\PermissionController@update')
        ->name('permiso.update')->where('id', '[0-9]+');
    //RUTA DE ELIMINAR PERMISO
    Route::delete('permisos/{id}/eliminar', 'App\Http\Controllers\PermissionController@destroy')
        ->name('permiso.eliminar')
        ->where('id', '[0-9]+');


    //RUTA ROLES
    Route::get('roles', 'App\Http\Controllers\RoleController@index')
    ->name('roles.index');

    Route::get('roles/crear', 'App\Http\Controllers\RoleController@create')
        ->name('roles.create');

    Route::post('roles/crear', 'App\Http\Controllers\RoleController@store')
    ->name('roles.store');

    Route::get('roles/{id}/editar', 'App\Http\Controllers\RoleController@editar')
        ->name('rol.editar')
        ->where('id', '[0-9]+');

    Route::put('roles/{id}/editar', 'App\Http\Controllers\RoleController@update')
        ->name('rol.update')
        ->where('id', '[0-9]+');

    Route::delete('roles/{id}/eliminar', 'App\Http\Controllers\RoleController@destroy')
        ->name('rol.eliminar')
        ->where('id', '[0-9]+');

    //RUTA TURNOS
    Route::get('turnos', 'App\Http\Controllers\TurnoController@index')
        ->name('turnos.index');

    Route::get('turnos/crear', 'App\Http\Controllers\TurnoController@create')
        ->name('turnos.create');

    Route::post('turnos/crear', 'App\Http\Controllers\TurnoController@store')
    ->name('turnos.store');

    Route::get('/turno/{id}/editar', 'App\Http\Controllers\TurnoController@editar')
        ->name('turno.editar')->where('id', '[0-9]+');

    Route::put('/turno/{id}/editar', 'App\Http\Controllers\TurnoController@update')
        ->name('turno.update')->where('id', '[0-9]+');
    
    Route::delete('turno/{id}/eliminar', 'App\Http\Controllers\TurnoController@destroy')
        ->name('turno.eliminar')
        ->where('id', '[0-9]+');


    //RUTAS DE JORNADA LABORAL


    Route::get('/ListadoJornadaLaboral', [jornadaLaboralController::class,'index'])
    ->name('ListadoJornadaLaboral.index');

    Route::get('jornadalaboral/crear', [jornadaLaboralController::class,'create'])
    ->name('jornadalaboral.create');

    Route::post('jornadalaboral/crear', [jornadaLaboralController::class,'store'])
    ->name('jornadalaboral.store');

    Route::get('/jornadalaboral/{id}/editar', [jornadaLaboralController::class,'editar'])
        ->name('jornada.editar')->where('id', '[0-9]+');

    Route::put('/jornadalaboral/{id}/editar', [jornadaLaboralController::class,'update'])
        ->name('jornada.update')->where('id', '[0-9]+');

    Route::delete('/jornadaLaboral/{id}/eliminar', [jornadaLaboralController::class,'destroy'])
        ->name('jornadaLaboral.eliminar')->where('id', '[0-9]+');

    //cliente deudores
    Route::get('clientes/deudores', [creditoventaController::class,'deudor'])
    ->name('cliente.deudor');

//todas las rutas anteriores pide estar logueado para acceder a ellas
});//después de esta linea todas las rutas que se agreguen no pediran estar logueado para acceder.

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
