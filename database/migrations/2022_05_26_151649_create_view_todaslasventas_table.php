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
           SELECT responsable, (select  tipo from servicios where id = servicio_id) as TipoServicio,
            (select  precio from servicios where id = servicio_id) as Precio,
            (select  categoria from servicios where id = servicio_id) as categoria ,created_at 
           FROM contado_ventas 
           WHERE MONTH(created_at)=MONTH(NOW()) 
           UNION (SELECT responsable, (select  tipo from servicios where id = servicio_id) as TipoServicio, 
           (select  precio from servicios where id = servicio_id) as Precio,
           (select  categoria from servicios where id = servicio_id) as categoria, created_at 
           FROM creditoventas 
           WHERE MONTH(created_at)=MONTH(NOW())) ");
        
    }
    /* DB::statement(" CREATE VIEW todaslasventas AS 
           SELECT cliente_id, servicio_id, responsable, created_at FROM contado_ventas 
           where MONTH(created_at)=MONTH(NOW()) 
           UNION (SELECT cliente_id, servicio_id, responsable, created_at FROM creditoventas 
           WHERE MONTH(created_at)=MONTH(NOW())) ");*/

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
