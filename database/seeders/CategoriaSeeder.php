<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $data = array([
        'nombre'=> 'Cliente',
        'created_at'=>Carbon::now()
     ],
     [
        'nombre'=> 'Super cliente',
        'created_at'=>Carbon::now()
     ],
     [
        'nombre'=> 'VIP',
        'created_at'=>Carbon::now()
     ],
     [
        'nombre'=> 'VIP+',
        'created_at'=>Carbon::now()
     ],
     [
        'nombre'=> 'Socio',
        'created_at'=>Carbon::now()
     ],
     [
        'nombre'=> 'SocioVerano',
        'created_at'=>Carbon::now()
     ],
     [
        'nombre'=> 'Promo',
        'created_at'=>Carbon::now()
     ],

    );
    DB::table('categorias')->insert($data);
    }
}
