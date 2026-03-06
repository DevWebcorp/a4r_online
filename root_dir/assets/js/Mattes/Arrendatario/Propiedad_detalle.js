group == 4 ? $(".group").show() : $(".group").hide();

group == 3 ? $(".group-btn").hide() : $(".group-btn").show();

group == 0 ? $(".mensaje").show() : $(".mensaje").hide();

//verify == 0 ? document.getElementById("dudas").readOnly = true : document.getElementById("dudas").readOnly = false;

//FORMATO PARA EL PRECIO
const formatterDolar = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD'
});

//FORMATO EN ESPAÑOL FECHA
moment.locale('es');

$(document).ready(function () {
    $('#loader').removeClass('load');
    get_detalles();
});

function get_detalles() {
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Propiedad_detalles_rest/get_detalles`;
    data = { id_propiedad: id_propiedad }
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (result) {
            let group_id = result['detalles'][0]['grouptype'];
            const path = `${BASE_URL}/writable/uploads/Mattes/Arrendador`;
            telefono = result['detalles'][0]['phone'] != null ? $("#btn_wa").show() : $("#btn_wa").hide();

            var photo_prop = result['detalles'][0]['photo'];
            //console.log(group_id);

            if (photo_prop == "") {
                let photo = `<img id="img-1" class="rounded-circle photo" src="${BASE_URL}/assets/img/default.png">`;
                $(".photo-prop").append(photo);
            } else {
                if (group_id == 5) {
                    let pathphoto = `${BASE_URL}writable/uploads/Mattes/Agente`;
                    let photo = `<img id="img-1" class="rounded-circle photo" src="${pathphoto}/${photo_prop}" >`;

                    $(".photo-prop").append(photo);

                } else {
                    let pathphoto = `${BASE_URL}writable/uploads/Mattes/Arrendador`;
                    let photo = `<img id="img-1" class="rounded-circle photo" src="${pathphoto}/${photo_prop}">`;
                    $(".photo-prop").append(photo);
                }

            }

            /* if (group == 0) {
                var phone = "";
                var email = "";
            } else {
                var phone = `<i class="fa fa-phone" aria-hidden="true"></i> <span>` + result['detalles'][0]['phone'] + `</span>`;
                var email = `<i class="fa fa-envelope" aria-hidden="true"></i> <span>` + result['detalles'][0]['email'] + `</span>`;
            }
            */
            //LOAD IMAGENES//

            $(result['images']).each(function (i, v) {
                if (i === 0) {
                    console.log(v.pickture.split('.').pop());
                    switch (v.pickture.split('.').pop()) {
                        case "mp4":
                            let video = `<div class="carousel-item active" data-slide-number="${i}" data-toggle="lightbox" data-gallery="gallery" data-remote="${path}/${v.pickture}">
                                <video class="img-fluid"  controls  autoplay loop >
                                    <source src="${path}/${v.pickture}" type="video/mp4" />
                                </video>
                        </div>`;

                            $('.c-inicio').append(video);
                            break;

                        default:
                            console.log("soy el inicio");
                            let inicio = `
                            <div class="carousel-item active" data-slide-number="${i}" data-toggle="lightbox" data-gallery="gallery" data-remote="${path}/${v.pickture}">
                                <img src="${path}/${v.pickture}" class="d-block w-new" alt="...">
                            </div>`;

                            $('.c-inicio').append(inicio);

                            break;
                    }


                } else {


                    switch (v.pickture.split('.').pop()) {
                        case "mp4":
                            let video = `<div class="carousel-item " data-slide-number="${i}" data-toggle="lightbox" data-gallery="gallery" data-remote="${path}/${v.pickture}">
                                <video class="img-fluid"  controls  autoplay loop >
                                    <source src="${path}/${v.pickture}" type="video/mp4" />
                                </video>
                        </div>`;

                            $('.c-inicio').append(video);
                            break;

                        default:
                            console.log("soy el inicio");
                            let item =
                                `<div class="carousel-item" data-slide-number="${i}" data-toggle="lightbox" data-gallery="gallery" data-remote="${path}/${v.pickture}">
                            <img src="${path}/${v.pickture}" class="d-block w-new" alt="...">
                        </div>`;

                            $('.c-inicio').append(item);

                            break;
                    }
                }


                /*  if (i < 4) {
                     let tumbails =
 
                         `<div id="seccion-2" class="carousel-item " data-slide-number="1">
                         <div class="row mx-0 thumbs2">
                             <div id="carousel-selector-${i}" class="thumb col-3 px-1 py-2 selected" data-target="#carousel" data-slide-to="${i}">
                                 <img src="${path}/${v.pickture}" class="img-fluid tb-max" alt="...">
                             </div>
                         </div>
                     </div>    
                         `;
 
                     $('#prueba').append(tumbails);
 
                 } else {
                     if (i > 3) {
                         let tumbails =
                             `<div id="carousel-selector-${i}" class="thumb col-3 px-1 py-2 selected" data-target="#carousel" data-slide-to="${i}">
                             <img src="${path}/${v.pickture}" class="img-fluid tb-max" alt="...">
                         </div>`;
                         $('.thumbs2').append(tumbails);
                     }
                 } */



                //console.log(path+"/"+v.pickture);
                /* let html = `<div class="item">
                                      <img src="${path}/${v.pickture}" alt="Imagen 1">
                                     
                              </div>`;
  
                  $(".owl-carousel").append(html);  */

            });

            if (result['favorito'][0]) {
                var fav = result['favorito'][0]['favorite'];
            } else {
                var fav = 0;
            }

            fav_index = fav;

            if (fav_index == 1) {
                var btn_fav = `<button id="${fav_index}" data-index="${id_propiedad}" type="button" class="favorito group"><i class="fa fa-heart" aria-hidden="true"></i></button>`;
            } else {
                var btn_fav = `<button id="${fav_index}" data-index="${id_propiedad}" type="button" class="favorito group"><i class="fa fa-heart-o" aria-hidden="true"></i></button>`;
            }

            // DATOS PROPIEDAD
            var titulo = result['detalles'][0]['propiedad'];
            var description = `<span>` + result['detalles'][0]['description'] + `</span>`;
            var status = result['detalles'][0]['date_start'];
            var fecha = `<span>` + moment(status).format('LL') + `</span>`;
            let precio = parseFloat(result['detalles'][0]['price']);
            var id_user = result['detalles'][0]['id_user'];
            var propietario = `<span>` + result['detalles'][0]['propietario'] + " " + result['detalles'][0]['p_apellido'] + " " + result['detalles'][0]['m_apellido'] + `</span>`;

            if (result['detalles'][0]['inmobiliaria'] == null) {
                var inmobiliaria = `<span class="inmobiliaria"></span>`;
                $("#n_inmobiliaria").append(inmobiliaria);
            } else {
                var inmobiliaria = `<span class="inmobiliaria">` + result['detalles'][0]['inmobiliaria'] + `</span>`;
                $("#n_inmobiliaria").append(inmobiliaria);
            }


            if (result['detalles'][0]['km'] >= 1000) {
                distancia = `<span>` + result['detalles'][0]['km'] / 1000 + ` km</span>`;
            } else {
                distancia = `<span>` + result['detalles'][0]['km'] + ` metros</span>`;
            }

            //console.log(lat,lng);

            // SERVICIOS PROPIEDAD
            var disability = result['detalles'][0]['disability'] == "1" ? `<div class="text-center"><img class = "icon" src = "${BASE_URL}/assets/img/Iconos_Mattes/Iconos/Mattes_Capacidades diferentes.png" title="Discapacidad"><p class="servicio-icono">Discapacidad</p> </div>` : `<i class = "icon-vacio"></i>`;
            var wifi = result['detalles'][0]['wifi'] == "1" ? `<div class="text-center"><img class = "icon" src = "${BASE_URL}/assets/img/Iconos_Mattes/Iconos/Mattes_Wifi.png" title="Wifi"> <p class="servicio-icono">Wifi</p></div>` : `<i class="icon-vacio"></i>  `;
            var limpieza = result['detalles'][0]['cleaning'] == "1" ? `<div class="text-center"><img class = "icon" src = "${BASE_URL}/assets/img/Iconos_Mattes/Iconos/Mattes_Limpieza.png" title="Limpieza"><p class="servicio-icono">Limpieza</p></div>` : `<i class="icon-vacio"></i>`;
            var estacionamiento = result['detalles'][0]['parking'] == "1" ? `<div class="text-center"><img class = "icon" src = "${BASE_URL}/assets/img/Iconos_Mattes/Iconos/Mattes_Estacionamiento.png" title="Estacionamiento"><p class="servicio-icono">Estacionamiento</p></div>` : `<i class="icon-vacio"></i>`;
            var seguridad = result['detalles'][0]['security'] == "1" ? `<div class="text-center"><img class = "icon" src = "${BASE_URL}/assets/img/Iconos_Mattes/Iconos/Mattes_Seguridad.png" title="Seguridad"><p class="servicio-icono">Seguridad</p></div>` : `<i class="icon-vacio"></i>`;
            var lavadora = result['detalles'][0]['washer'] == "1" ? `<div class="text-center"><img class = "icon" src = "${BASE_URL}/assets/img/Iconos_Mattes/Iconos/Mattes_Lavadora.png" title="Lavadora"><p class="servicio-icono">Lavadora</p></div>` : `<i class="icon-vacio"></i>`;
            var cocina = result['detalles'][0]['kitchen_room'] == "1" ? `<div class="text-center"><img class = "icon" src = "${BASE_URL}/assets/img/Iconos_Mattes/Iconos/Mattes_Cocina.png" title="Cocina"><p class="servicio-icono">Cocina</p></div>` : `<i class="icon-vacio"></i>`;

            // DETALLES PROPIEDAD

            var roomies = `<p class="details  mg-t-10"> Roomies: <span>` + result['detalles'][0]['n_roomies'] + `  </span></p>`;
            var bath_n = `<p class="details">Baños: <span>` + result['detalles'][0]['n_bathing'] + `  </span></p>`;
            var petfriendly = `<p class="details">Petfriendly: <span>` + result['detalles'][0]['petfrienly'] + `  </span></p>`;
            var status_bath = `<p class="details">Tipo de baño: <span>` + result['detalles'][0]['status_bath'] + `  </span></p>`;
            var disponible = `<p class="details">Disponible para: <span>` + result['detalles'][0]['available'] + `</span></p>`;


            // RATING
            var property_c = result['detalles'][0]['property_count'];
            var users_r = result['detalles'][0]['users_count'];

            if (property_c == null) {
                var rating = 0

            } else {
                var rating = property_c / users_r;
            }

            $(".favorito-btn").append(btn_fav);
            $(".info-nprop").append(propietario);
            //$(".correo").append(email);
            $(".titulo-prop").append(titulo);
            $(".info-des").append(description);
            $(".precio").append('<h1>' + formatterDolar.format(precio)) + '</h1>';
            $(".disponible").append(fecha);
            $(".distancia").append(distancia);
            $("#iconos").append(disability);
            $("#iconos").append(wifi);
            $("#iconos").append(limpieza);
            $("#iconos").append(estacionamiento);
            $("#iconos").append(seguridad);
            $("#iconos").append(lavadora);
            $("#iconos").append(cocina);
            $(".detalles").append(roomies);
            $(".detalles").append(bath_n);
            $(".detalles").append(status_bath);
            $(".detalles").append(petfriendly);
            $(".detalles").append(disponible);
            $("#propietario").val(id_user);

            initMap();

            function initMap(lat, lng) {
                var titulo = result['detalles'][0]['propiedad'];
                var lat = parseFloat(result['detalles'][0]['latitude']);
                var lng = parseFloat(result['detalles'][0]['longitude']);
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
                    size: new google.maps.Size(30, 30),
                    center: myLatLng,
                    mapTypeId: "terrain",
                });

                marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    draggable: false,
                    //icon: "http://localhost/mattes/assets/icons/casa.png",
                    size: new google.maps.Size(5, 5),
                    title: titulo

                });

                //console.log(lat);


                const cityCircle = new google.maps.Circle({
                    strokeColor: "#0088F7",
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: "#0088F7",
                    fillOpacity: 0.35,
                    map,
                    center: myLatLng,
                });
            }

            $(result['questions']).each(function (i, v) {
                let fecha_c = moment(v.created_at).format('DD-MM-YYYY');
                let questions = `<div class="row mg-t-10">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="preguntas duda-arrendatario">${v.question}</p>
                                        </div>
                                        <div>
                                            <p class="preguntas">${fecha_c}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div>
                            <p class="col-10 col-sm-11  col-xl-12 pr-xl-7 respuestas">${v.answer}</p>
                        </div>`;

                $(".questions").append(questions);
            });

            $(result['opinions']).each(function (i, v) {
                let opinions = `<div class="row mg-t-20">
                                    <div class="col-lg-2 col-sm-12 col-md-2 text-center">
				                        <figure class="photo-user">
					                        <img id="img-1" class="rounded-circle photo-user" src="${BASE_URL}../../writable/uploads/Mattes/Arrendatario/${v.photo}" alt="First slide">
				                        </figure>
				                        <p class="usuario-name">${v.alumno}</p>
				                        <div class="qualification starrr"></div>
				
			                        </div>
			                        <div class="col-lg-6 col-sm-12 col-md-10 my-auto">
				                        <p class="opiniones">${v.comment}</p>
			                        </div>
                                </div>
                                <hr>`;
                $(".opinions").append(opinions);
                $(".qualification").starrr({
                    rating: v.qualification,
                    readOnly: true
                });

            });

            $("#estrellas").starrr({
                rating: rating,
                readOnly: true
            });

            $(".favorito").on("click", function () {
                let favorito = $(this).attr('id');
                let propiedad = $(this).data('index');

                let json = {
                    propiedad: propiedad,
                    favorito: favorito
                };

                const url_favorites = `${BASE_URL}Mattes/Api/Arrendatario_api/Favoritos_rest/insert_favorite`;

                $.ajax({
                    url: url_favorites,
                    type: "POST",
                    data: JSON.stringify(json),
                    dataType: 'json',
                    success: function (result) {
                        let r_fav = result.messages.favorito;
                        $(".favorito").removeAttr('id');
                        $(".favorito").attr('id', r_fav);
                        if (r_fav == 1) {
                            $(".favorito").children("i").removeClass("fa-heart-o");
                            $(".favorito").children("i").addClass("fa-heart");
                        } else {
                            $(".favorito").children("i").removeClass("fa-heart");
                            $(".favorito").children("i").addClass("fa-heart-o");
                        }

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

            $("#btn_wa").on('click', function (e) {
                //$('#loader').toggle();
                $('#loader').removeClass('load');

                if (group == 0) {
                    $('#loader').addClass('load');
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-sweet'
                        },
                        buttonsStyling: false
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Inicia sesión',
                        text: "Para poder rentar una propiedad primero debes iniciar sesión",
                        icon: 'info',
                        confirmButtonColor: '#3041D9',
                        confirmButtonText: 'Iniciar sesión'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = `${BASE_URL}inicia-session`;
                            /* swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            ) */
                        }
                    });
                } else {
                    e.preventDefault();
                    let ref = `https://wa.me/52${result['detalles'][0]['phone']}`;
                    let url = `${BASE_URL}Mattes/Api/Arrendatario_api/Propiedad_detalles_rest/add_contacto`;
                    let FORMDATA = new FormData();
                    FORMDATA.append('id_propiedad', id_propiedad)
                    FORMDATA.append('tel_arrendador', result['detalles'][0]['phone']);
                    send(url, FORMDATA, false, false, false, ref);
                    $('#loader').addClass('load');
                }
            });


            //$('#loader').toggle();
            $('#loader').addClass('load');

            /* $("#estrellas").starrr();

            $(".starrr").on('starrr:change', function(e,valor) {
                $("#rating").val(valor);
            }); */


        },

        error: function (xhr, resp, text) {
            console.log(xhr, resp, text);
            $('#loader').toggle();
        }
    });
}

