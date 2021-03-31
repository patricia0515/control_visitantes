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
            'name' => 'Recepción'    
        ]);

        DB::table('roles')->insert([
            'name' => 'Supervisor'
        ]);       
    }
}
