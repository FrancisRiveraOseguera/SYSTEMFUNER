<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewTodaslasventasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(" CREATE VIEW todaslasventas AS 
           SELECT  (select  nombres from empleados where id = empleado_id) as nombres, (select  apellidos from empleados where id = empleado_id) as apellidos,  
           (select  tipo from servicios where id = servicio_id) as TipoServicio,
            (select  precio from servicios where id = servicio_id) as Precio,
            (select  categoria from servicios where id = servicio_id) as categoria , contratotipo, created_at 
           FROM contado_ventas 
           WHERE MONTH(created_at)=MONTH(NOW()) 
           UNION (SELECT  (select  nombres from empleados where id = empleado_id) as nombres, (select  apellidos from empleados where id = empleado_id) as apellidos,
           (select  tipo from servicios where id = servicio_id) as TipoServicio, 
           (select  precio from servicios where id = servicio_id) as Precio,
           (select  categoria from servicios where id = servicio_id) as categoria, contratotipo, created_at 
           FROM creditoventas 
           WHERE MONTH(created_at)=MONTH(NOW())) ");
        
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW todaslasventas");
    }
}
