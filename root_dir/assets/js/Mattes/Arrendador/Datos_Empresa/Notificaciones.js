$('#form_notificaciones').submit(function() {
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
                    duration: 7000,
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

                document.getElementById("agentes").click();
                //setTimeout(,  9000);
                //location.href = BASE_URL + "Mattes/Arrendador/Index"

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


$('#notificaciones').on('click', function() {
    $('#loader').toggle();
    get_notificaciones();
});

function get_notificaciones() {
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Datos_empresa/get_notificaciones`;
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            console.log(res);
            $('#loader').toggle();
            if (res.length > 0) {
                $('#id_usuarionot').val(res[0].id_user);
                res[0].email === "1" ? $("#notis-correo").prop("checked", true) : $("#notis-correo").prop("checked", false);
                res[0].appointment === "1" ? $("#nueva-cita").prop("checked", true) : $("#nueva-cita").prop("checked", false);
                res[0].notices === "1" ? $("#avisos").prop("checked", true) : $("#avisos").prop("checked", false);
                res[0].message === "1" ? $("#mensajes").prop("checked", true) : $("#mensajes").prop("checked", false);
                res[0].promotions === "1" ? $("#promos").prop("checked", true) : $("#promos").prop("checked", false);
            }
        }
    });


}


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


//attr("disabled", true)