get_genero();

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



function registro2() {
    location.href = BASE_URL + "registro-documentos";
}


// $(document).ready(function () {
//     var input = $("#phone")[0];
//     window.intlTelInput(input, {
//         utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
//     });
// });


$(document).ready(function () {
    var input = $("#phone")[0];
    var iti = window.intlTelInput(input, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    // Agregar el prefijo automáticamente cuando se cambia el país
    input.addEventListener("countrychange", function () {
        var countryData = iti.getSelectedCountryData();
        var dialCode = "+" + countryData.dialCode;
        $("#phone").val(dialCode + " ");
    });

    // Validar el número de teléfono al cambiar el país o al ingresar un número
    $("#phone").on("input", function () {
        var currentNumber = iti.getNumber(intlTelInputUtils.numberFormat.E164);
    });

    $(document).on('submit', '#registro', function () {
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
            var formData = new FormData($(this)[0]);
            var phoneNumber = $("#phone").val();
            var parts = phoneNumber.split(" ");

            if (parts.length === 2) {
                var prefix = parts[0];
                var number = parts[1];
                formData.append('num_cel', number)
                formData.append('prefix', prefix)
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
                            setTimeout(registro2(), 3000);
                            //$('#defaultOpen').attr('disabled', true);
                            //document.getElementById("d_bancarios").click();

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
        }
        return false;
    });
});





