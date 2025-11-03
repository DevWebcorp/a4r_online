get_messages();
get_nombre();
$("#renter").val(id_usuario);
console.log(id_usuario);

$('#mensajes_chat').on('click', function() {

    const url = `${BASE_URL}Mattes/Api/Back_office_api/ConversacionBO_rest/insert_conver`;
    data = { 
        id_usuario : id_usuario
    }

   $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function(result) {
            $("#conver_id").val(result);
        },
        error: function(error) {
            alert(error);
       }
    }); 
});

// CONVERSACION
$(document).on('submit', '#conversacion', function(e) {
    e.preventDefault();
    $('#loader').toggle();
    document.getElementById("enviar_msg").disabled = true;
    var formData = new FormData($(this)[0]);
    const url_chat = `${BASE_URL}Mattes/Api/Back_office_api/ConversacionBO_rest/chat_box`
    
    //AJAX.
    $.ajax({
        url: url_chat,
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(data) {
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
                
                if(id_group == 2){
                    let html = ` <div class="col-md-7 ml-auto">
                        <div class="respuesta">
                        <p class="text-right pb-0 propietario"><i class="fa fa-user-circle fa-lg mr-1" aria-hidden="true"></i>Mattes</p>
                        <p class="borde enviado">${data.messages.msg}<br></p>
                        </div>
                    </div>`;
                    $(".chat-box").append(html);
                } else {
                    let nombre = $("#n_renter").val();
                    let html = ` <div class="col-md-7 ml-auto">
                        <div class="respuesta">
                        <p class="text-right pb-0 propietario"><i class="fa fa-user-circle fa-lg mr-1" aria-hidden="true"></i>${nombre}</p>
                        <p class="borde enviado">${data.messages.msg}<br></p>
                        </div>
                    </div>`;
                    $(".chat-box").append(html);
                }
                document.getElementById("enviar_msg").disabled = false;   
                $('#loader').toggle();
    
            } else {
                Toastify({
                    text: data.messages.success,
                    duration: 3000,
                    className: "info",
                    // avatar: "../../assets/img/logop.png",
                    style: {
                        background: "linear-gradient(to right, #d51d1d, #ee8412)",
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

function get_messages(){
    $('#loader').toggle();
    const url = `${BASE_URL}Mattes/Api/Back_office_api/ConversacionBO_rest/get_messages`;
    data = { 
        id_usuario : id_usuario
    }

   $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function(result) {
            //console.log(result);
            $(result).each(function(i, v) {
                if(id_group == 2 ){
                    if(v.submit_msg == 0){
                        let html = ` <div class="col-md-7 ml-auto">
                        <div class="respuesta">
                            <p class="text-right pb-0 propietario"><i class="fa fa-user-circle fa-lg mr-1" aria-hidden="true"></i>Mattes</p>
                            <p class="borde enviado">${v.msg}<br></p>
                        </div>
                    </div>`;
                        
                        $(".chat-box").append(html);
                        
                    } else {
                        if(v.arrendador == null){
                            var nombre = v.arrendatario;
                        } else {
                            var nombre = v.arrendador;
                        }
                        let html = ` <div class="col-md-7">
                        <div class="usuario-mattes">
                            <p class="pt-3 pb-0 usuario"><i class="fa fa-user fa-lg mr-1" aria-hidden="true"></i>${nombre}</p>
                            <p class="borde recibido">${v.msg}<br></p>
                            </div>
                        </div>`;
                        
                        $(".chat-box").append(html);
                        
                    }
                    
                } else  {
                    if(v.submit_msg == 1){
                        if(v.arrendador == null){
                            var nombre = v.arrendatario;
                        } else {
                            var nombre = v.arrendador;
                        }
                        let html = ` <div class="col-md-7 ml-auto">
                        <div class="respuesta">
                            <p class="text-right pb-0 usuario"><i class="fa fa-user-circle fa-lg mr-1" aria-hidden="true"></i>${nombre}</p>
                            <p class="borde enviado">${v.msg}<br></p>
                        </div>
                    </div>`;
                        
                        $(".chat-box").append(html);
                    } else {
                        let html = ` <div class="col-md-7">
                        <div class="usuario-mattes">
                            <p class="pt-3 pb-0 propietario"><i class="fa fa-user fa-lg mr-1" aria-hidden="true"></i>Mattes</p>
                            <p class="borde recibido">${v.msg}<br></p>
                        </div>
                    </div>`;
                        
                        $(".chat-box").append(html);
                        
                    }

                }
                
            });
            $('#loader').toggle();
        },
        error: function(error) {
            alert(error);
       }
    }); 
}

function get_nombre(){
    const url = `${BASE_URL}Mattes/Api/Back_office_api/ConversacionBO_rest/get_datos`;
    data = { 
        id_usuario : id_usuario
    }

   $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function(result) {
            $("#n_renter").val(result);
            $("#nombre").val(result);
        },
        error: function(error) {
            alert(error);
       }
    }); 
}