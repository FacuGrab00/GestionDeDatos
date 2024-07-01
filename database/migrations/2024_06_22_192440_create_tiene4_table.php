<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tienen_4', function (Blueprint $table) {
            $table->integer('secuencia');
            $table->string('nombre_zona', 255);
            $table->integer('id_ciudad');
            $table->string('codigo_cliente', 20);
            $table->string('DNI_cliente', 20);
            $table->primary(['secuencia', 'nombre_zona', 'id_ciudad', 'DNI_cliente', 'codigo_cliente']);
            $table->foreign(['id_ciudad', 'nombre_zona'])->references(['id_ciudad', 'nombre'])->on('zonas');
            $table->foreign(['DNI_cliente', 'codigo_cliente'])->references(['DNI', 'codigo_cliente'])->on('clientes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tiene_4');
    }
};
