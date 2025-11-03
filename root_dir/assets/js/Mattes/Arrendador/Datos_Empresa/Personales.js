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
$(document).on('change', '#file_comp', function() {

    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop();

    if (ext == "pdf" || ext == "png" || "jpg") {
        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
        } else {
            textbox.text(filesCount + ' files selected');
        }

    } else {
        $(this).val('');
        Toastify({
            text: "El archivo debe ser pdf, png o jpg",
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


//formulario

$('#form_perso_emp').submit(function() {
    //Obtenemos datos formulario.
    //var form = $("#form-personales");
    var formData = new FormData($(this)[0]);
    //document.getElementById("d_bancarios").click();
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Datos_empresa`;

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

                //$('#defaultOpen').attr('disabled', true);
                document.getElementById("d_bancarios").click();

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




//imagen de usuario

/* $(document).on('change', '#file-user', function() {
    // alert("dentro");

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
            reader.onloadend = function() {
                document.getElementById("img").src = reader.result;
            }
        } else {
            textbox.text(filesCount + ' files selected');
        }

    } else {
        $(this).val('');
        alert("el archivo debe ser una imagen");
    }
}); */




    $('#loader').toggle();
    get_perosanales();


function get_perosanales() {
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Datos_empresa/get_pesonales`;

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            console.log(res);
            $('#loader').toggle();
            if (res.length > 0) {
                $('#id_usuarioper').val(res[0].id_user);
                $('#renter').val(res[0].id_user);
                $('#inmobiliaria_name').val(res[0].name);
                //$('#rfc_inmobiliaria').val(res[0].rfc);
                $('#razonsocial').val(res[0].razon_social);
                //$('#dir_inmobiliaria').val(res[0].address);
                $('#representante').val(res[0].legal_representation);
                $('#tel_inmobiliaria').val(res[0].phone);
                $('#file_comp').removeAttr("required");
                $("#process").css("display","none");


            }
        }
    });
}

$(document).on("click", "#defaultOpen", function() {
    $('#loader').toggle();
    get_perosanales();

});