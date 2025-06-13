<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
            'nombre'=>'examen de Glucosa',
            'descripcion'=> 'Examen para medir los niveles de glucosa en la sangre'
            ],
            [
            'nombre'=>'Examen de eses',
            'descripcion'=> 'Examen para descartar parasitos en los intestinos'
            ],
            [
            'nombre'=>'Examen de orina',
            'descripcion'=> 'Examen para verificar la orina del paciente'
            ],
        );
        DB::table('mnt_examen')->insert($data);
    }
}
