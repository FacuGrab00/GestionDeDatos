<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->increments('id_visita');
            $table->decimal('senal', 10, 2)->nullable();
            $table->date('fecha')->nullable(false);
            $table->string('duracion', 50)->nullable(false);
            $table->string('DNI_cliente', 20)->nullable(false);
            $table->string('codigo_cliente', 20)->nullable(false);
            $table->string('DNI_agente', 20)->nullable(false);
            $table->integer('codigo_inmueble')->nullable();
            $table->string('estado', 20)->nullable(false)->default('PENDIENTE');

            $table->foreign(['DNI_cliente', 'codigo_cliente'])->references(['DNI', 'codigo_cliente'])->on('clientes')->onDelete('cascade');
            $table->foreign('DNI_agente')->references('DNI')->on('agentes_comerciales')->onDelete('cascade');
            $table->foreign('codigo_inmueble')->references('codigo_inmueble')->on('inmuebles')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visitas');
    }
};
