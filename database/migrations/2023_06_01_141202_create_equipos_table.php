<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            //CLIENTE
            $table->unsignedBigInteger('cliente_id')->nullable();
            //CATEGORIA
            $table->unsignedBigInteger('categoria_id')->nullable();
            //MARCA
            $table->unsignedBigInteger('marca_id')->nullable();
            //MODELO
            $table->unsignedBigInteger('modelo_id')->nullable();

            //EQUIPO
            $table->string('n_serie_equipo')->nullable();
            $table->dateTime('fecha_hora_ingreso')->nullable();
            $table->dateTime('fecha_hora_salida')->nullable();
            //DETALLE EQUIPO
            $table->string('accesorios_equipo')->nullable();
            $table->string('color_equipo')->nullable();
            $table->string('detalles_equipo')->nullable();
            // $table->string('foto_1')->nullable();
            // $table->string('foto_2')->nullable();

            //Claves foraneas
            //Cliente dueño del equipo
            $table->foreign('cliente_id')->references('id')->on('clientes')->OnDelete('cascade');
            //categoria
            $table->foreign('categoria_id')->references('id')->on('cat_equipos')->OnDelete('cascade');
            //marca
            $table->foreign('marca_id')->references('id')->on('marca_equipos')->OnDelete('cascade');
            //modelo
            $table->foreign('modelo_id')->references('id')->on('modelo_equipos')->OnDelete('cascade');

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
        Schema::dropIfExists('equipos');
    }
}
