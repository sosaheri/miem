<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanciamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financiamientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user');
            $table->float('monto', 8,2);
            $table->string('comprobante');
            $table->date('fecha');
            $table->string('cuota');
            $table->string('metodo_de_pago');
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
        Schema::dropIfExists('financiamientos');
    }
}
