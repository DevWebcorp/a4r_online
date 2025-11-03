
let admin_pro = $('#propretarios-bo').DataTable({

    processing: true,
    serverSide: true,
    lengthMenu: [
        [10, 25, 50, 999999],
        ['10 filas', '25 filas', '50 filas', 'Mostrar todo']
    ],
    'ajax': {
        'url': `${BASE_URL}Mattes/Api/Back_office_api/Propietarios_Admin`,
        'data': {
        },
        'type': 'post',
    },
    columns: [
        {
            data: 'nombre',
            render: function (data, type, row, meta) {
                if (row.nombre == null) {
                    return `<p>Sin nombre</p>`
                } else if (row.persona == 1) {
                    return `<a  href="${BASE_URL}detalle-propietario/${row.id_user}" target="_blank">${row.nombre}</a>`
                } else if (row.id_group == 5) {
                    return `<a  href="${BASE_URL}detalle-agente/${row.id_user}" target="_blank">${row.nombre}</a>`
                } else if (row.persona == 2) {
                    return `<a  href="${BASE_URL}detalle-empresa/${row.id_user}" target="_blank">${row.nombre}</a>`
                } else {
                    return `${row.nombre}`
                }
            }
        },
        {
            data: 'email',
        },
        {
            data: 'fecha',
            render: function (data, type, row, meta) {
                fecha = data == null ? '<p class="text-center"> - </p>' : moment(data).format('DD-MM-YYYY')
                return fecha
            }

        },
        {
            data: 'abb',
            render: function (data, type, row, meta) {
                estatus = data == null ? '<p class="text-center"> - </p>' : '<p class="text-center" title="'+ row.des +'">' + data +'</p>'
                return  estatus
            }

        },
        {
            data: 'prority',
        },
        {
            data: 'active',
            render: function (data, type, row, meta){
                activo = data == 0 ? `<div class="col-sm-2 mg-t-10 mg-sm-t-0 "><label class="switch"><input class="verificado" data-verificado=${data} type="checkbox" data-usuario=${row.id_user}><span class="slider round"></span></label></div>` : `<div class="col-sm-2 mg-t-10 mg-sm-t-0 "><label class="switch"><input class="verificado" type="checkbox" checked data-verificado=${data} data-usuario=${row.id_user}><span class="slider round"></span></label></div>`
                return activo
            }
        },
        {
            data: 'id_user',
            render: function (data, type, row, meta){
                activo = `<div class="d-flex row justify-content-center"><button type="button" data-usuario="${row.id_user}" class="btn btn-warning btn-cambiar"><i class="fa fa-pencil" aria-hidden="true"></i> Cambiar contraseña</button></div>`;
                return activo
            }
        },
        {
            data: 'id_user',
            render: function (data, type, row, meta){
                btn_agregar = `<div class="d-flex row justify-content-center"><button id="btn_propiedad" type="button" data-usuario="${row.id_user}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Agregar propiedad</button></div>`;
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
});

$(document).on('change', '.verificado', function(){
    $('#loader').toggle();
    id_user = $(this).data('usuario');
    verificado = $(this).data('verificado');
    verif = verificado == 0 ? 1 : 0;
    let url = `${BASE_URL}Mattes/Api/Back_office_api/Propietarios_Admin/updateVerif`;
    let FORMDATA = new FormData();
    console.log(verif);
    FORMDATA.append('id_user',  id_user);
    FORMDATA.append('verificado', verif)
    send(url, FORMDATA, admin_pro);
    //$('#loader').toggle();
});

$(document).on('click', '#subir_propietario', function(){
    window.location.href = BASE_URL + 'subir_propietario';
});

$(document).on('click', '#btn_propiedad', function(){
    id_usuario = $(this).data('usuario');
    window.location.href = `${BASE_URL}subir-propiedad/${id_usuario}`;
});

let send = (url, data, admin_pro, modal, form) => {
    $('#loader').toggle();
    fetch(url, {
        method: "POST",
        body: data,
    }).then(response => response.json()).catch(err => alert(err))
        .then(response => {
            if(response.status == 200){
                console.log(parseFloat(response.verificado));
                if(response.verificado == 1){
                    notificacion(response.msg, true, admin_pro, form);
                } else {
                    mensaje = "CORREO NO VERIFICADO"
                    notificacion(mensaje, true, admin_pro, form)
                }
            } else {
                notificacion(response.msg, false);
            }
            $('#loader').toggle();
    }).catch(err => alert(err))
}

//notificaciones
let notificacion = (mensaje, flag, reload, modal, form, ref) => {
    if (flag) {
        var background = "linear-gradient(to right, #00b09b, #96c93d)";
    } else {
        var background = "linear-gradient(to right, #f90303, #fe5602)";
    }

    if (modal) {
        $(modal.selector).modal('toggle');
    }

    if (reload) {
        reload.ajax.reload();
    }

    if (form) {
        $(form.selector).trigger("reset");

    }

    Toastify({
        text: mensaje,
        duration: 3000,
        className: "info",
        style: {
            background: background
        },
        offset: {
            x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
            y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
        },
    }).showToast();
    
    if (ref) {
        setTimeout(() => {
            window.location.href = BASE_URL + ref;
        }, "1000");
    }

    $('#loader').toggle();
}