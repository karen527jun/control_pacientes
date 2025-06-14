<h1>Modificar</h1>
<h5>Formulario para actualizar clientes</h5>
<hr>
<form action="/doctores/{{ $doctor->id }}" method="POST" id="frmUpdateData">
     <div class="row">
        <div class="col">
            <label>Nombre</label>
            <input type="text" value="{{$doctor->nombre}}" name="nombre" class="form-control">
        </div>
        <span class="invalid-feedback d-block" key="nombre" role="alert">
            <strong class="mensaje"></strong>
        </span>
    </div>
    <div class="row">
        <div class="col-6">
            <label>Especialidad</label>
            <select name="especialidad" class="form-select">
                <option value="">--Seleccionar especialidad--</option>
                <option {{ ($doctor->especialidad == 'Médico general') ? 'selected':''}} value="Médico general">Médico general</option>
                <option {{ ($doctor->especialidad == 'Ortopeda') ? 'selected':''}} value="Ortopeda">Ortopeda</option>
                <option {{ ($doctor->especialidad == 'Dermatologo') ? 'selected':''}} value="Dermatologo">Dermatologo</option>
                <option {{ ($doctor->especialidad == 'Cirujano') ? 'selected':''}} value="Cirujano">Cirujano</option>

            </select>
        </div>
        <span class="invalid-feedback d-block" key="especialidad" role="alert">
            <strong class="mensaje"></strong>
        </span>
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
