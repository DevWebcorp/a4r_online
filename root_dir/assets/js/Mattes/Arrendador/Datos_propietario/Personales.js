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

//FILE DRAG AND DROOP
$(document).on('change', '#file-identificacion', function() {

    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop().toLowerCase();
    console.log("extension");
    console.log(ext);



    if ((ext == "pdf") ||(ext == "png") || (ext == "jpg") ) {
        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
        } else {
            textbox.text(filesCount + ' files selected');
        }

    } else {
        $(this).val('');
        Toastify({
            text: "El archivo debe ser pdf, png ó jpg",
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

//REDIRECCION

$(".continuar-momento").on("click", function() {
    location.href = BASE_URL + "home-propietario";
});

/* document.getElementById('form-personales').addEventListener('submit', function(e) {
    console.log(e);
    e.preventDefault();

}); */

//formulario

$(document).ready(function() {
    $('#loader').toggle();
    get_perosanales();
});

function get_perosanales() {
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Datos_propietario/get_pesonales`;

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            console.log(res);
            $('#loader').toggle();
            if (res.length > 0) {
                $('#id_usuarioper').val(res[0].id_user);
                $('#nombre').val(res[0].name);
                $('#apellido').val(res[0].first_name);
                $('#am').val(res[0].second_name);
                $('#telefono').val(res[0].phone);
                $('#f_nacimiento').val(res[0].birth_date);

                if(res[0].photo != ""){
                    document.getElementById("img").src = BASE_URL+"/writable/uploads/Mattes/Arrendador/" + res[0].photo;
                }
                $(".choose-file-button").text("Actualizar foto");


                //$("#identificacion").attr('src', '"../../../../writable/uploads/Mattes/Arrendador/"' + res.ine)
                //$('#file-identificacion').val("../../../../writable/uploads/Mattes/Arrendador/" + res.ine);
                $('#file-identificacion').removeAttr("required");
                $('#file-user').removeAttr("required");

            }
        }
    });
}


$(document).on('submit', '#form-personales', function() {
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Datos_propietario`;

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
    return false;
});


//imagen de usuario
$(document).on('change', '#file-user', function() {
    // alert("dentro");

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

$(document).on("click", "#defaultOpen", function() {
    $('#loader').toggle();
    get_perosanales();

});


// get data//