//Envio de formulario
let send = (url, data, reload, modal, form, ref) =>
    fetch(url, {
        method: "POST",
        body: data,
    }).then(response => response.json()).catch(err => alert(err))
        .then(response => {
            console.log(response);
            if (response.status == 200) {
                window.location.href = ref;
            } else {
                let background = "linear-gradient(to right, #f90303, #fe5602)";
                Toastify({
                    text: response.mensaje.success,
                    duration: 3000,
                    className: "info",
                    //avatar: imagen,
                    style: {
                        background: background
                    },
                    offset: {
                        x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                        y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                    },
                }).showToast();

            }

            //response.status == 200
            //response.status == 200 ? notificacion(response.msg, true, reload, modal, form, ref) : notificacion(response.msg, false)
        }).catch(err => alert(err))

//notificaciones
// let notificacion = (mensaje, flag, reload, modal, form, ref) => {
//     console.log(ref);
//     if (flag) {
//         var imagen = BASE_URL + "../../assets/img/correcto.png";
//         var background = "linear-gradient(to right, #00b09b, #96c93d)";

//     } else {
//         var imagen = BASE_URL + "../../assets/img/cancelar.png";
//         var background = "linear-gradient(to right, #f90303, #fe5602)";
//     }

//     if (reload) {
//         reload.ajax.reload();
//     }

