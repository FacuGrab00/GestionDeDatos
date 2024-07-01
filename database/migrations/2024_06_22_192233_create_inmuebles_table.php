<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->string('codigo_inmueble', 20)->primary();
            $table->string('propietario', 20);
            $table->string('direccion', 255);
            $table->string('estado', 50);
            $table->float('precio_venta')->nullable();
            $table->string('codigo_de_agencia', 20);
            $table->string('nombre_zona', 255);
            $table->integer('id_ciudad');
            $table->date('fecha_disponible')->nullable();

            $table->foreign('propietario')->references('DNI')->on('clientes');
            $table->foreign('codigo_de_agencia')->references('codigo_de_agencia')->on('agencias');
            $table->foreign(['id_ciudad', 'nombre_zona'])->references(['id_ciudad', 'nombre'])->on('zonas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inmuebles');
    }
};
