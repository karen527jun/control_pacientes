<h1>Crear</h1>
<h5>Formulario para crear Clientes</h5>
<hr>
<form action="/doctores" method="POST" id="frmSaveData">
    <div class="row">
        <div class="col">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control">
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
                <option value="Médico general">Médico general</option>
                <option value="Ortopeda">Ortopeda</option>
                <option value="Dermatolo">Dermatolo</option>
                <option value="Cirujano">Cirujano</option>

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
