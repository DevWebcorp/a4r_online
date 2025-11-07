<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<link href="<?= base_url() ?>../../../assets/lib/SpinKit/spinkit.css" rel="stylesheet">

<style>
    /*  .notificacion2 {
        background-color: red !important;
        color: #fff !important;
        top: 0 !important;
        border-radius: 10px !important;
        padding: 0 7px !important;
        font-family: 'Gothicb' !important;
        font-size: 14px !important;

    } */

    .new {
        color: #fff;
        text-transform: uppercase;
        font-weight: 700;
        background: linear-gradient(to right, #095fab 10%, #25abe8 50%, #57d75b 60%);
        background-size: auto auto;
        background-clip: border-box;
        background-size: 200% auto;
        color: #fff;
        background-clip: text;
        text-fill-color: transparent;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: textclip 1.5s linear infinite;
        display: inline-block;
    }

    @keyframes textclip {
        to {
            background-position: 200% center;
        }
    }
    
</style>

<div class="alert bg-warning mg-t-100 d-none" id="succes-alert" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA <span id="success"></span></span>
    </div><!-- d-flex -->
</div><!-- alert -->

<div id="loader" class="modal fade show" style="display: none; padding-left: 0px; z-index: 999999999;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="d-flex ht-300 pos-relative align-items-center">
            <div class="sk-chasing-dots">
                <div class="sk-child sk-dot1 bg-red-800"></div>
                <div class="sk-child sk-dot2 bg-green-800"></div>
            </div>
        </div>
    </div>
</div>

<section class="propiedades mg-t-200 mb-200 height-notificaciones">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                    <li class="nav-item ml-lg-3 mr-2" role="presentation">
                        <a class="nav-link active pos-relative" id="visita-tab" data-toggle="tab" href="#visita" role="tab" aria-controls="visita" aria-selected="true">Visitas a propiedades <span id="noti-visitas"></span></a>
                    </li>

                    <li class="nav-item  mr-2" role="presentation" id="tb-questions">
                        <a class="nav-link pos-relative" id="pregunta-tab" data-toggle="tab" href="#pregunta" role="tab" aria-controls="pregunta" aria-selected="false">Dudas de propiedades&nbsp<span id="noti-preguntas" class="notificacion-preguntas "></span></a>

                    </li>
                    <!--  <a class="nav-link" id="pregunta-tab" data-toggle="tab" href="#pregunta" role="tab" aria-controls="pregunta" aria-selected="false">Pregunta de tus propiedades&nbsp<span class="notificacion-preguntas">1</span></a> -->

                    <li class="nav-item" role="presentation" id="tb-comunicados">
                        <a class="nav-link pos-relative" id="mensajes_chat" data-toggle="tab" href="#comunicados" role="tab" aria-controls="comunicados" aria-selected="false">Comunicación con Mattes&nbsp<span id="noti-comunicacion"></span> </a>
                    </li>
                </ul>
                <div class="tab-content height-visitas" id="myTabContent">
                    <div class="tab-pane fade show active" id="visita" role="tabpanel" aria-labelledby="visita-tab">
                        <table id="data-citas" class="table table-bordered display table-responsive mt-3 tablas_mattes " style="width: 100%;">
                            <thead style="border-radius: 10px !important;">
                                <tr>
                                    <th>Propiedad</th>
                                    <th class="wd-15p">Universidad</th>
                                    <th>Propietario</th>
                                    <th>Correo del propietario</th>
                                    <th>Teléfono del propietario</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Confirmación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade height-preguntas" id="pregunta" role="tabpanel" aria-labelledby="pregunta-tab">
                        <table id="preguntas_propiedades" class="table display table-bordered table-responsive mt-3 tablas_mattes pregunta" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Propiedad</th>
                                    <th>Estatus</th>
                                    <th>Universidad</th>
                                    <th>Propietario</th>
                                    <th>Pregunta</th>
                                    <th>Respuesta</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="comunicados" role="tabpanel" aria-labelledby="comunicados-tab">
                        <div class="container">
                            <div class="row form-border">
                                <div class="col-lg-12 col-md-6">
                                    <div class="row chat-box">

                                    </div>
                                    <form method="post" name="conversacion" id="conversacion" enctype="multipart/form-data">
                                        <div class="col-12 mg-t-30 px-0">
                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 px-0">
                                                <input id="contestacion" name="contestacion" type="text" class="borde form-control" placeholder="Escribe tu mensaje" required>
                                                <input id="renter" name="renter" type="hidden" class="form-control">
                                                <input id="conver_id" name="conver_id" type="hidden" class="form-control">
                                            </div>
                                            <div class="form-layout-footer text-right mg-t-30 mb-5">
                                                <button id="enviar_msg" class="btn-aceptar mt-4 px-4 py-2" style="float: right; font-size: 16px;" type="submit"><i class="fa fa-paper-plane-o fa-lg mr-1" aria-hidden="true"></i>
                                                    Enviar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <input id="n_renter" name="n_renter" type="hidden" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Modal cancelar -->
<div id="show_cancelar_cita" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-danger pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Cancelar cita</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-lg">
                <div class="pd-80 pd-sm-80 form-layout form-layout-4">
                    <h6 style="text-align:center;">¿Deseas continuar con esta acción?</h6>
                    <br>
                    <p style="color:red; text-align:center;">No se podrán deshacer las acciones una vez realizada la acción</p>
                    <input type="hidden" name="idcrofter" id="idcrofter">
                    <input type="hidden" name="idcita" id="id_cita">
                </div><!-- card -->
            </div>

            <div class="modal-footer">
                <button id="cancelar_cita" type="button" class="btn btn-danger pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!--Modal reasignar -->
 <div id="show_reasignar_cita" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-warning pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Reasignar cita</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                
                <form id="form_reasignar_cita">
                    <div class="mg-t-20">
                        <label class="form-control-label">Fecha: </label>
                        <div class="mg-sm-t-0">
                            <input id="fechaH" class="form-control" type="date" name="fecha" required>
                        </div>
                    </div>
                    <div class="mg-t-20">
                        <label class="form-control-label">Horas disponibles: </label>
                        <div class="mg-sm-t-0">
                            <select id="horasdisp" class="form-control" type="date" name="horasdisp" required>
                                <option value="">Seleccione una hora</option>
                            </select>
                        </div>
                    </div>
                    <div class="mg-t-20">
                        <label class="form-control-label">Comentarios: <span class="tx-danger"></span></label>
                        <div class="mg-sm-t-0">
                            <textarea rows="3" id="comentarios" name="comentarios" class="form-control" placeholder="Comentarios de la cita"></textarea>
                        </div>
                    </div>

                    <div class="mg-t-20">
                        <input type="hidden" name="idcita" id="idcita_r">
                        <input type="hidden" name="id_crofter" id="idcrofter_r">
                    </div>

                    <div class="modal-footer">
                        <div class="mg-t-20">
                            <button id="reasignar_cita" type="submit" class="btn btn-warning pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                        </div>
                        <div class="mg-t-20">
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 


<form method="POST" id="propiedad_id">
    <input class="id_propiedad" type="hidden" name="id" id="id">
</form>

<script>
    let id_usuario = <?php echo json_encode($id_usuario); ?>;
    let id_group = <?php echo json_encode($group); ?>;

    setTimeout(function() {
        const url = `${BASE_URL}Mattes/Api/Arrendador_api/Conversacion_rest/noti_visitas`;
        $.ajax({
            url: url,
            type: "GET",
            //data: data,
            success: function(data) {
                if (data == 0) {
                    $('#noti-visitas').text("");
                }
            },
            dataType: "json",

        });

    }, 5000);

    //preguntas


    $('#tb-questions').on('click', function() {
        const url = `${BASE_URL}Mattes/Api/Arrendador_api/Conversacion_rest/noti_preguntas`;
        $.ajax({
            url: url,
            type: "GET",
            //data: data,
            success: function(data) {
                if (data == 0) {
                    $('.notificacion-preguntas').text("");
                }
            },
            dataType: "json",

        });
    });

    //comunicacion

    $('#tb-comunicados').on('click', function() {
        const url = `${BASE_URL}Mattes/Api/Arrendador_api/Conversacion_rest/noti_comunicacion`;
        $.ajax({
            url: url,
            type: "GET",
            //data: data,
            success: function(data) {
                if (data == 0) {
                    $('#noti-comunicacion').text("");
                }
            },
            dataType: "json",

        });
    });
</script>