//     if (modal) {
//         $(modal.selector).modal('toggle');
//     }

//     if (form) {
//         $(form.selector).trigger("reset");

//     }

//     /*Toastify({
//         text: mensaje,
//         duration: 3000,
//         className: "info",
//         //avatar: imagen,
//         style: {
//             background: background
//         },
//         offset: {
//             x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
//             y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
//         },
//     }).showToast();*/

//     if (ref) {
//         setTimeout(() => {
//             window.location.href = ref;
//         }, "1000");
//     }

//     $('#loader').toggle();
// }

function getlink() {
    var aux = document.createElement("input");
    aux.setAttribute("value", window.location.href);
    document.body.appendChild(aux);
    aux.select();
    document.execCommand("copy");
    document.body.removeChild(aux);
    var css = document.createElement("style");
    var estilo = document.createTextNode("#aviso {position:absolute; z-index: 9999999; widht: 120px; top:145px;left:800px;margin-left: -60px;padding: 10px; color: white; background: #009EF9;border-radius: 8px;font-size: 14px;font-family: Gothicb;}");
    css.appendChild(estilo);
    document.head.appendChild(css);
    var aviso = document.createElement("div");
    aviso.setAttribute("id", "aviso");
    var contenido = document.createTextNode("URL copiada");
    aviso.appendChild(contenido);
    document.body.appendChild(aviso);
    window.load = setTimeout("document.body.removeChild(aviso)", 3000);
}



