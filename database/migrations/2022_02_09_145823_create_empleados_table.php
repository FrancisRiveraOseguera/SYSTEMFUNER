<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {

            $table->increments('id');
            $table->char('identidad', 13);
            $table->string('nombres', 35);
            $table->string('apellidos', 35);
            $table->string('genero');
            $table->string('direccion', 100);
            $table->date('fecha_ingreso');
            $table->string('cargo_id');
            $table->date('fecha_de_nacimiento');
            $table->char('telefono', 8)->nullable();
            $table->char('contacto_de_emergencia', 8)->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
