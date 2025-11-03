<!-- <?php

  //use vendor\autoload;

  //Este product access token es el del vendedor, en este caso el de nosotros como desarrolladores
  //MercadoPago\SDK::setAccessToken('TEST-7971775109331645-071918-28760388ba0f9271b1c8eec610ec8efa-167059581');

  //Objeto de preferencia
  //$preference = new MercadoPago\Preference();
  //$item = new MercadoPago\Item();
  //$item->id = $detalles[0]->prop_id;
  //$item->title = $detalles[0]->propiedad;
  //$item->quantity = 1;
  //$item->unit_price = $detalles[0]->price;
  //$item->currency_id = "MXN";

  //$preference->items = array($item);
  //$preference->back_urls = array(
    //"success" => base_url() . '/Mattes/Api/Arrendatario_api/Pagos/mercado_pago/' . $detalles[0]->prop_id,
    //"failure" => base_url() . '/Mattes/Arrendatario/Renta_propiedad/getData'
  //);

  //$preference->auto_return = "approved";
  //$preference->binary_mode = true;
  //$preference->save();
  //Pago 
  //$payment = new MercadoPago\Payment();
?> -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">

<!-- <style>
  .btn-openpay{
    text-transform: initial !important;
    border-radius: 20px !important;
    font-size: 14px;
    background-color: #2a8427 !important;
    border-color: #2a8427 !important;
    margin-left: 5px !important;
    padding: 9px 42px !important;
  }
  .pymnt-itm {
    margin: 0 0 3px;
    width: 780px;
  }
</style> -->

<div id="loader" class="modal fade show" style="display: none; padding-left: 0px;">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="d-flex ht-300 pos-relative align-items-center">
      <div class="sk-chasing-dots">
        <div class="sk-child sk-dot1 bg-red-800"></div>
        <div class="sk-child sk-dot2 bg-green-800"></div>
      </div>
    </div>
  </div>
</div>

<div class="alert bg-warning mg-t-100 d-none" id="succes-alert" role="alert">
  <button type="button" class="close" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
    <span><strong>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA</strong> <span id="success"></span></span>
  </div><!-- d-flex -->
</div><!-- alert -->

<section class="renta-alumno mg-t-100 mg-b-120">
  <div class="container">
    <div class="row">
      <div class="col-12 mg-b-120 mb-md-3 mb-lg-5">
        <h1 class="renta-propiedad-titulo mt-5 mb-5"><?= $title; ?></h1>
        <div class="row">
          <div class="col-lg-6 mt-lg-2">
            <div class="renta mx-auto">
              <figure>
                <img id="img-1" src="<?= base_url() ?>/writable/uploads/Mattes/Arrendador/<?= $images[0]['pickture'] ?>" class="img-fluid renta-propiedad" alt="">
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
             <!--  <div class="open_pay">
                <button class="btn btn-primary btn-openpay btn-block mg-b-10" data-toggle="modal" data-target="#modaldemo3">
                  OpenPay
                </button>

              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</section>


<!--OPEN PAY -->
<!-- <div id="modaldemo3" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content tx-size-sm">
        <div class="bkng-tb-cntnt">
          <div class="pymnts">
            <form  method="POST" id="payment-form">
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
                      <label>Apellido del titular</label><input name="last_name" type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" >
                    </div>
                  </div>

                  <div class="sctn-row">
                    <div class="sctn-col l">
                      <label>Correo</label><input name="email" type="email" placeholder="Correo electrónico" autocomplete="off">
                    </div>
                    <div class="sctn-col">
                      <label>Número de tarjeta</label><input type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="card_number">
                    </div>
                  </div>

                  <div class="sctn-row">
                    <div class="sctn-col l">
                      <label>Monto</label>
                      <input id="mount-openpay" name="amount" type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" readonly>
                      <input type="hidden" name="id_propiedad" id="idpro-openpay">
                    </div>
                  </div>


                  <div class="sctn-row">
                    <div class="sctn-col l">
                      <label>Fecha de expiración</label>
                      <div class="sctn-col half l"><input type="text" placeholder="Mes" data-openpay-card="expiration_month"></div>
                      <div class="sctn-col half l"><input type="text" placeholder="Año" data-openpay-card="expiration_year"></div>
                    </div>
                    <div class="sctn-col cvv"><label>Código de seguridad</label>
                      <div class="sctn-col half l"><input type="password" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2"></div>
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
      
    </div>
  </div>
</div> -->





<form method="POST" id="propiedad_id">
  <input class="id_propiedad" type="hidden" name="id" id="id">
</form>

<script>
  id_propiedad = <?php echo json_encode($id_propiedad); ?>;
  id_usuario = <?php echo json_encode($id_usuario); ?>;
  fecha_propiedad = <?php echo json_encode($detalles[0]->date_start); ?>;
  rent = <?php echo json_encode($detalles[0]->rent); ?>;
  detalles = <?php echo json_encode($detalles[0]); ?>;
  //preferencias = <?php //echo json_encode($preference->id); ?>;
  let monto = <?php echo json_encode($detalles[0]->price); ?>;
  let idpro = <?php echo json_encode($id_propiedad); ?>;

  


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
      
              }
             // $('#loader').toggle();

            },
            error: function(xhr, text_status) {
            
             // $('#loader').toggle();

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





