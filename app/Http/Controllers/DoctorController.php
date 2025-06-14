<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
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
        return view('doctores/show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctores/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function validarCampos($request){
        return Validator::make($request->all(),[
            'nombre'=>'required',
            'especialidad'=>'required',
        ], [
            'nombre.required'=> 'El nombre es obligatorio',
            'especialidad.required'=> 'El especialidad es obligatorio',

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
            $paciente = Doctor::create($request->all());
            return response()->json([
                'code'=>200,
                'message'=>'Se creó el registro correctamente'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( Request $request)
    {
        $itemsPerPage = $request->input('length', 10);//registros por pagina
        $skip = $request->input('start', 0);//obtener indice inicial

        //para extraer todos los registros
        if ($itemsPerPage == -1) {
            $itemsPerPage = Doctor::count();
            $skip = 0;
        }

        //config to ordering
        $sortBy = $request->input('columns.'.$request->input('order.0.column').'.data',default: 'id');
        $sort = ($request->input('order.0.dir') === 'asc') ? 'asc' : 'desc';

        //config to search
        $search = $request->input('search.value', '');
        $search = "%$search%";

        //get register filtered
        $filteredCount =Doctor::getFilteredData($search)->count();
        $doctor =Doctor::allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage);
        //esto es para reutilizar la funcion para generar datatable en functions.js
        $doctor = $doctor->map(function ($doctor) {
            $doctor->path = 'doctores';//sirve para la url de editar y eliminar
            return $doctor;
        });
        //se retorna una array estructurado para el data table
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' =>Doctor::count(),
            'recordsFiltered' => $filteredCount,
            'data' => $doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor = Doctor::find($id);
        return view('doctores/update')->with(['doctor'=>$doctor]);
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
            $doctor =  Doctor::find($id);
            if($doctor){
                $doctor->update([
                    'nombre'=>$request->nombre,
                    'especialidad'=>$request->especialidad,
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
        $doctor = Doctor::find($id);
        if($doctor){
            $doctor->delete();
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
