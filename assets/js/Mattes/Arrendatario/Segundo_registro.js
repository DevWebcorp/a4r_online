get_state();

/* Carta de admision de la universidad o credencial vigente */
/* $(document).on('change', '#file-carta', function() {
    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop().toLowerCase();
    var archivo = document.getElementById("file-carta").files[0];

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

/* INE o pasaporte */
/* $(document).on('change', '#file-identificacion', function() {
    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop().toLowerCase();
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
 */
function get_state() {
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Registro_rest/get_state`;

    console.log();

    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            const ch = data['state'];
            $(ch).each(function(i, v) {
                $('#estado').append('<option  value="' + v.id + '">' + v.state + '</option>');
            })

        },
        error: function(error) {
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

$(document).on('submit', '#segundo-registro', function() {
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Registro_rest/insert_datos_student`;

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

                setTimeout(notificaciones(),3000);

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

/* function index_r() {
    location.href = BASE_URL + "Mattes/Arrendatario/Index";
} */

function notificaciones(){
    location.href = BASE_URL + "registro-notificaciones";
}