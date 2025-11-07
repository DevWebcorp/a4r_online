filesToUpload = [];
fileIdCounter = 0;
$(document).on('change', '#file-user', function (evt) {

    var archivos = $(this)[0].files
    for (var i = 0; i < evt.target.files.length; i++) {
        fileIdCounter++;
        var file = evt.target.files[i];
        filesToUpload.push({
            file: file
        });

        if(filesToUpload.length>=11){
            alert(filesToUpload[i].file.name + " " + "Se descarto");
            filesToUpload.splice(i, 1);
        }

    };

    $("#elementos").children().remove(".carousel-item active").remove(".carousel-item");
    let indicador = $("#indicadores").children().remove();
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
                    //alert(archivos[i].file.name + " " + "el archivo debe ser menor a 4 MB");

                    Toastify({
                        text: archivos[i].file.name + " " + "el archivo debe ser menor a 4 MB",
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

            case "png":
                var limit = Math.round((archivos[i].file.size / 1024));
                if (limit >= 4096) {
                    //alert(archivos[i].file.name + " " + "el archivo debe ser menor a 4 MB");
                    Toastify({
                        text: archivos[i].file.name + " " + "el archivo debe ser menor a 4 MB",
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
                

            case "jpeg":
                var limit = Math.round((archivos[i].file.size / 1024));
                if (limit >= 4096) {
                    //alert(archivos[i].file.name + " " + "el archivo debe ser menor a 4 MB");

                    Toastify({
                        text: archivos[i].file.name + " " + "el archivo debe ser menor a 4 MB",
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
            default:
                //alert(archivos[i].file.name + " " + "Se descarto");

                Toastify({
                    text: archivos[i].file.name + " " + "Se descarto",
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
                if (i == 0) {
                    var lista = `<li data-target="#carouselExampleIndicators" data-slide-to="${i}" class="active"></li>`;
                    $("#indicadores").append(lista);

                } else {
                    var lista = `<li data-target="#carouselExampleIndicators" data-slide-to="${i}"></li>`;
                    $("#indicadores").append(lista);

                }

                var reader = new FileReader();
                reader.readAsArrayBuffer(filesToUpload[i].file);
                reader.onload = function (e) {
                    let buffer = e.target.result;
                    let video = new Blob([new Uint8Array(buffer)], { type: 'video/mp4' });
                    let url = window.URL.createObjectURL(video);

                    if (i == 0) {
                        let html =

                            `<div class="carousel-item active">
                                <div>
                                    <button  type="button" class="b-elemento btn-danger px-4 py-1" id =${i}><i class="fa fa-trash-o fa-lg mr-1" aria-hidden="true"></i>Borrar</button>
                                </div>
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
                                <div>
                                    <button  type="button" class="b-elemento btn-danger px-4 py-1" id =${i}><i class="fa fa-trash-o fa-lg mr-1" aria-hidden="true"></i>Borrar</button>
                                </div>
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
                if (i == 0) {
                    var lista = `<li data-target="#carouselExampleIndicators" data-slide-to="${i}" class="active"></li>`;
                    $("#indicadores").append(lista);
                } else {
                    var lista = `<li data-target="#carouselExampleIndicators" data-slide-to="${i}"></li>`;
                    $("#indicadores").append(lista);

                }

                var reader = new FileReader();
                reader.readAsDataURL(filesToUpload[i].file);

                reader.onloadend = function () {
                    if (i == 0) {
                        var elementos = ` <div class="carousel-item active">
                            <div>
                                <button  type="button" class="b-elemento btn-danger px-4 py-1" id =${i}><i class="fa fa-trash-o fa-lg mr-1" aria-hidden="true"></i>Borrar</button>
                            </div>
                            <img id="img-1" class="d-block cajon" src="${reader.result}"  alt="First slide">
                        </div>`;
                        $("#elementos").append(elementos);

                    } else {
                        var elementos = ` <div class="carousel-item">
                            <div>
                                <button  type="button" class="b-elemento btn-danger px-4 py-1" id =${i}><i class="fa fa-trash-o fa-lg mr-1" aria-hidden="true"></i>Borrar</button>
                            </div>
                            <img class="d-block cajon" src="${reader.result}">
                        </div>`;
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
    filesToUpload.splice(id_buton, 1);
    $("#elementos").children().remove(".carousel-item active").remove(".carousel-item");
    let indicador = $("#indicadores").children().remove();
    console.log(indicador);
    read_files(filesToUpload);
});

//send files


$("#send_form").click(function (e) {
    e.preventDefault();
    if (filesToUpload.length == 0) {
        Toastify({
            text: "Sube una imagen o video",
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

        var formData = new FormData();

        $(filesToUpload).each(function (i, v) {
            formData.append('files[]', filesToUpload[i].file);
        });

        /* var domicilio = $('#file-domicilio')[0].files;
        formData.append('domicilio', domicilio[0]); */
        /* var recibo = $('#file-recibo')[0].files;
        formData.append('recibo', recibo[0]); */
        formData.append('id_propiedad', id_propiedad);
        const url = `${BASE_URL}Mattes/Api/Arrendador_api/Propiedad_archivos`;

        $.ajax({
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (data) {
                if (data.status == 200) {
                    $('#mdConfirm').modal('toggle');
                    //$('#modal_enviar').modal('show');
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
            error: function (data) {
                alert("ERROR - " + data.responseText);
            }
        });

    }




       /*  var domicilio = $('#file-domicilio')[0].files;
        if (domicilio.length == 0) {
            Toastify({
                text: "Sube comprobante de domicilio",
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
            var recibo = $('#file-recibo')[0].files;
            if (recibo.length == 0) {
                Toastify({
                    text: "Sube un recibo",
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
                var formData = new FormData();

                $(filesToUpload).each(function (i, v) {
                    formData.append('files[]', filesToUpload[i].file);
                });

                var domicilio = $('#file-domicilio')[0].files;
                formData.append('domicilio', domicilio[0]);
                var recibo = $('#file-recibo')[0].files;
                formData.append('recibo', recibo[0]);

                formData.append('id_propiedad', id_propiedad);

                const url = `${BASE_URL}Mattes/Api/Arrendador_api/Propiedad_archivos`;

                $.ajax({
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: "POST",
                    success: function (data) {
                        if (data.status == 200) {
                            $('#mdConfirm').modal('toggle');
                            //$('#modal_enviar').modal('show');
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
                    error: function (data) {
                        alert("ERROR - " + data.responseText);
                    }
                });
 */
                /* if( $('#terminos').is(':checked') ) {
                    

                }else{
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
            
            //}
        //}
    //}

});

//comprante de domicilio//

/* $(document).on('change', '#file-domicilio', function () {

    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop().toLowerCase();

    if (ext == "pdf" || ext =='png' || ext =='jpg' || ext =='jpeg') {
        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
        } else {
            textbox.text(filesCount + ' files selected');
        }

    } else {
        $(this).val('');
        Toastify({
            text: "El archivo debe ser pdf o imagen",
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

    var filesCount2 = $(this)[0].files.length;
    var textbox2 = $(this).prev();
    var ext2 = $(this).val().split('.').pop().toLowerCase();

    if (ext2 == "pdf" || ext2 =='png' || ext2 =='jpg' || ext2 =='jpeg') {
        if (filesCount2 == 1) {
            var fileName2 = $(this).val().split('\\').pop();
            textbox2.text(fileName2);
        } else {
            textbox2.text(filesCount2 + ' files selected');
        }

    } else {
        $(this).val('');
        Toastify({
            text: "El archivo debe ser pdf",
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
}); */