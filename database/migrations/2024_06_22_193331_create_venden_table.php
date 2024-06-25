<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('venden', function (Blueprint $table) {
            $table->string('DNI', 20);
            $table->string('DNI_agente', 20);
            $table->integer('codigo_inmueble');
            $table->date('fecha_disponible');
            $table->primary(['DNI', 'DNI_agente', 'codigo_inmueble']);
            $table->foreign('DNI')->references('DNI')->on('clientes')->onDelete('cascade');
            $table->foreign('DNI_agente')->references('DNI')->on('agentes_comerciales')->onDelete('cascade');
            $table->foreign('codigo_inmueble')->references('codigo_inmueble')->on('inmuebles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('venden');
    }
};
