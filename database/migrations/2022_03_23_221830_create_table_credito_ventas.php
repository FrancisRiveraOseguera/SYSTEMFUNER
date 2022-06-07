<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCreditoVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditoventas', function (Blueprint $table) {
            $table->id();
            $table->integer('cliente_id');
            $table->integer('empleado_id');
            $table->integer('servicio_id');
            $table->string('beneficiario1');
            $table->char('telefono1', 8);
            $table->string('beneficiario2');
            $table->char('telefono2', 8);
            $table->string('beneficiario3')->nullable();
            $table->char('telefono3', 8)->nullable();
            $table->string('beneficiario4')->nullable();
            $table->char('telefono4', 8)->nullable();
            $table->date('fecha')->notnull();
            $table->String('fechaCobro')->notnull();
            $table->string('contratotipo')->default('A crédito');
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
        Schema::dropIfExists('creditoventas');
    }
}
