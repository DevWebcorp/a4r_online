get_state();
get_genero();


$(".del-photo").hide();
$(".del-carta").hide();
$(".del-ine").hide();

get_personales();

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

$('#notificaciones').on('click', function () {
    $('#loader').toggle();
    get_personales();
    $('#loader').toggle();
})

$(document).on('click', '#conversacion', function () {
    $('#loader').toggle();
    const url = `${BASE_URL}Mattes/Api/Back_office_api/ConversacionBO_rest/status`;
    data = {
        id_usuario: id_usuario
    }

    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (result) {
            console.log(result);
            $('#loader').toggle();

        }
    });
});

$(document).on('change', '#file-user', function () {
    //alert("dentro");

    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop();
    var archivo = document.getElementById("file-user").files[0];

    if (ext == "png" || "jpg") {
        if (filesCount === 1) {

            var reader = new FileReader();
            reader.readAsDataURL(archivo);
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
            reader.onloadend = function () {
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

/* Carta de admision de la universidad o credencial vigente */
$(document).on('change', '#file-carta', function () {
    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop();
    var archivo = document.getElementById("file-carta").files[0];

    if (ext == "pdf") {
        if (filesCount === 1) {
            var reader = new FileReader();
            reader.readAsDataURL(archivo);
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
            reader.onloadend = function () {
                document.getElementById("file").src = reader.result;
            }
        } else {
            textbox.text(filesCount + ' files selected');
        }

    } else {
        $(this).val('');
        Toastify({
            text: "El archivo debe ser un documento pdf",
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

$(document).on('change', '#file-identificacion', function () {
    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop();
    var archivo = document.getElementById("file-identificacion").files[0];

    if (ext == "pdf") {
        if (filesCount === 1) {
            var reader = new FileReader();
            reader.readAsDataURL(archivo);
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
            reader.onloadend = function () {
                document.getElementById("file").src = reader.result;
            }
        } else {
            textbox.text(filesCount + ' files selected');
        }
    } else {
        $(this).val('');
        Toastify({
            text: "El archivo debe ser un documento pdf",
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



$('#notis-correo').on('click', function () {
    let status = $(this).prop("checked");

    if (status) {
        $("#nueva-cita").prop("checked", true).removeAttr("disabled");
        $("#avisos").prop("checked", true).removeAttr("disabled");
        $("#mensajes").prop("checked", true).removeAttr("disabled");
        $("#promos").prop("checked", true).removeAttr("disabled");
    } else {
        $("#nueva-cita").prop("checked", false).attr("disabled", true);
        $("#avisos").prop("checked", false).attr("disabled", true);
        $("#mensajes").prop("checked", false).attr("disabled", true);
        $("#promos").prop("checked", false).attr("disabled", true);

    }

});

$(document).on('submit', '#form_notificaciones', function () {
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Back_office_api/Alumno_rest/update_notis`;

    //AJAX.
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (data) {
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

                location.href = BASE_URL + "alumnos";


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

$(document).on('submit', '#form_status', function () {
    var formData = new FormData($(this)[0]);
    $('#loader').toggle();
    const url = `${BASE_URL}Mattes/Api/Back_office_api/Alumno_rest/insert_status`;

    //AJAX.
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (data) {
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


                get_personales();


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

$(".del-photo").on('click', function () {
    let id = $(this).attr('id');
    $("#id_uphoto").val(id);
});

$(".del-carta").on('click', function () {
    let id = $(this).attr('id');
    $("#id_ucarta").val(id);
    $("#delete_carta").modal("toggle");
});

$(".del-ine").on('click', function () {
    let id = $(this).attr('id');
    $("#id_uident").val(id);
    $("#delete_ine").modal("toggle");
});

$(document).on('submit', '#form_del_photo', function () {
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Back_office_api/Alumno_rest/del_photo`;

    //AJAX.
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (data) {
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

                $("#modal_delete").modal("toggle");
                get_personales();
                //reloadpersonales();
                //location.href = BASE_URL + "Mattes/Back_Office/Inicio";
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

$(document).on('submit', '#form_del_carta', function () {
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Back_office_api/Alumno_rest/del_carta`;

    //AJAX.
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (data) {
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

                $("#delete_carta").modal("toggle");
                get_personales();
                //reloadpersonales();
                //location.href = BASE_URL + "Mattes/Back_Office/Inicio";


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

$(document).on('submit', '#form_del_ine', function () {
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Back_office_api/Alumno_rest/del_ine`;

    //AJAX.
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (data) {
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

                $("#delete_ine").modal("toggle");
                get_personales();
                //reloadpersonales();
                //location.href = BASE_URL + "Mattes/Back_Office/Inicio";


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

// FUNCIONES
function get_personales() {
    const url = `${BASE_URL}Mattes/Api/Back_office_api/Alumno_rest/get_personales`;

    let json = {
        id_usuario: id_usuario
    }
    $('#loader').toggle();

    $.ajax({
        url: url,
        type: 'POST',
        data: JSON.stringify(json),
        dataType: 'json',
        success: function (res) {

            var input = $("#phone")[0];
            var iti = window.intlTelInput(input, {
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
            });

            if (res['identity'][0].prefix == null) {
                prefix = "";
                $('#prefix').val("");
            } else {
                prefix = res['identity'][0].prefix;
                $('#prefix').val(prefix);
            }

            var phoneNumber = prefix + res['identity'][0].phone; // Concatenar sin espacio
            console.log("prefijo", phoneNumber);
            iti.setNumber(phoneNumber);


            var countryData = iti.getSelectedCountryData();
            var dialCode = "+" + countryData.dialCode;
            iti.setNumber(dialCode + " " + res['identity'][0].phone);

            input.addEventListener("countrychange", function () {
                $('#prefix').val("");
                var countryData = iti.getSelectedCountryData();
                var dialCode = "+" + countryData.dialCode;
                $("#phone").val(dialCode + " ");
            });



            if (res['identity'] == "") {
                $('#id_alumno').val();
                $('#id_user').val();
                $('#renter').val();
                $('#nombre').val();
                $('#primer_apellido').val();
                $('#segundo_apellido').val();
                $('#correo').val();
                $('#celular').val();
                $('#f_nacimiento').val();
                $('#sexo').val();
                $('#describete').val();
                $("#user-verificado").prop("checked", false);
                document.getElementById("img").src = `${BASE_URL}writable/uploads/Mattes/Arrendatario/`;
            } else {
                if (res['identity'][0].photo == "") {
                    $(".del-photo").hide();
                    document.getElementById("img").src = `${BASE_URL}assets/img/default.png`;
                } else {
                    $(".del-photo").show();
                    document.getElementById("img").src = `${BASE_URL}writable/uploads/Mattes/Arrendatario/` + res['identity'][0].photo;

                }
                $(".del-photo").attr('id', res['identity'][0].id_user);
                $('#id_alumno').val(res['identity'][0].id_user);
                $('#id_user').val(res['identity'][0].id_user);
                $('#id_userstatus').val(res['identity'][0].id_user);
                $('#renter').val(res['identity'][0].id_user);
                $('#nombre').val(res['identity'][0].name);
                $('#primer_apellido').val(res['identity'][0].first_name);
                $('#segundo_apellido').val(res['identity'][0].second_name);
                $('#correo').val(res['identity'][0].email);
                $('#celular').val(res['identity'][0].phone);
                $('#f_nacimiento').val(res['identity'][0].date_of_Birth);
                $('#sexo').val(res['identity'][0].id_gender);
                $('#describete').val(res['identity'][0].description);
                res['identity'][0].verify == "1" ? $("#user-verificado").prop("checked", true) : $("#user-verificado").prop("checked", false);
                res['identity'][0].active == "1" ? $("#user-activo").prop("checked", true) : $("#user-activo").prop("checked", false);
            }

            if (res['student'] == "") {
                $('#autoComplete').val();
                $('#id_univ').val();
                $('#carrera').val();
                $('#estado').val();
            } else {
                $(".del-carta").attr('id', res['identity'][0].id_user);
                $(".del-ine").attr('id', res['identity'][0].id_user);
                $('#autoComplete').val(res['student'][0].university);
                $('#id_univ').val(res['student'][0].university_id);
                $('#carrera').val(res['student'][0].college_career);
                $('#estado').val(res['student'][0].id_state);

                if (res['student'][0].university_file == "") {
                    $("#down_carta").removeAttr('href');
                    $(".del-carta").hide();

                } else {
                    $(".del-carta").show();
                    const url_carta = `${BASE_URL}writable/uploads/Mattes/Arrendatario/${res['student'][0].university_file}`;
                    carta = document.getElementById("down_carta");
                    carta.setAttribute("href", url_carta);
                }

                if (res['student'][0].ine == "") {
                    $("#down_ine").removeAttr('href');
                    $(".del-ine").hide();
                } else {
                    $(".del-ine").show();
                    const url_ine = `${BASE_URL}writable/uploads/Mattes/Arrendatario/${res['student'][0].ine}`;
                    ine = document.getElementById("down_ine");
                    ine.setAttribute("href", url_ine);
                }


            }

            if (res['notis'] == "") {
                $("#notis-correo").prop("checked", false);
                $("#nueva-cita").prop("checked", false);
                $("#avisos").prop("checked", false);
                $("#mensajes").prop("checked", false);
                $("#promos").prop("checked", false);
            } else {
                res['notis'][0].email === "1" ? $("#notis-correo").prop("checked", true) : $("#notis-correo").prop("checked", false);
                res['notis'][0].appointment === "1" ? $("#nueva-cita").prop("checked", true) : $("#nueva-cita").prop("checked", false);
                res['notis'][0].notices === "1" ? $("#avisos").prop("checked", true) : $("#avisos").prop("checked", false);
                res['notis'][0].message === "1" ? $("#mensajes").prop("checked", true) : $("#mensajes").prop("checked", false);
                res['notis'][0].promotions === "1" ? $("#promos").prop("checked", true) : $("#promos").prop("checked", false);
            }
            $('#loader').toggle();


            $(document).on('submit', '#detalle-alumno', function () {
                var formData = new FormData($(this)[0]);

                if (!iti.isValidNumber()) {
                    Toastify({
                        text: "numero de telefono invalido",
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
                    const prefijo = $('#prefix').val();
                    if (prefijo == "") {
                        var newnumberphone = $('#phone').val();
                        var parts = newnumberphone.split(" ");
                        if (parts.length === 2) {
                            var prefix = parts[0];
                            var number = parts[1].trim();
                            formData.append('num_cel', number)
                            formData.append('prefix', prefix)
                        } else {
                            Toastify({
                                text: "Select your country code",
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
                    } else {
                        var number = $('#phone').val().trim();
                        var cleanedNumber = number.replace(/\s+/g, '');
                        var prefix = $('#prefix').val();
                        formData.append('num_cel', cleanedNumber)
                        formData.append('prefix', prefix)

                    }
                    //document.getElementById("d_bancarios").click();
                    const url = `${BASE_URL}Mattes/Api/Back_office_api/Alumno_rest/update_datos`;

                    //AJAX.
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function (data) {
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

                                get_personales();

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


                }
                return false;
            });




        }





    });
}

function get_genero() {
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Registro_rest`;

    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            const ch = data['gender'];
            $(ch).each(function (i, v) {
                $('#sexo').append('<option  value="' + v.id + '">' + v.name + '</option>');
            });
        },
        error: function (error) {
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

function get_state() {
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Registro_rest/get_state`;

    console.log();

    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            const ch = data['state'];
            $(ch).each(function (i, v) {
                $('#estado').append('<option  value="' + v.id + '">' + v.state + '</option>');
            })

        },
        error: function (error) {
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

