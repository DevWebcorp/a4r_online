
get_propiedades();


function get_name() {
    $(".hola").children().remove();
    $('#loader').toggle();
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Propiedades_rest/get_name`;

    $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        success: function(result) {
            if(result != ""){
                var propietario = `<span>` + result[0]['name'] + `</span>`;
                $(".hola").append(propietario);
            }
            
            $('#loader').toggle();
        }, error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
            $('#loader').toggle();
        }
    });
}

function get_propiedades() {
    $('#loader').toggle();
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Propiedades_rest`;

    $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        success: function(result) {
            get_name();
            if(result.length > 0){
               
                let date = new Date();
                let hoy = date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0') + '-' + String(date.getDate()).padStart(2, '0');
    
                const path = `${BASE_URL}/writable/uploads/Mattes/Arrendador`;
                $(result).each(function(i, v) {
    
                    var precio = v.precio == null ? " -- " : v.precio;
                    //let casa_estatus = $('estatus_casa').attr('class');
                    //let casa_estatus = document.getElementsByClassName('estatus_casa');
                    if (v.date_start <= hoy) {
                        var status = "Disponible";                        
                        //casa_estatus.classList.add('disponible');
                        var background = "linear-gradient(to right, #00b09b, #96c93d)";
                    } else {
                        var status = "No Disponible";
                        //casa_estatus.classList.add('no-disponible');
                        var background = "linear-gradient(to right, #f90303, #fe5602)";
                    }
    
                    if (v.imagen == null) {
                        let html = 

                        `<div class="col-xs-4">
                            <div class="accomd-modations-room">
                                <div class="img">
                                    <a href="#"><img src="${path}/default_propiedad.png" alt=""></a>
                                </div>
                                <div class="text">
                                    <h2><a href="#" style="cursor: auto;">${v.name}</a></h2>
                                    <p class="price">
                                        <span class="amout">$${precio}</span>/days
                                    </p>
                                </div>
                            </div>
                        </div>`
                        
                        
                        $(".grid-template").append(html);
    
                    } else {
                        var sello = v.stamp_mattes == "1" ? `<img id = "${v.stamp_mattes}" class = "sello-mattes" src = "${BASE_URL}assets/img/Iconos/Certificacion.png">` : `<div id = "${v.stamp_mattes}" class = "sello-mattes"></div>`;
                        var verifica = v.verified == "1" ? `<img class = "verifica-propiedad" src = "${BASE_URL}assets/img/Iconos/Medalla.png">` : `<div class = "verifica-propiedad"></div>`;
                        var posiciona = v.positioning == "1" ? `<img class = "posiciona-propiedad" src = "${BASE_URL}assets/img/Iconos_Mattes/Iconos/Mattes_Posiciona tu popiedad.png">` : `<div class = "posiciona-propiedad"></div>`;
                        let html = `<div class="col-xs-4">
                            <div class="accomd-modations-room">
                                <div class="img">
                                    <a href="#"><img src="${path}/${v.imagen}" alt=""></a>
                                </div>
                                <div class="text">
                                    <h2><a href="#" style="cursor: auto;">${v.name}</a></h2>
                                    <p class="price">
                                        <span class="amout">$${precio}</span>/days
                                    </p>
                                </div>
                            </div>
                        </div>`

                        $(".grid-template").append(html);
                        $("#iconos" + i).append(sello);
                        $("#iconos" + i).append(verifica);
                        $("#iconos" + i).append(posiciona);
                        sello = "";
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
    
                 /*    $('.grid').infiniteScroll({
                        path: getPenPath,
                        append: '.grid-item',
                        outlayer: false,
                        scrollThreshold: true,
                        Threshold: 8,
                        status: '.infinite-scroll-last'
                    }); */
    
                });

                $('#loader').toggle();
    
    
    
                // EDITAR BTN LAPIZ
                $(".detalle-propiedad").on("click", function() {
                    //alert("OK");
                    let id_propiedad = $(this).attr('id');
                    $('#id').val(id_propiedad);
                    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Propiedades_rest/validacion`;
                    data = {
                        id_propiedad: id_propiedad
    
                    }
                    //console.log(data);
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: data,
                        success: function(result) {
                            val = result['validacion'];
                            switch (val) {
                                case 2:
                                    const url_detalle = `${BASE_URL}propiedad-ubicacion`;
                                    detalles = document.getElementById("propiedad_id");
                                    detalles.setAttribute("action", url_detalle);
                                    document.getElementById("propiedad_id").submit();
    
                                    break;
    
                                case 3:
                                    const url_servicios = `${BASE_URL}propiedad-servicios`;
                                    detalles = document.getElementById("propiedad_id");
                                    detalles.setAttribute("action", url_servicios);
                                    document.getElementById("propiedad_id").submit();
                                    break;
    
                                case 4:
                                    const url_files = `${BASE_URL}propiedad-documentos`;
                                    detalles = document.getElementById("propiedad_id");
                                    detalles.setAttribute("action", url_files);
                                    document.getElementById("propiedad_id").submit();
                                    break;
    
                                case 5:
                                    const url_up = `${BASE_URL}propiedad-datos`;
                                    detalles = document.getElementById("propiedad_id");
                                    detalles.setAttribute("action", url_up);
                                    document.getElementById("propiedad_id").submit();
                                    break;
                            }
    
                        }
                    });
                    
                    //document.getElementById("propiedad_id").submit();
                    //location.href = BASE_URL + "Mattes/Arrendador/DetallesPropiedad_update/";
                    //console.log(id_propiedad);
                });

                $(".eliminar-propiedad").on("click", function() {
                    $("#mensaje").text("");
                    let id_propiedad = $(this).attr('id');
                    $('#id_delete').val(id_propiedad);
                    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Propiedades_rest/readPropiedad`;

                    data = {
                        id_propiedad: id_propiedad
    
                    }

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: data,
                        success: function(result) {
                           //console.log();
                           let mensaje =  `${result[0]['name']}`
                           $("#mensaje").text(mensaje);
                        }
                    });
             
                });
                
            }else{
                $('#loader').toggle();
                $('#sn-propiedades').toggle();
                console.log("aqui va el vacio");
               // console.log("esta vacio")
                $(".grid").addClass('shadow-none p-3 mb-5 bg-light rounded text-center');
                $(".grid").append('<p>'+'NO HAY PROPIEDADES'+'</p>')
                

            }

        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
            $('#loader').toggle();
        }
    });
}

