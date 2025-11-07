$('#id_propiedad').val(id_propiedad);
nuevo_status();

$(document).on("click", "#bo-tab", function() {
    nuevo_status();
});


function nuevo_status() {

//FORMATO EN ESPAÑOL FECHA
moment.locale('es');
    $('#loader').toggle();
    const url = BASE_URL + '/Mattes/Api/Arrendador_api/Detalle_propiedad/get_generales';

    $.ajax({
        url: url,
        type: 'POST',
        data: { id: id_propiedad },
        dataType: 'json',
        success: function (res) {
            $("#p-verificada").children().remove();
            console.log("aqui empieza");
            console.log(res);
            $('#loader').toggle();
            if (res.length > 0) {
                if (res[0].verified === "1") {
                    $("#verificado").prop("checked", true)
                    $('#p-verificada').append('<i class="fa fa-check-circle fa-5x mt-5" aria-hidden="true" style="color: #08EC19"></i><p>Propiedad Verificada</p>');
                   

                } else {
                    $("#verificado").prop("checked", false);
                    $('#p-verificada').append('<i class="fa fa-exclamation-triangle fa-5x mt-5" aria-hidden="true" style="color: #FFC733"></i><p>Propiedad no Verificada</p>');
                    
                }

                res[0].positioning === "1" ? $("#pocisionamiento").prop("checked", true) : $("#pocisionamiento").prop("checked", false);
                res[0].stamp_mattes === "1" ? $("#sello").prop("checked", true) : $("#sello").prop("checked", false);

            }
        }
    });

}

let datapreguntas = $('#preguntas-propiedad').DataTable({
    'ajax': {
        'url': `${BASE_URL}Mattes/Api/Back_office_api/Propiedades_rest/get_preguntas`,
        'data': {
            'id' : id_propiedad
        },
        'type': 'post',
    }, 
    columns: [
        {
            data: 'name_student'
        },
        {
            data: 'propiedad'
     
        },
        {
            data: 'universidad'
             
        },
        {
            data: 'question',
        },
        {
            data: 'answer',
        },
        {
            data: 'id',
            render: function(data, type, row, meta) {
                return `<button type="button" id="${row.id}" data-toggle="modal" data-target="#show_eliminar" class="btn btn-danger btn-eliminar"><i class="fa fa-trash" aria-hidden="true"></i>
                Eliminar</button>`
                 
            }
        }, 
         
    ], 
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ Filas por página',
    }
}); 

let datavisitas = $('#visitas-propiedad').DataTable({
    'ajax': {
        'url': `${BASE_URL}Mattes/Api/Back_office_api/Propiedades_rest/get_visitas`,
        'data': {
            'id' : id_propiedad
        },
        'type': 'post',
    }, 
    columns: [
        {
            data: 'propietario'
     
        },
        {
            data: 'id_crofter',
            render: function ( data, type, row ) {
                return `${row.arrendatario} ${row.first_name} ${row.second_name}`
                

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
            data: 'status'
            
        }, 
         
    ], 
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ Filas por página',
    }
});

//update status //

$( "#updaStatus" ).submit(function( event ) {
        $('#loader').toggle();
        var formData = new FormData($(this)[0]);
        const url = BASE_URL + '/Mattes/Api/Back_office_api/Detalle_propiedad';
        //AJAX.
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(data) {
                if (data.status == 200) {
                    $('#loader').toggle();
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

                    $('#p-verificada').children().remove();

                    
                    nuevo_status();

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



$(document).on('click', '.btn-eliminar', function() {
    let id_boton = $(this).attr('id');
    $("#id_pregunta").val(id_boton);
    
});

$('#eliminar_pregunta').on('click', function() {
    var id_pregunta = $("#id_pregunta").val();

    $('#loader').toggle();

    let data = {
        id_pregunta: id_pregunta
    };


    var url_citas = `${BASE_URL}Mattes/Api/Back_office_api/Propiedades_rest/eliminar_pregunta`

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
                $('#show_eliminar').modal('toggle');
                $('#loader').toggle();
                reloadcitas();
                
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
                $('#show_eliminar').modal('toggle');
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

function reloadcitas() {
    $('#loader').toggle();
    datapreguntas.ajax.reload();
    $('#loader').toggle();
}
