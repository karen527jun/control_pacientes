@extends('layouts.app')
@section('title', 'Productos')
@section('content')
    <hr>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cita</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <div class="row text-center">
                <div class="col">
                    <h3>Listado de citas asignadas</h3>
                </div>
                <div class="col">
                    <button class="btn btn-md btn-dark" id="addForm" path="/citas/create" data-bs-toggle="modal"
                        data-bs-target="#myModal">
                        Crear Cita
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered" id="datatables">
                <thead>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Doctor</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Acciones</th>
                </thead>
            </table>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var ruta = "citas/show";
            var columnas = [{
                    data: 'id'
                },
                {
                    data: 'paciente'
                },
                {
                    data: 'doctor'
                },
                {
                    data: 'fecha'
                },
                {
                    data: 'hora'
                },
                {
                    data: 'id'
                }
            ]
            dt = generateDataTable(ruta, columnas);
        });
    </script>
@endsection
