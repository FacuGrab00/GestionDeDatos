<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->string('DNI', 20)->primary();
            $table->string('direccion', 255);
            $table->string('nombre', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas');
    }
};
