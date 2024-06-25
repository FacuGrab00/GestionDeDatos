<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('zonas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_ciudad');
            $table->string('nombre', 255);
            $table->string('codigo_de_agencia', 20)->nullable();
            $table->primary(['id_ciudad', 'nombre']);
            $table->foreign('id_ciudad')->references('id_ciudad')->on('ciudades')->onDelete('cascade');
            $table->foreign('codigo_de_agencia')->references('codigo_de_agencia')->on('agencias')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('zonas');
    }
};
