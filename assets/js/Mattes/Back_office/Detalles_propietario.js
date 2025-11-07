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

$(document).ready(function() {
    get_datos();
}); 

$(document).on('submit', '#form_notificaciones', function() {
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

$(document).on("click", "#d_personales", function() {
    $('#loader').toggle();
    get_datos();
    $('#loader').toggle();
});


// FUNCIONES 
function get_datos() {
    const url = `${BASE_URL}Mattes/Api/Back_office_api/Propietarios_rest/get_propietarios`;

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
                $('#nombre').val();
                $('#apellido').val();
                $('#am').val();
                $('#telefono').val();
                document.getElementById("img").src = `${BASE_URL}assets/img/default.png`;
                document.getElementById("img2").src = `${BASE_URL}assets/img/default.png`;
            } else {
                $('#id_usuarioper').val(res['identity'][0].id_user);
                $('#renter').val(res['identity'][0].id_user);
                $('#nombre').val(res['identity'][0].name);
                $('#apellido').val(res['identity'][0].first_name);
                $('#am').val(res['identity'][0].second_name);
                $('#telefono').val(res['identity'][0].phone);
                $('#user-name').text(res['identity'][0].name+" "+res['identity'][0].first_name+" "+res['identity'][0].second_name);

                if(res['identity'][0].photo == ""){
                    document.getElementById("img").src = `${BASE_URL}assets/img/default.png`;
                    document.getElementById("img2").src = `${BASE_URL}assets/img/default.png`;

                }else{
                    document.getElementById("img").src = `${BASE_URL}writable/uploads/Mattes/Arrendador/` + res['identity'][0].photo;
                    document.getElementById("img2").src = `${BASE_URL}writable/uploads/Mattes/Arrendador/` + res['identity'][0].photo;

                }


              
                const url_ine = `${BASE_URL}writable/uploads/Mattes/Arrendador/${res['identity'][0].ine}`;
                ine = document.getElementById("down_ine");
                ine.setAttribute("href", url_ine);

                res['identity'][0].verify === "1" ? $("#verify").prop("checked", true) : $("#verify").prop("checked", false);
                res['users'][0].active === "1" ? $("#user-activo").prop("checked", true) : $("#user-activo").prop("checked", false);
            
            
            }
            
            if(res['bancarios']== ""){
                $('#name_bancario').val();
                $('#name_bank').val();
                $('#clabe').val();
            } else {
                $('#id_usuarioban').val(res['identity'][0].id_user);
                $('#name_bancario').val(res['bancarios'][0].full_name);
                $('#name_bank').val(res['bancarios'][0].bank_name);
                $('#clabe').val(res['bancarios'][0].interbank_number);
            }

            if(res['fiscales']== ""){
                $('#rfc').val();
                $('#fiscal').val();
            } else {
                $('#id_usuariofis').val(res['identity'][0].id_user);
                $('#rfc').val(res['fiscales'][0].rfc);
                $('#fiscal').val(res['fiscales'][0].fiscal_address);
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




$(document).on('submit', '#formStatus', function() {
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