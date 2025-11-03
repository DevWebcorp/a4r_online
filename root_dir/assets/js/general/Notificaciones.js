
//////////LONG POLLING AJAX ///////////////////


const ruta = `${BASE_URL}Mattes/Api/General/Notificaciones`;
(function poll(){

    $.ajax({
        url: ruta,
        type: "GET",
        //data: data,
        success: function(data){
            if(data != 0){
                $('.notificacion-general').addClass('notificacion');
                $('.notificacion-general').text(data);
            }
        },
        dataType: "json",
       complete: function () {
            setTimeout(poll, 60000);
        },
        timeout: 60000
    });
})();


////////////FUNCION DE CAMBIO DE ESTADO /////////

   $(".noti").on("click", function() {
      //alert("di un click");
      const url = `${BASE_URL}Mattes/Api/General/Notificaciones/status`;
        $.ajax({
            type: "GET",
            url: url,
           
            success: function(result) {
                console.log(result);
                location.href = result;
               // console.log(data);
            },
          });  
    }); 

    //notificaciones visitas //

    get_visitas();
    get_dudas();
    get_comunicacion();

    function get_visitas(){
       
        const url = `${BASE_URL}Mattes/Api/General/Notificaciones/notificaciones_visitas`;

        $.ajax({
            url: url,
            type: "GET",
            //data: data,
            success: function(data){
                if(data != 0){
                    $('#noti-visitas').addClass('notificacion');
                    $('#noti-visitas').text(data);
                }  
            },
            dataType: "json",
         
        });
    }


    function get_dudas(){
       
        const url = `${BASE_URL}Mattes/Api/General/Notificaciones/notificaciones_preguntas`;

        $.ajax({
            url: url,
            type: "GET",
            //data: data,
            success: function(data){
                if(data != 0){
                    $('#noti-preguntas').addClass('notificacion');
                    $('#noti-preguntas').text(data);
                }  
              
               
            },
            dataType: "json",
          
        });
    }

    function get_comunicacion(){
        const url = `${BASE_URL}Mattes/Api/General/Notificaciones/notificaciones_cominucacion`;

        $.ajax({
            url: url,
            type: "GET",
            //data: data,
            success: function(data){
                if(data != 0){
                    $('#noti-comunicacion').addClass('notificacion');
                    $('#noti-comunicacion').text(data);
                }  
               
               
            },
            dataType: "json",
          
        });
    }





  





