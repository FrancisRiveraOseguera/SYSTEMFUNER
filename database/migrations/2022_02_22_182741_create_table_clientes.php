<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 35);
            $table->string('apellidos', 35);
            $table->char('identidad', 13)->unique();
            $table->date('fecha_de_nacimiento');
            $table->string('direccion', 100);
            $table->char('telefono', 8);
            $table->string('tipo_de_servicio', 20);
            $table->string('nombre_beneficiario_1', 60);
            $table->char('telefono_beneficiario_1', 8);
            $table->string('nombre_beneficiario_2', 60);
            $table->char('telefono_beneficiario_2', 8);
            $table->string('nombre_beneficiario_3', 60)->nullable();
            $table->char('telefono_beneficiario_3', 8)->nullable();
            $table->string('nombre_beneficiario_4', 60)->nullable();
            $table->char('telefono_beneficiario_4', 8)->nullable();
            $table->string('ocupacion', 50);
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
        Schema::dropIfExists('clientes');
    }
}
