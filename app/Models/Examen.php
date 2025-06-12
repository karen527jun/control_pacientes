<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    protected $table="mnt_examen";
    protected $primaryKey = "id";
    protected $fillable = [
        'nombre',
    ];
    public $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;
    public static function getFilteredData($search) {
        return Examen::select( 'mnt_examen.*')

            ->where('mnt_examen.id', 'like', $search)
            ->orWhere('mnt_examen.nombre', 'like', $search);

    }

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage) {
        //se utiliza self para invocar metodo static dentro de la misma clase
        $query = self::getFilteredData($search);
        if ($itemsPerPage !== -1) {//validar para extraer todos los datos
            $query->skip($skip)
                  ->take($itemsPerPage);
        }
        $query->orderBy("mnt_examen.$sortBy", $sort);

        return $query->get();

    }
}
