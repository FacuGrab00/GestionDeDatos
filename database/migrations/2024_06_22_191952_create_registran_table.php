<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('registran', function (Blueprint $table) {
            $table->string('codigo_de_agencia', 20);
            $table->string('DNI', 20);
            $table->string('DNI_agente', 20);
            $table->primary(['codigo_de_agencia', 'DNI']);
            $table->foreign('codigo_de_agencia')->references('codigo_de_agencia')->on('agencias')->onDelete('cascade');
            $table->foreign('DNI')->references('DNI')->on('clientes')->onDelete('cascade');
            $table->foreign('DNI_agente')->references('DNI')->on('agentes_comerciales')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registran');
    }
};
