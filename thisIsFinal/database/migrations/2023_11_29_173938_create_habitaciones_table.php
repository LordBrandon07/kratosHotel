<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('hab_numero',3)->unique();
            $table->unsignedBigInteger('tipo_hab');
            $table->foreign('tipo_hab')->references('id')->on('tipos');
            $table->float('tarifa',10,2);
            $table->unsignedBigInteger('capacidad');
            $table->string('ruta_imagen',255);
            $table->boolean('disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habitaciones');
    }
};
