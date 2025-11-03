$(document).on('submit', '#form-bancarios', function() {
    //document.getElementById("Bancarios").click();

    //Obtenemos datos formulario.
    //var form = $("#form-personales");
    var formData = new FormData($(this)[0]);
    //document.getElementById("d_bancarios").click();
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Datos_propietario/datos_banco`;

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

                //$('#d_bancarios').attr('disabled', true);
                document.getElementById("d_fiscales").click();

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



/*  principal get_bancarios */

$('#d_bancarios').on('click', function() {
    $('#loader').toggle();
    get_bancarios();

});

function get_bancarios() {
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Datos_propietario/get_bancario`;

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            $('#loader').toggle();
            if (res.length > 0) {
                $('#id_usuarioban').val(res[0].id_user);
                $('#nombre_bancario').val(res[0].full_name);
                $('#name_bank').val(res[0].bank_name);
                $('#clabe').val(res[0].interbank_number);
            }
        }
    });


}