<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('campos', function (Blueprint $table) {
            $table->string('codigo_inmueble', 20)->primary();
            $table->decimal('superficie', 10, 2);
            $table->boolean('urbanizacion')->default(false);
            $table->foreign('codigo_inmueble')->references('codigo_inmueble')->on('inmuebles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campos');
    }
};