$(".agendar-cita").on("click", function () {
    if (group == 0) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-sweet'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Inicia sesión',
            text: "Para poder agendar una cita primero debes iniciar sesión",
            icon: 'info',
            confirmButtonColor: '#3041D9',
            confirmButtonText: 'Iniciar sesión'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `${BASE_URL}inicia-session`;
                /* swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                ) */
            }
        });
    } else {
        if (verify == 0) {
            if (group == 4) {
                $('#id').val(id_propiedad);
                const url_cita = `${BASE_URL}agendar-cita`;
                detalles = document.getElementById("propiedad_id");
                detalles.setAttribute("action", url_cita);
                document.getElementById("propiedad_id").submit();
                /* Toastify({
                    text: "PARA HACER UNA CITA TU USUARIO DEBE SER VERIFICADO",
                    duration: 5000,
                    className: "info",
                    // avatar: "../../assets/img/logop.png",
                    style: {
                        background: "linear-gradient(to right, #ff601c, #f7e300)",
                    },
                    offset: {
                        x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                        y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                    },
            
                }).showToast(); */
            }
        } else {
            $('#id').val(id_propiedad);
            const url_cita = `${BASE_URL}agendar-cita`;
            detalles = document.getElementById("propiedad_id");
            detalles.setAttribute("action", url_cita);
            document.getElementById("propiedad_id").submit();
        }
    }
});

