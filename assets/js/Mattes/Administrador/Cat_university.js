get_state();

//console.log(`${BASE_URL}Mattes/Api/Administrador_api/Universidades_rest`);

let data_university = $('#table-university').DataTable({
    processing: true, 
    serverSide: true, 
    lengthMenu: [
        [10, 25, 50, 999999],
        ['10 filas', '25 filas', '50 filas', 'Mostrar todo']
    ],
    'ajax': {
        'url': `${BASE_URL}Mattes/Api/Administrador_api/Universidades_rest`,
        'data': {
            
        },
        'type': 'post',
    },
    columns: [
        {
            data: 'name'
        },
        {
            data: 'state'
        },
        {
            data: 'latitude'
        },
        {
            data: 'longitude'
        },
        {
            data: 'id', 
            render: function(data, type, row, meta) {
                return `<div class="d-flex"><button type="button" id="${data}" data-toggle="modal" data-target="#modal_update" class="btn reasignar btn-res"><i class="fa fa-pencil" aria-hidden="true"></i>
                Editar</button>
                <button type="button" id="${data}" data-toggle="modal" data-target="#modal_delete" class="btn cancelar btn-can"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button></div>`
                
            }
    
        }, 
        
    ], 
    ordering: true,
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ Filas por página',
    }, 
    initComplete: function(settings, json) {
        $('#table-university thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#table-university thead');
        var api = this.api();
        api
            .columns()
            .eq(0)
            .each(function(colIdx) {
                // Set the header cell to contain the input element
                var cell = $('.filters th').eq(
                    $(api.column(colIdx).header()).index()
                );
                var title = $(cell).text();
                $(cell).html('<input type="text" class="text-center" placeholder="' + title + '" />');

                // On every keypress in this input
                $('input', $('.filters th').eq($(api.column(colIdx).header()).index()))
                    .off('keyup change')
                    .on('keyup change', function(e) {
                        e.stopPropagation();
                        // Get the search value
                        $(this).attr('title', $(this).val());
                        var regexr =
                            '({search})'; //$(this).parents('th').find('select').val();
                        var cursorPosition = this.selectionStart;
                        // Search the column for that value
                        api
                            .column(colIdx)
                            .search(

                                this.value
                            )
                            .draw();

                        $(this)
                            .focus()[0]
                            .setSelectionRange(cursorPosition, cursorPosition);
                    });
            });
            quitaClase();

            function quitaClase() {
                $('.filters').children().removeClass("sorting").removeClass("sorting_asc").removeClass("sorting_desc");
            }
    },

}); 

$(document).on('submit', '#form-insert', function() {
    document.getElementById("insert_uni").disabled = true;
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Administrador_api/Universidades_rest/insert_university`;

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
                reloaduniversity();
                $("#modal_agregar").modal('toggle'); 

            } else {
                Toastify({
                    text: data.messages.success,
                    duration: 3000,
                    className: "info",
                    // avatar: "../../assets/img/logop.png",
                    style: {
                        background: "linear-gradient(to right, #ff0000, #96c93d)",
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

$(document).on('click', '.btn-res', function() {
    let id = $(this).attr('id');
    const url = `${BASE_URL}Mattes/Api/Administrador_api/Universidades_rest/get_university`;
    $('#loader').toggle();
    $.ajax({
        url: url,
        type: 'POST',
        data: {id : id},
        dataType: 'json',
        success: function(res) {
            $('#n_update').val(res[0]['name']);
            $('#estado_update').val(res[0]['state']);
            $('#latitud_update').val(res[0]['latitude']);
            $('#longitud_update').val(res[0]['longitude']);
            $('#id_update').val(res[0]['id']);
            $('#loader').toggle();
        }
    });
});

$(document).on('submit', '#form-update', function() {
    document.getElementById("update_uni").disabled = true;
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Administrador_api/Universidades_rest/update_university`;

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
                reloaduniversity();
                $("#modal_update").modal('toggle'); 

            } else {
                Toastify({
                    text: data.messages.success,
                    duration: 3000,
                    className: "info",
                    // avatar: "../../assets/img/logop.png",
                    style: {
                        background: "linear-gradient(to right, #ff0000, #96c93d)",
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

$(document).on('click', '.btn-can', function() {
    let id = $(this).attr('id');
    $('#id_uni').val(id);
});

$(document).on('submit', '#form-delete', function() {
    document.getElementById("delete_uni").disabled = true;
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Administrador_api/Universidades_rest/delete_university`;

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
                reloaduniversity();
                $("#modal_delete").modal('toggle'); 

            } else {
                Toastify({
                    text: data.messages.success,
                    duration: 3000,
                    className: "info",
                    // avatar: "../../assets/img/logop.png",
                    style: {
                        background: "linear-gradient(to right, #ff0000, #96c93d)",
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

function get_state() {
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Registro_rest/get_state`;

    console.log();

    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            const ch = data['state'];
            $(ch).each(function(i, v) {
                $('.estado').append('<option  value="' + v.state + '">' + v.state + '</option>');
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

function reloaduniversity() {
    $('#loader').toggle();
    data_university.ajax.reload();
    $('#loader').toggle();
}