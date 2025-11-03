//FORMATO EN ESPAÑOL FECHA
moment.locale('es');


let datacitas = $('#citas_propiedades').DataTable({
    'ajax': {
        'url': `${BASE_URL}Mattes/Api/Arrendatario_api/Agendarcita_rest/get_citas_prop`,
        'data': {
            
        },
        'type': 'post',
    },
    order : [[3, 'desc']],
    columns: [
        {
            data: 'propiedad',
            render: function(data, type, row, meta) {
                nombrencode = data.replace(/ /g, "-")
                return `<a href="${BASE_URL}detalle-propiedad/${nombrencode}" target="_blank">${data}</a>`
                
            }
        },
        {
            data: 'universidad'
        },
        {
            data: 'arrendatario',
            render: function ( data, type, row ) {
                return `${row.arrendatario} ${row.first_name} ${row.second_name}
                <input id="id_renter" class="form-control" type="hidden" name="id_renter" value="${row.id_renter}">`;

            }
        },
        {
            data: 'date_schedule',
            render: function(data, type, row, meta) {
                return moment(data).format('DD-MM-YYYY')
            }
        },
        {
            data: 'date_schedule',
            render: function(data, type, row, meta) {
                return moment(data).format('LT')
            }
        },
        {
            data: 'status',
            render: function(data, type, row, meta) {
                if(data == 501){
                    return `<img id="${row.status}" class="img-con" src="/../assets/icons/confirmar.png" alt="First slide">`
                } else if (data == 502){
                    return `<img id="${row.status}" class="img-can" src="/../assets/icons/boton-x.png" alt="First slide">`
                } else {
                    return `<img id="${row.status}" class="img-con" src="/../assets/icons/reloj.png" alt="First slide">`
                }
                
            }
        },
        {
            data: 'id',
            render: function(data, type, row, meta) {
                if(row.status == 501){
                    return `<button type="button" id="${row.id}" data-index="${row.id_renter}" data-property="${row.id_property}" data-toggle="modal" data-target="#show_reasignar_cita" class="btn reasignar btn-res"> <i class="fa fa-clock-o" aria-hidden="true"></i> Reasignar</button>`
                } else if(row.status == 502){
                    return ` `
                }
                else {
                    return `<div class="d-flex"><button type="button" id="${row.id}" data-index="${row.id_renter}" data-property="${row.id_property}" data-crofter="${row.id_crofter}" data-toggle="modal" data-target="#show_aceptar_cita" class="btn btn-aceptar btn-can"><i class="fa fa-check-circle" aria-hidden="true"></i> Aceptar</button>
                     <button type="button" id="${row.id}" data-index="${row.id_renter}" data-toggle="modal" data-target="#show_cancelar_cita" class="btn cancelar btn-can"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</button></div>`
                }
                
            }
        }, 
        
    ], 
    responsive: true,
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ Filas por página',
    }
});

let datapreguntas = $('#preguntas_propiedades').DataTable({
    'ajax': {
        'url': `${BASE_URL}Mattes/Api/Arrendador_api/Conversacion_rest/get_questions_prop`,
        'data': {
        },
        'type': 'post',
    },
    columns: [
        {
            data: 'propiedad',
            render: function(data, type, row, meta) {
                nombrencode = data.replace(/ /g, "-")
                return `<a  href="${BASE_URL}detalle-propiedad/${nombrencode}" target="_blank">${data}</a>`
                
            }
        },
        {
            data: "status",
            render: function(data, type, row, meta) {
                if(data == 0){
                    return `NO LEÍDO`
                } else{
                    return `CONTESTADO`
                }
            }
        },
        {
            data: 'universidad'
        },
        {
            data: 'arrendatario',
            render: function ( data, type, row ) {
                return `${row.arrendatario} ${row.first_name} ${row.second_name}
                <input id="id_renter" class="form-control" type="hidden" name="id_renter" value="${row.user_id}">`;

            }
        },
        {
            data: 'question'
        },
        {
            data: 'answer'
        },
        {
            data: 'created_at',
            render: function(data, type, row, meta) {
                return moment(data).format('DD-MM-YYYY')
            }
        },
        {
            data: 'id',
            render: function(data, type, row, meta) {
                if(row.status == 0){
                    return `<button type="button" id="${data}" data-question="${row.question}" data-renter="${row.user_id}" data-toggle="modal" data-target="#show_responder" class="btn reasignar btn-question"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Responder</button>`
                } else{
                    return ``
                }
            }
        },
        
    ],
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ Filas por página',
    }
});

