/* document.getElementById("continuarprop").disabled = true;

$(".square").on("click", function() {
    document.getElementById("continuarprop").disabled = false;
}); */


$(".continuarprop").on("click", function() {
    //const radios = $('input:radio[name=tipo_prop]:checked').val();
    var url = BASE_URL + 'Mattes/Api/Arrendador_api/Primeravez';
    let id_buton = $(this).attr('id');

    //alert(id_buton);

    let social = {
        tipo_persona: id_buton
    };

    $.ajax({
        url: url,
        type: "POST",
        data: JSON.stringify(social),
        dataType: 'json',

        success: function(result) {
            console.log(result);
            switch (result.tipo) {
                case 1:
                    location.href = BASE_URL + "datos-propietario";
                    break;
                case 2:
                    location.href = BASE_URL + "datos-inmobiliaria";
                    break;
            }

        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
            $('#loader').toggle();
            $('#error-alert').show();
            $('#error').text(' HA OCURRIDO UN ERROR INESPERADO');

        }
    });



});