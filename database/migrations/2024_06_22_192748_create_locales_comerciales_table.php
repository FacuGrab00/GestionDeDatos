<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('locales_comerciales', function (Blueprint $table) {
            $table->string('codigo_inmueble', 20)->primary();
            $table->decimal('area', 10, 2);
            $table->string('uso', 255)->nullable();
            $table->foreign('codigo_inmueble')->references('codigo_inmueble')->on('inmuebles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('locales_comerciales');
    }
};
