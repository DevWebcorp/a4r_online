
get_messages();
if(id_group == 4) {
    get_datos_alumno();
    
    $("#propiedad").val(id_propiedad);
    $("#renter").val(id_renter);
} else if (id_group == 3 || id_group == 5) {
    get_datos_propietario();
    $("#propiedad").val(id_propiedad);
    $("#renter").val(id_renter);

}

function get_datos_alumno() {
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Conversacion_rest/get_datos`;
    data = { id_propiedad : id_propiedad}

   $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function(result) {
            // DATOS PROPIEDAD
            var titulo = result['propiedad'][0]['propiedad'];
            var precio = "$"+result['propiedad'][0]['precio'];
            var nombre_p = result['propiedad'][0]['nombre_p'];
            var apellido_p = result['propiedad'][0]['firstname_p'];
            var apellido_m = result['propiedad'][0]['secondname_p'];
            var propietario = `<span>`+nombre_p + apellido_p + apellido_m+`</span>`

            // DATOS USUARIO
            var usuario_n = result['usuario'][0]['name'];
            var usuario_ap = result['usuario'][0]['first_name'];
            var usuario_am = result['usuario'][0]['second_name'];
            var usuario = `<span>`+usuario_n +" " + usuario_ap + " " + usuario_am+`</span>`
            
            $("#nombre").val(titulo);
            $("#renta").val(precio);
            $(".usuario").append(propietario);
            $(".propietario").append(usuario);

        },
        error: function(error) {
            alert(error);
       }
    }); 
}

function get_datos_propietario() {
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Conversacion_rest/get_datos_arrendador`;
    data = { 
        id_propiedad : id_propiedad,
        id_renter : id_renter
    }

   $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function(result) {
            //console.log(result);
            // DATOS PROPIEDAD
            var titulo = result['propiedad'][0]['propiedad'];
            var precio = "$"+result['propiedad'][0]['precio'];
            var nombre_p = result['propiedad'][0]['nombre_p'];
            var apellido_p = result['propiedad'][0]['firstname_p'];
            var apellido_m = result['propiedad'][0]['secondname_p'];
            var propietario = `<span>`+nombre_p + apellido_p + apellido_m+`</span>`

            // DATOS USUARIO
            var usuario_n = result['usuario'][0]['name'];
            var usuario_ap = result['usuario'][0]['first_name'];
            var usuario_am = result['usuario'][0]['second_name'];
            var usuario = `<span>`+usuario_n +" " + usuario_ap + " " + usuario_am+`</span>`
            
            $("#nombre").val(titulo);
            $("#renta").val(precio);
            $(".usuario").append(usuario);
            $(".propietario").append(propietario);

        },
        error: function(error) {
            alert(error);
       }
    }); 
}

function get_messages(){
    const url = `${BASE_URL}Mattes/Api/Arrendador_api/Conversacion_rest/get_messages`;
    data = { 
        id_conversacion : id_conversacion
    }

   $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function(result) {
            //console.log(result);
            $(result).each(function(i, v) {
                if(id_group == 4){
                    if(v.submit_msg == 1){
                        let html = ` <div class="col-md-7 ml-auto">
                        <div class="respuesta">
                            <p class="text-right pb-0 propietario"><i class="fa fa-user-circle fa-lg mr-1" aria-hidden="true"></i></p>
                            <p class="borde enviado">${v.msg}<br></p>
                        </div>
                    </div>`;
                        
                        $(".chat-box").append(html);
                        
                    } else {
                        let html = ` <div class="col-md-7">
                        <div class="usuario-mattes">
                            <p class="pt-3 pb-0 usuario"><i class="fa fa-user fa-lg mr-1" aria-hidden="true"></i></p>
                            <p class="borde recibido">${v.msg}<br></p>
                        </div>
                    </div>`;
                        
                        $(".chat-box").append(html);
                    }
                    
                } else if (id_group == 3 || id_group == 5) {
                    if(v.submit_msg == 0){
                        let html = ` <div class="col-md-7 ml-auto">
                        <div class="respuesta">
                            <p class="text-right pb-0 propietario"><i class="fa fa-user-circle fa-lg mr-1" aria-hidden="true"></i></p>
                            <p class="borde enviado">${v.msg}<br></p>
                        </div>
                    </div>`;
                        
                        $(".chat-box").append(html);
                    } else {
                        let html = ` <div class="col-md-7">
                        <div class="usuario-mattes">
                            <p class="pt-3 pb-0 usuario"><i class="fa fa-user fa-lg mr-1" aria-hidden="true"></i></p>
                            <p class="borde recibido">${v.msg}<br></p>
                        </div>
                    </div>`;
                        
                        $(".chat-box").append(html);
                        
                    }

                }
                
            });
        },
        error: function(error) {
            alert(error);
       }
    }); 
}


$(document).on('submit', '#conversacion', function(e) {
    e.preventDefault();
    $('#loader').toggle();
    document.getElementById("enviar_msg").disabled = true;
    var formData = new FormData($(this)[0]);
    const url_chat = `${BASE_URL}Mattes/Api/Arrendador_api/Conversacion_rest/chat_box`
    
    //AJAX.
    $.ajax({
        url: url_chat,
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(data) {
            //console.log(data);
            document.getElementById("contestacion").value = "";
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
                window.location.reload();
                document.getElementById("enviar_msg").disabled = false;
                    
    
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
       
    return false;  
});
