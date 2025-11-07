/*  Inserta y quita la clase ".icono-cerrar" al boton del menú*/
$('#menu-navegacion .navbar-toggler').click(function () {
    $('.boton-menu').toggleClass('icono-cerrar');
});

/*Al hacer click en un enlace del menú principal */
$('#menu-navegacion .navbar-nav a').click(function () {
    /* 1) Quita la clase ".icono-cerrar" */
    $('.boton-menu').removeClass('icono-cerrar');
    /*2) Contrae el menu */
    $('#menu-navegacion .navbar-collapse').collapse('hide');
});


const input_uni = document.getElementById("autoComplete");

if(input_uni){
    const autoCompleteJS = new autoComplete({
        placeHolder: "Busca tu universidad...",
        threshold: 2,
        diacritics: true,
        data: {
            src: async (query) => {
                try {
                    console.log(query)
                    const source = await fetch(`${BASE_URL}Mattes/Api/Arrendador_api/Propiedad_ubicacion/get_universidades/${query}`);
                    const data = await source.json();
                    return data;
    
                } catch (error) {
                    return error;
                }
            },
            keys: ["name", "state"],
        },
    
    
        resultsList: {
            tag: "ul",
            id: "autoComplete_list",
            class: "results_list",
            destination: "#autoComplete",
            position: "afterend",
            maxResults: 100,
            noResults: true,
            element: (list, data) => {
                if(!data.results.length){
                    const message = document.createElement("div");
                    message.setAttribute("class", "no_result");
                    message.innerHTML = `<span>Ningún resultado para "${data.query}"</span>`;
                    list.appendChild(message);
                }
                list.setAttribute("data-parent", "food-list");
            },
        },
    
        resultItem: {
            highlight: true,
            element: (item, data) => {
                item.innerHTML = `
                <span style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                ${data.match}
              </span>
                
                <span style="display: flex; align-items: center; font-size: 13px; font-weight: 100; text-transform: uppercase; color: rgba(0,0,0,.2);">
                ${data.value.state}
                </span>`;
            },
    
        },
    
        events: {
            input: {
                selection: (event) => {
                    /*  console.log(event);
                     console.log(event.detail.selection.value.latitude); */
                    $("#autoComplete").val(event.detail.selection.value.name);
                    $("#uni_name").val(event.detail.selection.value.name);
                    $("#id_univ").val(event.detail.selection.value.id);
                    $("#univ").val(event.detail.selection.value.id);
                    uni_lat = event.detail.selection.value.latitude;
                    uni_long = event.detail.selection.value.longitude;
                    $("#latitud").val(event.detail.selection.value.latitude);
                    $("#longitud").val(event.detail.selection.value.longitude);

                    if(flag_university){
                        setTimeout(() => {
                            caltularDistance()
                        }, 2000);
                    }
                }
            }
        }
    });
}


 
