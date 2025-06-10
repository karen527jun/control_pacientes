$(document).ready(function () {

    //evento para cargar formulario de crear registro
    $(document).on('click', '#addForm', function() {
        let url = $(this).attr('path');
        $("#modalLabel").text("Creando Registro");
        $("#loadForm").load(url);//realizar peticion
    });
    //evento para crear registros
    $(document).on('submit', '#frmSaveData', function(e) {
        e.preventDefault();
        frm = $(this);
        url = $(this).attr('action')
        token = $('input[name="_token"]').val();
        save_data(url, frm, token);
    });

    //evento para cargar el formulario de editar registro
    $(document).on('click', '.edit', function() {
        let url = $(this).attr('path');
        $("#modalLabel").text("Actualizando Registro");
        $("#loadForm").load(url);//realizar peticion
        $("#myModal").modal('show');

    });

    //evento para guardar editar registros
    $(document).on('submit', '#frmUpdateData', function(e) {
        e.preventDefault();
        frm = $(this);
        url = $(this).attr('action')
        token = $('input[name="_token"]').val();
        save_update(url, frm, token);
    });

    //evento para eliminar
    $(document).on('click', '.delete', function() {
        let url = $(this).attr('path');
        token = $('input[name="_token"]').val()
        Swal.fire({
            title: "Estas seguro?",
            text: "Si continuas, no podras revertir la accion!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    //peticion para eliminar registro
                    delete_data(url, token);
                }
            });
    });
});
