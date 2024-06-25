<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
            $table->integer('num_tel')->unsigned();
            $table->integer('cod_area')->unsigned();
            $table->string('DNI', 20);
            $table->primary(['DNI', 'num_tel']);
            $table->foreign('DNI')->references('DNI')->on('personas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('telefonos');
    }
};
