<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id('codigo_inmueble')->primary();
            $table->string('propietario', 20);
            $table->string('direccion', 255);
            $table->string('estado', 50);
            $table->decimal('precio_venta', 10, 2)->nullable();
            $table->string('codigo_de_agencia', 20)->nullable();
            $table->string('DNI', 20)->nullable();
            $table->string('nombre_zona', 255)->nullable();
            $table->unsignedBigInteger('id_ciudad')->nullable();

            $table->foreign('propietario')->references('DNI')->on('clientes')->onDelete('set null');
            $table->foreign('codigo_de_agencia')->references('codigo_de_agencia')->on('agencias')->onDelete('set null');
            $table->foreign(['id_ciudad', 'nombre_zona'])->references(['id_ciudad', 'nombre'])->on('zonas')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inmuebles');
    }
};
