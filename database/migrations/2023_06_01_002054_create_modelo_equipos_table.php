<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeloEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelo_equipos', function (Blueprint $table) {

            $table->bigIncrements('id')->nullable();
            $table->string('nombre_modelo_equipo')->nullable();
            $table->unsignedBigInteger('marca_equipo_id')->nullable();
            //clave foranea
            $table->foreign('marca_equipo_id')->references('id')->on('marca_equipos')->OnDelete('cascade');
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
        Schema::dropIfExists('modelo_equipos');
    }
}
