<h1>Crear</h1>
<h5>Formulario para crear Crear una cita</h5>
<hr>
<form action="/citas" method="POST" id="frmSaveData">
    <div class="row">
        <div class="col">
            <label>fecha</label>
            <input type="date" name="fecha" class="form-control">
        </div>
        <span class="invalid-feedback d-block" key="fecha" role="alert">
            <strong class="mensaje"></strong>
        </span>
        <div class="col">
            <label>Hora</label>
            <input type="time" name="hora" class="form-control">
        </div>
        <span class="invalid-feedback d-block" key="hora" role="alert">
            <strong class="mensaje"></strong>
        </span>
    </div>
    <div class="row">
        <div class="col-6">
            <label>Paciente</label>
            <select name="paciente" class="form-select">
                <option value="">--Selecciona un paciente--</option>
                @foreach ($pacientes as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
        </div>
        <span class="invalid-feedback d-block" key="paciente" role="alert">
            <strong class="mensaje"></strong>
        </span>
    </div>
    <div class="row">
        <div class="col-6">
            <label>Doctor</label>
            <select name="doctor" class="form-select">
                <option value="">--Selecciona un doctor--</option>
                @foreach ($doctores as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
        </div>
        <span class="invalid-feedback d-block" key="doctor" role="alert">
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
