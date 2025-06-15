<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table="mnt_cita_medica";
    protected $primaryKey = "id";
    protected $fillable = [
        'paciente',
        'doctor',
        'fecha',
        'hora',
    ];
    public $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;
    public static function getFilteredData($search) {
        return Cita::select( 'mnt_cita_medica.*', 'mnt_paciente.nombre AS paciente', 'mnt_doctor.nombre AS doctor')
         ->join('mnt_paciente', 'mnt_cita_medica.paciente', '=', 'mnt_paciente.id')
        ->join('mnt_doctor', 'mnt_cita_medica.doctor', '=', 'mnt_doctor.id')

        ->where('mnt_cita_medica.id', 'like', $search)
        ->orWhere('mnt_doctor.nombre', 'like', $search)
        ->orWhere('mnt_paciente.nombre', 'like', $search);

    }

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage) {
        //se utiliza self para invocar metodo static dentro de la misma clase
        $query = self::getFilteredData($search);
        if ($itemsPerPage !== -1) {//validar para extraer todos los datos
            $query->skip($skip)
                  ->take($itemsPerPage);
        }
        $query->orderBy("mnt_cita_medica.$sortBy", $sort);

        return $query->get();

    }
}