$('#confirmar_cita').on('click', function() {
    document.getElementById("confirmar_cita").disabled = true;
    $('#loader').toggle();
    var id_cita = $("#id_cita").val();
    let id_renter = $("#idrenter").val();
    let id_propiedad = $('#id_propiedad').val();
    let id_crofter = $('#id_crofter').val();
    
    let data = {
        id_cita: id_cita,
        id_renter: id_renter,
        id_crofter: id_crofter,
        id_propiedad: id_propiedad
    };

    //console.log(data);

    var url_citas = `${BASE_URL}Mattes/Api/Arrendatario_api/Agendarcita_rest/aceptar_cita`;

    $.ajax({
        url: url_citas,
        type: "POST",
        dataType: 'json',
        data: JSON.stringify(data),
        success: function(result) {
            if (result.status == 200) {
                
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
                $('#show_aceptar_cita').modal('toggle');
                $('#loader').toggle();
                reloadcitas();
                document.getElementById("confirmar_cita").disabled = false;

                
            } else {
                Toastify({
                    text: "HUBO UN ERROR. INTENTE DE NUEVO",
                    duration: 5000,
                    className: "info",
                    //avatar : "../../../../../assets/icons/advertencia.png",
                    style: {
                        background: "linear-gradient(to right, #0370b8, #0FB6FB)",
                    },
                    offset: {
                        x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                        y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                    },

                }).showToast();
                $('#show_aceptar_cita').modal('toggle');
                document.getElementById("confirmar_cita").disabled = false;
                //$('#loader').toggle();
 
            }
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
            $('#loader').toggle();
            $('#error-alert').show();
            $('#error').text(' HA OCURRIDO UN ERROR INESPERADO');
        }
    });

});

$('#cancelar_cita').on('click', function() {
    document.getElementById("cancelar_cita").disabled = true;
    $('#loader').toggle();
    var id_cita = $("#id_cita").val();
    let id_renter = $("#idrenter").val();
    let id_crofter = $('#id_crofter').val();

    let data = {
        id_cita: id_cita,
        id_renter: id_renter,
        id_crofter: id_crofter
    };


    var url_citas = `${BASE_URL}Mattes/Api/Arrendatario_api/Agendarcita_rest/cancelar_cita`

    $.ajax({
        url: url_citas,
        type: "POST",
        dataType: 'json',
        data: JSON.stringify(data),
        success: function(result) {
            if (result.status == 200) {
                
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
                $('#show_cancelar_cita').modal('toggle'); 
                $('#loader').toggle();
                reloadcitas();
                document.getElementById("cancelar_cita").disabled = false;

                
            } else {
                Toastify({
                    text: "HUBO UN ERROR. INTENTE DE NUEVO",
                    duration: 5000,
                    className: "info",
                    //avatar : "../../../../../assets/icons/advertencia.png",
                    style: {
                        background: "linear-gradient(to right, #ee0c0c, #e63838)",
                    },
                    offset: {
                        x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                        y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                    },

                }).showToast();
                $('#loader').toggle();
                $('#show_cancelar_cita').modal('toggle');
                document.getElementById("cancelar_cita").disabled = false; 
            }
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
            $('#loader').toggle();
            $('#error-alert').show();
            $('#error').text(' HA OCURRIDO UN ERROR INESPERADO');
        }
    });

});

