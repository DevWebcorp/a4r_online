$(document).ready(function ()  {
    $(document).on('submit', '#recuperar', function() {
        let pass1 = $('#password').val();
        let pass2 = $('#confirm_password').val();

        if(pass1 == pass2) {
            var formData = new FormData($(this)[0]);

            const url = `${BASE_URL}Mattes/Api/Password_update`;

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                dataType: 'json',
                sucess: function(data) {
                    switch (data.status) {
                        case 200:
                            Toastify({
                                text: data.messages.success,
                                duration: 3000,
                                className: "info",
                                style: {
                                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                                },
                                offset: {
                                    x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                                    y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                                },

                            }).showToast();
                            location.href = BASE_URL + "Mattes/Arrendador/Index";
                            $('#loader').toggle();


                            break;

                        case 400:
                            Toastify({
                                text: data.messages.success,
                                duration: 3000,
                                className: "info",
                                style: {
                                    background: "linear-gradient(to right, #ef1717 , #f90202 )",
                                },
                                offset: {
                                    x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                                    y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                                },

                            }).showToast();
                            $('#loader').toggle();
                            break;

                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        } else {
            Toastify({
                text: "LAS CONTRASEÑAS NO COINCIDEN",
                duration: 3000,
                className: "info",
                style: {
                    background: "linear-gradient(to right, #ef1717 , #f90202 )",
                },
                offset: {
                    x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                    y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                },

            }).showToast();

        }
        return false;

    });

});