$("#id_propietario").val(id_usuario);
select_alojamiento();

function select_alojamiento() {
    //alert("dentro de la funcion");
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Detalle_propiedad`;
    var alojamiento = $("#tipo-alojamiento");
    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            //const ch = data['data'];
            alojamiento.append(`<option  value=""> SELECCIONA ALOJAMIENTO </option>`);
            $(data).each(function(i, v) {
                alojamiento.append(`<option  value="${v.id}"> ${v.name}</option>`);
            })
        },
        error: function(error) {
            Toastify({
                text: "Hubo un error al enviar los datos",
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
}

$(document).ready(function() {
    flag_university = true

    $(document).on('submit', '#detalle-propiedad', function() {
        var formData = new FormData($(this)[0]);
        const url = `${BASE_URL}Mattes/Api/Arrendador_api/Detalle_propiedad/creat`;

        //AJAX.
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(data) {
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
                    element =  $("#localizacion-tab");
                    $("#id").val(data.id);
                    $("#id_propiedadubi").val(data.id);
                    $("#id_propiedadser").val(data.id);
                    $("#id_propiedaddocs").val(data.id);
                    element.click();
                } else {
                    Toastify({
                        text: data.messages.success,
                        duration: 5000,
                        className: "info",
                        // avatar: "../../assets/img/logop.png",
                        style: {
                            background: "linear-gradient(to right, #ff0000, #e26f11)",
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
}); //Fin document. */