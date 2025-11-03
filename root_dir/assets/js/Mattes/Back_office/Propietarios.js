//FORMATO EN ESPAÑOL FECHA
moment.locale('es');
var persona = "";

let listadopropietarios = $('#propietarios').DataTable({

    processing: true,
    serverSide: true,
    lengthMenu: [
        [10, 25, 50, 999999],
        ['10 filas', '25 filas', '50 filas', 'Mostrar todo']
    ],
    'ajax': {
        'url': `${BASE_URL}Mattes/Api/Back_office_api/Propietarios_rest`,
        'data': {
        },
        'type': 'post',
    },
    columns: [
        {
            data: 'propietarios',
            render: function (data, type, row, meta) {
                if (row.propietarios == null) {
                    return `<p>Sin nombre</p>`
                } else if (row.tipo_persona == 1) {
                    return `<a  href="${BASE_URL}detalle-propietario/${row.id}" target="_blank">${row.propietarios}</a>`
                } else if (row.id_group == 5) {
                    return `<a href="${BASE_URL}detalle-agente/${row.id}" target="_blank">${row.propietarios}</a>`
                } else if (row.tipo_persona == 2) {
                    return `<a  href="${BASE_URL}detalle-empresa/${row.id}" target="_blank">${row.propietarios}</a>`
                } else {
                    return `${row.propietarios}`
                }
            }
        },

        {
            data: 'correo'
        },
        {
            data: 'tipo',
            render: function (data, type, row, meta) {
                if (row.tipo_persona == 1) {
                    return `INDEPENDIENTE`
                } else if (row.id_group == 5) {
                    return `AGENTE`
                } else if (row.tipo_persona == 2) {
                    return `INMOBILIARIA`
                } else {
                    return `${data}`
                }
            }
        },
        {
            data: 'propiedades'
        },
        {
            data: 'estatus',
            render: function (data, type, row, meta) {
                if (row.estatus == 0) {
                    return `Correo no verificado`
                } else if (row.estatus == 1) {
                    return `Correo verificado`
                } else if (row.estatus == 2) {
                    return `Suspendido`
                } else {
                    return `${data}`
                }
            }


        },
        {
            data: 'alta',
            render: function (data, type, row, meta) {
                return moment(data).format('DD-MM-YYYY')
            }
        },
        {
            data: 'acceso',
            render: function (data, type, row, meta) {
                return moment(data).format('DD-MM-YYYY')
            }
        },

        {
            data: 'id',
            render: function (data, type, row, meta) {
                btn_agregar = `<div class="d-flex row justify-content-center"><button id="btn_propiedad" type="button" data-usuario="${row.id}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Agregar propiedad</button></div>`;
                return btn_agregar
            }
        },


    ],
    ordering: true,
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ Filas por página',
    },

    initComplete: function (settings, json) {
        $('#propietarios thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#propietarios thead');
        var api = this.api();
        api
            .columns()
            .eq(0)
            .each(function (colIdx) {
                // Set the header cell to contain the input element
                var cell = $('.filters th').eq(
                    $(api.column(colIdx).header()).index()
                );
                var title = $(cell).text();
                $(cell).html('<input type="text" class="text-center" placeholder="' + title + '" />');

                // On every keypress in this input
                $('input', $('.filters th').eq($(api.column(colIdx).header()).index()))
                    .off('keyup change')
                    .on('keyup change', function (e) {
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
            $('.filters').children().removeClass("sorting").removeClass("sorting_desc");
        }
    }

});


$(document).on('click', '.contra', function () {
    let id_buton = $(this).attr('id');
    console.log(id_buton);
    $('#iuser').val(id_buton);
    $('#myModal').modal('toggle');

});

$(document).on('click', '#subir_propietario', function(){
    window.location.href = BASE_URL + 'subir_propietario';
});

//show del password

passwd();
passwd2();


function passwd() {
    $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("fa-eye-slash");
            $('#show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password i').addClass("fa-eye");
        }
    });
}

function passwd2() {
    $("#show_hide_password2 a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password2 input').attr("type") == "text") {
            $('#show_hide_password2 input').attr('type', 'password');
            $('#show_hide_password2 i').addClass("fa-eye-slash");
            $('#show_hide_password2 i').removeClass("fa-eye");
        } else if ($('#show_hide_password2 input').attr("type") == "password") {
            $('#show_hide_password2 input').attr('type', 'text');
            $('#show_hide_password2 i').removeClass("fa-eye-slash");
            $('#show_hide_password2 i').addClass("fa-eye");
        }
    });
}

//cambio de contraseña
$(document).on('submit', '#formCreate', function (e) {
    e.preventDefault();
    pass1 = $('#password1').val();
    pass2 = $('#password2').val();

    if (pass1.trim() === pass2.trim()) {
        var formData = new FormData($(this)[0]);
        const url = `${BASE_URL}Mattes/Api/Back_office_api/Propietarios_rest/changePassword`;

        console.log(url);
       
        //AJAX.
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (data) {
                if (data.status == 200) {
                    $('#myModal').modal('toggle');
                    document.getElementById("formCreate").reset();
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
                    //document.getElementById("d_bancarios").click();
                    document.getElementById("notificaciones").click();
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

    } else {
        Toastify({
            text: "las contraseñas no son iguales",
            duration: 3000,
            className: "info",
            // avatar: "../../assets/img/logop.png",
            style: {
                background: "linear-gradient(to right, #f90303, #fe5602)",
            },
            offset: {
                x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
            },

        }).showToast();
    }
});

//boton subir propiedad
$(document).on('click', '#btn_propiedad', function(){
    id_usuario = $(this).data('usuario');
    window.location.href = `${BASE_URL}subir-propiedad/${id_usuario}`;
});