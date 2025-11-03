get_propiedades();

function get_propiedades() {
    $('#loader').toggle();
    
    const url = `${BASE_URL}Mattes/Api/Arrendatario_api/Rentadas_rest`;
    //console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        success: function(result) {
            //console.log(result);
            const path = `${BASE_URL}writable/uploads/Mattes/Arrendador`;
            $(result).each(function(i, v) {
                let nombrencode = v.property.replace(' ', '-');
                let asignado = v.asignado;

                let html = `<a  href="${BASE_URL}detalle-propiedad/${nombrencode}" target="_blank">
                                <div id="${v.id_property}" class="grid-item">
                                    <figure>
                                        <img id="img-1" class=" w-100" src="${path}/${v.imagen}" alt="First slide">
                                    </figure>
                                        
                                <p class="info-casa text-uppercase mt-2"> ${v.property} </p>
                            </a>`;
                $(".grid").append(html);

                let btn_cal = `<a id="${v.id_property}" href="${BASE_URL}calificar/${nombrencode}" class="btn btn-secondary px-4 py-1 calificar"> <i class="fa fa-star" aria-hidden="true"></i> CALIFICAR</a>`;

                if(asignado == false){
                    $("#"+v.id_property).append(btn_cal);
                }
            });

            var grid = document.querySelector('.grid');
            imagesLoaded(grid, function() {
                // init Isotope after all images have loaded
                var $msnry = new Masonry(grid, {
                    // options
                    columnWidth: 10,
                    itemSelector: '.grid-item',
                    columnWidth: 25,
                    gutter: 15,
                    isFitWidth: true,
                    originLeft: false
                });

                //-------------------------------------//
                // hack CodePen to load pens as pages

                function getPenPath() {
                    const nextPenSlugs = [
                        '3d9a3b8092ebcf9bc4a72672b81df1ac',
                        '2cde50c59ea73c47aec5bd26343ce287',
                        'd83110c5f71ea23ba5800b6b1a4a95c4',
                    ];

                    let slug = nextPenSlugs[this.loadCount];
                    if (slug) return `/desandro/debug/${slug}`;
                }

            });
            $('#loader').toggle();
           
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
            $('#loader').toggle();
        }
    });
}
