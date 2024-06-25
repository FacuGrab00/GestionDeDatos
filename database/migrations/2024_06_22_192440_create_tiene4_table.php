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
            $table->unsignedBigInteger('id_ciudad');
            $table->primary(['secuencia', 'nombre_zona']);
            $table->foreign(['id_ciudad', 'nombre_zona'])->references(['id_ciudad', 'nombre'])->on('zonas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tiene_4');
    }
};
