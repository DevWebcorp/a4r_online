$(document).on('change', '#file_user', function() {

    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop();
    var archivo = document.getElementById("file_user").files[0];

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
        let pass1 = $('#update_password1').val();
        let pass2 = $('#update_password2').val();

        if (pass1 == pass2) {
            $('#loader').toggle();
            var formData = new FormData($(this)[0]);

            const url = `${BASE_URL}Mattes/Api/Agente_api/Datos_agente/update_perfil`;

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
                            location.href = BASE_URL + "Mattes/Arrendador/Index";
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

        } else {
            Toastify({
                text: "LAS CONTRASEÑAS NO COINCIDEN",
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

        }

        return false;
    });
}); //Fin document. */

$(document).ready(function() {
    $('#loader').toggle();

    const url = `${BASE_URL}Mattes/Api/Agente_api/Datos_agente/perfil_agente`;

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            console.log(res);
            $('#loader').toggle();
            if (res.photo != "") {
                document.getElementById("img").src = "writable/uploads/Mattes/Agente/" + res.photo;

            } 
            $('#nombre_agente').val(res.name);
            $('#apellidof').val(res.first_name);
            $('#apellidos').val(res.second_name);
            $('#correo').val(res.email);
            $('#telefono_agente').val(res.phone);
            $('#id_user').val(res.id);
            $('#id_identity').val(res.id_identi);
            $('#name-img').val(res.photo);
        }

    });

});

passwd();
passwd2();

function passwd() {
    $("#show_hide_password a").on('click', function(event) {
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
    $("#show_hide_password2 a").on('click', function(event) {
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