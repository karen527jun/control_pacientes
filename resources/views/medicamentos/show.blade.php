@extends('layouts.app')
@section('title', 'Productos')
@section('content')
    <hr>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Medicamentos</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <div class="row text-center">
                <div class="col">
                    <h3>Listado de medicamentos</h3>
                </div>
                <div class="col">
                    <button class="btn btn-md btn-dark" id="addForm" path="/products/create" data-bs-toggle="modal"
                        data-bs-target="#myModal">
                        Crear Medicamento
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered" id="datatables">
                <thead>
                    <th>ID</th>
                    <th>Medicamento</th>
                    <th>Dosis</th>
                </thead>
            </table>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var ruta = "/medicamentos/show";
            var columnas = [{
                    data: 'codigo'
                },
                {
                    data: 'nombre'
                },
                {
                    data: 'dosis'
                },
            ]
            dt = generateDataTable(ruta, columnas);
        });
    </script>
@endsection
