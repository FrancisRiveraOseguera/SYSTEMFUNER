<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HistorialInventarioTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER historialInventarioTrigger BEFORE INSERT ON inventario FOR EACH ROW
                BEGIN
                    INSERT INTO historial_inventarios(
                    servicio_id, empleado_id, cantidad_aIngresar, fecha_ingreso)
                    VALUES (NEW.servicio_id, NEW.empleado_id, NEW.cantidad_aIngresar, NEW.fecha_ingreso);
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
        DB::unprepared('DROP TRIGGER IF EXISTS historialInventarioTrigger');
    }
}
