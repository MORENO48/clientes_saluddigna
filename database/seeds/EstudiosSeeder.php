<?php

use Illuminate\Database\Seeder;

class EstudiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estudios')->insert([
            'nombre' => 'Laboratorio Clinico',
            'precio' => 6500
        ]);
        DB::table('estudios')->insert([
            'nombre' => 'Densitometria',
            'precio' => 8350
        ]);
    }
}
