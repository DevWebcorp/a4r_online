tipo_alojamiento();
$(".sello-propiedad").attr('id', id_propiedad);
$(".posiciona-propiedad").attr('id', id_propiedad);


function tipo_alojamiento() {
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Detalle_propiedad`;
    var alojamiento = $("#tipo_alojamiento");
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
            get_generales();
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

function get_generales() {
    $('#loader').toggle();
    const url = BASE_URL + '/Mattes/Api/Arrendador_api/Detalle_propiedad/get_generales';

    $.ajax({
        url: url,
        type: 'POST',
        data: { id: id_propiedad },
        dataType: 'json',
        success: function(res) {
            console.log("estos son los generales");
            console.log(res);
            //$('#loader').toggle();
            if (res.length > 0) {
                $('#nombre_propiedad').val(res[0].name);
                $('#nombre_prop').val(res[0].name);
                $('#descripcion').val(res[0].description);
                //$('#horario_visita').val(res[0].visiting_hours);
                $('#disponibilidad').val(res[0].date_start);
                $('#tipo_alojamiento').val(res[0].id_type_accommodation);
                $('#id').val(res[0].id);
              $('#loader').toggle();
            }else{
                console.log("error");
                $('#loader').toggle();
            }
        }
    });
}

$(document).on('submit', '#upd_generales', function() {

    var formData = new FormData($(this)[0]);
    const url = BASE_URL + '/Mattes/Api/Arrendador_api/Detalle_propiedad/actualiza_generales';

    //AJAX.
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(data) {
            if (data.status == 200) {
                /* let prop_actual = $('#nombre_propiedad').val();
                let prop = $('#nombre_prop').val(); */
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

                if(id_goup == 2){
                    let propiedad_name = data.messages.name;
                    namencode = propiedad_name.replace(/ /g, "-")
                    location.href = BASE_URL + "datos-propiedad/"+namencode ;
                } 
                
                /* /if(prop_actual != prop){
                    
                } 
 */
            } else {
                Toastify({
                    text: data.messages.success,
                    duration: 3000,
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
/* 
$(document).ready(function() {
    
}); */

$(".sello-propiedad").on("click", function() {
    let id_prop = $(this).attr('id');
    
    let json = {
        id_prop: id_prop
    };
    $('#loader').toggle();

    const url_sello = `${BASE_URL}Mattes/Api/Arrendador_api/Detalle_propiedad/sello_mattes`;

    $.ajax({
        url: url_sello,
        type: "POST",
        data: JSON.stringify(json),
        dataType: 'json',
        success: function(result) {
            console.log(result);
            $('#loader').toggle();
            Toastify({
                text: "Sello Mattes solicitado",
                duration: 3000,
                className: "info",
                // avatar: "../../assets/img/logop.png",
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                offset: {
                    x: 50, 
                    y: 90 
                },
            }).showToast();
            $('#model_sello').modal('toggle');
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
            $('#loader').toggle();
            $('#error-alert').show();
            Toastify({
                text: "HA OCURRIDO UN ERROR INESPERADO",
                duration: 3000,
                className: "info",
                style: {
                    background: "linear-gradient(to right, red, orange)",
                },
                offset: {
                    x: 50, 
                    y: 90 
                },
            }).showToast();
            //$('#error').text(' HA OCURRIDO UN ERROR INESPERADO');
        }
    });
});

$(".posiciona-propiedad").on("click", function() {
    let id_prop = $(this).attr('id');
    $('#loader').toggle();
    let json = {
        id_prop: id_prop
    };

    const url_posicion = `${BASE_URL}Mattes/Api/Arrendador_api/Detalle_propiedad/posiciona_prop`;

    $.ajax({
        url: url_posicion,
        type: "POST",
        data: JSON.stringify(json),
        dataType: 'json',
        success: function(result) {
            $('#loader').toggle();
            console.log(result);
            Toastify({
                text: "Posicionamiento de propiedad solicitado",
                duration: 3000,
                className: "info",
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                offset: {
                    x: 50, 
                    y: 90 
                },

            }).showToast();
            $('#model_posicionamiento').modal('toggle');
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
            $('#loader').toggle();
            $('#error-alert').show();
            $('#error').text(' HA OCURRIDO UN ERROR INESPERADO');
            Toastify({
                text: "HA OCURRIDO UN ERROR INESPERADO",
                duration: 3000,
                className: "info",
                style: {
                    background: "linear-gradient(to right, red, orange)",
                },
                offset: {
                    x: 50, 
                    y: 90 
                },
            }).showToast();
        }
    });
}); 

$(document).on("click", "#generales-tab", function() {
    get_generales();

});



