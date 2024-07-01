<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('compran', function (Blueprint $table) {
            $table->string('DNI_cliente', 20);
            $table->string('codigo_cliente', 20);
            $table->string('DNI_agente', 20);
            $table->string('codigo_inmueble', 20);
            $table->date('fecha_compra');
            $table->primary(['DNI_cliente', 'codigo_cliente', 'DNI_agente', 'codigo_inmueble']);
            $table->foreign(['DNI_cliente', 'codigo_cliente'])->references(['DNI', 'codigo_cliente'])->on('clientes')->onDelete('cascade');
            $table->foreign('DNI_agente')->references('DNI')->on('agentes_comerciales')->onDelete('cascade');
            $table->foreign('codigo_inmueble')->references('codigo_inmueble')->on('inmuebles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('compran');
    }
};
