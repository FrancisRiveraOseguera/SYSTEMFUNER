<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableContadoVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contado_ventas', function (Blueprint $table) {
            $table->id();
            $table->integer('cliente_id');
            $table->string('responsable');
            $table->integer('servicio_id');
            $table->integer('cantidad_v');
            $table->date('fecha')->notnull();
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
        Schema::dropIfExists('contado_ventas');
    }
}

