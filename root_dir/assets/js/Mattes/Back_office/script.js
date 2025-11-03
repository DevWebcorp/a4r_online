function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();


//FORMATO EN ESPAÑOL FECHA
moment.locale('es');

let listadopropiedades = $('#propiedades-bo').DataTable({
    
    processing: true, 
    serverSide: true, 
    lengthMenu: [
        [10, 25, 50, 999999],
        ['10 filas', '25 filas', '50 filas', 'Mostrar todo']
    ], 
    'ajax': {
        'url': `${BASE_URL}Mattes/Api/Back_office_api/Propiedades_status_rest`,
        'data': {
        },
        'type': 'post',
    },
    columns: [
        {
            data: 'Propiedad',
            render: function(data, type, row, meta) {
                return `<a href="${BASE_URL}datos-propiedad/${data}" target="_blank">${data}</a>`
            }
        },        
        {
            data: 'fecha',
            render: function(data, type, row, meta) {
                return moment(data).format('DD-MM-YYYY')
            }
        }, 
        {
            data: 'abrev',
            render: function(data, type, row, meta) {
                return  '<p class="text-center" title="' + row.descrip +'  ">' + row.abrev +
                ' </p>'
            }
        },       
        {
            data: 'prioridad'
        },       
    ],
    ordering: true,
     language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ Filas por página',
    },
    
    initComplete: function(settings, json) {
        $('#propiedades thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#propiedades thead');
        var api = this.api();
        api
            .columns()
            .eq(0)
            .each(function(colIdx) {
                // Set the header cell to contain the input element
                var cell = $('.filters th').eq(
                    $(api.column(colIdx).header()).index()
                );
                var title = $(cell).text();
                $(cell).html('<input type="text" class="text-center" placeholder="' + title + '" />');

                // On every keypress in this input
                $('input', $('.filters th').eq($(api.column(colIdx).header()).index()))
                    .off('keyup change')
                    .on('keyup change', function(e) {
                        e.stopPropagation();
                        // Get the search value
                        $(this).attr('title', $(this).val());
                        var regexr =
                            '({search})'; //$(this).parents('th').find('select').val();
                        var cursorPosition = this.selectionStart;
                        // Search the column for that value
                        api
                            .column(colIdx)
                            .search(

                                this.value
                            )
                            .draw();

                        $(this)
                            .focus()[0]
                            .setSelectionRange(cursorPosition, cursorPosition);
                    });
                });

            quitaClase();

            function quitaClase() {
                $('.filters').children().removeClass("sorting").removeClass("sorting_desc");
            } 
        }

});