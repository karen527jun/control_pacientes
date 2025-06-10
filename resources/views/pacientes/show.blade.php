@extends('layouts.app')
@section('title', 'Productos')
@section('content')
    <hr>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pacientes</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <div class="row text-center">
                <div class="col">
                    <h3>Listado de pacientes</h3>
                </div>
                <div class="col">
                    <button class="btn btn-md btn-dark" id="addForm" path="/products/create" data-bs-toggle="modal"
                        data-bs-target="#myModal">
                        Crear Paciente
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered" id="datatables">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Marca</th>
                    <th>Acciones</th>
                </thead>
            </table>
        </div>
    </div>

@endsection
{{-- @section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var ruta = "";
            var columnas = [{
                    data: 'codigo'
                },
                {
                    data: 'nombre'
                },
                {
                    data: 'precio'
                },
                {
                    data: 'marca'
                },
                {
                    data: 'codigo'
                }
            ]
            dt = generateDataTable(ruta, columnas);
        });
    </script>
@endsection --}}
