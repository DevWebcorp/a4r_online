/* $(".docs").hide();

$('#rubro').on('change', function () {
   let id_rubro = $(this).val();
   
    switch (id_rubro) {
        case "1":
            $(".docs").show();
            $("#docs").empty();
            $("#docs").append('<option  value="">Selecciona una opción</option>');
            $("#docs").append('<option  value="1">Hombres, Mujeres y No especifican</option>');
            $("#docs").append('<option  value="2">Estados de origen</option>');
            $("#docs").append('<option  value="3">Dominios de correo</option>');
            //$("#docs").append('<option  value="4">Dominios de correo</option>');
        break;
        case "2":
            $(".docs").show();
            $("#docs").empty();
            $("#docs").append('<option  value="">Selecciona una opción</option>');
            $("#docs").append('<option  value="5">Tipos de propietarios</option>');
            $("#docs").append('<option  value="6">Propiedades por usuario</option>');
            $("#docs").append('<option  value="7">Registrados sin propiedades</option>');
            $("#docs").append('<option  value="8">Registrados con propiedades</option>');
        break;
        case "3":
            $(".docs").show();
            $("#docs").empty();
            $("#docs").append('<option  value="">Selecciona una opción</option>');
            $("#docs").append('<option  value="9">Propiedades dadas de alta</option>');
            $("#docs").append('<option  value="10">Tipos de propiedades</option>');
            $("#docs").append('<option  value="11">Tipo de propiedad más rentada </option>');
            $("#docs").append('<option  value="12">Numero de baños y roomies por propiedad</option>');
            $("#docs").append('<option  value="13">Universidad con más propiedades</option>');
            $("#docs").append('<option  value="14">Propiedades verificadas</option>');
            $("#docs").append('<option  value="15">Propiedades con sello Mattes</option>');
        break;
    }
}); */

$(document).on('click', '#exportar', function() {
    let id_docs = $("#rubro").val();
    const url = `${BASE_URL}Mattes/Api/Back_office_api/Reporte_rest`;

    //AJAX.
    $.ajax({
        url: url,
        type: 'POST',
        data: { id_docs: id_docs},
        success: function(result) {
            const blob = new Blob(["\uFEFF"+result], { type: 'text/csv; charset=utf-8' });
            const downloadUrl = URL.createObjectURL(blob);
            const a = document.createElement("a");
            a.href = downloadUrl;
            a.download = "reporte.csv";
            document.body.appendChild(a);
            a.click(); 
        }
        
    });
    return false;
});