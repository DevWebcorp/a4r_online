$(document).on("click", "#addagent", function () {
    document.getElementById("perfil_agentes").click();

});

evento_checks();

var dataTable = $('#datatable1').DataTable({
    ajax: BASE_URL + '/Mattes/Api/Arrendador_api/Datos_empresa/get_agentes',

    columns: [{
        data: 'profile_image',
        render: function (data, type, row, meta) {
            return data == '' ? '<img src="' + BASE_URL + '/writable/uploads/Mattes/Arrendador/default.png" class="img-fluid foto-agente" />' : '<img src="' + BASE_URL + '/writable/uploads/Mattes/Agente/' + data + ' " class="img-fluid foto-agente" />'
        }
    },
    {
        data: 'fullname'
    },
    {
        data: 'propiedades'
    },
    {
        data: 'active',
        render: function (data, type, row, meta) {
            return data == 0 ? `<span>
                                        <label class="switch">
                                            <input  id="` + row.id + `" type="checkbox"  class="evento">
                                            <span class="slider round"></span>
                                        </label>
                                    </span>` : `<span>
                                        <label class="switch">
                                            <input id="` + row.id + `" type="checkbox"  class="evento" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </span>`
        }
    },
    {
        data: 'id',
        render: function (data, type, row, meta) {
            return '<div class="d-flex justify-content-center"><button id="' + row.id + '" class="accesos btn btn-enviar pd-x-20 mr-1"><i class="fa fa-paper-plane mr-1" aria-hidden="true"></i>Enviar acceso</button>' +
                '<button id="' + data + '" class="btn reasignar active up solid pd-x-20" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button></div>'
        }
    },


    ],
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ Filas por página',
    }
});

function evento_checks() {
    $(document).on('click', '.evento', function () {
        $('#loader').toggle();
        let id_usuario = $(this).attr('id');
        let valor = $(this).prop("checked");


        //Cambio a activo
        let data = {
            id: id_usuario,
            valor: valor
        };

        let url = BASE_URL + 'Mattes/Api/Arrendador_api/Datos_empresa/update_estatus';

        $.ajax({
            url: url,
            type: "POST",
            dataType: 'json',
            data: JSON.stringify(data),
            success: function (result) {
                console.log(result);

                if (result.status == 200) {
                    $('#loader').toggle();
                    Toastify({
                        text: result.messages.success,
                        duration: 3000,
                        className: "info",
                        // avatar: "../../assets/img/logop.png",
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                        offset: {
                            x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                            y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                        },

                    }).showToast();
                    reloadData();
                    /*   setTimeout(function() {
                          $('#succes-alert').hide();
                      }, 5000); */
                } else {
                    $('#error-alert').text("ocurrio un error intentalo de nuevo");
                    $('#error-alert').show();

                }

            },
            error: function (xhr, resp, text) {
                console.log(xhr, resp, text);
                Toastify({
                    text: success.messages.success,
                    duration: 3000,
                    className: "info",
                    // avatar: "../../assets/img/logop.png",
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    offset: {
                        x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                        y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                    },

                }).showToast();
                // $('#modal_delete').modal('toggle');
            }
        });

    });
}

//enviar accesos//

$(document).on('click', '.accesos', function () {
    $('#loader').toggle();
    let id_user = $(this).attr('id');

    let json = {
        id: id_user
    };

    let url = BASE_URL + 'Mattes/Api/Arrendador_api/Datos_empresa/envio_acceso';

    $.ajax({
        url: url,
        data: json,
        method: 'post',
        // dataType: 'json',
        success: function (success) {
            if (success.status == 200) {
                $('#loader').toggle();
                Toastify({
                    text: success.messages.success,
                    duration: 3000,
                    className: "info",
                    // avatar: "../../assets/img/logop.png",
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    offset: {
                        x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                        y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                    },

                }).showToast();
            } else {
                Toastify({
                    text: success.messages.success,
                    duration: 3000,
                    className: "info",
                    // avatar: "../../assets/img/logop.png",
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    offset: {
                        x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                        y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                    },

                }).showToast();
                //$('#loader').toggle();

            }

        },
        error: function (xhr, text_status) {
            // $('#loader').toggle();
        }
    });

});


$(document).on('click', '.up', function () {
    let agente = $(this).attr('id');
    $('#loader').toggle();
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Datos_empresa/get_agente`;
    $.ajax({
        url: url,
        data: { id: agente },
        method: 'post', //en este caso
        dataType: 'json',
        success: function (success) {
            $('#loader').toggle();
            //console.log(success);
            $("#upd-nombre").val(success.name);
            $("#upd-apellido").val(success.first_name);
            $("#upd-apellidos").val(success.second_name);
            $("#upd-correo").val(success.email);
            $("#upd-phone").val(success.phone);
            $("#id_agente").val(success.id);

            if (success.photo) {
                let html = '';
                html += '<img src="' + BASE_URL + 'writable/uploads/Mattes/Agente/' + success.photo + '" class="img-thumbnail img-fluid rounded-circle" style="width: 25%; height: 166px;"/>'
                $('#imagen').html(html);

            } else {
                let html = '';
                html += '<img src="' + BASE_URL + 'Mattes/assets/img/default.png" class="img-thumbnail img-fluid rounded-circle" style="width: 25%; height: 166px; "/>'
                $('#imagen').html(html);

            }
            $('#updateModal').modal('show');

        },
        error: function (xhr, text_status) {
            $('#loader').toggle();
        }
    });

});

$(document).on('change', '#file-user', function () {
    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop();
    var archivo = document.getElementById("file-user").files[0];

    if (ext == "png" || "jpg") {
        if (filesCount === 1) {
            var reader = new FileReader();
            reader.readAsDataURL(archivo);
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
            reader.onloadend = function () {
                document.getElementById("img").src = reader.result;
            }
        } else {
            textbox.text(filesCount + ' files selected');
        }

    } else {
        $(this).val('');
        Toastify({
            text: "El archivo debe ser una imagen",
            duration: 3000,
            className: "info",
            // avatar: "../../assets/img/logop.png",
            style: {
                background: "linear-gradient(to right, red, orange)",
            },
            offset: {
                x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
            },
        }).showToast();
    }
});

$("#formUpdate").submit(function () {
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Datos_empresa/update_agente`;
    //AJAX.
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (data) {
            if (data.status == 200) {
                Toastify({
                    text: data.messages.success,
                    duration: 3000,
                    className: "info",
                    // avatar: "../../assets/img/logop.png",
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    offset: {
                        x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                        y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                    },

                }).showToast();
                $('#updateModal').modal('hide');


            } else {
                Toastify({
                    text: data.messages.success,
                    duration: 3000,
                    className: "info",
                    // avatar: "../../assets/img/logop.png",
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    offset: {
                        x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                        y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                    },

                }).showToast();
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
});