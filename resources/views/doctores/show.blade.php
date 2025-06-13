@extends('layouts.app')
@section('title', 'Productos')
@section('content')
    <hr>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Doctores</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <div class="row text-center">
                <div class="col">
                    <h3>Listado de doctores</h3>
                </div>
                <div class="col">
                    <button class="btn btn-md btn-dark" id="addForm" path="/doctores/create" data-bs-toggle="modal"
                        data-bs-target="#myModal">
                        Crear Doctor
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered" id="datatables">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                </thead>
            </table>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var ruta = "/doctores/show";
            var columnas = [{
                    data: 'id'
                },
                {
                    data: 'nombre'
                },
                {
                    data: 'especialidad'
                },
                {
                    data: 'codigo'
                }
            ]
            dt = generateDataTable(ruta, columnas);
        });
    </script>
@endsection
