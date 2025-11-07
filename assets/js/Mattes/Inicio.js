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


const autoCompleteJS = new autoComplete({
    placeHolder: "Busca tu universidad...",
    threshold: 2,
    diacritics: true,
    data: {
        src: async (query) => {
            try {
                console.log(query)
                const source = await fetch(`${BASE_URL}Mattes/Api/Arrendador_api/Propiedad_ubicacion/get_universidades_prop/${query}`);
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
                $("#uni_name").val(event.detail.selection.value.name);
                $("#univ").val(event.detail.selection.value.id_university);
                $("#latitud").val(event.detail.selection.value.latitude);
                $("#longitud").val(event.detail.selection.value.longitude);
                $("#searchResult").empty();
                console.log(event.detail.selection.value.id_university);        
                send();
            }
        }
    }
});


function send() {
    $('#loader').toggle();
    setTimeout(function () {
        busqueda = document.getElementById("busqueda-prin");
        busqueda.submit();
    }, 1000);
}


