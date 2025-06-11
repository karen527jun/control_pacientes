<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table="mnt_doctor";
    protected $primaryKey = "id";
    protected $fillable = [
        'nombre',
        'especialidad',
    ];
    public $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;
    public static function getFilteredData($search) {
        return Doctor::select( columns: 'mnt_doctor.*')

            ->where('mnt_doctor.especialidad', 'like', $search)
            ->orWhere('mnt_doctor.nombre', 'like', $search);

    }

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage) {
        //se utiliza self para invocar metodo static dentro de la misma clase
        $query = self::getFilteredData($search);
        if ($itemsPerPage !== -1) {//validar para extraer todos los datos
            $query->skip($skip)
                  ->take($itemsPerPage);
        }
        $query->orderBy("mnt_doctor.$sortBy", $sort);

        return $query->get();

    }
}
