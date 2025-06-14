<h1>Crear</h1>
<h5>Formulario para crear Clientes</h5>
<hr>
<form action="/consultas" method="POST" id="frmSaveData">
    <div class="row">
        <div class="col-6">
            <label>Cita</label>
            <select name="cita_medica" class="form-select">
                <option value="">--Seleccionar una cita--</option>
                @foreach ($citas as $item)
                    <option value="{{ $item->id }}">{{ $item->fecha }}</option>
                @endforeach
            </select>
        </div>
        <span class="invalid-feedback d-block" key="cita_medica" role="alert">
            <strong class="mensaje"></strong>
        </span>
    </div>
    <div class="row">
        <div class="col">
            <label>Detalle</label>
            <textarea type="text" name="detalle" class="form-control"></textarea>
        </div>
        <span class="invalid-feedback d-block" key="detalle" role="alert">
            <strong class="mensaje"></strong>
        </span>
        <div class="col">
            <label>Diagnostico</label>
            <textarea type="text" name="diagnostico" class="form-control"></textarea>
        </div>
        <span class="invalid-feedback d-block" key="diagnostico" role="alert">
            <strong class="mensaje"></strong>
        </span>
    </div>
    <div class="row">
        <div class="col-6">
            <label>medicamentos</label>
            <select name="medicamento" class="form-select">
                <option value="">--Seleccionar medicamentos--</option>
                @foreach ($medicamentos as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
        </div>
        <span class="invalid-feedback d-block" key="medicamento" role="alert">
            <strong class="mensaje"></strong>
        </span>
    </div>
    <div class="row">
        <div class="col-6">
            <label>examen</label>
            <select name="examen" class="form-select">
                <option value="">--Seleccionar examen--</option>
                @foreach ($examenes as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
        </div>
        <span class="invalid-feedback d-block" key="examen" role="alert">
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