///////BUSCADOR /////
$(document).keyup(function(event) {
   // $('#loader').toggle();
    if ($("#buscar").is(":focus") && event.key == "Enter") {
        $('#loader').toggle();
        let valor = $('#buscar').val();

        let elemento = document.getElementsByClassName('estatus_casa');
        const url = `${BASE_URL}Mattes/Api/Arrendador_api/Propiedades_rest/busqueda`;
        $.ajax({
            type: "POST",
            url: url,
            data: { busqueda: valor },
            success: function(result) {
                
                if (result.length === 0) {
                    $('#loader').toggle();
                    Toastify({
                        text: "NO SE ENCONTRARON RESULTADOS",
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
                    $('#loader').toggle();
                    var container = $('.grid');
                    $(container).children().remove();
                    let date = new Date();
                    let hoy = date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0') + '-' + String(date.getDate()).padStart(2, '0');

                    const path = `${BASE_URL}writable/uploads/Mattes/Arrendador`;
                    $(result).each(function(i, v) {

                        var precio = v.precio == null ? " -- " : v.precio;
                        
                        if (v.date_start <= hoy) {
                            var status = "Disponible";
                            elemento.style.backgroundColor = '#4cae4c';
                        } else {
                            var status = "No Disponible";
                            elemento.style.backgroundColor = '#d43f3a';
                        }

                        if (v.imagen == null) {
                            let html = `<div class="col-xs-4">
                            <div class="accomd-modations-room">
                                <div class="img">
                                    <a href="#"><img src="${path}/default_propiedad.png" alt=""></a>
                                </div>
                                <div class="text">
                                    <h2><a href="#" style="cursor: auto;">${v.name}</a></h2>
                                    <p class="price">
                                        <span class="amout">$${precio}</span>/days
                                    </p>
                                </div>
                            </div>
                        </div>`;

                            $(".grid-template").append(html);

                        } else {
                            var sello = v.stamp_mattes == "1" ? `<img id = "${v.stamp_mattes}" class = "sello-mattes" src = "${BASE_URL}assets/img/Iconos/Certificacion.png">` : `<div id = "${v.stamp_mattes}" class = "sello-mattes"></div>`;
                            var verifica = v.verified == "1" ? `<img class = "verifica-propiedad" src = "${BASE_URL}assets/img/Iconos/Medalla.png">` : `<div class = "verifica-propiedad"></div>`;
                            var posiciona = v.positioning == "1" ? `<img class = "posiciona-propiedad" src = "${BASE_URL}assets/img/Iconos_Mattes/Iconos/Mattes_Posiciona tu popiedad.png">` : `<div class = "posiciona-propiedad"></div>`;
                            let html = `<div class="col-xs-4">
                            <div class="accomd-modations-room">
                                <div class="img">
                                    <a href="#"><img src="${path}/${v.imagen}" alt=""></a>
                                </div>
                                <div class="text">
                                    <h2><a href="#" style="cursor: auto;">${v.name}</a></h2>
                                    <p class="price">
                                        <span class="amout">$${precio}</span>/days
                                    </p>
                                </div>
                            </div>
                        </div>`
                            $(".grid-template").append(html);
                            $("#iconos" + i).append(sello);
                            $("#iconos" + i).append(verifica);
                            $("#iconos" + i).append(posiciona);
                            sello = "";
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

                        $('.grid').infiniteScroll({
                            path: getPenPath,
                            append: '.grid-item',
                            outlayer: false,
                            scrollThreshold: true,
                            Threshold: 8,
                            status: '.infinite-scroll-last'
                        });

                    });

                }

                $(".detalle-propiedad").on("click", function() {
                    //alert("OK");
                    let id_propiedad = $(this).attr('id');
                    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Propiedades_rest/validacion`;
                    data = {
                        id_propiedad: id_propiedad

                    }
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: data,
                        success: function(result) {
                            val = result['validacion'];
                            switch (val) {
                                case 2:
                                    const url_detalle = `${BASE_URL}propiedad-ubicacion`;
                                    detalles = document.getElementById("propiedad_id");
                                    detalles.setAttribute("action", url_detalle);
                                    document.getElementById("propiedad_id").submit();

                                    break;

                                case 3:
                                    const url_servicios = `${BASE_URL}propiedad-servicios`;
                                    detalles = document.getElementById("propiedad_id");
                                    detalles.setAttribute("action", url_servicios);
                                    document.getElementById("propiedad_id").submit();
                                    break;

                                case 4:
                                    const url_files = `${BASE_URL}propiedad-documentos`;
                                    detalles = document.getElementById("propiedad_id");
                                    detalles.setAttribute("action", url_files);
                                    document.getElementById("propiedad_id").submit();
                                    break;

                                case 5:
                                    const url_up = `${BASE_URL}datos-propiedad`;
                                    detalles = document.getElementById("propiedad_id");
                                    detalles.setAttribute("action", url_up);
                                    document.getElementById("propiedad_id").submit();
                                    break;
                            }

                        }
                    });
                    $('#id').val(id_propiedad);
                });

                $(".eliminar-propiedad").on("click", function() {
                    $("#mensaje").text("");
                    let id_propiedad = $(this).attr('id');
                    $('#id_delete').val(id_propiedad);
                    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Propiedades_rest/readPropiedad`;

                    data = {
                        id_propiedad: id_propiedad
    
                    }

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: data,
                        success: function(result) {
                           //console.log();
                           let mensaje =  `${result[0]['name']}`
                           $("#mensaje").text(mensaje);
                        }
                    });
             
                });

                //$('#loader').toggle();
            }
        });



    }
});

$(document).on('submit', '#form_delete', function() {
    $('#loader').toggle();
    document.getElementById("delete_prop").disabled = true;
    var formData = new FormData($(this)[0]);
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Propiedades_rest/deletePropiedad`;

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
                $(".grid").children().remove();
                $('#modal_eliminar').modal('toggle');
                $('#loader').toggle();
                get_propiedades();
                document.getElementById("delete_prop").disabled = false;

            } else {
                Toastify({
                    text: data.messages.success,
                    duration: 3000,
                    className: "info",
                    // avatar: "../../assets/img/logop.png",
                    style: {
                        background: "linear-gradient(to right, #cf0000, #e98c35)",
                    },
                    offset: {
                        x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                        y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                    },

                }).showToast();
                $('#modal_eliminar').modal('toggle'); 
                document.getElementById("delete_prop").disabled = false;
            }

        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
    
}); 