let admin_pro = $('#reporte_contacto').DataTable({
    lengthMenu: [
        [10, 25, 50, 999999],
        ['10 filas', '25 filas', '50 filas', 'Mostrar todo']
    ],
    'ajax': {
        'url': `${BASE_URL}Mattes/Api/Back_office_api/Reporte_rest/reporte_whats`,
        'data': {
        },
        'type': 'post',
    },
    columns: [
        {
            data: 'propiedad'
        },
        {
            data: 'propietario',
        },
        {
            data: 'tel_propietario',
        },
        {
            data: 'alumno'
        },
        {
            data: 'tel_alumno',
        },
        {
            data: 'fecha_contacto',
            render: function (data, type, row, meta){
                return moment(data).format('DD-MM-YYYY')
            }
        },
    ],
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ Filas por página',
    },
});