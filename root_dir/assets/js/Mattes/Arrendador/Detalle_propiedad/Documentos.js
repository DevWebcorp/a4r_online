var total;


$(document).on("click", "#documentos-tab", function () {
    //alert(id_propiedad);
    //$('#loader').toggle();
    $("#elementos").children().remove(".carousel-item active").remove(".carousel-item");
    $("#indicadores").children().remove();
    get_documentos();

});



function get_documentos() {
    $('#loader').toggle();
    console.log(id_propiedad);
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Detalle_propiedad/get_documentacion`;
    $.ajax({
        type: "POST",
        url: url,
        data: { id: id_propiedad },
        dataType: 'json',
        success: function (data) {
            console.log(data['images']);
            if (data['images'].length > 0) {
                console.log(data);
                total = data['images'].length;
                console.log(total);
                load_carrusel(data);
            } else {
                total = data['images'].length;
                $('#loader').toggle();
            }

            if(data['docs'].length > 0){
                if(data['docs']['file_address'] != ""){
                    const url_comp = `${BASE_URL}writable/uploads/Mattes/Arrendador/${data['docs'].file_address}`;
                    comprobante = document.getElementById("down_comp");
                    comprobante.setAttribute("href", url_comp);
                } else {
                    $('#desc-comp').hide();
                }

                if(data['docs']['file_receipt'] != ""){
                    const url_rec = `${BASE_URL}writable/uploads/Mattes/Arrendador/${data['docs'].file_receipt}`;
                    recibo = document.getElementById("down_rec");
                    recibo.setAttribute("href", url_rec);
                } else {
                    $('#desc-rec').hide();
                } 
            }
        },

    })
}

function load_carrusel(data) {
    console.log(data['images']);
    $(data['images']).each(function (i, v) {
        switch (v.pickture.split('.').pop()) {
            case "mp4":
                
                if (i === 0) {
                    var lista = `<li data-target="#carouselExampleIndicators" data-slide-to="${i}" class="active"></li>`;
                    $("#indicadores").append(lista);
                    let html0 =
                        `<div class="carousel-item active">
                                <div><button type="button" class="delete-elemento btn-danger px-4 py-1" id =${v.id}><i class="fa fa-trash-o fa-lg mr-1" aria-hidden="true"></i>Borrar</button></div>
                            <div class="view hm-black-light">
                                <video class="video-full"controls>
                                    <source id="prueba" src="${BASE_URL}writable/uploads/Mattes/Arrendador/${v.pickture}" type="video/mp4" />
                                </video>
                                <div class="full-bg-img"></div>
                            </div>
                        </div>`
                    $("#elementos").append(html0);
                } else {
                    console.log("esta aca");
                    var lista = `<li data-target="#carouselExampleIndicators" data-slide-to="${i}"></li>`;
                    $("#indicadores").append(lista);
                    let html =
                        `<div class="carousel-item">
                            <div><button type="button" class="delete-elemento btn-danger px-4 py-1" id =${v.id}><i class="fa fa-trash-o fa-lg mr-1" aria-hidden="true"></i>Borrar</button></div>
                         <div class="view hm-black-light">
                             <video class="video-full"controls>
                                 <source id="prueba" src="${BASE_URL}writable/uploads/Mattes/Arrendador/${v.pickture}" type="video/mp4" />
                             </video>
                             <div class="full-bg-img"></div>
                         </div>
                     </div>`

                    $("#elementos").append(html);
                }

            default:
                if (v.pickture.split('.').pop() != "mp4") {
                    if (i === 0) {
                        var lista = `<li data-target="#carouselExampleIndicators" data-slide-to="${i}" class="active"></li>`;
                        $("#indicadores").append(lista);

                        var elementos =
                            `<div class="carousel-item active">
                        <div><button type="button" class="delete-elemento btn-danger px-4 py-1" id =${v.id}><i class="fa fa-trash-o fa-lg mr-1" aria-hidden="true"></i>Borrar
                        </button></div>
                            <img id="img-1" class="d-block cajon" src="${BASE_URL}writable/uploads/Mattes/Arrendador/${v.pickture}"alt="First slide">
                    </div>`;
                        $("#elementos").append(elementos);

                    } else {
                        var lista = `<li data-target="#carouselExampleIndicators" data-slide-to="${v.id}"></li>`;
                        $("#indicadores").append(lista);

                        var elementos =
                            `<div class="carousel-item">
                        <div><button type="button" class="delete-elemento  btn-danger px-4 py-1" id =${v.id}><i class="fa fa-trash-o fa-lg mr-1" aria-hidden="true"></i>Borrar</button></div>
                        <img class="d-block cajon" src="${BASE_URL}writable/uploads/Mattes/Arrendador/${v.pickture}">
                    </div>`;
                        $("#elementos").append(elementos);


                    }

                }

                break;
        }
    });

    $('#loader').toggle();

}



//upload files
filesToUpload = [];
fileIdCounter = 0;
$(document).on('change', '#file-user', function (evt) {
    var archivos = $(this)[0].files;
    for (var i = 0; i < evt.target.files.length; i++) {
        fileIdCounter++;
        var file = evt.target.files[i];
        filesToUpload.push({
            file: file
        });
    };

    suma = total + filesToUpload.length;

    if (suma >= 11) {
        alert(filesToUpload[i].file.name + " " + "Se descarto");
        filesToUpload.splice(i, 1);
    }

    $("#elementos").children().remove(".carousel-item active").remove(".carousel-item");
    let indicador = $("#indicadores").children().remove();
    get_documentos();
    evt.target.value = null;
    var verificar = validar_Archivos(filesToUpload);

    if (verificar) {
        read_files(filesToUpload);
    }

});

function validar_Archivos(archivos) {
    output = [];
    let bandera = true;
    $(archivos).each(function (i, v) {
        console.log(archivos[i].file.size);
        switch (archivos[i].file.name.split('.').pop().toLowerCase()) {
            case "mp4":
                var limit = Math.round((archivos[i].file.size / 1024));
                if (limit >= 10240) {
                    //alert(archivos[i].file.name + " " + "el archivo debe ser menor a 4 MB");
                    Toastify({
                        text: archivos[i].file.name + " " + "el archivo debe ser menor a 10 MB",
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
                    archivos.splice(i, 1);
                    bandera = false;
                    return false;
                } else {
                    bandera = true;
                    break;
                }
            case "jpg":
                var limit = Math.round((archivos[i].file.size / 1024));
                if (limit >= 4096) {
                    alert(archivos[i].file.name + " " + "el archivo debe ser menor a 4 MB");
                    archivos.splice(i, 1);
                    bandera = false;
                    return false;
                } else {
                    bandera = true;
                    break;
                }

            case "png":
                var limit = Math.round((archivos[i].file.size / 1024));
                if (limit >= 4096) {
                    alert(archivos[i].file.name + " " + "el archivo debe ser menor a 4 MB");
                    archivos.splice(i, 1);
                    bandera = false;
                    return false;
                } else {
                    bandera = true;
                    break;
                }

            case "jpeg":
                var limit = Math.round((archivos[i].file.size / 1024));
                if (limit >= 4096) {
                    alert(archivos[i].file.name + " " + "el archivo debe ser menor a 4 MB");
                    archivos.splice(i, 1);
                    bandera = false;
                    return false;
                } else {
                    bandera = true;
                    break;
                }
            default:
                alert(archivos[i].file.name + " " + "Se descarto");
                archivos.splice(i, 1);
                bandera = false;
                return false;
        }

    });

    if (bandera == false) {
        validar_Archivos(archivos);
    }

    return true;
}
function read_files(filesToUpload) {
    console.log(filesToUpload);
    $(filesToUpload).each(function (i, v) {
        switch (filesToUpload[i].file.name.split('.').pop().toLowerCase()) {
            case "mp4":
                if (i == 0 && total == 0) {
                    var lista = `<li id="${i}" data-target="#carouselExampleIndicators" data-slide-to="${i}" class="active"></li>`;
                    $("#indicadores").append(lista);

                } else {
                    var lista = `<li id="${i}" data-target="#carouselExampleIndicators" data-slide-to="${i}"></li>`;
                    $("#indicadores").append(lista);

                }

                var reader = new FileReader();
                reader.readAsArrayBuffer(filesToUpload[i].file);
                reader.onload = function (e) {
                    let buffer = e.target.result;
                    let video = new Blob([new Uint8Array(buffer)], { type: 'video/mp4' });
                    let url = window.URL.createObjectURL(video);

                    if (i == 0 && total == 0) {
                        let html =

                            `<div class="carousel-item active">
                            <div><button type="button" class="b-elemento btn-danger px-4 py-1" id =${i}><i class="fa fa-trash-o fa-lg mr-1" aria-hidden="true"></i>Borrar</button></div>
                         <div class="view hm-black-light">
                             <video class="video-full"controls>
                                 <source id="prueba" src="${url}" type="video/mp4" />
                             </video>
                             <div class="full-bg-img"></div>
                         </div>
                     </div>`

                        $("#elementos").append(html);

                    } else {
                        let html =
                            `<div class="carousel-item">
                            <div><button type="button" class="b-elemento btn-danger px-4 py-1" id =${i}><i class="fa fa-trash-o fa-lg mr-1" aria-hidden="true"></i>Borrar</button></div>
                         <div class="view hm-black-light">
                             <video class="video-full"controls>
                                 <source id="prueba" src="${url}" type="video/mp4" />
                             </video>
                             <div class="full-bg-img"></div>
                         </div>
                     </div>`

                        $("#elementos").append(html);
                    }
                }
                break;



            default:
                if (i == 0 && total == 0) {
                    var lista = `<li id="${i}" data-target="#carouselExampleIndicators" data-slide-to="${i}" class="active"></li>`;
                    $("#indicadores").append(lista);
                } else {
                    var lista = `<li id="${i}" data-target="#carouselExampleIndicators" data-slide-to="${i}"></li>`;
                    $("#indicadores").append(lista);

                }

                var reader = new FileReader();
                reader.readAsDataURL(filesToUpload[i].file);

                reader.onloadend = function () {
                    if (i == 0 && total == 0) {
                        var elementos =
                            `<div class="carousel-item active">
                                <div><button type="button" class="b-elemento btn-danger px-4 py-1" id =${i}><i class="fa fa-trash-o fa-lg mr-1" aria-hidden="true"></i>Borrar</button></div>
                                <img id="img-1" class="d-block cajon" src="${reader.result}" alt="First slide">
                            </div>`;



                        $("#elementos").append(elementos);

                    } else {
                        var elementos = `
                      
                           
                            <div class="carousel-item">
                            <div><button type="button" class="b-elemento btn-danger px-4 py-1" id =${i}><i class="fa fa-trash-o fa-lg mr-1" aria-hidden="true"></i>Borrar</button></div>
                                <img class="d-block cajon" src="${reader.result}">
                            </div>
                      `;
                        $("#elementos").append(elementos);
                    }
                }
                break;
        }

    });

}

//delete element

$(document).on('click', '.b-elemento', function (e) {
    let id_buton = $(this).attr('id');
    var valor = parseInt(id_buton);
    filesToUpload.splice(valor, 1);
    $("#elementos").children().remove(".carousel-item active").remove(".carousel-item");
    let indicador = $("#indicadores").children().remove();
    get_documentos();
    read_files(filesToUpload);
});

//delete elemento de base//

$(document).on('click', '.delete-elemento', function (e) {
    let id_buton = $(this).attr('id');
    //alert(id_buton);

    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Detalle_propiedad/delete_file`;
    $.ajax({
        type: "POST",
        url: url,
        data: { id: id_buton },
        dataType: 'json',
        success: function (data) {
            $("#elementos").children().remove(".carousel-item active").remove(".carousel-item");
            let indicador = $("#indicadores").children().remove();
            get_documentos();
            read_files(filesToUpload);
            Toastify({
                text: data.messages.success,
                duration: 3000,
                className: "info",
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                offset: {
                    x: 50,
                    y: 90
                },

            }).showToast();
        },
        error: function (data) {
            Toastify({
                text: "A OCURRIDO UN ERROR INTENTELO NUEVAMENTE",
                duration: 3000,
                className: "info",
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                offset: {
                    x: 50,
                    y: 90
                },

            }).showToast();
        }

    })

    /*   var valor = parseInt(id_buton);
      filesToUpload.splice(valor, 1);
      $("#elementos").children().remove(".carousel-item active").remove(".carousel-item");
      let indicador = $("#indicadores").children().remove();
      get_documentos();
      read_files(filesToUpload); */
});



