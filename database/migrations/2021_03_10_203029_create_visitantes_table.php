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
            $table->string('empresa');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('contacto');
            $table->string('rh');
            $table->string('eps');
            $table->string('t_visita');
            $table->string('documento');
            /* Este campo viene siendo la FK con la tabla visitas */
            $table->string('visitas')->nullable();

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
