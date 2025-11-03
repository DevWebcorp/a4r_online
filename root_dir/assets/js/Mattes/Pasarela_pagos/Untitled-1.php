<?php

use vendor\autoload;

//Agrega credenciales
//Este product access token es el del vendedor, en este caso el de nosotros como desarrolladores
MercadoPago\SDK::setAccessToken('TEST-7971775109331645-071918-28760388ba0f9271b1c8eec610ec8efa-167059581');
$preference = new MercadoPago\Preference();
$item = new MercadoPago\Item();
$item->id = $detalles[0]->prop_id;
$item->title = $detalles[0]->propiedad;
$item->quantity = 1;
$item->unit_price = $detalles[0]->price;
$item->currency_id = "MXN";

$preference->items = array($item);
//Captura de la informacion de ese pago que se acaba de realizar

//Urls a redireccionar cuando se haya terminado el pago
$preference->back_urls = array(
  "success" => base_url() . '/Mattes/Api/Arrendatario_api/Pagos/mercado_pago/' . $detalles[0]->prop_id,
  "failure" => base_url() . '/Mattes/Arrendatario/Renta_propiedad/getData'
);

$preference->auto_return = "approved";
$preference->binary_mode = true;
$preference->save();

//Pago 
$payment = new MercadoPago\Payment();
?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!--openpay -->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
<script type='text/javascript' src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>


<script>
  /*OPEN PAY*/


  /*  $(document).ready(function() {

     let monto = <?php echo json_encode($detalles[0]->price); ?>;
     let idpro = <?php echo json_encode($id_propiedad); ?>;

     OpenPay.setId('mzsshclu696xpm7n8qm9');
     OpenPay.setApiKey('pk_d3a48ffe273343e491ec1877a9120dc9');
     OpenPay.setSandboxMode(true);
     //Se genera el id de dispositivo
     var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");

     $("#mount-openpay").val(monto);
     $("#idpro-openpay").val(idpro);

     $('#pay-button').on('click', function(event) {
       event.preventDefault();
       $("#pay-button").prop("disabled", true);
       OpenPay.token.extractFormAndCreate('payment-form', sucess_callbak, error_callbak);
     });

     var sucess_callbak = function(response) {
       var token_id = response.data.id;
       $('#token_id').val(token_id);
       //console.log(token_id);
       $('#payment-form').submit();

     };

     var error_callbak = function(response) {
       var desc = response.data.description != undefined ? response.data.description : response.message;
       alert("ERROR [" + response.status + "] " + desc);
       $("#pay-button").prop("disabled", false);
     };

   }); */

  prueba();

  function prueba() {
    //alert("prueba");
    $('#prueba-form').submit();
  }
</script>

<form id="prueba-form">
  <input type="text" value="hola" name="prueba_name">

</form>





<section class="renta-alumno mg-t-100 mg-b-120">
  <div class="container">
    <div class="row">
      <div class="col-12 mg-b-120 mb-md-3 mb-lg-5">
        <h1 class="renta-propiedad-titulo mt-5 mb-5"><?= $title; ?></h1>
        <div class="row">
          <div class="col-lg-6 mt-lg-2">
            <div class="renta mx-auto">
              <figure>
                <img id="img-1" src="<?= base_url() ?>/../../writable/uploads/Mattes/Arrendador/<?= $images[0]['pickture'] ?>" class="img-fluid renta-propiedad" alt="">
              </figure>
              <div class="info-renta">
                <p class="mb-2 text-uppercase titulo-propiedad " style="color: #0088F7;"><?= $detalles[0]->propiedad; ?></p>
                <p class="mb-2"><span class="detalle-renta">Precio: </span>$<?= $detalles[0]->price; ?></p>
                <p><span class="detalle-renta">Distancia <i class="fa fa-road" aria-hidden="true"></i>:</span> <span><?= $detalles[0]->km; ?></span> m</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="row text-center text-lg-left mg-t-20">
              <p class="col-lg-4 mt-2 titulo-propiedad" for="pago">Primera renta por: </p>
              <p class="precio mx-auto">$<?= $detalles[0]->price; ?></p>
            </div>

            <div class="row text-center text-lg-left rent">
              <p class="col-lg-4 mt-2 titulo-propiedad" for="pago">Disponibilidad: </p>
              <p class="col-lg-6 mt-2 mx-auto disponibilidad text-center">CASA RENTADA</p>
            </div>

            <div class="row flex-column ml-1">
              <p class="text-center text-lg-left titulo-propiedad mt-4 mt-lg-0">Selecciona fecha de entrada</p>
              <input type="date" id="disponibilidad" name="upd_disponibilidad" class="form__input" title="Solo se permiten formato de fecha" placeholder=" ">
            </div>
            <button type="button" id="procesar" class="col-lg-12 col-md-12 col-sm-12 mg-t-5 mg-l-5 agendar-cita btn-efect group fill">PROCEDER PAGO</button>


            <div id="mpagos" class="row mg-t-20 justify-content-center justify-content-lg-left d-none ">
              <p class="col-12 text-center text-lg-left titulo-propiedad">Métodos de pago</p>
              <div id="paypal-button-container"></div>
              <div class="cho-container"></div>
              <div class="open_pay">
                <button class="btn btn-primary btn-block mg-b-10" data-toggle="modal" data-target="#modaldemo3">
                  OpenPay
                </button>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</section>


