var btnd = `<div class="row mg-t-10 justify-content-center" id="btndel">
    <button class = "btn btn-danger " type="button" id="btndel">
        <i class="fa fa-trash" aria-hidden="true"></i>
    </button>
</div>
`

$("#clone").click(function(){
    $("#nombre").clone(' ').appendTo("#dnombre");
    $("#correo").clone(' ').appendTo("#dcorreo");
   $(btnd).appendTo("#btns");
    //console.log("FUNCIONO");
});

$(document).on('click', '.btn-danger', function() {
    //console.log("PASO")
    $("#nombre").remove();
    $("#correo").remove();
    $("#btndel").remove();
    //alert("has pulsado");
}); 

$(document).ready(function() {
    $(document).on('submit', '#beneficios_invitacion', function() {
        //document.getElementById("Bancarios").click();

        //Obtenemos datos formulario.
        //var form = $("#form-personales");
        var formData = new FormData($(this)[0]);
        //document.getElementById("d_bancarios").click();
        //
        const url = `${BASE_URL}Mattes/Api/Arrendador_api/Benefits_rest`;

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
                        duration: 7000,
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

                    $('#id').val(data.id);
                    $("#nombre").val(" ");
                    $("#correo").val(" ");
                    setTimeout("location.reload()",3000);
                    //setInterval("location.reload()",3000);
                    //window.location.reload();


                    //location.href = BASE_URL + "Mattes/Arrendador/Propiedad_ubicacion";

                } else {
                    Toastify({
                        text: data.messages.success,
                        duration: 7000,
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
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    });
});