$(document).on('submit', '#form_reasignar', function() {
    $('#loader').toggle();
    document.getElementById("reasignar_cita").disabled = true;
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Agendarcita_rest/reasignar_cita`;

    //AJAX.
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(data) {
            document.getElementById("fechaH").value = "";
            document.getElementById("horasdisp").value = "";
            document.getElementById("comentarios").value = "";
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
                $('#show_reasignar_cita').modal('toggle'); 
                $('#loader').toggle();
                reloadcitas();
                document.getElementById("reasignar_cita").disabled = false;

            } else {
                Toastify({
                    text: data.messages.success,
                    duration: 3000,
                    className: "info",
                    // avatar: "../../assets/img/logop.png",
                    style: {
                        background: "linear-gradient(to right, #cf0000, #e98c35)",
                    },
                    offset: {
                        x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                        y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                    },

                }).showToast();
                $('#show_reasignar_cita').modal('toggle'); 
                $('#loader').toggle();
                document.getElementById("reasignar_cita").disabled = false;
            }

        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
    
}); 

$("#fechaH").on("change", function() {
    get_horasdip();
});

$(document).on('submit', '#form_question', function() {
    $('#loader').toggle();
    document.getElementById("responder_cita").disabled = true;
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Conversacion_rest/answer`;

    //AJAX.
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(data) {
            if (data.status == 200) {
                document.getElementById("answer").value = "";
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
                $('#show_responder').modal('hide');
                $('#loader').toggle();
                reloadpreguntas();
                document.getElementById("responder_cita").disabled = false;

            } else {
                document.getElementById("answer").value = "";
                Toastify({
                    text: data.messages.success,
                    duration: 3000,
                    className: "info",
                    // avatar: "../../assets/img/logop.png",
                    style: {
                        background: "linear-gradient(to right, #cf0000, #e98c35)",
                    },
                    offset: {
                        x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                        y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                    },

                }).showToast();
                $('#show_responder').modal('hide'); 
                document.getElementById("responder_cita").disabled = false;
            }

        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
    
});

$(document).on('click', '.btn-can', function() {
    let id_boton = $(this).attr('id');
    let id_renter = $(this).data('index');
    let id_propiedad = $(this).data('property');
    let id_crofter  = $(this).data('crofter');
    $("#id_cita").val(id_boton);
    $("#idrenter").val(id_renter);
    $("#id_propiedad").val(id_propiedad);
    $("#id_crofter").val(id_crofter);
});

$(document).on('click', '.btn-res', function() {
    $('#loader').toggle();
    let id_boton = $(this).attr('id');
    let id_renter = $(this).data('index');
    let id_crofter = $(this).data('crofter');

    let data = {
        id_boton: id_boton
    };

    var url_citas = `${BASE_URL}Mattes/Api/Arrendatario_api/Agendarcita_rest/get_datos_cita`;

    $.ajax({
        url: url_citas,
        type: "POST",
        dataType: 'json',
        data: JSON.stringify(data),
        success: function(result) {
            fecha =  moment(result[0]['date_schedule']).format('YYYY-MM-DD');
            $("#fechaH").val(fecha);
            $("#comentarios").val(result[0]['comment']);
            $("#idcita_r").val(id_boton);
            $("#idrenter_r").val(id_renter);
            $("#idcrofter_r").val(id_crofter);
            get_horasdip();
            $('#loader').toggle();
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
            $('#loader').toggle();
            $('#error-alert').show();
            $('#error').text(' HA OCURRIDO UN ERROR INESPERADO');
        }
    });
    
});

function get_horasdip(){
    $("#horasdisp").empty();
    let id_cita = $("#id_cita").val();;
    let fecha = $("#fechaH").val();
    let id_crofter = $("#idcrofter_r").val();
        
        
    var url_str = `${BASE_URL}Mattes/Api/Arrendatario_api/Agendarcita_rest/horas_disp`;

    
    let json = {
        id_cita: id_cita,
        fecha: fecha,
        id_crofter: id_crofter
    };
    
    $.ajax({
        url: url_str,
        type: 'POST',
        data: JSON.stringify(json),
        dataType: 'json',
        success: function(result) {
            $("#horasdisp").append(`<option  value="">Selecciona una hora</option>`);
            const ch = result;
            $(ch).each(function(i, v) {
                $("#horasdisp").append(`<option  value="${v}">${v}</option>`);
            }); 
            
        },
        cache: false,
        contentType: false,
        processData: false
    });
    
}

$(document).on('click', '.btn-question', function() {
    let id_boton = $(this).attr('id');
    let question = $(this).data('question');
    let id_renter = $(this).data('renter');
    $("#question").val(id_boton);
    $("#question_p").val(question);
    $("#id_renter_q").val(id_renter);
});

/* $(document).on('click', '.propiedad', function(event) {
    event.preventDefault();
    let id_propiedad = $(this).data('propiedad');
    let id_renter = $(this).data('index');

    let json = {
        id_propiedad: id_propiedad,
        id_renter: id_renter
    };

    const url_conversations = `${BASE_URL}Mattes/Api/Arrendador_api/Conversacion_rest/insert_conversation`;

    $.ajax({
        url: url_conversations,
        type: "POST",
        data: JSON.stringify(json),
        dataType: 'json',
        success: function(result) {
            console.log(result);
            location.href = `${BASE_URL}Mattes/Arrendador/Propiedad_conversacion/index/${result.id_conversacion}/${result.id_propiedad}`;
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
            $('#loader').toggle();
            $('#error-alert').show();
            $('#error').text(' HA OCURRIDO UN ERROR INESPERADO');
        }
    });
}); */

////RECARGA LA TABLA DE CITAS
function reloadcitas() {
    $('#loader').toggle();
    datacitas.ajax.reload();
    $('#loader').toggle();
}

// RECARGA LA TABLA DE PREGUNTAS
function reloadpreguntas() {
    $('#loader').toggle();
    datapreguntas.ajax.reload();
    $('#loader').toggle();
}