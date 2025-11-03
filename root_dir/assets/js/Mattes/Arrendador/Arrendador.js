/****************************************
 *      MAPA DE GOOGLE MAPS
 ***************************************/


$('.id_propiedad').val(id_propiedad);



$(document).ready(function() {
    flag_university = true;
    initMap();
    initAutocomplete();
    //getCordenadas();
});

//Autocompletado

let autocomplete;
let address1Field;
let address2Field;
let postalField;

function initAutocomplete() {
    address1Field = document.querySelector("#direccion");
    console.log("esta es la direccion");
    console.log(address1Field);
    address2Field = document.querySelector("#address2");
    postalField = document.querySelector("#postcode");
    // Create the autocomplete object, restricting the search predictions to
    // addresses in the US and Canada.
    autocomplete = new google.maps.places.Autocomplete(address1Field, {
      componentRestrictions: { country: ["MX"] },
      fields: ["address_components", "geometry"],
      types: ["address"],
    });
    address1Field.focus();
    // When the user selects an address from the drop-down, populate the
    // address fields in the form.
    autocomplete.addListener("place_changed", fillInAddress); 
  }

  //respuesta de google con los campos del direccion
  function fillInAddress() {
    // Get the place details from the autocomplete object.
    const place = autocomplete.getPlace();
    let address1 = "";
    let postcode = "";
  
    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    // place.address_components are google.maps.GeocoderAddressComponent objects
    // which are documented at http://goo.gle/3l5i5Mr
    for (const component of place.address_components) {
      // @ts-ignore remove once typings fixed
      const componentType = component.types[0];

      switch (componentType) {
        case "street_number": {
          address1 = `${component.long_name} ${address1}`;

          console.log(address1);
          break;
        }
  
        case "route": {
          address1 += component.short_name;
          break;
        }
  
      /*   case "postal_code": {
          postcode = `${component.long_name}${postcode}`;
          break;
        }
  
        case "postal_code_suffix": {
          postcode = `${postcode}-${component.long_name}`;
          break;
        }  */
       /*  case "locality":
          document.querySelector("#locality").value = component.long_name;
          break; */
       /*  case "administrative_area_level_1": {
          document.querySelector("#state").value = component.short_name;
          break;
        }
        case "country":
          document.querySelector("#country").value = component.long_name;
          break;  */
      } 
    }

    //address1Field.value = address1;
    console.log("direccion");
    console.log(address1);



    //postalField.value = postcode;
    // After filling the form with address components from the Autocomplete
    // prediction, set cursor focus on the second address line to encourage
    // entry of subpremise information such as apartment, unit, or floor number.
    //address2Field.focus();
    getCordenadas();
}

window.initAutocomplete = initAutocomplete;
  
  
//inicio del mapa
function initMap(lat, lng, uni_lat, uni_long, flag) {

    var marker;
    let map;

    if (lat == null && lng == null) {
        var myLatLng = {
            lat: 19.398894572801836,
            lng: -99.15639584258695
        };

    } else {
        var myLatLng = {
            lat: lat,
            lng: lng
        };

    }

    map = new google.maps.Map(document.getElementById("map"), {
        center: myLatLng,
        zoom: 10,
    });

    const input = document.getElementById("direccion");

    marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        draggable: true,
        title: "Ubicacion",
        icon: BASE_URL+"assets/icons/marker.png"
    });



    google.maps.event.addListener(marker, "dragend", function(event) {
        latitud_u = event.latLng.lat();
        longitud_u = event.latLng.lng();
        getReverseGeocodingData(latitud_u, longitud_u);

    });

    function getReverseGeocodingData(lat, lng) {
        var latlng = new google.maps.LatLng(lat, lng);
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'latLng': latlng
        }, (results, status) => {
            if (status !== google.maps.GeocoderStatus.OK) {
                alert(status);
            }
            // This is checking to see if the Geoeode Status is OK before proceeding
            if (status == google.maps.GeocoderStatus.OK) {
                console.log("resultados");
                console.log(results);
                address = results[0].formatted_address;
                $('#direccion_dos').val(address);
                $('#casalat').val(lat);
                $('#casalong').val(lng);
                // inicio = $('#autocomplete').val()
            }
        });
    }


    if (uni_lat && uni_long) {
        var cordenadas = {
            lat: parseFloat(uni_lat),
            lng: parseFloat(uni_long)
        };

        var universidad = new google.maps.Marker({
            position: cordenadas,
            map,
            title: "Universidad",
            icon: BASE_URL+"/assets/icons/ubicacion.png",
        });

        var distanceInMeters = google.maps.geometry.spherical.computeDistanceBetween(
            marker.getPosition(),
            universidad.getPosition()
        );

        let metros = Math.trunc(distanceInMeters);
        $('#distancia').val(metros);


        console.log("Distancia en metros:", distanceInMeters);
        console.log("Distancia en kilómetros:", (distanceInMeters * 0.001));
        console.log("ditanacia metros redondeado:", Math.trunc(distanceInMeters));
        console.log("ditanacia kilometros redondeado:", Math.trunc(distanceInMeters * 0.001));

        const flightPlanCoordinates = [
            myLatLng,
            cordenadas,

        ];
        const flightPath = new google.maps.Polyline({
            path: flightPlanCoordinates,
            geodesic: true,
            strokeColor: "#0661e4 ",
            strokeOpacity: 1.0,
            strokeWeight: 5,
        });

        if(flag){
            $('#loader').toggle(); 
        }

        flightPath.setMap(map);
    }
}

