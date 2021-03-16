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
            $table->string('reg_pertenencias')->nullable();
            $table->string('sede')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('tip_visitante')->nullable();
            $table->string('serial')->nullable();
            $table->string('visita')->nullable();
            $table->string('motivo')->nullable();
            $table->string('resp_visita')->nullable();
            $table->string('vehiculo')->nullable();
            $table->string('reg_vehiculo')->nullable();

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
        Schema::dropIfExists('visitas');
    }
}
