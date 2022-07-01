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
        ]);
        Permission::create([
            'name' => 'nuevocargos',
            'descripcion' => 'Para poder crear un cargo',
        ]);
        Permission::create([
            'name' => 'editarcargos',
            'descripcion' => 'Para poder editar un cargo',
        ]);
        Permission::create([
            'name' => 'detallescargos',
            'descripcion' => 'Para poder ver los detalles del cargo',
        ]);
        Permission::create([
            'name' => 'eliminarcargos',
            'descripcion' => 'Para poder eliminar un cargo',
        ]);
        //clientes
        Permission::create([
            'name' => 'listadoclientes',
            'descripcion' => 'para poder acceder al listado de los clientes',
        ]);
        Permission::create([
            'name' => 'nuevoclientes',
            'descripcion' => 'Para poder crear un cliente',
        ]);
        Permission::create([
            'name' => 'editarclientes',
            'descripcion' => 'Para poder editar los datos del cliente',
        ]);
        Permission::create([
            'name' => 'detallesclientes',
            'descripcion' => 'Para poder ver los detalles de un cliente',
        ]);
        //ventas al contado
        Permission::create([
            'name' => 'listadoventas',
            'descripcion' => 'Para poder acceder al listado de las ventas',
        ]);
        Permission::create([
            'name' => 'listadoventascontado',
            'descripcion' => 'Para poder acceder al listado de las ventas al contado',
        ]);
        Permission::create([
            'name' => 'detalleentascontado',
            'descripcion' => 'Para poder ver los detalles de las ventas al contado',
        ]);
        Permission::create([
            'name' => 'pdfventascontado',
            'descripcion' => 'Para poder previsualisar e imprimir las ventas al contado ',
        ]);
        Permission::create([
            'name' => 'nuevaventascontado',
            'descripcion' => 'Para poder crear una venta al contado',
        ]);
        Permission::create([
            'name' => 'principalventas',
            'descripcion' => 'Para poder acceder a la pantalla principal de ventas',
        ]);
        //ventascrédito
        Permission::create([
            'name' => 'listadoventascredito',
            'descripcion' => 'Para poder acceder al listado de ventas al crédito',
        ]);
        Permission::create([
            'name' => 'detalleentascredito',
            'descripcion' => 'Para poder ver los detalles de las ventas al crédito',
        ]);
        Permission::create([
            'name' => 'nuevaventascredito',
            'descripcion' => 'Para poder crear una venta al crédito',
        ]);
        Permission::create([
            'name' => 'pdfventascredito',
            'descripcion' => 'Para poder previsualizar e imprimir las ventas al crédito',
        ]);
        Permission::create([
            'name' => 'serviciosusados',
            'descripcion' => 'Para poder acceder al listado de servicios usados',
        ]);
        Permission::create([
            'name' => 'serviciosusadossaldo0',
            'descripcion' => 'Para poder acceder al listado de los servicios usados con saldo pendiente de 0',
        ]);
        //detalle servicio
        Permission::create([
            'name' => 'listadoventatiposervicio',
            'descripcion' => 'Para poder acceder al listado al contado de cada servicio',
        ]);
        Permission::create([
            'name' => 'serviciocreditoventa',
            'descripcion' => 'para poder acceder al listado al crédito de cada servicio',
        ]);
        //empleados
        Permission::create([
            'name' => 'listadoempleados',
            'descripcion' => 'Para poder acceder al listado de empleados',
        ]);
        Permission::create([
            'name' => 'nuevoempleados',
            'descripcion' => 'Para poder crear un empleado',
        ]);
        Permission::create([
            'name' => 'editarempleados',
            'descripcion' => 'Para poder editar un empleado',
        ]);
        Permission::create([
            'name' => 'detallesempleados',
            'descripcion' => 'Para poder ver los detalles del empleado',
        ]);
        Permission::create([
            'name' => 'desactivarempleados',
            'descripcion' => 'Para poder desactivar un empleado',
        ]);
        Permission::create([
            'name' => 'empleadosdesactivados',
            'descripcion' => 'Para poder acceder al listado de empleados desactivados ',
        ]);
        Permission::create([
            'name' => 'detallesempleadosdesactivados',
            'descripcion' => 'Para poder ver los detalles del empleado desactivado',
        ]);
        Permission::create([
            'name' => 'habilitarempleados',
            'descripcion' => 'Para poder habilitar un empleado',
        ]);
        Permission::create([
            'name' => 'empleadoconstancia',
            'descripcion' => 'Para poder previsualizar e imprimir la constancia de trabajo de un empleado',
        ]);
         //gasto
        Permission::create([
            'name' => 'listadogasto',
            'descripcion' => 'Para poder acceder al listado de los gastos',
        ]);
        Permission::create([
            'name' => 'nuevogastos',
            'descripcion' => 'Para poder crear un gasto',
        ]);
        Permission::create([
            'name' => 'pdfgasto',
            'descripcion' => 'Para poder previsualizar e imprimir un gasto',
        ]);
        Permission::create([
            'name' => 'detallesgasto',
            'descripcion' => 'Para poder ver los detalles del gasto',
        ]);
         //inventario
        Permission::create([
            'name' => 'listadoinventario',
            'descripcion' => 'Para poder acceder al listado de inventarios',
        ]);
        Permission::create([
            'name' => 'nuevoinventario',
            'descripcion' => 'Para poder crear inventario',
        ]);
        Permission::create([
            'name' => 'detallesinventario',
            'descripcion' => 'Para poder ver el inventario',
        ]);
         //pagos
        Permission::create([
            'name' => 'nuevopagos',
            'descripcion' => 'Para poder acceder al listado de los pagos',
        ]);
        Permission::create([
            'name' => 'pdfpago',
            'descripcion' => 'Para poder crear un pago',
        ]);
        Permission::create([
            'name' => 'historialpagos',
            'descripcion' => 'Para poder ver el hisorial de pagos',
        ]);
        Permission::create([
            'name' => 'detallepagos',
            'descripcion' => 'Para poder ver los pagos',
        ]);
         //permisos
        Permission::create([
            'name' => 'listadopermisos',
            'descripcion' => 'Para poder acceder al listado de los permisos',
        ]);
        Permission::create([
            'name' => 'nuevopermisos',
            'descripcion' => 'Para poder crear un permisos',
        ]);
        Permission::create([
            'name' => 'editarpermisos',
            'descripcion' => 'Para poder editar un permiso',
        ]);
        Permission::create([
            'name' => 'eliminarpermisos',
            'descripcion' => 'Para poder eliminar un permiso',
        ]);
         //servicios
        Permission::create([
            'name' => 'listadoservicios',
            'descripcion' => 'Para poder acceder al listado de los servicios',
        ]);
        Permission::create([
            'name' => 'nuevoservicio',
            'descripcion' => 'Para poder crear un servicios',
        ]);
        Permission::create([
            'name' => 'editarservicios',
            'descripcion' => 'Para poder editar un servicio',
        ]);
        Permission::create([
            'name' => 'detalleservicios',
            'descripcion' => 'Para poder ver un servicio',
        ]);
         //usuarios
        Permission::create([
            'name' => 'listadousuario',
            'descripcion' => 'Para poder acceder al listado de usuarios',
        ]);
        Permission::create([
            'name' => 'nuevousuario',
            'descripcion' => 'Para poder crear un usuario',
        ]);
        Permission::create([
            'name' => 'editarusuario',
            'descripcion' => 'Para poder editar un usuario',
        ]);
        Permission::create([
            'name' => 'eliminarusuario',
            'descripcion' => 'Para poder eliminar un usuario',
        ]);
    }
}
