let getVerificacion = () => {
    let url = `${BASE_URL}Mattes/Api/Back_office_api/Propietarios_Admin/userVerificado`;
    fetch(url).then(response => response.json()).catch(err => alert(err)).then(response => {
        activo = parseFloat(response['active'])
        console.log(activo)
        sec_filtros = document.getElementById('sec_filtros');
        alert_div = document.getElementById('succes-alert');
        if(activo == 0){ 
            $("#menu-navegacion").removeClass('head-section')
            if(sec_filtros){
                sec_filtros.classList.remove('mg-t-90');
            }
            if(alert_div){
                $("#succes-alert").removeClass('d-none');
            } else {
                $("#alert_correo").removeClass('d-none');
            }
        } else {
            if(sec_filtros){
                sec_filtros.classList.add('mg-t-90');
            }
            if(alert_div){
                $("#succes-alert").addClass('d-none');
            } else {
                $("#alert_correo").removeClass('d-none');
            }
            $("#menu-navegacion").addClass('head-section')
        }
    }).catch(err => alert(err));
}

$(document).on('ready', function(){
    console.log("SI ENTRA EL JS")
    getVerificacion();
});

$(document).on('click', '.close',  function(){
    sec_filtros = document.getElementById('sec_filtros');
    alert_div = document.getElementById('succes-alert');
    if(alert_div){
        $("#succes-alert").addClass('d-none');
    } else {
        $("#alert_correo").addClass('d-none');
    }
    $("#menu-navegacion").addClass('head-section');
    if(sec_filtros){
        sec_filtros.classList.add('mg-t-90');
    }
});