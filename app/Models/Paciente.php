<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table="mnt_paciente";
    protected $primaryKey = "id";
    protected $fillable = [
        'nombre',
        'edad',
        'peso'
    ];
    public $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;
    public static function getFilteredData($search) {
        return Paciente::select( 'mnt_paciente.*')

            ->where('mnt_paciente.id', 'like', $search)
            ->orWhere('mnt_paciente.nombre', 'like', $search);

    }

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage) {
        //se utiliza self para invocar metodo static dentro de la misma clase
        $query = self::getFilteredData($search);
        if ($itemsPerPage !== -1) {//validar para extraer todos los datos
            $query->skip($skip)
                  ->take($itemsPerPage);
        }
        $query->orderBy("mnt_paciente.$sortBy", $sort);

        return $query->get();

    }
}
