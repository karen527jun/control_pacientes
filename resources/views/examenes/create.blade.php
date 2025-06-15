<h1>Crear</h1>
<h5>Formulario para crear examenes médicos</h5>
<hr>
<form action="/examenes" method="POST" id="frmSaveData">
    <div class="row">
        <div class="col">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <span class="invalid-feedback d-block" key="nombre" role="alert">
            <strong class="mensaje"></strong>
        </span>
        <div class="col">
            <label>Descripcion</label>
            <textarea type="text" name="descripcion" class="form-control"></textarea>
        </div>
        <span class="invalid-feedback d-block" key="edad" role="alert">
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
