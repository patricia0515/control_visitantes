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
            $table->bigIncrements('id'); //primary key

            $table->unsignedBigInteger('visitante_id');

            $table->string('reg_pertenencias');
            $table->string('sede');
            $table->text('descripcion')->nullable();
            $table->string('tip_visitante');
            $table->string('serial');
            $table->string('visita');
            $table->string('motivo');
            $table->string('resp_visita');
            $table->string('vehiculo');
            $table->string('reg_vehiculo')->nullable();

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
        Schema::dropIfExists('visitantes');
    }
}
