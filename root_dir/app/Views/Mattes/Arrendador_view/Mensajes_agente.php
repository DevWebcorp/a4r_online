<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">
<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

<!-- <div id="loader" class="modal fade show" style="display: none; padding-left: 0px; z-index: 999999999;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="d-flex ht-300 pos-relative align-items-center">
            <div class="sk-chasing-dots">
                <div class="sk-child sk-dot1 bg-red-800"></div>
                <div class="sk-child sk-dot2 bg-green-800"></div>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="alert bg-warning mg-t-100 d-none" id="alert_correo" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span><strong>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA</strong> <span id="success"></span></span>
    </div>
</div> -->

<section class="propiedades mg-b-210">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
                    <li class="nav-item ml-lg-3 mr-2" role="presentation">
                        <a class="nav-link active" id="visita-tab" data-toggle="tab" href="#visita" role="tab" aria-controls="visita" aria-selected="true">Visitas a propiedades de tus agentes</a>
                    </li>
                    <li class="nav-item mr-2" role="presentation">
                        <a class="nav-link" id="pregunta-tab" data-toggle="tab" href="#pregunta" role="tab" aria-controls="pregunta" aria-selected="false">Dudas de propiedades de tus agentes</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="comunicados-tab" data-toggle="tab" href="#comunicados" role="tab" aria-controls="comunicados" aria-selected="false">Comunicación Mattes</a>
                    </li>
                </ul>
                <div class="tab-content height-visitas-agentes" id="myTabContent">
                    <div class="tab-pane fade show active height-visitas-agente" id="visita" role="tabpanel" aria-labelledby="visita-tab">
                        <table id="citas_agentes" class="table display table-responsive tablas_mattes " style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Propiedad</th>
                                    <th>Agente</th>
                                    <th>Universidad</th>
                                    <th>Usuario</th>
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
                        <table id="preguntas_agentes" class="table display table-responsive tablas_mattes pregunta" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Propiedad</th>
                                    <th>Agente</th>
                                    <th>Estatus</th>
                                    <th>Universidad cercana</th>
                                    <th>Usuario</th>
                                    <th>Pregunta</th>
                                    <th>Respuesta</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="comunicados" role="tabpanel" aria-labelledby="comunicados-tab">
                        <table id="mensajes_agentes" class="table display table-responsive tablas_mattes comunicados" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Agente</th>
                                    <th>Estatus</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Modal aceptar -->
<div id="show_aceptar_cita" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-teal pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Aceptar cita</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-lg">
                <div class="pd-80 pd-sm-80 form-layout form-layout-4">
                    <h6 style="text-align:center;">¿Deseas continuar con esta acción?</h6>
                    <br>
                    <p style="color:red; text-align:center;">No se podrán deshacer las acciones una vez realizada la acción</p>
                    <input type="hidden" name="id_cita" id="id_cita">
                    <input type="hidden" name="idrenter" id="idrenter">
                    <input type="hidden" name="id_crofter" id="id_crofter">
                    <input type="hidden" name="id_propiedad" id="id_propiedad">
                </div><!-- card -->
            </div>

            <div class="modal-footer">
                <button id="confirmar_cita" type="button" class="btn btn-teal  pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

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
                </div><!-- card -->
            </div>

            <div class="modal-footer">
                <button id="cancelar_cita" type="button" class="btn btn-danger pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!--Modal reasignar -->
<div id="show_reasignar_cita" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-warning pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Reasignar cita</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-lg">
                <div class="pd-80 pd-sm-80 form-layout form-layout-4">
                    <form id="form_reasignar">
                        <div class="form-group">
                            <label class="form-control-label">Fecha: </label>
                            <input id="fechaH" class="form-control" type="date" name="fecha" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Horas disponibles: </label>
                            <select id="horasdisp" class="form-control" type="date" name="horasdisp" required>
                                <option value="">Seleccione una hora</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Comentarios: <span class="tx-danger"></span></label>
                            <textarea rows="3" id="comentarios" name="comentarios" class="form-control" placeholder="Comentarios de la cita"></textarea>
                        </div>

                        <div class="form-group">
                            <input id="idcita_r" class="form-control" type="hidden" name="idcita">
                            <input id="idrenter_r" class="form-control" type="hidden" name="idrenter">
                            <input id="idcrofter_r" class="form-control" type="hidden" name="idcrofter">
                        </div>

                        <div class="modal-footer">
                            <button id="reasignar_cita" type="submit" class="btn btn-warning pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
                        </div>
                </form>
                </div><!-- card -->
            </div>

            
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!--Modal responder pregunta -->
<div id="show_responder" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-warning pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Responder pregunta</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-lg">
                <div class="pd-80 pd-sm-80 form-layout form-layout-4">
                    
                    <p style="color:red; font-size: 1rem; text-align:center;">No se podrá volver a contestar nuevamente la pregunta una vez realizada la acción</p>
                    <div class="form-group">
                        <label class="form-control-label">Pregunta: </label>
                        <input type="text" name="question_p" id="question_p" class="form-control" readonly>
                    </div>
                    <form id="form_question">
                        <div class="form-group">
                            <label class="form-control-label">Respuesta: <span class="tx-danger"></span></label>
                            <textarea rows=3 id="answer" name="answer" class="form-control" type="text" placeholder="Escribe aquí tu respuesta" required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="question" id="question">
                            <input type="hidden" name="id_renter_q" id="id_renter_q">
                        </div>

                        <div class="modal-footer">
                            <button id="responder_cita" type="submit" class="btn btn-warning pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
                        </div>
                    </form>
                   
                </div><!-- card -->
            </div>

        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<form method="POST" id="propiedad_id" >
    <input class="id_propiedad" type="hidden" name="id" id="id_prop">
    <input class="id_propiedad" type="hidden" name="id_renter" id="alumno">
</form>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

    <script>
        let id_user = <?php echo json_encode($user_id); ?>;
    </script>

<?= $this->endSection() ?>


