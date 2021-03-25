<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER contar_visitas
	        AFTER INSERT ON visitas
            FOR EACH ROW
                UPDATE visitantes set no_visitas = no_visitas + 1 
                WHERE visitantes.id = NEW.visitante_id;');

        /* DB::unprepared('CREATE TRIGGER contar_salidas
        AFTER UPDATE ON visitas
        FOR EACH ROW

            UPDATE visitantes set no_salidas = no_salidas + 1 
            WHERE  old.tipo <=> new.tipo;'); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contar_visitas');
        Schema::dropIfExists('contar_salidas');
    }
}
