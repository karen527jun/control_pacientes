<h1>Modificar</h1>
<h5>Formulario para actualizar clientes</h5>
<hr>
<form action="/clients/{{ $cliente->codigo }}" method="POST" id="frmUpdateData">
    <div class="row">
        <div class="col">
            <label>Nombre</label>
            <input value="{{ $cliente->nombre }}" type="text" name="nombre" class="form-control">
            <span class="invalid-feedback d-block" key="nombre" role="alert">
                <strong class="mensaje"></strong>
            </span>
        </div>
        <div class="col">
            <label>Edad</label>
            <input value="{{ $cliente->edad }}" type="text" name="edad" class="form-control">
            <span class="invalid-feedback d-block" key="nombre" role="alert">
                <strong class="mensaje"></strong>
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label>Categoria</label>
            <select name="categoria" class="form-select">
                <option value="">--Seleccionar categoria--</option>
                @foreach ($categorias as $item)
                    <option value="{{ $item->codigo }}" {{ $item->codigo == $cliente->categoria ? 'selected' : '' }}>
                        {{ $item->nombre }}</option>
                @endforeach
            </select>
            <span class="invalid-feedback d-block" key="categoria" role="alert">
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
