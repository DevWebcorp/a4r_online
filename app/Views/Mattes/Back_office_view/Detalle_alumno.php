<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css">
<link href="<?= base_url() ?>assets/lib/SpinKit/spinkit.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/autoComplete.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">

<!--prefijo -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>



<style>
    .form-control,
    .dataTables_filter input {
        border-radius: 10px !important;
    }
    
    .iti--allow-dropdown{
        width: 100% !important;

    }





</style>

<div id="loader" class="modal fade show" style="display: none; padding-left: 0px;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="d-flex ht-300 pos-relatmensajes_chative align-items-center">
            <div class="sk-chasing-dots">
                <div class="sk-child sk-dot1 bg-red-800"></div>
                <div class="sk-child sk-dot2 bg-green-800"></div>
            </div>
        </div>
    </div>
</div>

<section class="alumno-detalle mg-t-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center mt-5 mb-4 detalle-alumnobo">Detalle de alumno</h3>
                <div class="tab datos-alumno d-flex flex-column flex-md-row  justify-content-center">
                    <button class="tablinks mr-sm-2" onclick="openCity(event, 'Status-alumno')" id="defaultOpen"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Estatus</button>
                    <button class="tablinks mr-sm-2" onclick="openCity(event, 'Personales-alumno')" id="personales-alumno"><i class="fa fa-user-o mr-2" aria-hidden="true"></i>Datos
                        personales</button>
                    <button class="tablinks mr-sm-2" onclick="openCity(event, 'Notificaciones')" id="notificaciones"><i class="fa fa-envelope-o mr-2" aria-hidden="true"></i>Notificaciones</button>
                    <button class="tablinks mr-sm-2" onclick="openCity(event, 'COnversacion')" id="mensajes_chat"><i class="fa fa-commenting-o mr-2" aria-hidden="true"></i>Mensajes</button>
                </div>

                <!--=========================================
                ===== DATOS PERSONALES =====
                =============================================-->
                <div id="Personales-alumno" class="tabcontent mb-200 mg-b-120">
                    <form class="" id="detalle-alumno" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="row mg-t-40">
                                        <div class="col-lg-10 form__group">
                                            <input id="nombre" type="text" class="form__input" placeholder=" " required name="nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" aria-describedby="passwordHelpBlock" title="Solo se permiten letras" style="background-color: #e9ecef; border: 1px solid green;" readonly>
                                            <label class="form__label">Nombre<span class="tx-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="row mg-t-40">
                                        <div class="col-lg-10 form__group">
                                            <input id="primer_apellido" type="text" class="form__input" placeholder=" " style="background-color: #e9ecef; border: 1px solid green;" required name="primer_apellido" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" aria-describedby="passwordHelpBlock" title="Solo se permiten letras" readonly>
                                            <label class="form__label">Primer apellido<span class="tx-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="row mg-t-40">
                                        <div class="col-lg-10 form__group">
                                            <input id="segundo_apellido" type="text" class="form__input" placeholder=" " required name="segundo_apellido" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" aria-describedby="passwordHelpBlock" title="Solo se permiten letras" style="background-color: #e9ecef; border: 1px solid green;" readonly>
                                            <label class="form__label">Segundo apellido<span class="tx-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="row mg-t-40">
                                        <div class="col-lg-10 form__group">
                                            <input id="correo" type="text" class="form__input" placeholder=" " required name="correo" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" aria-describedby="passwordHelpBlock" title="Solo se permiten letras" style="background-color: #e9ecef; border: 1px solid green;" readonly>
                                            <label class="form__label">Correo</label>
                                        </div>
                                    </div>

                                    
                                    <div class="row mg-t-40 px-3">
                                        <div class="col-lg-10 form__group">
                                        <!-- <label class="form__label" for="celular">Número de celular<span class="tx-danger">*</span></label> -->
                                            <input  type="tel" class="form__input" id="phone" autocomplete="off" required>
                                            <!-- <div class="requirements">
                                                Tiene que tener 10 dígitos
                                            </div> -->
                                        </div>
                                    </div>

                                    <input type="hidden" id="prefix">



                                    <!-- <div class="row mg-t-40">
                                        <div class="col-lg-10 form__group">
                                            <input id="celular" type="text" class="form__input" placeholder=" "  name="celular" pattern="^[0-9]+" minlength="10" maxlength="10" aria-describedby="passwordHelpBlock" title="Solo se permiten numeros">
                                            <label class="form__label">Número celular</label>
                                        </div>
                                    </div> -->
                                    <div class="row mg-t-40">
                                        <div class="col-lg-10 form__group">
                                            <input id="f_nacimiento" type="date" class="form__input" placeholder="Ingresar fecha de nacimiento" required name="f_nacimiento" pattern="^[0-9]+" minlength="10" maxlength="10" aria-describedby="passwordHelpBlock" title="Solo se permiten numeros">
                                            <label class="form__label">Fecha de nacimiento<span class="tx-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="row mg-t-40">
                                        <div class="col-lg-10 form__group">
                                            <select id="sexo" name="sexo" class="form__input select2" data-placeholder="Selecciona una opción" required>
                                                <option value="">Selecciona una opción</option>
                                            </select>
                                            <label class="form__label">Sexo<span class="tx-danger">*</span></label>
                                        </div>
                                    </div>

                                    <div class="row mg-t-40">
                                        <div class="col-lg-10 form__group">
                                            <textarea id="describete" class="form__input" name="describete" placeholder=" " pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="10" maxlength="140" aria-describedby="passwordHelpBlock" title="Solo se permiten letras"></textarea>
                                            <label class="form__label">Describete</label>
                                        </div>
                                    </div>
                                    <div class="row mg-t-40">
                                        <div class="col-lg-10 form__group">
                                            <input id="autoComplete" type="text" class="form__input" placeholder=" " name="universidad" autocomplete="off" style="background-color: white !important; color: rgba(0,0,0,.8) !important; border: 1px solid #28a745 !important;">
                                            <input id="id_univ" class="form__input" type="hidden" name="id_univ"></input>
                                            <label class="form__label">Universidad<span class="tx-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="row mg-t-40">
                                        <div class="col-lg-10 form__group">
                                            <input id="carrera" type="text" class="form__input" placeholder=" " name="carrera" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="60" aria-describedby="passwordHelpBlock" title="Solo se permiten letras">
                                            <label class="form__label">Carrera</label>
                                            <div class="requirements">
                                                <!-- Tiene que tener mínimo 3 caracteres -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mg-t-40">
                                        <div class="col-lg-10 form__group">
                                            <select id="estado" name="estado" class="form__input select2" data-placeholder="Selecciona una opción">
                                                <option value="">Selecciona una opción</option>
                                            </select>
                                            <label class="form__label">¿De qué estado vienes?</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10 px-0">
                                            <div class="col-sm-12 text-center">
                                                <div class="col-sm-12">
                                                    <img style="width: 150px; height: 150px;" class="img-fluid rounded-circle" id="img" src="<?= base_url() ?>/../../assets/img/default.png" />
                                                    <button class="btn cancelar px-4 py-1 del-photo" style="font-size: 16px;" type="button" data-toggle="modal" data-target="#modal_delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-lg-9 pr-lg-0 mg-t-10 mg-sm-t-10 ml-lg-5">
                                                <div class="file-drop-area">
                                                    <span class="choose-file-button">Subir Archivo</span>
                                                    <span class="file-message">Arrastra el archivo aqui</span>
                                                    <input id="file-user" class="file-input" type="file" name="file" accept=".jpg, .png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center align-items-center mg-t-20">
                                        <label class="col-sm-12 col-lg-10 form-control-label">Carta de admisión o credencial universidad (vigente)<span class="tx-danger">*</span></label>
                                        <div class="col-lg-8 px-0">
                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 pr-lg-4">
                                                <div class="file-drop-area">
                                                    <span class="choose-file-button">Subir Archivo</span>
                                                    <span class="file-message">Arrastra el archivo aqui</span>
                                                    <input id="file-carta" class="file-input" type="file" name="file_carta" accept=".pdf">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row justify-content-center align-items-center mg-t-20">
                                        <label class="col-sm-12 col-lg-10 form-control-label">Identificación oficial (pasaporte o INE)<span class="tx-danger">*</span></label>
                                        <div class="col-lg-8 px-0">
                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 pr-lg-4">
                                                <div class="file-drop-area">
                                                    <span class="choose-file-button">Subir Archivo</span>
                                                    <span class="file-message">Arrastra el archivo aqui</span>
                                                    <input id="file-identificacion" class="file-input" type="file" name="file_INE" accept=".pdf">
                                                    <input type="hidden" id="id_alumno" class="form__input" type="hidden" name="id_alumno">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row justify-content-center align-items-center mg-t-30">
                                        <div class="col-12 col-lg-6">
                                            <label class="col-sm-12 col-lg-12 text-center">Carta de admisión o credencial universidad</label>
                                            <div class="col-lg-12 text-center mt-2 mt-lg-10">
                                                <i class="fa fa-file-pdf-o fa-3x text-danger" aria-hidden="true" id="text-val"></i> <br>
                                                <a id="down_carta" class="down-doc" download>Ver archivo </a>
                                            </div>
                                            <div class="col-lg-12 text-center mt-2 mt-lg-10">
                                                <button class="btn cancelar px-4 py-1 del-carta" style="font-size: 16px;" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6">
                                            <label class="col-12 text-center mt-3 mt-lg-0">Identificación</label>
                                            <div class="col-lg-12 text-center mt-2 mt-lg-10">
                                                <i class="fa fa-file-pdf-o fa-3x text-danger" aria-hidden="true" id="text-val"></i> <br>
                                                <a id="down_ine" class="down-doc" download>Ver archivo</a>
                                            </div>

                                            <div class="col-lg-12 text-center mt-2 mt-lg-10">
                                                <button class="btn cancelar px-4 py-1 del-ine" style="font-size: 16px;" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-11 row mx-auto px-0 text-md-right mt-5 order-2">
                                    <div class="col-sm-12 text-center text-md-right pl-lg-0">
                                        <div class="d-flex flex-column flex-sm-row justify-content-end">
                                            <button class="btn btn-teal px-4 py-1" style="font-size: 16px;" type="submit"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!--=========================================
                ===== NOTIFICACIONES  =====
                =============================================-->
                <div id="Notificaciones" class="tabcontent mb-200 mb-md-5 mb-lg-0">
                    <div class="container mb-md-5">
                        <div class="row">
                            <div class="col-12 form-border mb-200 mb-sm-0">
                                <div class="pd-20 pd-sm-40 pt-md-0 form-layout form-layout-4" style="border: none;">
                                    <form id="form_notificaciones" enctype="multipart/form-data">
                                        <div class="mg-t-20">
                                            <div class="row mg-t-30 px-3">
                                                <p class="col-sm-7 text-center text-sm-left">Notificaciones en correo</p>
                                                <div class="col-sm-5 mg-t-10 mg-sm-t-0 text-center">
                                                    <label class="switch">
                                                        <input type="checkbox" checked id="notis-correo" name="notis_correo">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <h5 class="text-center notificacione mg-t-30">¿Qué notificaciones quieres que lleguen a tu correo?
                                            </h5>

                                            <div class="row mg-t-30 px-3">
                                                <p class="col-sm-7 text-center text-sm-left">Nuevas citas</p>
                                                <div class="col-sm-5 mg-t-10 mg-sm-t-0 text-center">
                                                    <label class="switch">
                                                        <input id="nueva-cita" name="nuevas_citas" type="checkbox" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row mg-t-30 px-3">
                                                <p class="col-sm-7 text-center text-sm-left">Avisos</p>
                                                <div class="col-sm-5 mg-t-10 mg-sm-t-0 text-center">
                                                    <label class="switch">
                                                        <input id="avisos" name="avisos" type="checkbox" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row mg-t-30 px-3">
                                                <p class="col-sm-7 text-center text-sm-left">Mensajes</p>
                                                <div class="col-sm-5 mg-t-10 mg-sm-t-0 text-center">
                                                    <label class="switch">
                                                        <input id="mensajes" name="mensajes" type="checkbox" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row mg-t-30 px-3">
                                                <p class="col-sm-7 text-center text-sm-left">Promociones</p>
                                                <div class="col-sm-5 mg-t-10 mg-sm-t-0 text-center">
                                                    <label class="switch">
                                                        <input id="promos" name="promos" type="checkbox" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 mx-auto my-5 px-lg-0">
                                                <div class="text-center text-lg-right"><button class="btn btn-teal px-4 py-1" style="font-size: 16px;" type="submit"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button></div>
                                            </div>
                                            <input type="hidden" id="id_user" class="form__input" type="hidden" name="id_user">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--=========================================
                ===== MENSAJES  =====
                =============================================-->
                <div id="COnversacion" class="tabcontent mb-200 mg-b-120">
                    <div class="container mb-lg-3">
                        <div class="row form-border">
                            <div class="col-12">
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
                                            <button id="enviar_msg" class="btn-teal mt-4 px-4 py-1" style="float: right; font-size: 16px;" type="submit"><i class="fa fa-paper-plane-o fa-lg mr-1" aria-hidden="true"></i>Enviar</button>
                                        </div>
                                    </div>
                                </form>
                                <input id="n_renter" name="n_renter" type="hidden" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!--=========================================
                ===== STATUS  =====
                =============================================-->
                <div id="Status-alumno" class="tabcontent mb-200 mb-md-5">
                    <div class="container mb-md-5 mb-lg-260">
                        <div class="row">
                            <div class="col-12 form-border mb-200 mb-sm-0">
                                <div class="pd-20 pd-sm-40 pt-md-0 form-layout form-layout-4" style="border: none;">
                                    <form id="form_status" enctype="multipart/form-data">
                                        <div class="mg-t-20">
                                            <div class="row justify-content-center pl-lg-5 mg-t-30">
                                                <p class="col-sm-4 text-center text-sm-left">Usuario activo</p>
                                                <div class="col-sm-2 mg-t-10 mg-sm-t-0 text-center text-sm-left">
                                                    <label class="switch">
                                                        <input id="user-activo" name="user-activo" type="checkbox" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center pl-lg-5 mg-t-30">
                                                <p class="col-sm-4 text-center text-sm-left">Usuario verificado</p>
                                                <div class="col-sm-2 mg-t-10 mg-sm-t-0 text-center text-sm-left">
                                                    <label class="switch">
                                                        <input id="user-verificado" name="user-verificado" type="checkbox" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 mx-auto my-5 px-lg-0">
                                                <div class="text-center text-lg-right">
                                                    <button class="btn btn-teal px-4 py-1" style="font-size: 16px;" type="submit"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button>
                                                </div>
                                            </div>

                                            <input type="hidden" id="id_userstatus" class="form__input" type="hidden" name="id_userstatus">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Modal eliminar imagen -->
