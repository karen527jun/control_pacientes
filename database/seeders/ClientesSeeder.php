<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array([
            'nombre'=> 'Karen',
            'edad'=>25,
            'categoria'=> 1,
            'created_at'=>Carbon::now()
        ],
        [
            'nombre'=> 'Walter',
            'edad'=>26,
            'categoria'=> 2,
            'created_at'=>Carbon::now()
        ],
        [
            'nombre'=> 'Francisco',
            'edad'=>25,

            'categoria'=> 1,
            'created_at'=>Carbon::now()
        ],
        [
            'nombre'=> 'Henry',
            'edad'=>23,
            'categoria'=> 4,
            'created_at'=>Carbon::now()
        ],
        [
            'nombre'=> 'Karla',
            'edad'=>24,
            'categoria'=> 3,
            'created_at'=>Carbon::now()
        ],
        [
            'nombre'=> 'Carlos',
            'edad'=>27,
            'categoria'=> 5,
            'created_at'=>Carbon::now()
        ],
        [
            'nombre'=> 'Lucy',
            'edad'=>28,
            'categoria'=> 6,
            'created_at'=>Carbon::now()
        ],
        [
            'nombre'=> 'Andrés',
            'edad'=>28,
            'categoria'=> 3,
            'created_at'=>Carbon::now()
        ],
        [
            'nombre'=> 'Oliver',
            'edad'=>20,
            'categoria'=> 7,
            'created_at'=>Carbon::now()
        ],
        [
            'nombre'=> 'Ariel',
            'edad'=>26,
            'categoria'=> 6,
            'created_at'=>Carbon::now()
        ],
        [
            'nombre'=> 'Miguel',
            'edad'=>30,
            'categoria'=> 1,
            'created_at'=>Carbon::now()
        ],
        [
            'nombre'=> 'Noe',
            'edad'=>31,
            'categoria'=> 1,
            'created_at'=>Carbon::now()
        ],
    );
    DB::table('clientes')->insert($data);
    }
}
