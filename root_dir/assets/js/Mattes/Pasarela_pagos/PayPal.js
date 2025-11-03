
  paypal.Buttons({
    style: {
      color: 'gold',
      shape: 'pill',
      //label: 'pay', //texto pagar con
    },

    onInit: function(data, actions) {
      actions.disable();

      $("#disponibilidad").change(function() {
        if ($('#disponibilidad').val().length == 0) {
          actions.disable();
          Toastify({
            text: "SELECCIONA UNA FECHA",
            duration: 3000,
            className: "info",
            style: {
              background: "linear-gradient(to right, #00b09b, #96c93d)",
            },
            offset: {
              x: 50,
              y: 90
            },
          }).showToast();


        } else {
          fecha_entrada = $('#disponibilidad').val();
          const f1 = new Date(fecha_propiedad).getTime();
          const f2 = new Date(fecha_entrada).getTime();
          var f3 = new Date();
          f3.setMonth(f3.getMonth() + 3);
          fecha3meses = f3.getFullYear() + "-" + (f3.getMonth() + 1) + "-" + f3.getDate();
          var f3 = new Date(fecha3meses).getTime();

          if (f2 >= f1) {
            if (f2 <= f3) {
              actions.enable();

            } else {
              Toastify({
                text: "SELECCIONA UNA FECHA NO MAYOR A 3 MESES",
                duration: 3000,
                className: "info",
                style: {
                  background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                offset: {
                  x: 50,
                  y: 90
                },
              }).showToast();

            }

          } else {
            actions.disable();
            Toastify({
              text: "SELECCIONA UNA FECHA  DISPONIBLE",
              duration: 3000,
              className: "info",
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              offset: {
                x: 50,
                y: 90
              },
            }).showToast();

          }
        }


      });

    },
    onClick: function(data, actions) {

      fechaRenta = $('#disponibilidad').val();
      if (fechaRenta.length == 0) {
        //actions.disable();
        Toastify({
          text: "SELECCIONA UNA FECHA",
          duration: 3000,
          className: "info",
          style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
          },
          offset: {
            x: 50,
            y: 90
          },
        }).showToast();
      } else {


      }
    },

    createOrder: (data, actions) => {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: detalles.price // Can also reference a variable or function
            //value: value
          }
        }]
      });
    },

    onApprove: (data, actions) => {
      return actions.order.capture().then(function(detalles) {
        // console.log('Capture result', detalles, JSON.stringify(detalles, null, 2));
        const transaction = detalles.purchase_units[0].payments.captures[0];
        const create_time = `${transaction.create_time}`;
        const cantidad = `${transaction.amount.value}`;
        const folio = `${transaction.id}`;
        const url_str = `${BASE_URL}Mattes/Api/Arrendatario_api/Pagos`;

        data = {
          'alumno_user': id_usuario,
          'propiedad_id': id_propiedad,
          'costo': cantidad,
          'metodo': 'paypal',
          'id_transaccion': folio,
          'fecha': create_time,
          'fecha_entrada': fechaRenta

        }
        //console.log(data);
        $.ajax({
          url: url_str,
          type: "POST",
          dataType: 'JSON',
          data: data,
          success: function(result) {
            console.log(result);
            if (result.status == 200) {
              //$('#success').text(result.messages.success);
              Toastify({
                text: result.messages.success,
                duration: 3000,
                className: "info",
                style: {
                  background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                offset: {
                  x: 50,
                  y: 90
                },
              }).showToast();
            } else {
          
            }
            $('#loader').toggle();

          },
          error: function(xhr, text_status) {
            //console.log(xhr, text_status);
            $('#loader').toggle();
           
          }
        })

        //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
        //alert("Pago realizado con éxito"); 
        Toastify({
          text: data.messages.success,
          duration: 3000,
          className: "info",
          style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
          },
          offset: {
            x: 50,
            y: 90
          },
        }).showToast();
        // When ready to go live, remove the alert and show a success message within this page. For example:
        const element = document.getElementById('paypal-button-container');

        //element.innerHTML = '<h3>¡Gracias por tu pago!</h3>';
        // Or go to another URL:  
        //actions.redirect();
        location.href = BASE_URL + "Mattes/Arrendatario/Index";
        setTimeout(function() {
          location.href = BASE_URL + "Mattes/Arrendatario/Index";
        }, 3000);
      });
    },

    onCancel: function(data) {
      Toastify({
        text: "Pago cancelado",
        duration: 3000,
        className: "info",
        // avatar: "../../assets/img/logop.png",
        style: {
          background: "linear-gradient(to right, #ff0000, #e26f11)",
        },
        offset: {
          x: 50,
          y: 90
        },
      }).showToast();
      //console.log(data); //orderID
    },
  }).render('#paypal-button-container');
