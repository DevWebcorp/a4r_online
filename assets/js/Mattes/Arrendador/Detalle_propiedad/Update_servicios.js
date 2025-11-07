$(document).on("click", "#servicios-tab", function() {
    get_servicios();
});

function get_servicios() {
    $('#loader').toggle();
    const url = BASE_URL + '/Mattes/Api/Arrendador_api/Detalle_propiedad/get_servicios';

    $.ajax({
        url: url,
        type: 'POST',
        data: { id: id_propiedad },
        dataType: 'json',
        success: function(res) {
            if (res.length > 0) {
                $('#num_roomies').val(res[0].n_roomies);
                $('#num_camas').val(res[0].n_beds);
                $('#num_banos').val(res[0].n_bathing);
                $('#tipo_bano').val(res[0].status_bath);
                $('#mascotas').val(res[0].petfrienly);
                $('#disponible_para').val(res[0].available);   
                res[0].disability === "1" ? $("#capacidades_diferentes").prop("checked", true) : $("#capacidades_diferentes").prop("checked", false);
                res[0].wifi === "1" ? $("#wifi").prop("checked", true) : $("#wifi").prop("checked", false);
                res[0].cleaning === "1" ? $("#limpieza").prop("checked", true) : $("#limpieza").prop("checked", false);
                res[0].parking === "1" ? $("#estacionamiento").prop("checked", true) : $("#estacionamiento").prop("checked", false);
                $('#num_cajones').val(res[0].n_drawers); 
                res[0].security === "1" ? $("#seguridad").prop("checked", true) : $("#seguridad").prop("checked", false);
                res[0].washer === "1" ? $("#lavadora").prop("checked", true) : $("#lavadora").prop("checked", false);
                res[0].kitchen_room === "1" ? $("#cocina").prop("checked", true) : $("#cocina").prop("checked", false);
                $('#id_servicios').val(res[0].id);
            }
            $('#loader').toggle();
        }
    });
}

$(document).on('submit', '#upd_servicios', function() {
    var formData = new FormData($(this)[0]);
    element = $("#id_propiedadser");
    if(element){
        console.log(element.val());
    }else {
        formData.append('id_propiedad', id_propiedad);
    }
    const url = BASE_URL + '/Mattes/Api/Arrendador_api/Detalle_propiedad/actualiza_servicios';

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

                elem_servicios = $('#id_servicios');
                if(data.id_group == 2 && elem_servicios){
                    element = $("#documentos-tab");
                    $('#id_servicios').val(data.id);
                    element.click();
                } else {
                    $('#id').val(data.id);
                    document.getElementById("servicio").submit(); 
                }

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

/* $(document).ready(function() {
    
});  */