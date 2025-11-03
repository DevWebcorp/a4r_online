$(document).ready(function() {
    $("#valor").hide();
    let propiedad = name_property.replace('-', ' ');
    $(".titulo-prop").append(propiedad);
    $("#estrellas").starrr({
        change: function(e, value){
          $("#valor").val(value);
        }
    });
    $("#propiedad").val(id_propiedad);
   
});
    
$(document).on('submit', '#form-comment', function(e) {
    e.preventDefault();
    let valor = $("#valor").val();
    if(valor == ""){
        Toastify({
            text: "DEBES ASIGNAR UNA CALIFICACIÓN",
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
        //document.getElementById("send-comment").disabled = true;
        var formData = new FormData($(this)[0]);
        const url_chat = `${BASE_URL}Mattes/Api/Arrendatario_api/Rentadas_rest/calificar`

        //AJAX.
        $.ajax({
            url: url_chat,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(data) {
                //console.log(data);
                document.getElementById("comment").value = "";
                document.getElementById("valor").value = "";

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
                    location.href = BASE_URL + "rentadas";



                } else {
                    Toastify({
                        ext: data.messages.success,
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
                    document.getElementById("send-comment").disabled = false;
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });

        return false; 
    }
    
});