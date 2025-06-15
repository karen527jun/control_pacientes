<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array([
            'nombre'=>'Acetaminofen',
            'dosis'=> '1 cada 6 horas'
        ],
        [
            'nombre'=>'Loratadina',
            'dosis'=> '2 al día'
        ],
        [
            'nombre'=>'Amoxicilina',
            'dosis'=> '2 al día'
        ]

    );
    DB::table('mnt_medicamento_asignado')->insert($data);
    }
}
