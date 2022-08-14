<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_inventarios', function (Blueprint $table) {
            $table->id();
            $table->integer('servicio_id');
            $table->string('empleado_id', 35);
            $table->integer('cantidad_aIngresar');
            $table->text('fecha_ingreso');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_inventarios');
    }
}
