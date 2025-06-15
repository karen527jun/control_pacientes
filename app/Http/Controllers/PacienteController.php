<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PacienteController extends Controller
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

        return view('pacientes/show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes/create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function validarCampos($request){
        return Validator::make($request->all(),[
            'nombre'=>'required',
            'peso'=>'required',
            'edad'=>'required'
        ], [
            'nombre.required'=> 'El nombre es obligatorio',
            'peso.required'=> 'El peso es obligatorio',
            'edad.required'=> 'La edad es obligatoria'

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
            $paciente = Paciente::create($request->all());
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
            $itemsPerPage =  Paciente::count();
            $skip = 0;
        }

        //config to ordering
        $sortBy = $request->input('columns.'.$request->input('order.0.column').'.data',default: 'id');
        $sort = ($request->input('order.0.dir') === 'asc') ? 'asc' : 'desc';

        //config to search
        $search = $request->input('search.value', '');
        $search = "%$search%";

        //get register filtered
        $filteredCount = Paciente::getFilteredData($search)->count();
        $paciente = Paciente::allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage);
        //esto es para reutilizar la funcion para generar datatable en functions.js
        $paciente = $paciente->map(function ($paciente) {
            $paciente->path = 'pacientes';//sirve para la url de editar y eliminar
            return $paciente;
        });
        //se retorna una array estructurado para el data table
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => Paciente::count(),
            'recordsFiltered' => $filteredCount,
            'data' => $paciente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paciente = Paciente::find($id);
        return view('pacientes/update')->with(['paciente'=>$paciente]);
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
            $paciente =  Paciente::find($id);
            if($paciente){
                $paciente->update([
                    'nombre'=>$request->nombre,
                    'edad'=>$request->edad,
                    'peso'=>$request->peso,
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
        $paciente = Paciente::find($id);
        if($paciente){
            $paciente->delete();
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
