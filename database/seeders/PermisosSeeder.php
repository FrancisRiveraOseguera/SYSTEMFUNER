<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //cargos
        Permission::create([
            'name' => 'listadocargos',
            'descripcion' => 'Para poder acceder al listado de los cargos',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'nuevocargos',
            'descripcion' => 'Para poder crear un cargo',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'editarcargos',
            'descripcion' => 'Para poder editar un cargo',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'detallescargos',
            'descripcion' => 'Para poder ver los detalles del cargo',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'eliminarcargos',
            'descripcion' => 'Para poder eliminar un cargo',
            'guard_name' => 'web'
        ]);
        //clientes
        Permission::create([
            'name' => 'listadoclientes',
            'descripcion' => 'para poder acceder al listado de los clientes',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'nuevoclientes',
            'descripcion' => 'Para poder crear un cliente',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'editarclientes',
            'descripcion' => 'Para poder editar los datos del cliente',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'detallesclientes',
            'descripcion' => 'Para poder ver los detalles de un cliente',
            'guard_name' => 'web'
        ]);
        //ventas al contado
        Permission::create([
            'name' => 'listadoventas',
            'descripcion' => 'Para poder acceder al listado de las ventas',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'listadoventascontado',
            'descripcion' => 'Para poder acceder al listado de las ventas al contado',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'detalleentascontado',
            'descripcion' => 'Para poder ver los detalles de las ventas al contado',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'pdfventascontado',
            'descripcion' => 'Para poder previsualisar e imprimir las ventas al contado ',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'nuevaventascontado',
            'descripcion' => 'Para poder crear una venta al contado',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'principalventas',
            'descripcion' => 'Para poder acceder a la pantalla principal de ventas',
            'guard_name' => 'web'
        ]);
        //ventascrédito
        Permission::create([
            'name' => 'listadoventascredito',
            'descripcion' => 'Para poder acceder al listado de ventas al crédito',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'detalleentascredito',
            'descripcion' => 'Para poder ver los detalles de las ventas al crédito',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'nuevaventascredito',
            'descripcion' => 'Para poder crear una venta al crédito',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'pdfventascredito',
            'descripcion' => 'Para poder previsualizar e imprimir las ventas al crédito',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'serviciosusados',
            'descripcion' => 'Para poder acceder al listado de servicios usados',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'serviciosusadossaldo0',
            'descripcion' => 'Para poder acceder al listado de los servicios usados con saldo pendiente de 0',
            'guard_name' => 'web'
        ]);
        //detalle servicio
        Permission::create([
            'name' => 'listadoventatiposervicio',
            'descripcion' => 'Para poder acceder al listado al contado de cada servicio',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'serviciocreditoventa',
            'descripcion' => 'para poder acceder al listado al crédito de cada servicio',
            'guard_name' => 'web'
        ]);
        //empleados
        Permission::create([
            'name' => 'listadoempleados',
            'descripcion' => 'Para poder acceder al listado de empleados',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'nuevoempleados',
            'descripcion' => 'Para poder crear un empleado',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'editarempleados',
            'descripcion' => 'Para poder editar un empleado',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'detallesempleados',
            'descripcion' => 'Para poder ver los detalles del empleado',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'desactivarempleados',
            'descripcion' => 'Para poder desactivar un empleado',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'empleadosdesactivados',
            'descripcion' => 'Para poder acceder al listado de empleados desactivados ',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'detallesempleadosdesactivados',
            'descripcion' => 'Para poder ver los detalles del empleado desactivado',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'habilitarempleados',
            'descripcion' => 'Para poder habilitar un empleado',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'empleadoconstancia',
            'descripcion' => 'Para poder previsualizar e imprimir la constancia de trabajo de un empleado',
            'guard_name' => 'web'
        ]);
         //gasto
        Permission::create([
            'name' => 'listadogasto',
            'descripcion' => 'Para poder acceder al listado de los gastos',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'nuevogastos',
            'descripcion' => 'Para poder crear un gasto',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'pdfgasto',
            'descripcion' => 'Para poder previsualizar e imprimir un gasto',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'detallesgasto',
            'descripcion' => 'Para poder ver los detalles del gasto',
            'guard_name' => 'web'
        ]);
         //inventario
        Permission::create([
            'name' => 'listadoinventario',
            'descripcion' => 'Para poder acceder al listado de inventarios',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'nuevoinventario',
            'descripcion' => 'Para poder crear inventario',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'detallesinventario',
            'descripcion' => 'Para poder ver el inventario',
            'guard_name' => 'web'
        ]);
         //pagos
        Permission::create([
            'name' => 'nuevopagos',
            'descripcion' => 'Para poder acceder al listado de los pagos',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'pdfpago',
            'descripcion' => 'Para poder crear un pago',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'historialpagos',
            'descripcion' => 'Para poder ver el hisorial de pagos',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'detallepagos',
            'descripcion' => 'Para poder ver los pagos',
            'guard_name' => 'web'
        ]);
         //permisos
        Permission::create([
            'name' => 'listadopermisos',
            'descripcion' => 'Para poder acceder al listado de los permisos',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'nuevopermisos',
            'descripcion' => 'Para poder crear un permisos',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'editarpermisos',
            'descripcion' => 'Para poder editar un permiso',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'eliminarpermisos',
            'descripcion' => 'Para poder eliminar un permiso',
            'guard_name' => 'web'
        ]);
         //servicios
        Permission::create([
            'name' => 'listadoservicios',
            'descripcion' => 'Para poder acceder al listado de los servicios',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'nuevoservicio',
            'descripcion' => 'Para poder crear un servicios',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'editarservicios',
            'descripcion' => 'Para poder editar un servicio',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'detalleservicios',
            'descripcion' => 'Para poder ver un servicio',
            'guard_name' => 'web'
        ]);
         //usuarios
        Permission::create([
            'name' => 'listadousuario',
            'descripcion' => 'Para poder acceder al listado de usuarios',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'nuevousuario',
            'descripcion' => 'Para poder crear un usuario',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'editarusuario',
            'descripcion' => 'Para poder editar un usuario',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'eliminarusuario',
            'descripcion' => 'Para poder eliminar un usuario',
            'guard_name' => 'web'
        ]);
    }
}