$("#send_form").click(function (e) {
    e.preventDefault();


    var formData = new FormData();

    $(filesToUpload).each(function (i, v) {
        formData.append('files[]', filesToUpload[i].file);
    });

    var domicilio = $('#file-domicilio')[0].files;
    if (domicilio.length != 0) {
        formData.append('domicilio', domicilio[0]);
    }

    var recibo = $('#file-recibo')[0].files;
    if (recibo.length != 0) {
        formData.append('recibo', recibo[0]);
    }

    element = $("#id_propiedaddocs");
    if(element.length > 0){
        id_propiedad = element.val();
        formData.append('id_propiedad', id_propiedad);
    }else {
        formData.append('id_propiedad', id_propiedad);
    }

    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Detalle_propiedad/updateFiles`;

    $.ajax({
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        type: "POST",
        success: function (data) {
            if (data.status == 200) {
               // $('#file-recibo').val('');
               // $('file-recibo').val('');
                filesToUpload.splice(0, filesToUpload.length);
                $("#elementos").children().remove(".carousel-item active").remove(".carousel-item");
                $("#indicadores").children().remove();
                get_documentos();
                read_files(filesToUpload);

                Toastify({
                    text: data.messages.success,
                    duration: 3000,
                    className: "info",
                    // avatar: "../../assets/img/logop.png",
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    offset: {
                        x: 50,
                        y: 90
                    },

                }).showToast();

                elem_docs = $("#id_propiedaddocs");
                if(data.id_group == 2 && elem_docs){
                    $('#id_propiedaddocs').val(data.id);
                    location.href = BASE_URL + "propiedades";
                }
                

            } else {
                Toastify({
                    text: data.messages.success,
                    duration: 3000,
                    className: "info",
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    offset: {
                        x: 50,
                        y: 90
                    },

                }).showToast();
            }

        },
        error: function (data) {
            alert("ERROR - " + data.responseText);
        }
    });

    /* if ($('#terminos').is(':checked')) {
        
    } else {
        Toastify({
            text: "ACEPTA TERMINOS Y CONDICIONES",
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

    } */





});

//comprante de domicilio//

$(document).on('change', '#file-domicilio', function () {

    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop().toLowerCase();

    if ((ext == "pdf") || (ext == "png") || (ext == "jpg") || (ext == "jpeg")) {
        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
        } else {
            textbox.text(filesCount + ' files selected');
        }

    } else {
        $(this).val('');
        Toastify({
            text: "El archivo debe ser pdf, png, jpg y jpeg",
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

$(document).on('change', '#file-recibo', function () {

    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop().toLowerCase();

    if ((ext == "pdf") || (ext == "png") || (ext == "jpg") || (ext == "jpeg")) {
        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
        } else {
            textbox.text(filesCount + ' files selected');
        }

    } else {
        $(this).val('');
        Toastify({
            text: "El archivo debe ser pdf, png, jpg y jpeg",
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

