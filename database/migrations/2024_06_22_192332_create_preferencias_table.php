<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('preferencias', function (Blueprint $table) {
            $table->integer('secuencia')->notNull();
            $table->string('DNI', 20);
            $table->string('codigo_cliente', 20);
            $table->date('fecha')->notNull();
            $table->integer('numero_de_habitaciones')->notNull();
            $table->decimal('precio_maximo', 10, 2)->nullable();
            $table->decimal('precio_minimo', 10, 2)->default(0)->notNull();
            $table->string('tipo', 50)->notNull();
            $table->primary(['DNI', 'codigo_cliente', 'secuencia']);
            $table->foreign(['DNI', 'codigo_cliente'])->references(['DNI', 'codigo_cliente'])->on('clientes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('preferencias');
    }
};
