get_genero();
get_state();

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

$(document).ready(function () {
    get_personales();
});

//imagen de usuario

/* $(document).on('change', '#file-identificacion', function() {
    // alert("dentro");

    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop();
    var archivo = document.getElementById("file-identificacion").files[0];


    if ((ext == "pdf") || (ext == "jpg") || (ext == "png") || (ext =="jpeg")) {
        if (filesCount === 1) {

            var reader = new FileReader();
            reader.readAsDataURL(archivo);
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
            reader.onloadend = function() {
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

$(document).on('change', '#file-universidad', function() {
    // alert("dentro");

    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop();
    var archivo = document.getElementById("file-universidad").files[0];


    if ((ext == "pdf") || (ext == "jpg") || (ext == "png") || (ext =="jpeg")) {
        if (filesCount === 1) {

            var reader = new FileReader();
            reader.readAsDataURL(archivo);
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
            reader.onloadend = function() {
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
}); */

$(document).on('change', '#file-user', function () {
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



function get_personales() {
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Registro_rest/get_alumno`;
    $('#loader').toggle();
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (res) {
            console.log(res);
            var input = $("#phone")[0];
            var iti = window.intlTelInput(input, {
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
            });

            if (res.length > 0) {
                if (res[0].photo == "") {
                    document.getElementById("img").src = "/../mattes/assets/img/default.png";
                } else {
                    $(".del-photo").show();
                    document.getElementById("img").src = "../../../../../../writable/uploads/Mattes/Arrendatario/" + res[0].photo;
                }

                if (res[0].prefix == null) {
                    prefix = "";
                    $('#prefix').val("");
                } else {
                    prefix = res[0].prefix;
                    $('#prefix').val(prefix);
                }

                var phoneNumber = prefix + res[0].phone; // Concatenar sin espacio
                console.log("prefijo", phoneNumber);
                iti.setNumber(phoneNumber);
                var countryData = iti.getSelectedCountryData();
                var dialCode = "+" + countryData.dialCode;
                iti.setNumber(dialCode + " " + res[0].phone);

                input.addEventListener("countrychange", function () {
                    $('#prefix').val("");
                    var countryData = iti.getSelectedCountryData();
                    var dialCode = "+" + countryData.dialCode;
                    $("#phone").val(dialCode + " ");
                });

                $('#nombre').val(res[0].name);
                $('#primer_apellido').val(res[0].first_name);
                $('#segundo_apellido').val(res[0].second_name);
                $('#f_nacimiento').val(res[0].date_of_Birth);
                $('#sexo').val(res[0].id_gender);
                $('#describete').val(res[0].description);
                //document.getElementById("img").src = "../../../../writable/uploads/Mattes/Arrendatario/" + res[0].photo;
                $('#loader').toggle();

                $(document).on('submit', '#form-personales-alumno', function () {
                    var formData = new FormData($(this)[0]);
                    var currentNumber = iti.getNumber(intlTelInputUtils.numberFormat.E164);

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
                            }else{
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
                        }else{
                            var number  = $('#phone').val().trim();
                            var cleanedNumber = number.replace(/\s+/g, '');
                            var prefix = $('#prefix').val();
                            formData.append('num_cel', cleanedNumber)
                            formData.append('prefix', prefix)

                        }

                        const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Registro_rest/insert_datos`;
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
    
                                    //$('#defaultOpen').attr('disabled', true);
                                    //document.getElementById("d_bancarios").click();
    
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
        }
    });
}




function get_documentos() {
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Registro_rest/get_documentos`;

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (res) {
            console.log(res);
            $('#loader').toggle();
            if (res.length > 0) {
                $('#autoComplete').val(res[0].university);
                $('#id_univ').val(res[0].university_id)
                $('#carrera').val(res[0].college_career);
                $('#estado').val(res[0].id_state);
                //$('#file-universidad').val(res[0].university_file);
                //$('#file-identificacion').val(res[0].ine);

                //document.getElementById("file-universidad").src = "../../../../writable/uploads/Mattes/Arrendatario/" + res[0].university_file;

            }
        }
    });
}

$(document).on("click", "#defaultOpen", function () {
    // $('#loader').toggle();
    get_personales();

});

$(document).on("click", "#documentos", function () {
    $('#loader').toggle();
    get_documentos();


});

function get_genero() {
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Registro_rest`;

    console.log();

    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            const ch = data['gender'];
            $(ch).each(function (i, v) {
                $('#sexo').append('<option  value="' + v.id + '">' + v.name + '</option>');
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

function get_state() {
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Registro_rest/get_state`;

    console.log();

    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data);
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



$(document).on('submit', '#form_documentos', function () {
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Registro_rest/insert_datos_student`;

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




