<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('viviendas', function (Blueprint $table) {
            $table->string('codigo_inmueble', 20)->primary();
            $table->integer('banios');
            $table->integer('numero_habitaciones');
            $table->string('descripcion', 255)->nullable();
            $table->decimal('superficie', 10, 2);
            $table->boolean('plaza_garaje');
            $table->foreign('codigo_inmueble')->references('codigo_inmueble')->on('inmuebles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('viviendas');
    }
};
