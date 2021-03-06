<?php

use Illuminate\Database\Seeder;

class VisitanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visitantes')->insert([
            'documento' => '1024463821',
            'empresa' => 'COS',
            'nombre' => 'Patricia',
            'apellido' => 'Rivera',
            'contacto' => '3219821061',
            'rh' => 'O+',
            'eps' => 'Compensar',
            't_visita' => 'Cliente',
            'estado' => 'Activo',
            'no_visitas' => 0,
            'no_salidas' => 0,
            'politica_confidencialidad' => 'Si acepto',
            'proteccion_datos' => 'Si acepto',
            'seguridad_salud_trabajo' => 'Si acepto'

        ]);

        factory(control_visitantes\Visitante::class, 50)->create();
    }
}
