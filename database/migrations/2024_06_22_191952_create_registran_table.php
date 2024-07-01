<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('registran', function (Blueprint $table) {
            $table->string('codigo_de_agencia', 20);
            $table->string('DNI_cliente', 20);
            $table->string('codigo_cliente', 20);
            $table->string('DNI_agente', 20);
            $table->date('fecha_registro');

            $table->primary(['codigo_de_agencia', 'DNI_cliente']);
            $table->foreign('codigo_de_agencia')->references('codigo_de_agencia')->on('agencias');
            $table->foreign(['DNI_cliente', 'codigo_cliente'])->references(['DNI', 'codigo_cliente'])->on('clientes');
            $table->foreign('DNI_agente')->references('DNI')->on('agentes_comerciales');
        });
    }

    public function down()
    {
        Schema::dropIfExists('registran');
    }
};