$(".rentar-casa").on("click", function () {
    //alert("INICIA SESIÓN PARA RENTAR");
    if (group == 0) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-sweet'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Inicia sesión',
            text: "Para poder rentar una propiedad primero debes iniciar sesión",
            icon: 'info',
            confirmButtonColor: '#3041D9',
            confirmButtonText: 'Iniciar sesión'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `${BASE_URL}inicia-session`;
                /* swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                ) */
            }
        });
    } else {
        if (verify == 0) {
            if (group == 4) {
                const url_renta = `${BASE_URL}renta-propiedad/${name_property}`;
                location.href = url_renta;
                /*  Toastify({
                     text: "PARA RENTAR UNA PROPIEDAD, TU USUARIO DEBE SER VERIFICADO",
                     duration: 5000,
                     className: "info",
                     // avatar: "../../assets/img/logop.png",
                     style: {
                         background: "linear-gradient(to right, #ff601c, #f7e300)",
                     },
                     offset: {
                         x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                         y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                     },
             
                 }).showToast(); */
            }
        } else {
            const url_renta = `${BASE_URL}renta-propiedad/${name_property}`;
            location.href = url_renta;
        }
    }

});

$(document).on('submit', '#form-questions', function () {
    if (verify == 0) {
        if (group == 4) {
            $('#loader').toggle();
            $("#propiedad").val(id_propiedad);
            document.getElementById("send-questions").disabled = true;
            var formData = new FormData($(this)[0]);
            const url_chat = `${BASE_URL}Mattes/Api/Arrendador_api/Conversacion_rest/questions`

            //AJAX.
            $.ajax({
                url: url_chat,
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (data) {
                    document.getElementById("dudas").value = "";
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
                        //window.location.reload();
                        document.getElementById("send-questions").disabled = false;
                        $('#loader').toggle();


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
                        document.getElementById("enviar_msg").disabled = false;
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
            /* Toastify({
                text: "PARA REALIZAR ESTA ACCIÓN TU USUARIO DEBE SER VERIFICADO",
                duration: 5000,
                className: "info",
                // avatar: "../../assets/img/logop.png",
                style: {
                    background: "linear-gradient(to right, #ff601c, #f7e300)",
                },
                offset: {
                    x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                    y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                },
        
            }).showToast(); */
        }
    } else {
        $('#loader').toggle();
        $("#propiedad").val(id_propiedad);
        document.getElementById("send-questions").disabled = true;
        var formData = new FormData($(this)[0]);
        const url_chat = `${BASE_URL}Mattes/Api/Arrendador_api/Conversacion_rest/questions`

        //AJAX.
        $.ajax({
            url: url_chat,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (data) {
                document.getElementById("dudas").value = "";
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
                    //window.location.reload();
                    document.getElementById("send-questions").disabled = false;
                    $('#loader').toggle();


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
                    document.getElementById("enviar_msg").disabled = false;
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }


    return false;
});