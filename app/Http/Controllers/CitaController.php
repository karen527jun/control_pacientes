<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CitaController extends Controller
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
        return view('citas/show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $doctores = Doctor::all();
        return view('citas/create')->with(['pacientes'=>$pacientes, 'doctores'=>$doctores]);
    }

    /**
     * Store a newly created resource in storage.
     */
     public function validarCampos($request){
        return Validator::make($request->all(),[
            'paciente'=>'required',
            'doctor'=>'required',
            'fecha'=>'required',
            'hora'=>'required'
        ], [
            'paciente.required'=> 'El paciente es obligatorio',
            'doctor.required'=> 'El doctor es obligatorio',
            'fecha.required'=> 'La fecha es obligatoria',
            'hora.required'=> 'La hora es obligatoria',

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
            $cita = Cita::create($request->all());
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
            $itemsPerPage =  Cita::count();
            $skip = 0;
        }

        //config to ordering
        $sortBy = $request->input('columns.'.$request->input('order.0.column').'.data',default: 'id');
        $sort = ($request->input('order.0.dir') === 'asc') ? 'asc' : 'desc';

        //config to search
        $search = $request->input('search.value', '');
        $search = "%$search%";

        //get register filtered
        $filteredCount = Cita::getFilteredData($search)->count();
        $citas = Cita::allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage);
        //esto es para reutilizar la funcion para generar datatable en functions.js
        $citas = $citas->map(function ($citas) {
            $citas->path = 'citas';//sirve para la url de editar y eliminar
            return $citas;
        });
        //se retorna una array estructurado para el data table
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => Cita::count(),
            'recordsFiltered' => $filteredCount,
            'data' => $citas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pacientes = Paciente::all();
        $doctores = Doctor::all();
        $cita = Cita::find($id);
        return view('citas/update')->with(['pacientes'=>$pacientes, 'doctores'=>$doctores,'cita'=>$cita]);
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
            $cita =  Cita::find($id);
            if($cita){
                $cita->update([
                    'paciente'=>$request->paciente,
                    'doctor'=>$request->doctor,
                    'fecha'=>$request->fecha,
                    'hora'=>$request->hora,
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
