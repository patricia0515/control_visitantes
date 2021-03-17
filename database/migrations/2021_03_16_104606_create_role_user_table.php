<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            /* Vamos a crear la FK con la tabla roles entonces,
            creo el campo role_id y lo enlaso con el id que esta en la tabla role y 
            dejamos la eliminación en cascada  */
            $table->foreignId('role_id')->references('id')->on('roles')->onDelete('cascade');
            /* De igual manera creamos la FK con la tabla users */
            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('role_user');
    }
}
