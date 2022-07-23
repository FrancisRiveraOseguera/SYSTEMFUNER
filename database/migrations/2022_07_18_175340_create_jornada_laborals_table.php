<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJornadaLaboralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jornada_laborals', function (Blueprint $table) {
            $table->id();
            $table->integer('empleado_id');
            $table->integer('turno_id');
            $table->string('descripcion');
            $table->date('fecha_inicio')->notnull();
            $table->date('fecha_fin')->notnull();
            $table->string('duracion');
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
        Schema::dropIfExists('jornada_laborals');
    }
}
