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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->integer('adultos');
            $table->integer('ninos');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->unsignedFloat('valor',12,2);
            $table->string('documento');
            $table->foreign('documento')->references('documento')->on('users');
            $table->string('nro_hab',3);
            $table->foreign('nro_hab')->references('hab_numero')->on('habitaciones');
            $table->unsignedBigInteger('est_id');
            $table->foreign('est_id')->references('id')->on('estados');
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
        Schema::dropIfExists('reservas');
    }
};
