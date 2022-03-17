<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewCantidadInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(" CREATE VIEW cantidad_inventario AS
        SELECT t1.servicio_id,t1.tipo, t1.categoria, t1.precio, cantidad-IFNULL(vendido,0) AS cantidad
        FROM
        (SELECT servicio_id, tipo, categoria, precio, SUM(cantidad_aIngresar) AS cantidad
        FROM inventario
        JOIN servicios ON servicios.id = servicio_id
        GROUP BY servicio_id) t1
        left JOIN
        (SELECT servicio_id,tipo, categoria, precio, SUM(cantidad_v) AS vendido 
        FROM contado_ventas
        JOIN servicios ON servicios.id = servicio_id
        GROUP BY servicio_id) t2
        ON t1.servicio_id = t2.servicio_id ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW cantidad_inventario");
    }
}
