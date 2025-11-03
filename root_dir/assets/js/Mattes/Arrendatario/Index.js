if(uni == ""){
    $("#autoComplete").val();
    $("#univ").val();
    $("#latitud").val();
    $("#longitud").val();
} else {
    $("#autoComplete").val(uni);
    $("#univ").val(id_uni);
    $("#latitud").val(latitude);
    $("#longitud").val(longitude);
    
    $(document).ready(function() {
        $("#form-busqueda").submit();
    });
   
}

$(".starrr").starrr({
    rating: 3,
    readOnly: true
});


/*$('.panel-collapse').on('show.bs.collapse', function() {
    //alert("Aqui")
    $(this).siblings('.panel-heading').addClass('active');
});

$('.panel-collapse').on('hide.bs.collapse', function() {
    $(this).siblings('.panel-heading').removeClass('active');
});*/

precios();

function precios() {
    precio_minimo = parseFloat($('#min').val());
    precio_maximo = parseFloat($('#max').val());
}




select_alojamiento();

function select_alojamiento() {
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Detalle_propiedad`;
    var alojamiento = $("#tipo-alojamiento");
    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            //const ch = data['data'];
            alojamiento.append(`<option  value="">Selecciona alojamiento</option>`);
            $(data).each(function(i, v) {
                alojamiento.append(`<option  value="${v.id}"> ${v.name}</option>`);
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

$(document).on('submit', '#form-busqueda', function() {
    $('#loader').toggle();
   
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Index`;

    min_price = parseFloat($('#min').val());
    max_price = parseFloat($('#max').val());

    if(max_price == min_price){
        max_price = max_price + 1;
        precio_minimo = min_price - 1;
    }
    //console.log(precio_maximo +" y " + precio_minimo );
    if (max_price < precio_minimo) {
        Toastify({
            text: "El precio máximo no puede ser menor al mínimo",
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
        
    } else if (min_price > precio_maximo) {
        Toastify({
            text: "El precio mínimo no puede ser mayor al máximo",
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
    } else {
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(data) {
                console.log("Data");
                console.log(data);
                latitud = parseFloat($("#latitud").val());
                longitud = parseFloat($("#longitud").val());
                kilometros = parseInt($("#kilometros").val());
                initMap(latitud, longitud, kilometros, data);

              
                //event.preventDefault();
            },
            cache: false,
            contentType: false,
            processData: false
        });
        //event.preventDefault();
    }
    return false;
});


initMap();

function initMap(lat, lng, kilometros, data) {
    var marker;
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

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: myLatLng,
        mapTypeId: "terrain",
    });


    if (data != null) {
        console.log(data)
        marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            draggable: false,
            icon: BASE_URL + "/assets/icons/ubicacion.png",
            size: new google.maps.Size(10, 10),
            //title: data[0].name

        });
        marker.addListener("click", toggleBounce);

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }

        const cityCircle = new google.maps.Circle({
            strokeColor: "#0088F7",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#0088F7",
            fillOpacity: 0.35,
            map,
            center: myLatLng,
            radius: kilometros,
        });



        var container = $('.grid');
        $(container).children().remove();

        $(data).each(function(i, v) {
            let nombrencode = v.name.replaceAll(' ', '-');
            console.log(parseFloat(v.latitud));
            var pocision = {
                lat: parseFloat(v.latitud),
                lng: parseFloat(v.longitud)
            };

            //  console.log(pocision);

            let radio = check(pocision, myLatLng, kilometros);
            if (radio) {
                const path = `${BASE_URL}/writable/uploads/Mattes/Arrendador`;
                const marker2 = new google.maps.Marker({
                    position: pocision,
                    map: map,
                    draggable: false,
                    //icon: "http://localhost/mattes/assets/icons/marker.png",
                    icon: BASE_URL + "/assets/icons/marker.png",
                    size: new google.maps.Size(10, 10),
                    title: v.name

                });

                //console.log(path);
                //marker2.addListener("click", toggleBounce);


                function toggleBounce() {
                    if (marker2.getAnimation() !== null) {
                        marker2.setAnimation(null);
                    } else {
                        marker2.setAnimation(google.maps.Animation.BOUNCE);
                        setTimeout(function() {
                            marker2.setAnimation(null);
                        }, 2000);
                    }
                }



                distancia = parseInt(v.distancia);
                km = distancia / 1000;
                console.log(km);

                let info =

                    `<table>
                       <tr>
                           <td>
                                <img id="img-1" class="img-fluid mt-1 mb-3" style="width:200px; height: 150px;" src="${path}/${v.imagen}" alt="First slide">                           
                            
                                <p class="info-casa text-uppercase" style="color: #0088F7; margin-left:6px; line-height: 17px !important;">${v.name}</p>
                                <p class="info-casa" style="line-height: 17px; margin-left:6px;">Distancia <i class="fa fa-road" aria-hidden="true"></i> <span>${km}<span> km</p>
                                <p class="info-casa" style="margin-left: 6px;">Costo: <span>$ ${v.precio}</span></p>
                                <a href="${BASE_URL}detalle-propiedad/${nombrencode}" target="_blank">
                                <button class="btn-mattes px-4 py-1 mb-2"> Detalles</button></a>
                            </td>
                       </tr>
                   </table>                  
                   `;

                const infowindow = new google.maps.InfoWindow({
                    content: info
                });

                marker2.addListener("click", () => {
                    toggleBounce(),
                        infowindow.open({
                            title: v.name,
                            anchor: marker2,
                            map,
                            shouldFocus: false
                        });
                });



                var precio = v.precio == null ? " -- " : v.precio;
                var sello = v.stamp_mattes == "1" ? `<img style="height: 90px !important;width: 89px !important;right: 0px !important;" id = "${v.stamp_mattes}" class = "sello-mattes" src = "${BASE_URL}assets/img/Iconos/best_mattes.png">` : `<div id = "${v.stamp_mattes}" class = "sello-mattes"></div>`;
                var verifica = v.verified == "1" ? `<img class = "verifica-propiedad" src = "${BASE_URL}assets/img/Iconos/Medalla.png">` : `<div class = "verifica-propiedad"></div>`;
                var posiciona = v.positioning == "1" ? `<img class = "posiciona-propiedad" src = "${BASE_URL}assets/img/Iconos_Mattes/Iconos/Mattes_Posiciona tu popiedad.png">` : `<div class = "posiciona-propiedad"></div>`;

                let mayusname = v.name.toUpperCase();

                // console.log(nombrencode);

                let html = `<a  href="${BASE_URL}detalle-propiedad/${nombrencode}" target="_blank">
                                <div class="grid-item" data-img="${v.imagen}">
                                      <figure>
                                         <img id="img-1" class=" w-100" src="${path}/${v.imagen}" alt="First slide">
                                     </figure>
                                     <p id="${v.name}" class="info-casa my-0 text-center" style="margin-left: 0px !important; line-height: 17px !important; ">${mayusname}</p>
                                     <div id="iconos${i}" class = "iconos"></div>
                                     <div id="estrellas${i}" class="starrr  text-center"> </div>
                                     <p class="info-casa  mt-2">Distancia <i class="fa fa-road" aria-hidden="true"></i><span>&nbsp${km} KM</span></p>
                                     <p class="info-casa">Costo: <span>$ ${precio} MXN</span></p>
                                </div>
                            </a>`;



                $(".grid").append(html);
                $("#iconos" + i).append(sello);
                $("#iconos" + i).append(verifica);
                $("#iconos" + i).append(posiciona);
                sello = "";

                $("#estrellas" + i).starrr({
                    rating: v.estrellas,
                    readOnly: true,

                });


                tippy('.grid-item', {
                    //content: 'My tooltip!',
                    placement: 'top-start',
                    content: template.innerHTML,
                    allowHTML: true,
                    animation: 'rotate',
                    inertia: true,
                });

                /*   $('.grid-item').mouseenter(function () {
                      imagen = $(this).data('img');
                      // alert(imagen);

                  }); */

            } else {
                console.log("fuera de rango");
            }

        });

        var grid = document.querySelector('.grid');
        imagesLoaded(grid, function() {
            // init Isotope after all images have loaded
            var $msnry = new Masonry(grid, {
                // options
                columnWidth: '.grid-sizer',
                itemSelector: '.grid-item',
                columnWidth: 20,
                gutter: 9,
                isFitWidth: true,
                originLeft: false
            });

        });

        function getPenPath() {
            console.log("wiii");
            const nextPenSlugs = [
                '3d9a3b8092ebcf9bc4a72672b81df1ac',
                '2cde50c59ea73c47aec5bd26343ce287',
                'd83110c5f71ea23ba5800b6b1a4a95c4',
            ];

            let slug = nextPenSlugs[this.loadCount];
            if (slug) return `/desandro/debug/${slug}`;
        }

        let infScroll = new InfiniteScroll(grid, {
            // options
            path: getPenPath,
            append: '.grid-item',
            outlayer: false,
            scrollThreshold: true,
            Threshold: 8,
            status: '.infinite-scroll-last'
        });

        $('#loader').toggle();

    } else {
        /* Toastify({
            text: "No se encontro la busqueda",
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
        }).showToast(); */
    }

}

function check(marker, circle, radius) {
    var km = radius / 1000;
    var kx = Math.cos(Math.PI * circle.lat / 180) * 111;
    var dx = Math.abs(circle.lng - marker.lng) * kx;
    var dy = Math.abs(circle.lat - marker.lat) * 111;
    var tkm = Math.sqrt(dx * dx + dy * dy);
    return Math.sqrt(dx * dx + dy * dy) <= km;
}

$(document).keyup(function (event) {
    if (event.key == "Enter") {
        $('#loader').toggle();
        $("#form-busqueda").submit();
        $('#loader').toggle();

    }
});

/* function getPenPath() {
    console.log("wiii");
    const nextPenSlugs = [
        '3d9a3b8092ebcf9bc4a72672b81df1ac',
        '2cde50c59ea73c47aec5bd26343ce287',
        'd83110c5f71ea23ba5800b6b1a4a95c4',
    ];

    let slug = nextPenSlugs[this.loadCount];
    if (slug) return `/desandro/debug/${slug}`;
}

$('.grid').infiniteScroll({
      path: getPenPath,
      append: '.grid-item',
      outlayer: false,
      scrollThreshold: true,
      Threshold: 8,
      status: '.infinite-scroll-last'
  }); 
 */



//window.initMap = initM;






