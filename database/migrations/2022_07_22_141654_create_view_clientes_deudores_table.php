<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewClientesDeudoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(" CREATE VIEW clientes_deudores AS
        select creditoventas.id, date_format(creditoventas.created_at, '%d-%m-%Y') AS created_at,
        cliente_id, servicios.tipo, empleado_id, estado,
        servicios.precio - servicios.prima - IFNULL(SUM(pagos.cuota),0)  AS pagar,
        date_format(IFNULL(MAX(pagos.created_at),creditoventas.created_at), '%d-%m-%Y') AS ultimo,
		clientes.telefono,clientes.nombres,clientes.apellidos
        FROM creditoventas
        join clientes on cliente_id = clientes.id
        join servicios on servicios.id = creditoventas.servicio_id
        left join pagos on pagos.venta_id = creditoventas.id
        WHERE (select IFNULL(MAX(pagos.created_at),a.created_at)
        FROM creditoventas a
        join servicios on servicios.id = a.servicio_id
        left join pagos on pagos.venta_id = a.id
        WHERE a.id = creditoventas.id
        group by a.id
        ) < (NOW() - INTERVAL 2 MONTH)
        group by creditoventas.id ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW clientes_deudores");
    }
}
