<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Consulta;
use App\Models\Doctor;
use App\Models\Examen;
use App\Models\Medicamento;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('consultas/show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctor = Doctor::all();
        $paciente = Paciente::all();
        $citas = Cita::all();
        $medicamentos = Medicamento::all();
        $examenes = Examen::all();
        return view('consultas/create')->with(['citas'=> $citas, 'medicamentos'=>$medicamentos, 'examenes'=>$examenes ]);
    }

    /**
     * Store a newly created resource in storage.
     */

      public function validarCampos($request){
        return Validator::make($request->all(),[
            'detalle'=>'required',
            'diagnostico'=>'required',
            'medicamento'=>'nullable',
            'examen'=>'nullable',
            'cita_medica'=>'required'
        ], [
            'detalle.required'=> 'El detalle es obligatorio',
            'diagnostico.required'=> 'El diagnostico es obligatorio',
            'cita_medica.required'=> 'La cita es obligatoria',

        ]);
    }
    public function store(Request $request)
    {
         $validacion = $this->validarCampos($request);
        if($validacion->fails()){
            return response()->json([
                'code'=>422,
                'message'=>$validacion->messages()
            ], 422);
        }else{
            $consulta = Consulta::create($request->all());
            return response()->json([
                'code'=>200,
                'message'=>'Se creó el registro correctamente'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $itemsPerPage = $request->input('length', 10);//registros por pagina
        $skip = $request->input('start', 0);//obtener indice inicial

        //para extraer todos los registros
        if ($itemsPerPage == -1) {
            $itemsPerPage =  Consulta::count();
            $skip = 0;
        }

        //config to ordering
        $sortBy = $request->input('columns.'.$request->input('order.0.column').'.data',default: 'id');
        $sort = ($request->input('order.0.dir') === 'asc') ? 'asc' : 'desc';

        //config to search
        $search = $request->input('search.value', '');
        $search = "%$search%";

        //get register filtered
        $filteredCount = Consulta::getFilteredData($search)->count();
        $consulta = Consulta::allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage);
        //esto es para reutilizar la funcion para generar datatable en functions.js
        $consulta = $consulta->map(function ($consulta) {
            $consulta->path = 'consultas';//sirve para la url de editar y eliminar
            return $consulta;
        });
        //se retorna una array estructurado para el data table
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => Consulta::count(),
            'recordsFiltered' => $filteredCount,
            'data' => $consulta]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $citas = Cita::all();
        $medicamentos = Medicamento::all();
        $examenes = Examen::all();
        $consulta = Consulta::find($id);
        return view('consultas/update')->with(['consulta'=>$consulta,'citas'=> $citas, 'medicamentos'=>$medicamentos, 'examenes'=>$examenes ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validacion = $this->validarCampos($request);
          if($validacion->fails()){
            return response()->json([
                'code'=> 422,
                'message' => $validacion->messages()
            ],422);
        }else{
            $consulta = Consulta::find($id);
            if($consulta){
                $consulta->update([
                    'cita_medica'=>$request->cita_medica,
                    'detalle'=>$request->detalle,
                    'diagnostico'=>$request->diagnostico,
                    'medicamento'=>$request->medicamento,
                    'examen'=>$request->examen,

                ]);
                return response()->json([
                'code'=> 200,
                'message' => "Registro actualizado"
            ],200);
            }else{
                return response()->json([
                'code'=> 404,
                'message' => "Registro no encontrado"
            ],404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cita = Cita::find($id);
        if($cita){
            $cita->delete();
            return response()->json([
                'code'=> 200,
                'message' => "Registro actualizado"
            ],200);
        }else{
                return response()->json([
                'code'=> 404,
                'message' => "Registro no encontrado"
            ],404);
            }
    }
}