<div id="modaldemo3" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">OpenPay</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <div class="bkng-tb-cntnt">
          <div class="pymnts">
            <form id="payment-form">
              <input type="hidden" name="token_id" id="token_id">
              <div class="pymnt-itm card active">
                <h2>Tarjeta de crédito o débito</h2>
                <div class="pymnt-cntnt">
                  <div class="card-expl">
                    <div class="credit">
                      <h4>Tarjetas de crédito</h4>
                    </div>
                    <div class="debit">
                      <h4>Tarjetas de débito</h4>
                    </div>
                  </div>
                  <div class="sctn-row">
                    <div class="sctn-col l">
                      <label>Nombre del titular</label><input name="name" type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name">
                    </div>
                    <div class="sctn-col">
                      <label>Apellido del titular</label><input name="last_name" type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name">
                    </div>
                  </div>

                  <div class="sctn-row">
                    <div class="sctn-col l">
                      <label>Correo</label><input name="email" type="text" autocomplete="off">
                    </div>
                    <div class="sctn-col">
                      <label>Número de tarjeta</label><input type="text" autocomplete="off" data-openpay-card="card_number">
                    </div>
                  </div>

                  <div class="sctn-row">
                    <div class="sctn-col l">
                      <label>Monto</label>
                      <input id="mount-openpay" name="amount" type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name" readonly>
                      <input type="hidden" id="idpro-openpay">
                    </div>
                  </div>


                  <div class="sctn-row">
                    <div class="sctn-col l">
                      <label>Fecha de expiración</label>
                      <div class="sctn-col half l"><input type="text" placeholder="Mes" data-openpay-card="expiration_month"></div>
                      <div class="sctn-col half l"><input type="text" placeholder="Año" data-openpay-card="expiration_year"></div>
                    </div>
                    <div class="sctn-col cvv"><label>Código de seguridad</label>
                      <div class="sctn-col half l"><input type="text" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2"></div>
                    </div>
                  </div>
                  <div class="openpay">
                    <div class="logo">Transacciones realizadas vía:</div>
                    <div class="shield">Tus pagos se realizan de forma segura con encriptación de 256 bits</div>
                  </div>
                  <div class="sctn-row">
                    <a class="button rght" id="pay-button">Pagar</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div><!-- modal-body -->
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->





<form method="POST" id="propiedad_id">
  <input class="id_propiedad" type="hidden" name="id" id="id">
</form>

