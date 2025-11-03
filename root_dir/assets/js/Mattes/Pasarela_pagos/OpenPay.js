$(document).ready(function () {
    OpenPay.setId('mzsshclu696xpm7n8qm9');
    OpenPay.setApiKey('pk_d3a48ffe273343e491ec1877a9120dc9');
    OpenPay.setSandboxMode(true);
    //Se genera el id de dispositivo
    var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");

    $("#mount-openpay").val(monto);
    $("#idpro-openpay").val(idpro);

    $('#pay-button').on('click', function (event) {
        event.preventDefault();
        $("#pay-button").prop("disabled", true);
        OpenPay.token.extractFormAndCreate('payment-form', sucess_callbak, error_callbak);
    });

    var sucess_callbak = function (response) {
        var token_id = response.data.id;
        $('#token_id').val(token_id);
        //console.log(token_id);
        $('#payment-form').submit();

    };

    var error_callbak = function (response) {
        var desc = response.data.description != undefined ? response.data.description : response.message;
        alert("ERROR [" + response.status + "] " + desc);
        $("#pay-button").prop("disabled", false);
    };

}); 


$(document).on('submit', '#payment-form', function() {
    $('#modaldemo3').modal('toggle');
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}/Mattes/Api/Arrendatario_api/Pagos/payOpenpay`;
    let disponibilidad = $("#disponibilidad").val(); 
    formData.append("fecha_entrada",disponibilidad)
    $('#loader').toggle();

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

                $('#loader').toggle();

                window.setTimeout( function(){
                    window.location = `${BASE_URL}/rentadas`
                }, 5000 );

                

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