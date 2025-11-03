//FORMATO EN ESPAÑOL FECHA
moment.locale('es');

nombrencode = "";

let datacitas = $('#mensajes-back').DataTable({
    'ajax': {
        'url': `${BASE_URL}Mattes/Api/Back_office_api/ConversacionBO_rest/get_convers`,
        'data': {
        },
        'type': 'post',
    },
    columns: [
        {
            data: 'id',
            render: function(data, type, row, meta) {
                if(row.arrendatario == null && row.groups =="5"){
                    return `<a  href="${BASE_URL}detalle-agente/${row.arrendatario_id}" target="_blank">${row.propietarios}</a>`
                } else if (row.arrendatario == null && row.groups == "3" && row.tipo == "1"){
                    return `<a  href="${BASE_URL}detalle-propietario/${row.arrendatario_id}" target="_blank">${row.propietarios}</a>`
                }else if (row.arrendatario == null && row.groups == "3" && row.tipo == "2"){
                    return `<a  href="${BASE_URL}detalle-empresa/${row.arrendatario_id}" target="_blank">${row.propietarios}</a>`
                } else {
                    return `<a href="${BASE_URL}detalle-alumno/${row.arrendatario_id}" target="_blank">${row.arrendatario}</a>`
                }
                
            }
        },
        {
            data: 'status',
            render: function(data, type, row, meta) {
                if(data == 0){
                    return `NO LEÍDO`
                } else {
                    return `LEÍDO`
                }
            }
            
        },
        {
            data: 'date',
            render: function(data, type, row, meta) {
                return moment(data).format('DD-MM-YYYY')
            }
        },
        
    ], 
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ Filas por página',
    }
}); 