<script>
  id_propiedad = <?php echo json_encode($id_propiedad); ?>;
  id_usuario = <?php echo json_encode($id_usuario); ?>;
  fecha_propiedad = <?php echo json_encode($detalles[0]->date_start); ?>;
  rent = <?php echo json_encode($detalles[0]->rent); ?>;

  if (rent == 1) {
    document.getElementById("procesar").disabled = true;
    document.getElementById("disponibilidad").readOnly = true;
    //console.log("CASA RENTADA");
  } else {
    document.getElementById("procesar").disabled = false;
    $('.rent').hide();
  }


  $("#procesar").click(function() {
    if ($('#disponibilidad').val().length == 0) {
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

          let fecha_entrada = $('#disponibilidad').val();
          let url = `${BASE_URL}Mattes/Api/Arrendatario_api/Pagos/getDate`;

          $.ajax({
            url: url,
            type: "POST",
            dataType: 'JSON',
            data: {
              "fecha": fecha_entrada
            },
            success: function(result) {
              console.log(result);
              if (result.status == 200) {
                $('#mpagos').removeClass('d-none');


              } else {
                //$('#error').text(result.error);
                //$('#error-alert').show();
                /* Toastify({
                  text: result.error,
                  duration: 3000,
                  className: "info",
                  style: {
                      background: "linear-gradient(to right, #00b09b, #96c93d)",
                  },
                  offset: {
                      x: 50,
                      y: 90 
                  },
                }).showToast(); */
              }
              $('#loader').toggle();

            },
            error: function(xhr, text_status) {
              //console.log(xhr, text_status);
              $('#loader').toggle();
              //$('#error-alert').show();
              //$('#error').text(' HA OCURRIDO UN ERROR INESPERADO');
              /* Toastify({
                text: "Ha ocurrido un error esperado",
                duration: 3000,
                className: "info",
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                offset: {
                    x: 50,
                    y: 90 
                },
              }).showToast();         */
            }
          });


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
</script>

<!--SDK de paypal -->
<script src="https://www.paypal.com/sdk/js?client-id=AbwiWVYj1M9Du_1g30QLLF8qY6hWkNMdRS7M3fcrZPqCvzdkUgMjyla_swf5kvzKWwVnkE91mH7meRxC&currency=MXN"></script>
<script>
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
            value: '<?= $detalles[0]->price; ?>' // Can also reference a variable or function
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
            } else {
              //$('#error').text(result.error);
              //$('#error-alert').show();
              /* Toastify({
                text: result.error,
                duration: 3000,
                className: "info",
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                offset: {
                    x: 50,
                    y: 90 
                },
              }).showToast(); */
            }
            $('#loader').toggle();

          },
          error: function(xhr, text_status) {
            //console.log(xhr, text_status);
            $('#loader').toggle();
            //$('#error-alert').show();
            //$('#error').text(' HA OCURRIDO UN ERROR INESPERADO');
            /* Toastify({
              text: "Ha ocurrido un error esperado",
              duration: 3000,
              className: "info",
              style: {
                  background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              offset: {
                  x: 50,
                  y: 90 
              },
            }).showToast();         */
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
</script>


<!-- SDK MercadoPago.js V2 -->
<script src="https://sdk.mercadopago.com/js/v2"></script>
<!-- <script src="<?= base_url() ?>/../../assets/js/Mattes/Arrendatario/Mercado_pago.js"></script> -->

<script>
  // Agrega credenciales de SDK
  const mp = new MercadoPago("TEST-4effdaf0-3ee1-4763-aa34-8b02fc5ad550", {
    locale: "es-MX",
  });


  // Inicializa el checkout
  mp.checkout({
    preference: {
      id: '<?= $preference->id; ?>',
      /*  payer: $('#disponibilidad').val() */

      //autoOpen: false,
    },
    render: {
      container: ".cho-container", // Indica el nombre de la clase donde se mostrará el botón de pago
      label: 'Mercado Pago', // Cambia el texto del botón de pago (opcional)
      img: " "

    },
    theme: {
      elementsColor: "#0088F7",
      headerColor: "#0088F7"
    },
  });

  //OPENPAY

  $(document).on('submit', '#form-bancarios', function() {
    alert("ayuda");
    var formData = new FormData($(this)[0]);
    console.log(formData);



    //const url = `${BASE_URL}Mattes/Arrendatario_api/PAgos/payOpenpay`;

    //AJAX.
    // $.ajax({
    //     url: url,
    //     type: 'POST',
    //     data: formData,
    //     dataType: 'json',
    //     success: function(data) {
    //         if (data.status == 200) {
    //             Toastify({
    //                 text: data.messages.success,
    //                 duration: 3000,
    //                 className: "info",
    //                 // avatar: "../../assets/img/logop.png",
    //                 style: {
    //                     background: "linear-gradient(to right, #00b09b, #96c93d)",
    //                 },
    //                 offset: {
    //                     x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
    //                     y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
    //                 },

    //             }).showToast();

    //             //$('#d_bancarios').attr('disabled', true);
    //             document.getElementById("d_fiscales").click();

    //         } else {
    //             Toastify({
    //                 text: data.messages.success,
    //                 duration: 3000,
    //                 className: "info",
    //                 // avatar: "../../assets/img/logop.png",
    //                 style: {
    //                     background: "linear-gradient(to right, #00b09b, #96c93d)",
    //                 },
    //                 offset: {
    //                     x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
    //                     y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
    //                 },

    //             }).showToast();
    //         }

    //     },
    //     cache: false,
    //     contentType: false,
    //     processData: false
    // });
    return false;
  });
</script>






