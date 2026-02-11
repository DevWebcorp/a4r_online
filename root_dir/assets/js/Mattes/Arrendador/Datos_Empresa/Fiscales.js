$('#form_fiscales').submit(function() {
    
    //document.getElementById("Bancarios").click();

    //Obtenemos datos formulario.
    //var form = $("#form-personales");
    var formData = new FormData($(this)[0]);
    //document.getElementById("d_bancarios").click();
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Datos_empresa/datos_fiscales`;

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

                //$('#d_fiscales').attr('disabled', true);
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
}); //Fin document. */


$('#d_fiscales').on('click', function() {
    $('#loader').toggle();
    get_fiscales();

});

function get_fiscales() {
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Datos_empresa/get_fiscales`;

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            $('#loader').toggle();
            console.log(res);
            if (res.length > 0) {
                $('#id_usuariofis').val(res[0].id_user);
                $('#rfc').val(res[0].rfc);
                $('#direccion_fiscal').val(res[0].fiscal_address);
            }
            $('#omitir').children().remove();
            $('#omitir').append('<button class="btn btn-teal mr-sm-2 mb-2 mb-sm-0" id="omitir" name="continuar-notis-inmob">Omitir</button>');
        }
    });
}

$('#omitir').on('click', function() {
    document.getElementById("notificaciones").click();
});