//calcular distancia entre el propiedad y la escuela

function caltularDistance() {
    $('#loader').toggle();

    if (typeof uni_lat === 'undefined') {
        $('#loader').toggle();
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

    }


    if (typeof latitud_u === 'undefined') {
       $('#loader').toggle();
        Toastify({
            text: "BUSCA TU UBICACIÓN EN EL MAPA",
            duration: 3000,
            className: "info",
            avatar: BASE_URL+"/assets/icons/advertencia.png",
            style: {
                background: "linear-gradient(to right,#f57306 , #f3da08)",
            },
            offset: {
                x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
            },

        }).showToast();

    }

    if(typeof latitud_u === 'undefined' && typeof uni_lat === 'undefined'){
        console.log("estoy aqui");
        $('#loader').toggle();
    }
    console.log("lat:" +uni_lat)
   initMap(latitud_u, longitud_u, uni_lat, uni_long, true);
}

function getCordenadas(){
    $('#loader').toggle();
    console.log("cordendas");
    if ($("#direccion").val().length < 1) {
        Toastify({
            text: "La direccion es obligatoria",
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
        $("#direccion").focus();
        $('#loader').toggle();
        return false;
    } else {
        //$('#loader').toggle();
        var url_str = `${BASE_URL}Mattes/Api/Mapa/data_mapa`;
        var loginForm = $("#propiedad_ubicacion").serializeArray();
        var loginFormObject = {};
        $.each(loginForm,
            function(i, v) {
                loginFormObject[v.name] = v.value;
            }
        );
        // send ajax
        $.ajax({
            url: url_str, // url where to submit the request
            type: "POST", // type of action POST || GET
            dataType: 'JSON', // data type
            data: JSON.stringify(loginFormObject), // post data || get data
            success: function(result) {
                $('#direccion_dos').val(result.formattedAddress);
                inicio = $('#direccion').val();
                latitud_u = result.latitude;
                longitud_u = result.longitude;
                $('#casalat').val(latitud_u);
                $('#casalong').val(longitud_u);
                if(typeof uni_lat === 'undefined'){
                    uni_lat =  null;
                    uni_long = null;
                }
                
                initMap(latitud_u, longitud_u,uni_lat, uni_long);
                $('#loader').toggle();
                
            },
            error: function(xhr, text_status) {
                $('#loader').toggle();
                $('#error').text(' HA OCURRIDO UN ERROR INESPERADO');
            }
        })
    }
}



//CP//

$(document).ready(function() {
    $("#cp_search").keyup(function() {
        var search2 = document.getElementById("cp_search").value;
        let searchresult2 = document.getElementById("searchResult");
        var url_str = `${BASE_URL}/Mattes/Api/General/Cp`;
        var cp = {
            "search": search2,
            "limit": "12",
            "offset": "0"

        };
        if (search2 != "") {
            let colonia;
            let alcaldia;
            let estado;
            let id;
            let info;

            $.ajax({
                url: url_str,
                type: 'POST',
                dataType: 'json',
                data: JSON.stringify(cp),
                success: function(response) {
                    info = response.data;
                    var len = info.length;
                    $("#cpResult").empty();
                    for (var i = 0; i < len; i++) {
                        id = info[i].ID;
                        var cp = info[i].CP;
                        colonia = info[i].ASENTAMIENTO;
                        alcaldia = info[i].MUNICIPIO;
                        estado = info[i].ESTADO;
                        allinfo = info[i];
                        $("#cpResult").append("<li value='" + id + "'>" + cp + " " + colonia + "</li>");
                    }

                    // binding click event to li
                    $("#cpResult li").bind("click", function() {
                        var value = $(this).text();
                        var id2 = this.value
                        $("#cp_search").val(value);
                        console.log(info);
                        console.log(id2)
                        $("#cpResult").empty();
                        var len = info.length;
                        for (var i = 0; i < len; i++) {
                            if (info[i].ID == id2) {
                                $("#colonia").val(info[i].ASENTAMIENTO);
                                $("#delegacion").val(info[i].MUNICIPIO);
                                $("#estado").val(info[i].ESTADO);
                                $('#cp_id').val(info[i].ID);
                                console.log(info[i])
                            }
                        }
                    });
                }
            });
        }
    });
});




$(document).on('submit', '#propiedad_ubicacion', function() {
    let distance = $('#distancia').val();

    if (distance) {
        const formData = new FormData($(this)[0]);
        const url = `${BASE_URL}Mattes/Api/Arrendador_api/Propiedad_ubicacion/creat`;

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(data) {
                if (data.status == 200) {
                    console.log(data);
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

                    $('#id').val(data.id);
                    document.getElementById("servicios").submit();

                    //location.href = BASE_URL + "Mattes/Arrendador/Propiedad_ubicacion";
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

    } else {
        Toastify({
            text: "RELLENA TODOS LOS DATOS",
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

    }


    return false;
});