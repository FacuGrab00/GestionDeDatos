<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('preferencias', function (Blueprint $table) {
            $table->integer('secuencia');
            $table->string('DNI', 20);
            $table->date('fecha');
            $table->integer('numero_de_habitaciones');
            $table->decimal('precio_maximo', 10, 2)->nullable();
            $table->decimal('precio_minimo', 10, 2)->default(0);
            $table->string('tipo', 50);
            $table->primary(['DNI', 'secuencia']);
            $table->foreign('DNI')->references('DNI')->on('clientes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('preferencias');
    }
};