<div id="modal_delete" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-danger pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar imagen</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_del_photo" enctype="multipart/form-data">
                <div class="modal-md">
                    <div class="pd-30 pd-sm-30 form-layout form-layout-4">
                        <h6 style="text-align:center;">¿Deseas continuar con esta acción?</h6>
                        <br>
                        <p style="color:red; text-align:center;">No se podrán deshacer las acciones una vez realizada la acción</p>
                        <input type="hidden" name="id_uphoto" id="id_uphoto">

                    </div><!-- card -->
                </div>

                <div class="modal-footer">
                    <button id="del-photo" type="submit" class="btn btn-danger pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!--Modal eliminar carta -->
<div id="delete_carta" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-danger pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar carta o credencial</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_del_carta" enctype="multipart/form-data">
                <div class="modal-md">
                    <div class="pd-30 pd-sm-30 form-layout form-layout-4">
                        <h6 style="text-align:center;">¿Deseas continuar con esta acción?</h6>
                        <br>
                        <p style="color:red; text-align:center;">No se podrán deshacer las acciones una vez realizada la acción</p>
                        <input type="hidden" name="id_ucarta" id="id_ucarta">

                    </div><!-- card -->
                </div>

                <div class="modal-footer">
                    <button id="del-carta" type="submit" class="btn btn-danger pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!--Modal eliminar identificacion -->
<div id="delete_ine" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-danger pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar identificacion</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_del_ine" enctype="multipart/form-data">
                <div class="modal-md">
                    <div class="pd-30 pd-sm-30 form-layout form-layout-4">
                        <h6 style="text-align:center;">¿Deseas continuar con esta acción?</h6>
                        <br>
                        <p style="color:red; text-align:center;">No se podrán deshacer las acciones una vez realizada la acción</p>
                        <input type="hidden" name="id_uident" id="id_uident">

                    </div><!-- card -->
                </div>

                <div class="modal-footer">
                    <button id="del-ine" type="submit" class="btn btn-danger pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->



<script>
    let id_usuario = <?php echo json_encode($id_usuario); ?>;
    let id_group = <?php echo json_encode($group); ?>;
</script>