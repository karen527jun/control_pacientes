<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table="mnt_consulta";
    protected $primaryKey = "id";
    protected $fillable = [
        'cita_medica',
        'doctor',
        'fecha',
        'hora',
    ];
    public $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;
    public static function getFilteredData($search) {
        return Consulta::select( 'mnt_consulta.*', 'mnt_cita_medica.fecha AS cita_medica', 'mnt_examen.nombre AS examen', 'mnt_medicamento_asignado.nombre AS medicamento')
         ->join('mnt_cita_medica', 'mnt_consulta.cita_medica', '=', 'mnt_cita_medica.id')
        ->join('mnt_examen', 'mnt_consulta.examen', '=', 'mnt_examen.id')
        ->join('mnt_medicamento_asignado', 'mnt_consulta.medicamento', '=', 'mnt_medicamento_asignado.id')


        ->where('mnt_consulta.id', 'like', $search)
        ->orWhere('mnt_examen.nombre', 'like', $search)
        ->orWhere('mnt_medicamento_asignado.nombre', 'like', $search);

    }

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage) {
        //se utiliza self para invocar metodo static dentro de la misma clase
        $query = self::getFilteredData($search);
        if ($itemsPerPage !== -1) {//validar para extraer todos los datos
            $query->skip($skip)
                  ->take($itemsPerPage);
        }
        $query->orderBy("mnt_consulta.$sortBy", $sort);

        return $query->get();

    }
}
