<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;
    protected $table="mnt_medicamento_asignado";
    protected $primaryKey = "id";
    protected $fillable = [
        'nombre',
        'dosis',
    ];
    public $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;
    public static function getFilteredData($search) {
        return Medicamento::select( 'mnt_medicamento_asignado.*')

            ->where('mnt_medicamento_asignado.id', 'like', $search)
            ->orWhere('mnt_medicamento_asignado.nombre', 'like', $search);

    }

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage) {
        //se utiliza self para invocar metodo static dentro de la misma clase
        $query = self::getFilteredData($search);
        if ($itemsPerPage !== -1) {//validar para extraer todos los datos
            $query->skip($skip)
                  ->take($itemsPerPage);
        }
        $query->orderBy("mnt_medicamento_asignado.$sortBy", $sort);

        return $query->get();

    }
}
