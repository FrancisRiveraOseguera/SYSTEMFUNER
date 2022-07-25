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
            'name' => 'Listado_cargos',
            'descripcion' => 'Para poder acceder al listado de los cargos.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Nuevo_cargo',
            'descripcion' => 'Para poder crear un cargo.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Editar_cargo',
            'descripcion' => 'Para poder editar un cargo.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Detalles_cargos',
            'descripcion' => 'Para poder ver los detalles del cargo.',
            'guard_name' => 'web'
        ]);
        //clientes
        Permission::create([
            'name' => 'Listado_clientes',
            'descripcion' => 'para poder acceder al listado de los clientes.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Nuevo_cliente',
            'descripcion' => 'Para poder crear un cliente.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Editar_clientes',
            'descripcion' => 'Para poder editar los datos del cliente.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Detalles_clientes',
            'descripcion' => 'Para poder ver los detalles de un cliente.',
            'guard_name' => 'web'
        ]);
        //ventas al contado
        Permission::create([
            'name' => 'Listado_ventas',
            'descripcion' => 'Para poder acceder al listado de todas las ventas.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Listado_ventas_contado',
            'descripcion' => 'Para poder acceder al listado de las ventas al contado.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Detalles_ventas_contado',
            'descripcion' => 'Para poder ver los detalles de las ventas al contado.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Pdf_ventas_contado',
            'descripcion' => 'Para poder previsualisar e imprimir las ventas al contado. ',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Nueva_ventas_contado',
            'descripcion' => 'Para poder crear una venta al contado.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Principal_ventas',
            'descripcion' => 'Para poder acceder a la pantalla principal de ventas.',
            'guard_name' => 'web'
        ]);
        //ventascrédito
        Permission::create([
            'name' => 'Listado_ventas_crédito',
            'descripcion' => 'Para poder acceder al listado de ventas al crédito.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Detalles_ventas_crédito',
            'descripcion' => 'Para poder ver los detalles de las ventas al crédito.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Nueva_venta_crédito',
            'descripcion' => 'Para poder crear una venta al crédito.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Pdf_ventas_crédito',
            'descripcion' => 'Para poder previsualizar e imprimir las ventas al crédito.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Servicios_usados',
            'descripcion' => 'Para poder acceder al listado de servicios usados.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'servicios_usados_saldo_0',
            'descripcion' => 'Para poder acceder al listado de los servicios usados con saldo pendiente de 0.',
            'guard_name' => 'web'
        ]);
        //detalle servicio
        Permission::create([
            'name' => 'Servicio_contado_venta',
            'descripcion' => 'Para poder acceder al listado al contado de cada servicio',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Servicio_crédito_venta',
            'descripcion' => 'Para poder acceder al listado al crédito de cada servicio.',
            'guard_name' => 'web'
        ]);
        //empleados
        Permission::create([
            'name' => 'Listado_Empleados',
            'descripcion' => 'Para poder acceder al listado de empleados.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Nuevo_empleado',
            'descripcion' => 'Para poder crear un empleado.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Editar_empleado',
            'descripcion' => 'Para poder editar un empleado.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Detalles_empleados',
            'descripcion' => 'Para poder ver los detalles del empleado.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Desactivar_empleados',
            'descripcion' => 'Para poder desactivar un empleado.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Empleados_desactivados',
            'descripcion' => 'Para poder acceder al listado de empleados desactivados. ',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Detalles_empleados_desactivados',
            'descripcion' => 'Para poder ver los detalles del empleado desactivado.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Habilitar_empleados',
            'descripcion' => 'Para poder habilitar un empleado.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Pdf_constancia_trabajo',
            'descripcion' => 'Para poder previsualizar e imprimir la constancia de trabajo de un empleado.',
            'guard_name' => 'web'
        ]);
         //gasto
        Permission::create([
            'name' => 'Listado_gasto',
            'descripcion' => 'Para poder acceder al listado de los gastos.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Nuevo_gasto',
            'descripcion' => 'Para poder crear un gasto.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Pdf_gasto',
            'descripcion' => 'Para poder previsualizar e imprimir los gasto.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Detalles_gasto',
            'descripcion' => 'Para poder ver los detalles del gasto.',
            'guard_name' => 'web'
        ]);
         //inventario
        Permission::create([
            'name' => 'Listado_inventario',
            'descripcion' => 'Para poder acceder al historial de inventarios.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Nuevo_inventario',
            'descripcion' => 'Para poder crear un inventario.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Cantidad_inventario',
            'descripcion' => 'Para poder ver las cantidades en inventario.',
            'guard_name' => 'web'
        ]);
         //pagos
        Permission::create([
            'name' => 'Nuevo_pago',
            'descripcion' => 'Para poder crear un pago.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Pdf_recibo_pago',
            'descripcion' => 'Para poder previsualizar e imprimir el recibo de pago.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Historial_pagos',
            'descripcion' => 'Para poder ver el hisorial de pagos.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Detalles_pagos',
            'descripcion' => 'Para poder ver los pagos.',
            'guard_name' => 'web'
        ]);
         //permisos
        Permission::create([
            'name' => 'Listado_permisos',
            'descripcion' => 'Para poder acceder al listado de los permisos.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Nuevo_permiso',
            'descripcion' => 'Para poder crear un permiso.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Editar_permisos',
            'descripcion' => 'Para poder editar un permiso.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Eliminar_permisos',
            'descripcion' => 'Para poder editar un permiso.',
            'guard_name' => 'web'
        ]);

         //roles
         Permission::create([
            'name' => 'Listado_roles',
            'descripcion' => 'Para poder acceder al listado de los roles.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Nuevo_roles',
            'descripcion' => 'Para poder crear un rol.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Editar_roles',
            'descripcion' => 'Para poder editar un rol.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Eliminar_rol',
            'descripcion' => 'Para poder eliminar un rol.',
            'guard_name' => 'web'
        ]);
         //servicios
        Permission::create([
            'name' => 'Listado_servicios',
            'descripcion' => 'Para poder acceder al listado de los servicios.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Nuevo_servicio',
            'descripcion' => 'Para poder crear un servicio.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Editar_servicio',
            'descripcion' => 'Para poder editar un servicio.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Detalles_servicios',
            'descripcion' => 'Para poder ver un servicio.',
            'guard_name' => 'web'
        ]);
         //usuarios
        Permission::create([
            'name' => 'Listado_usuario',
            'descripcion' => 'Para poder acceder al listado de usuarios.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Nuevo_usuario',
            'descripcion' => 'Para poder crear un usuario.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Editar_usuario',
            'descripcion' => 'Para poder editar un usuario.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Eliminar_usuario',
            'descripcion' => 'Para poder eliminar un usuario.',
            'guard_name' => 'web'
        ]);

        //Turnos
        Permission::create([
            'name' => 'Editar_turno',
            'descripcion' => 'Para poder editar un turno.',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'Listado_turnos',
            'descripcion' => 'Para poder acceder al listado de turnos.',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Nuevo_turno',
            'descripcion' => 'Para poder crear un turno.',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'Eliminar_turno',
            'descripcion' => 'Para poder eliminar un turno.',
            'guard_name' => 'web'
        ]);

         //Jornada Laboral
        Permission::create([
            'name' => 'Listado_jornadaLaboral',
            'descripcion' => 'Para poder acceder al listado de la jornada laboral.',
            'guard_name' => 'web'
        ]);


        Permission::create([
            'name' => 'Nueva_jornadalaboral',
            'descripcion' => 'Para poder crear una jornada laboral.',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'Editar_jornadaLaboral',
            'descripcion' => 'Para poder editar una jornada laboral.',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'Eliminar_jornadaLaboral',
            'descripcion' => 'Para poder eliminar una jornada laboral',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'Detalles_jornadaLaboral',
            'descripcion' => 'Para poder ver una jornada laboral.',
            'guard_name' => 'web'
        ]);

         //clientes deudores
        Permission::create([
            'name' => 'Listado_deudores',
            'descripcion' => 'Para poder acceder al listado de clientes deudores.',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'PDF_deudores',
            'descripcion' => 'Para poder imprimir el reporte de clientes deudores.',
            'guard_name' => 'web'
        ]);
    }
}
