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

$(document).on("click", "#d_personales", function() {
    $('#loader').toggle();
    get_datos();
    $('#loader').toggle();
});

$(document).on('change', '#file-user', function() {

    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop();
    var archivo = document.getElementById("file-user").files[0];

    if (ext == "jpeg" || "png" || "jpg") {
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
            text: "El archivo debe tener formato jpeg, png o jpg",
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


//formulario
$(document).ready(function() {
    $(document).on('submit', '#alta_agente', function() {
        $('#loader').toggle();
        var formData = new FormData($(this)[0]);
        const url = `${BASE_URL}Mattes/Api/Back_office_api/Propietarios_rest/update_agente`;

        //AJAX.
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(data) {
                switch (data.status) {
                    case 200:
                        Toastify({
                            text: data.messages.success,
                            duration: 3000,
                            className: "info",
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                            offset: {
                                x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                                y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                            },

                        }).showToast();
                        get_datos();
                        $('#loader').toggle();
                    break;

                    case 400:
                        Toastify({
                            text: data.messages.success,
                            duration: 3000,
                            className: "info",
                            style: {
                                background: "linear-gradient(to right, #ef1717 , #f90202 )",
                            },
                            offset: {
                                x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                                y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                            },

                        }).showToast();
                        $('#loader').toggle();
                    break;
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });

        return false;
    });
}); //Fin document. */

$(document).on('change', '#file_agente', function () {

    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop().toLowerCase();

    if (ext == "pdf" || ext =='png' || ext =='jpg' || ext =='jpeg') {
        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
        } else {
            textbox.text(filesCount + ' files selected');
        }

    } else {
        $(this).val('');
        Toastify({
            text: "El archivo debe ser pdf o imagen",
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

$(document).on('submit', '#upd_agente', function() {
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
            //$('#loader').toggle();
            if(res['identity']== ""){
                $('#id_user').val();
                $('#renter').val();
                $('#nombre_agente').val();
                $('#apellidof').val();
                $('#apellidos').val();
                $('#correo').val();
                $('#telefono_agente').val();
                $('#name-agente').text();
                document.getElementById("img").src = `${BASE_URL}assets/img/default.png`
            } else {
                $('#id_user').val(res['identity'][0].id_user);
                $('#renter').val(res['identity'][0].id_user);
                $('#name-agente').text(res['identity'][0].name + ' '+ res['identity'][0].first_name + ' ' + res['identity'][0].second_name);
                $('#nombre_agente').val(res['identity'][0].name);
                $('#apellidof').val(res['identity'][0].first_name);
                $('#apellidos').val(res['identity'][0].second_name);
                $('#correo').val(res['identity'][0].email);
                $('#telefono_agente').val(res['identity'][0].phone);
                document.getElementById("img").src = `${BASE_URL}writable/uploads/Mattes/Agente/` + res['identity'][0].photo;
                document.getElementById("img2").src = `${BASE_URL}writable/uploads/Mattes/Agente/` + res['identity'][0].photo;

                if(res['identity'][0].ine == ""){
                    $("#down_ine").removeAttr('href');
                } else {
                    const url_ine = `${BASE_URL}writable/uploads/Mattes/Agente/${res['identity'][0].ine}`;
                    ine = document.getElementById("down_ine");
                    ine.setAttribute("href", url_ine);
                }
                res['identity'][0].verify === "1" ? $("#verify").prop("checked", true) : $("#verify").prop("checked", false);
                res['users'][0].active === "1" ? $("#user-activo").prop("checked", true) : $("#user-activo").prop("checked", false);
            }

        }
    });
}