
$(document).on("click", "#localizacion-tab", function () {
    flag_university = true;
    get_localizacion();
    
});

$(document).on('change', '#precio_propiedad', function (){
    let precio = $(this).val();
    let new_precio = currency(precio, {symbol: "", separator: ","}).format();
    console.log(new_precio);
    $('#precio_propiedad').val(new_precio);
});

function get_localizacion() {
    $('#loader').toggle();
    const url = BASE_URL + 'Mattes/Api/Arrendador_api/Detalle_propiedad/get_localizacion';

    $.ajax({
        url: url,
        type: 'POST',
        data: { id: id_propiedad },
        dataType: 'json',
        success: function (res) {
            console.log("Localizacion");
            console.log(res);

            if (res.length > 0) {
                //pocision de casa
                latitud_casa = parseFloat(res[0].latitude);
                longitud_casa = parseFloat(res[0].longitude);
                //pocision de iniversidad
                uni_lat = parseFloat(res[0].unilat);
                uni_long = parseFloat(res[0].unilong);
                $('#latitud').val(uni_lat);
                $('#longitud').val(uni_long);
                $('#lat').val(latitud_casa);
                $('#lon').val(longitud_casa);
                $('#precio_propiedad').val(currency(res[0].price, {symbol: "", separator: ","}).format());
                $('#h_propiedad').val(res[0].inhabit);
                $('#cp_search').val(res[0].CP);
                $('#cp_id').val(res[0].id_cp);
                $('#direccion').val(res[0].addrees);
                $('#direccion_dos').val(res[0].address2);
                $('#delegacion').val(res[0].MUNICIPIO);
                $('#estado').val(res[0].ESTADO);
                $('#colonia').val(res[0].ASENTAMIENTO);
                $('#autoComplete').val(res[0].name);
                $('#id_univ').val(res[0].id_university);
                $('#distancia').val(res[0].km);
                $('#tipo_distancia').val(res[0].type_distance);
                $('#id_ubicacion').val(res[0].id);
                initMap(latitud_casa, longitud_casa, uni_lat, uni_long);
                
            }
            
            $('#loader').toggle();
        }
    });
}

$(document).on('submit', '#upd_ubicacion', function () {
    direccion = $("#direccion_dos").val();
    id_uni = $("#id_univ").val();
    distancia = $("#distancia").val();

    console.log(direccion);

    if (direccion == "") {
        Toastify({
            text: "BUSCA UBICACIÓN EN EL MAPA",
            duration: 3000,
            className: "info",
            avatar: BASE_URL+"/assets/icons/advertencia.png",
            style: {
                background: "linear-gradient(to right, #f57306 , #f3da08)",
            },
            offset: {
                x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
            },

        }).showToast();

    } else if (id_uni == "") {
        Toastify({
            text: "BUSCA UNIVERSIDAD",
            duration: 3000,
            className: "info",
            avatar: BASE_URL+"/assets/icons/advertencia.png",
            style: {
                background: "linear-gradient(to right, #f57306 , #f3da08)",
            },
            offset: {
                x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
            },

        }).showToast();

    } else if (distancia.trim().length === 0) {
        Toastify({
            text: "CALCULA LA DISTANCIA ",
            duration: 3000,
            className: "info",
            avatar: BASE_URL+"/assets/icons/advertencia.png",
            style: {
                background: "linear-gradient(to right, #f57306 , #f3da08)",
            },
            offset: {
                x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
            },

        }).showToast();


    } else {
        var formData = new FormData($(this)[0]);
        element = $("#id_propiedadubi");
        if(!element){
            formData.append('id_propiedad', id_propiedad);
        }
        
        const url = BASE_URL + '/Mattes/Api/Arrendador_api/Detalle_propiedad/actualiza_localizacion';

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

                    elem_ubicacion = $('#id_ubicacion');
                    if(data.id_group == 2 && elem_ubicacion){
                        element = $("#servicios-tab");
                        $('#id_ubicacion').val(data.id);
                        element.click();
                    } else {
                        $('#id').val(data.id);
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

    }

    return false;
});


$("#direccion").keyup(function () {
    $("#direccion_dos").val("");
    $("#distancia").val("");
});

$('#autoComplete').keyup(function () {
    $("#distancia").val("");
    $("#id_univ").val("");

});

