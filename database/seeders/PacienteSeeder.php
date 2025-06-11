<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array([
        'nombre'=> 'Karen Adriana Martínez Rivera',
        'edad' => '25',
        'peso' => '134',
        'created_at'=>Carbon::now()
     ],
     [
        'nombre'=> 'Noé Francisco Martínez Ruíz',
        'edad' => '25',
        'peso' => '171',
        'created_at'=>Carbon::now()
     ]

    );
    DB::table('mnt_paciente')->insert($data);
    }
}
