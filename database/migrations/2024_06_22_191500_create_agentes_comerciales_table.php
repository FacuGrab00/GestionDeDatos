<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('agentes_comerciales', function (Blueprint $table) {
            $table->string('DNI', 20)->primary();
            $table->date('fecha_contratacion');
            $table->string('antiguedad', 20);
            $table->integer('cantidad_anual_facturada')->default(0);
            $table->foreign('DNI')->references('DNI')->on('personas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agentes_comerciales');
    }
};
