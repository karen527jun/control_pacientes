<h1>Modificar</h1>
<h5>Formulario para actualizar clientes</h5>
<hr>
<form action="/pacientes/{{ $paciente->id }}" method="POST" id="frmUpdateData">
    <div class="row">
        <div class="col">
            <label>Nombre</label>
            <input type="text" value="{{$paciente->nombre}}" name="nombre" class="form-control">
        </div>
        <span class="invalid-feedback d-block" key="nombre" role="alert">
            <strong class="mensaje"></strong>
        </span>
        <div class="col">
            <label>Edad</label>
            <input value="{{$paciente->edad}}" type="number" name="edad" class="form-control">
        </div>
        <span class="invalid-feedback d-block" key="edad" role="alert">
            <strong class="mensaje"></strong>
        </span>
        <div class="col">
            <label>Peso (Libras)</label>
            <input value="{{$paciente->peso}}" type="Number" name="peso" class="form-control">
        </div>
        <span class="invalid-feedback d-block" key="peso" role="alert">
            <strong class="mensaje"></strong>
        </span>
    </div>
    </div>
    <hr>
    <div class="row text-center">
        <div class="col">
            <button type="submit" class="btn btn-lg btn-success">
                Guardar
            </button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-lg btn-danger" data-bs-dismiss="modal">
                Cancelar
            </button>
        </div>
    </div>
</form>
