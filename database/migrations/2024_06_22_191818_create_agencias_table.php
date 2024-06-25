<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('agencias', function (Blueprint $table) {
            $table->string('codigo_de_agencia', 20)->primary();
            $table->string('direccion', 255);
            $table->string('telefono', 20);
            $table->string('director', 20)->nullable();;
            $table->unsignedBigInteger('id_ciudad')->nullable();
            $table->foreign('director')->references('DNI')->on('agentes_comerciales')->onDelete('set null');
            $table->foreign('id_ciudad')->references('id_ciudad')->on('ciudades')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agencias');
    }
};
