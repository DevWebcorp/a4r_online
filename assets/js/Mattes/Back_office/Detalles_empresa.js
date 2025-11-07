
$(document).ready(function() {
    get_datos();
});


$(document).on("click", "#d_personales", function() {
    $('#loader').toggle();
    get_datos();
    $('#loader').toggle();
});

$('#form_notificaciones').submit(function() {
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Datos_empresa/datos_notificaciones`;

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
}); //Fin document. */

$('#notis-correo').on('click', function() {
    let status = $(this).prop("checked");

    if (status) {
        $("#nueva-cita").prop("checked", true).removeAttr("disabled");
        $("#avisos").prop("checked", true).removeAttr("disabled");
        $("#mensajes").prop("checked", true).removeAttr("disabled");
        $("#promos").prop("checked", true).removeAttr("disabled");
    } else {
        $("#nueva-cita").prop("checked", false).attr("disabled", true);
        $("#avisos").prop("checked", false).attr("disabled", true);
        $("#mensajes").prop("checked", false).attr("disabled", true);;
        $("#promos").prop("checked", false).attr("disabled", true);;

    }

});

// FUNCIONES 
function get_datos() {
    const url = `${BASE_URL}Mattes/Api/Back_office_api/Propietarios_rest/get_empresas`;

    let json = {
        id_usuario: id_usuario
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: JSON.stringify(json),
        dataType: 'json',
        success: function(res) {
            console.log(res);
            //$('#loader').toggle();
            if(res['identity']== ""){
                $('#renter').val(id_usuario);
                $('#inmobiliaria').val();
                $('#rfc_inmobiliaria').val();
                $('#dir_inmobiliaria').val();
                $('#representante').val();
                $('#tel_inmobiliaria').val();
            } else {
                $('#id_usuarioper').val(res['identity'][0].id_user);
                $('#inmobiliaria').val(res['identity'][0].name);
                $('#rfc_inmobiliaria').val(res['identity'][0].rfc);
                $('#razonsocial').val(res['identity'][0].razon_social);
                $('#dir_inmobiliaria').val(res['identity'][0].address);
                $('#representante').val(res['identity'][0].legal_representation);
                $('#tel_inmobiliaria').val(res['identity'][0].phone);
                const url_comp = `${BASE_URL}writable/uploads/Mattes/Arrendador/comprobantes/${res['identity'][0].proof_of_address}`;
                comp = document.getElementById("down_comp");
                comp.setAttribute("href", url_comp);

                res['identity'][0].verify === "1" ? $("#verify").prop("checked", true) : $("#verify").prop("checked", false);
                res['users'][0].active === "1" ? $("#user-activo").prop("checked", true) : $("#user-activo").prop("checked", false);
            }
            
            if(res['bancarios']== ""){
                $('#nombre_inmobi').val();
                $('#banco_nombre').val();
                $('#clabe_banco').val();
            } else {
                $('#id_usuarioban').val(res['identity'][0].id_user);
                $('#nombre_inmobi').val(res['bancarios'][0].full_name);
                $('#banco_nombre').val(res['bancarios'][0].bank_name);
                $('#clabe_banco').val(res['bancarios'][0].interbank_number);
            }

            if(res['fiscales']== ""){
                $('#rfc').val();
                $('#direccion_fiscal').val();
            } else {
                $('#id_usuariofis').val(res['identity'][0].id_user);
                $('#rfc').val(res['fiscales'][0].rfc);
                $('#direccion_fiscal').val(res['fiscales'][0].fiscal_address);
            }

            if(res['notis'] == ""){
                $("#notis-correo").prop("checked", false);
                $("#nueva-cita").prop("checked", false);
                $("#avisos").prop("checked", false);
                $("#mensajes").prop("checked", false);
                $("#promos").prop("checked", false);
            } else {
                $('#id_usuarionot').val(res['identity'][0].id_user);
                res['notis'][0].email === "1" ? $("#notis-correo").prop("checked", true) : $("#notis-correo").prop("checked", false);
                res['notis'][0].appointment === "1" ? $("#nueva-cita").prop("checked", true) : $("#nueva-cita").prop("checked", false);
                res['notis'][0].notices === "1" ? $("#avisos").prop("checked", true) : $("#avisos").prop("checked", false);
                res['notis'][0].message === "1" ? $("#mensajes").prop("checked", true) : $("#mensajes").prop("checked", false);
                res['notis'][0].promotions === "1" ? $("#promos").prop("checked", true) : $("#promos").prop("checked", false);
            }

        }
    });
}


$(document).on('submit', '#upd_status', function() {
    var formData = new FormData($(this)[0]);
    formData.append('id_user',id_usuario);
    $('#loader').toggle();
    
    const url = `${BASE_URL}Mattes/Api/Back_office_api/Status`;

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
                $('#loader').toggle();

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
}); //Fin document. */