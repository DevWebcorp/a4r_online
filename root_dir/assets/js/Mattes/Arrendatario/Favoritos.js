get_propiedades();


function get_propiedades() {
    $('#loader').toggle();
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Favoritos_rest`;
    //console.log(url);

    $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        success: function(result) {
            console.log("este es el resultado");
            console.log(result);

            const path = `${BASE_URL}writable/uploads/Mattes/Arrendador`;
            $(result).each(function(i, v) {

                var precio = v.price == null ? " -- " : v.price;

                /* var disability = v.disability == "1" ? `<img id = "${v.disability}" class = "icon" src = "/../mattes/assets/img/Iconos_Mattes/Iconos/Mattes_Capacidades diferentes.png">` : `<i id = "${v.disability}" class = "icon-vacio"></i>`;
                var wifi = v.wifi == "1" ? `<img class = "icon" src = "/../mattes/assets/img/Iconos_Mattes/Iconos/Mattes_Wifi.png">` : `<i class="icon-vacio"></i>`;
                var limpieza = v.cleaning == "1" ? `<img class = "icon" src = "/../mattes/assets/img/Iconos_Mattes/Iconos/Mattes_Limpieza.png">` : `<i class="icon-vacio"></i>`;
                var estacionamiento = v.parking == "1" ? `<img class = "icon" src = "/../mattes/assets/img/Iconos_Mattes/Iconos/Mattes_Estacionamiento.png">` : `<i class="icon-vacio"></i>` ;
                var seguridad = v.security == "1" ? `<img class = "icon" src = "/../mattes/assets/img/Iconos_Mattes/Iconos/Mattes_Seguridad.png">` : `<i class="icon-vacio"></i>`; 
                var lavadora = v.washer == "1" ? `<img class = "icon" src = "/../mattes/assets/img/Iconos_Mattes/Iconos/Mattes_Lavadora.png">` : `<i class="icon-vacio"></i>` ;
                var cocina = v.kitchen_room == "1" ? `<img class = "icon" src = "/../mattes/assets/img/Iconos_Mattes/Iconos/Mattes_Cocina.png">` : `<i class="icon-vacio"></i>`; */
                var sello = v.stamp_mattes == "1" ? `<img class = "sello-mattes" src = "/../mattes/assets/img/Iconos/Certificacion.png">` : `<div class = "sello-mattes"></div>`;
                var verifica = v.verified == "1" ? `<img class = "verifica-propiedad" src = "/../mattes/assets/img/Iconos/Medalla.png">` : `<div class = "verifica-propiedad"></div>`;

                // var posiciona = v.positioning == "1" ? `<img class = "posiciona-propiedad" src = "/../mattes/assets/img/Iconos/Medalla.png">` : `<div class = "posiciona-propiedad"></div>`;
                let nombrencode = v.name.replace(' ', '-');
                var posiciona = v.positioning == "1" ? `<img class = "posiciona-propiedad" src = "/../mattes/assets/img/Iconos_Mattes/Iconos/Mattes_Posiciona tu popiedad.png">` : `<div class = "posiciona-propiedad"></div>`;


                if (v.km >= 1000) {
                    distancia = v.km / 1000 + "km";
                } else {
                    distancia = v.km + "m";
                }


                let html = `<a  href="${BASE_URL}detalle-propiedad/${nombrencode}" target="_blank">
                    
                                        <div id="${v.id_property}" class="grid-item">
                                        <figure>
                                            <img id="img-1" class=" w-100" src="${path}/${v.imagen}" alt="First slide">
                                        </figure>
                                </a> 
                                <p class="info-casa text-uppercase mt-2"> ${v.name}<i id="${v.id_property}" class="heart-fav fa fa-heart" aria-hidden="true"></i></p>
                                <p class="info-casa">Precio: <span>$${precio}</span></p>
                                <p class="info-casa">Distancia <i class="fa fa-road" aria-hidden="true"></i>: <span>${distancia}</span></p>
                                
                                <div id="iconos-sellos${i}" class = "iconos"></div>
                                <div id="iconos${i}" class = "iconos-s"></div>`;




                $(".grid").append(html);
                $("#iconos-sellos" + i).append(sello);
                $("#iconos-sellos" + i).append(verifica);
                $("#iconos-sellos" + i).append(posiciona);
                sello = "";
            });
            var grid = document.querySelector('.grid');
            imagesLoaded(grid, function() {
                // init Isotope after all images have loaded
                var $msnry = new Masonry(grid, {
                    // options
                    columnWidth: 10,
                    itemSelector: '.grid-item',
                    columnWidth: 25,
                    gutter: 15,
                    isFitWidth: true,
                    originLeft: false
                });

                //-------------------------------------//
                // hack CodePen to load pens as pages

                function getPenPath() {
                    const nextPenSlugs = [
                        '3d9a3b8092ebcf9bc4a72672b81df1ac',
                        '2cde50c59ea73c47aec5bd26343ce287',
                        'd83110c5f71ea23ba5800b6b1a4a95c4',
                    ];

                    let slug = nextPenSlugs[this.loadCount];
                    if (slug) return `/desandro/debug/${slug}`;
                }

            });

            $('#loader').toggle();

            $(".heart-fav").on("click", function () {
                let propiedad = $(this).attr('id');
            
                let json = {
                    propiedad: propiedad
                };
        
                const url_favorites = `${BASE_URL}Mattes/Api/Arrendatario_api/Favoritos_rest/del_favorite`;
            
                $.ajax({
                    url: url_favorites,
                    type: "POST",
                    data: JSON.stringify(json),
                    dataType: 'json',
                    success: function (result) {
                        if (result.status == 200) {
                            Toastify({
                                text: result.messages.success,
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
                            location.reload();
            
                        } else {
                            Toastify({
                                ext: result.messages.success,
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
                    error: function (xhr, resp, text) {
                        console.log(xhr, resp, text);
                        $('#loader').toggle();
                        $('#error-alert').show();
                        $('#error').text(' HA OCURRIDO UN ERROR INESPERADO');
                    }
                });
            
            });


            /*   $(".grid-item").on("click", function() {

                  let id_propiedad = $(this).attr('id');
                  $('#id').val(id_propiedad);
                  
                  const url_detalle = `${BASE_URL}/Mattes/Arrendatario/Propiedad_detalle`;
                  detalles = document.getElementById("propiedad_id");
                  detalles.setAttribute("action", url_detalle);
                  document.getElementById("propiedad_id").submit();
                 

              }); */


        },
        error: function(xhr, resp, text) {
            //console.log(xhr, resp, text);
            $('#loader').toggle();
        }
    });
}

