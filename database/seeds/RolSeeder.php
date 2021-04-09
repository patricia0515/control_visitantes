<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'descripcion' => 'test',
            'rol' => 'Supervisor',
            'descripcion_rol' => 'test'
        ]);

        DB::table('roles')->insert([
            'descripcion' => 'test',
            'rol' => 'Supervisor',
            'descripcion_rol' => 'test'
        ]);
    }
}
