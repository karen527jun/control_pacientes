<h1>Crear</h1>
<h5>Formulario para crear Medicamentos</h5>
<hr>
<form action="/medicamentos" method="POST" id="frmSaveData">
    <div class="row">
        <div class="col">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <span class="invalid-feedback d-block" key="nombre" role="alert">
            <strong class="mensaje"></strong>
        </span>
        <div class="col">
            <label>Dosis</label>
            <input type="text" name="dosis" class="form-control">
        </div>
        <span class="invalid-feedback d-block" key="dosis" role="alert">
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
