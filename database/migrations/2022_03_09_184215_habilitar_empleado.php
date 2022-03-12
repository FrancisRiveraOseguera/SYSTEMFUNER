<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HabilitarEmpleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER habilitar_empleado BEFORE DELETE ON empleados_desactivados FOR EACH ROW
                BEGIN 
                    INSERT INTO empleados(
                    identidad, nombres, apellidos, genero, direccion, fecha_ingreso,
                    fecha_de_nacimiento, telefono, contacto_de_emergencia)
                    VALUES (OLD.identidad, OLD.nombres, OLD.apellidos, OLD.genero,
                    OLD.direccion, OLD.fecha_ingreso, OLD.fecha_de_nacimiento,
                    OLD.telefono, OLD.contacto_de_emergencia);
                END 
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS habilitar_empleado');
    }
}
