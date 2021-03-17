<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitantes', function (Blueprint $table) {
            $table->bigIncrements('id');

            /* Este campo podemos quitarlo de la base de datos y trabajar el count desde la table 
            en la vista visitas */
            $table->integer('no_visitas');
            $table->string('empresa');

            $table->string('nombre');
            $table->string('apellido');
            $table->string('contacto');
            $table->string('rh');
            $table->string('eps');
            $table->string('t_visita');
            $table->string('documento');


            $table->text('politica_confidencialidad')->nullable();
            $table->text('proteccion_datos')->nullable();
            $table->text('seguridad_salud_trabajo')->nullable();

            /* este campo hace referencia a el estado del vivisitante
            en el sistema Activo/Inactivo */
            $table->string('estado');


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
        Schema::dropIfExists('visitantes');
    }
}
