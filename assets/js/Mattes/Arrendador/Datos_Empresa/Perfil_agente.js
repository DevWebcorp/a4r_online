//FILE DRAG AND DROOP

$(document).on('change', '#file_user-img', function() {

    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop();
    var archivo = document.getElementById("file_user-img").files[0];

    if (ext == "jpeg" || "png" || "jpg") {
        if (filesCount === 1) {
            var reader = new FileReader();
            reader.readAsDataURL(archivo);
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
            reader.onloadend = function() {
                document.getElementById("img-user").src = reader.result;
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

//REDIRECCION

$(".continuar-momento").on("click", function() {
    location.href = BASE_URL + "home-propietario";
});

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

//formulario
$('#form-perfilagent').submit(function() {
   
    $('#loader').toggle();
    var formData = new FormData($(this)[0]);

    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Datos_empresa/perfil_agente`;

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
                    //document.getElementById('form-perfilagent').reset();
                    location.href = BASE_URL + "Agentes";
                    document.getElementById("agentes").click();
                    $('#file-msg').text("Arrastra el archivo aqui");
                    document.getElementById("img-user").src = BASE_URL + "assets/img/default.png";
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

}); //Fin document. */


$(document).on("click", "#agentes", function() {
    reloadData();
});

function reloadData() {
    $('#loader').toggle();
    dataTable.ajax.reload();
    $('#loader').toggle();
}

$(document).on("click", "#process", function() {

    Toastify({
        text: "TUS DATOS DEBEN SER REVISADOS PARA VERIFICAR TU CUENTA Y PUEDAS SUBIR TUS PROPIEDADES",
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

    setTimeout(function(){
        location.href = BASE_URL+"home-propietario";
    },3000)

  

   
   
});