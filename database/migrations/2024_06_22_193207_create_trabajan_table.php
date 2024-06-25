<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('trabajan', function (Blueprint $table) {
            $table->string('DNI', 20);
            $table->string('codigo_de_agencia', 20);
            $table->primary(['DNI', 'codigo_de_agencia']);
            $table->foreign('DNI')->references('DNI')->on('agentes_comerciales')->onDelete('cascade');
            $table->foreign('codigo_de_agencia')->references('codigo_de_agencia')->on('agencias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trabajan');
    }
};
