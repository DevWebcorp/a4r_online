function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();


//FORMATO EN ESPAÑOL FECHA
moment.locale('es');

let listadoalumnos = $('#alumnos').DataTable({
    
    processing: true, 
    serverSide: true, 
    lengthMenu: [
        [10, 25, 50, 999999],
        ['10 filas', '25 filas', '50 filas', 'Mostrar todo']
    ], 
    'ajax': {
        'url': `${BASE_URL}Mattes/Api/Back_office_api/Alumno_rest/inicio_alumnos`,
        'data': {
        },
        'type': 'post',
    },
    columns: [
        {
            data: 'nombre',
            render: function(data, type, row, meta) {
                if(row.nombre == null){
                    return `<p>Sin nombre</p>`
                }else{
                    return `<a  href="${BASE_URL}detalle-alumno/${row.id}" target="_blank">${data}</a>`
                }
            }
        },
        {
            data: 'email'
        },
        {
            data: 'fecha',
            render: function(data, type, row, meta) {
                fecha = data == null ? '<p class="text-center"> - </p>' : moment(data).format('DD-MM-YYYY')
                return fecha
            }
        },
        {
            data: 'abbreviation',
            render: function(data, type, row, meta) {
                estatus = data == null ? '<p class="text-center"> - </p>' : '<p class="text-center" title="'+ row.description +'">' + data +'</p>'
                return  estatus
            }
        },  
        {
            data: 'priority'
        },
        {
            data: 'active',
            render: function (data, type, row, meta){
                activo = data == 0 ? `<div class="col-sm-2 mg-t-10 mg-sm-t-0 "><label class="switch"><input class="verif-alumno" data-verificado="${data}" type="checkbox" data-usuario="${row.id}"><span class="slider round"></span></label></div>` : `<div class="col-sm-2 mg-t-10 mg-sm-t-0 "><label class="switch"><input class="verif-alumno" type="checkbox" checked data-verificado="${data}" data-usuario=${row.id}><span class="slider round"></span></label></div>`
                return activo
            }
        },
        {
            data: 'id',
            render: function (data, type, row, meta){
                activo = `<div class="d-flex row justify-content-center"><button type="button" data-usuario="${row.id}" class="btn btn-warning btn-cambiar"><i class="fa fa-pencil" aria-hidden="true"></i> Cambiar contraseña</button></div>`;
                return activo
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

$(document).on('click', '.btn-cambiar', function(){
    id_user = $(this).data('usuario');
    $("#id_user").val(id_user);
    $("#updateContra").modal('toggle');
});

$(document).on('submit', '#formUpdateContra', function (evt) {
    evt.preventDefault();
    $('#loader').toggle();
    let url = `${BASE_URL}Mattes/Api/Back_office_api/Propietarios_Admin/cambiarContra`;
    let FORMDATA = new FormData($(this)[0]);
    let id_form = $('#formUpdateContra');
    let modal = $('#updateContra');
    contrasenia(url, FORMDATA, modal, id_form);
});

$(document).on('change', '.verif-alumno', function(){
    $('#loader').toggle();
    id_user = $(this).data('usuario');
    verificado = $(this).data('verificado');
    verif = verificado == 0 ? 1 : 0;
    let url = `${BASE_URL}Mattes/Api/Back_office_api/Propietarios_Admin/updateVerif`;
    let FORMDATA = new FormData();
    console.log(verif);
    FORMDATA.append('id_user',  id_user);
    FORMDATA.append('verificado', verif)
    send_alumno(url, FORMDATA, listadoalumnos);
    //$('#loader').toggle();
});

let contrasenia = (url, data, modal, form) => {
    $('#loader').toggle();
    fetch(url, {
        method: "POST",
        body: data,
    }).then(response => response.json()).catch(err => alert(err))
        .then(response => {
            if(response.status == 200){
                notis(response.msg, true, false, modal, form);
            } else {
                notis(response.msg, false);
            }
            $('#loader').toggle();
    }).catch(err => alert(err))
}


let send_alumno = (url, data, listadoalumnos, modal, form) => {
    $('#loader').toggle();
    fetch(url, {
        method: "POST",
        body: data,
    }).then(response => response.json()).catch(err => alert(err))
        .then(response => {
            if(response.status == 200){
                console.log(parseFloat(response.verificado));
                if(response.verificado == 1){
                    notis(response.msg, true, listadoalumnos, form);
                } else {
                    mensaje = "CORREO NO VERIFICADO"
                    notis(mensaje, true, listadoalumnos, form)
                }
            } else {
                notis(response.msg, false);
            }
            $('#loader').toggle();
    }).catch(err => alert(err))
}

//notificaciones.
let notis = (mensaje, flag, reload, modal, form, ref) => {
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