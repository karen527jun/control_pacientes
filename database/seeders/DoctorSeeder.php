<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
            'nombre'=>'Walter Alcides Roemro Portillo',
            'especialidad'=> 'Dermatologo'
            ],
            [
            'nombre'=>'Karla Lisseth Romero López',
            'especialidad'=> 'Médico general'
            ],
        );
        DB::table('mnt_doctor')->insert($data);
    }
}
