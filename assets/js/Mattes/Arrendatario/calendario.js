calendario();
    

function calendario(result) {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            locale: 'es',
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        slotLabelFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        },
        events: [{
                title: "Ocupado",
                start: "2022-07-17",
                end: "2022-07-20"
            },
            {
                title: "Ocupado",
                start: "2022-07-12T10:30:00",
                end: "2022-07-12T12:30:00"
            },
            {
                title: "Ocupado",
                start: "2022-07-12T12:00:00"
            },
            {
                title: "Ocupado",
                start: "2022-07-12T14:30:00"
            },
            {
                title: "Ocupado",
                start: "2022-07-12T17:30:00"
            },
            {
                title: "Ocupado",
                start: "2022-07-12T20:00:00"
            },
            {
                title: "Ocupado",
                start: "2022-07-13T07:00:00"
            }
        ],
        dateClick: function (info) {
            var date = info.dateStr;
            var view = calendar.view.type;
            

            switch (view) {
                case 'dayGridMonth':
                    calendar.changeView('timeGridDay', date);
                    break;

                case 'timeGridWeek':
                    calendar.changeView('timeGridDay', date);
                    break;

                case 'timeGridDay':
                    var fecha = Date.parse(info.dateStr)
                    var fecha2 = new Date(fecha).toLocaleString();
                    $('#fechaH').val(fecha2);
                    $("#id_propiedad").val(id_propiedad);
                    //alert(fecha2);
                    $('#modal_cita').modal();
                    break;
            }
        },
    });
    calendar.setOption('locale', 'es');
    $.each(result, function (index, value) {
        calendar.addEvent({
            title: value.NAME + " " + value.F_LAST_NAME,
            start: value.date_time,
            allDay: false,
            color: '#ff9f89'

        });

    });
    calendar.render();

}