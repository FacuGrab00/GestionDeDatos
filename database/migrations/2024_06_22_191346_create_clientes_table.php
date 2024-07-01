<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->string('DNI', 20);
            $table->string('codigo_cliente', 20);
            $table->date('fecha_registro');
            $table->primary(['DNI', 'codigo_cliente']);
            $table->foreign('DNI')->references('DNI')->on('personas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
