<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicamentoController extends Controller
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
        return view('medicamentos/show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicamentos/create');
    }

    public function validarCampos($request){
        return Validator::make($request->all(),[
            'nombre'=>'required',
            'dosis'=>'required',
        ], [
            'nombre.required'=> 'El nombre es obligatorio',
            'dosis.required'=> 'El dosis es obligatorio',
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $this->validarCampos($request);
        if($validacion->fails()){
            return response()->json([
                'code'=>422,
                'message'=>$validacion->messages()
            ], 422);
        }else{
            $paciente = Medicamento::create($request->all());
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
            $itemsPerPage = Medicamento::count();
            $skip = 0;
        }

        //config to ordering
        $sortBy = $request->input('columns.'.$request->input('order.0.column').'.data',default: 'id');
        $sort = ($request->input('order.0.dir') === 'asc') ? 'asc' : 'desc';

        //config to search
        $search = $request->input('search.value', '');
        $search = "%$search%";

        //get register filtered
        $filteredCount =Medicamento::getFilteredData($search)->count();
        $medicamento =Medicamento::allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage);
        //esto es para reutilizar la funcion para generar datatable en functions.js
        $medicamento = $medicamento->map(function ($medicamento) {
            $medicamento->path = 'medicamentos';//sirve para la url de editar y eliminar
            return $medicamento;
        });
        //se retorna una array estructurado para el data table
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' =>Medicamento::count(),
            'recordsFiltered' => $filteredCount,
            'data' => $medicamento]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medicamento = Medicamento::find($id);
        return view('medicamentos/update')->with(['medicamento'=>$medicamento]);
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
            $examen =  Medicamento::find($id);
            if($examen){
                $examen->update([
                    'nombre'=>$request->nombre,
                    'dosis'=>$request->dosis,
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
        $medicamento = Medicamento::find($id);
        if($medicamento){
            $medicamento->delete();
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
