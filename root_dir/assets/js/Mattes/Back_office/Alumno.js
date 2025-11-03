//FORMATO EN ESPAÑOL FECHA
moment.locale('es');

let datacitas = $('#data-alumnos').DataTable({
    processing: true, 
    serverSide: true, 
    lengthMenu: [
        [10, 25, 50, 999999],
        ['10 filas', '25 filas', '50 filas', 'Mostrar todo']
    ],
    'ajax': {
        'url': `${BASE_URL}Mattes/Api/Back_office_api/Alumno_rest`,
        'data': {
            
        },
        'type': 'post',
    },
    columns: [
        {
            data: 'id',
            render: function(data, type, row, meta) {
                if(row.arrendatario == null){
                    return `<p>Sin nombre</p>`
                }else{
                    return `<a  href="${BASE_URL}detalle-alumno/${data}" target="_blank">${row.arrendatario}</a>`
                }
            }
        },
        {
            data: 'universidad'
        },
        {
            data: 'career',
        },
        {
            data: 'state',
        },
        {
            data: 'fecha_registro',
            render: function(data, type, row, meta) {
                return moment(data).format('DD-MM-YYYY')
            }
        },
        {
            data: 'phone',
        },
        {
            data: 'email',
    
        }, 
        
    ], 
    ordering: true,
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ Filas por página',
    }, 
    initComplete: function(settings, json) {
        $('#data-alumnos thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#data-alumnos thead');
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
                $('.filters').children().removeClass("sorting").removeClass("sorting_asc").removeClass("sorting_desc");
            }

    },

    
}); 
