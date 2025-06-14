@extends('layouts.app')
@section('title', 'Productos')
@section('content')
    <hr>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Consultas</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <div class="row text-center">
                <div class="col">
                    <h3>Listado de consultas</h3>
                </div>
                <div class="col">
                    <button class="btn btn-md btn-dark" id="addForm" path="/consultas/create" data-bs-toggle="modal"
                        data-bs-target="#myModal">
                        Crear Consulta
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered" id="datatables">
                <thead>
                    <th>id</th>
                    <th>Diagnostico</th>
                    <th>Detalle</th>
                    <th>Examen</th>
                    <th>Medicamentos</th>
                    <th>Acciones</th>
                </thead>
            </table>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var ruta = "consultas/show";
            var columnas = [{
                    data: 'id'
                },
                {
                    data: 'diagnostico'
                },
                {
                    data: 'detalle'
                },
                {
                    data: 'examen'
                },
                {
                    data: 'medicamento'
                },
                {
                    data: 'id'
                }
            ]
            dt = generateDataTable(ruta, columnas);
        });
    </script>
@endsection
