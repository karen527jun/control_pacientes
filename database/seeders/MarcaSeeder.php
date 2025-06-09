<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array([
            'nombre'=> 'Nike',
            'created_at'=> Carbon::now()
        ],
        [
            'nombre'=> 'PUMA',
            'created_at'=> Carbon::now()
        ],
        [
            'nombre'=> 'New Balance',
            'created_at'=> Carbon::now()
        ]
    );
    DB::table('marcas')->insert($data);
    }

}
