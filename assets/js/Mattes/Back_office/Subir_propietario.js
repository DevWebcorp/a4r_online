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
var ID_USUARIO;

//imagen de usuario
$(document).on('change', '#file-user', function() {
    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop();
    var archivo = document.getElementById("file-user").files[0];

    if (ext == "png" || "jpg" || "jpeg") {
        if (filesCount === 1) {

            var reader = new FileReader();
            reader.readAsDataURL(archivo);
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
            reader.onloadend = function() {
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

/* GUARDAR DATOS PERSONALES */
$(document).on('submit', '#form-personales', function (e) {
    e.preventDefault();
    //$('#loader').toggle();
    let url = `${BASE_URL}/Mattes/Api/Back_office_api/Propietarios_Admin/subirPropietario`;
    let FORMDATA = new FormData($(this)[0]);
    send(url, FORMDATA, false, false);
});


//FUNCIONES PARA ENVIO DE FORMULARIOS
let send = (url, data, datatable, modal, form) => {
    $('#loader').toggle();
    fetch(url, {
        method: "POST",
        body: data,
    }).then(response => response.json()).catch(err => alert(err))
        .then(response => {
            if(response.status == 200){
                if(response.id_user){
                    notificacion(response.msg, true, false, false, false);
                    ID_USUARIO = response.id_user;
                    $("#id_usuarioper").val(ID_USUARIO)
                    $("#id_usuarioban").val(ID_USUARIO)
                    $("#id_usuariofis").val(ID_USUARIO)
                    $("#id_usuarionot").val(ID_USUARIO)
                    $("#id_usuarioprop").val(ID_USUARIO)
                } else {
                    notificacion(response.msg, true, false, false, false)
                }
            } else {
                notificacion(response.msg, false);
            }
            //$('#loader').toggle();
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