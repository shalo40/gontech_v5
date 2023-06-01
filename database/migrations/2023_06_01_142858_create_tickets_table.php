<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
        
            //CLIENTE
            $table->unsignedBigInteger('cliente_id')->nullable();
            //PERSONAL
            $table->unsignedBigInteger('responsable_id')->nullable();    
            //EQUIPO
            $table->unsignedBigInteger('equipo_id')->nullable();
            //PROCEDIMIENTO
            $table->unsignedBigInteger('procedimiento_id')->nullable();    
            //TICKET
            $table->dateTime('fecha_hora_asignacion')->nullable();
            $table->dateTime('fecha_hora_limite_respuesta')->nullable();
            //DETALLE TICKET
            $table->string('tipo_servicio')->nullable();
            $table->string('area_del_requerimiento')->nullable();
            $table->string('descripcion_problema')->nullable();
            $table->string('estado_ticket')->nullable();
            $table->timestamps();
            //CLAVES FORANEAS
            $table->foreign('cliente_id')->references('id')->on('clientes')->OnDelete('cascade');
            $table->foreign('responsable_id')->references('id')->on('personals')->OnDelete('cascade');
            $table->foreign('equipo_id')->references('id')->on('equipos')->OnDelete('cascade');
            $table->foreign('procedimiento_id')->references('id')->on('procedimientos')->OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
