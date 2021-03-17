<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->bigIncrements('id'); //primary key
            /* Este es el campo FK con la tabla visitantes */
            $table->unsignedBigInteger('visitante_id');

            $table->string('reg_pertenencias');
            $table->foreignId('visitante_id')->references('id')->('visitantes')->onDelete('cascade');
            $table->string('sede');
            $table->text('descripcion');
            $table->string('tip_visitante');
            $table->string('serial');
            $table->string('visita');
            $table->string('motivo');
            $table->string('resp_visita');
            $table->string('vehiculo');
            $table->string('reg_vehiculo');
            $table->string('img_vehiculo');

            $table->timestamps();

            $table->foreign("visitante_id")
                ->references("id")
                ->on("visitantes")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitas');
    }
}
