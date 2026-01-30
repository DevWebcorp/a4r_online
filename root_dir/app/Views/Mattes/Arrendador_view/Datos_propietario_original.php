<script src="<?= base_url() ?>/assets/lib/jquery/jquery.js"></script>
<script src="<?= base_url() ?>/assets/lib/jquery-ui/jquery-ui.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">

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

<div class="alert bg-warning mg-t-100 d-none" id="alert_correo" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span><strong>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA</strong> <span id="success"></span></span>
    </div><!-- d-flex -->
</div><!-- alert -->

<div class="mb-120 mg-t-120">
    <div class="container">
        <div class="tab datos-propietario d-flex flex-column flex-md-row  justify-content-center mb-4">
            <button class="tablinks mr-md-2" onclick="openCity(event, 'Personales')" id="defaultOpen"><i class="fa fa-user mr-2" aria-hidden="true"></i>Datos
                personales</button>
           <!--  <button class="tablinks mr-md-2" onclick="openCity(event, 'Bancarios')" id="d_bancarios"><i class="fa fa-university mr-2" aria-hidden="true"></i>Datos
                bancarios</button>
            <button class="tablinks mr-md-2" onclick="openCity(event, 'Fiscales')" id="d_fiscales"><i class="fa fa-file-text mr-2" aria-hidden="true"></i>Datos
                fiscales</button> -->
            <button class="tablinks" onclick="openCity(event, 'Notificaciones')" id="notificaciones"><i class="fa fa-bell mr-2" aria-hidden="true"></i>Notificaciones</button>
        </div>

        <!--=========================================
            ===== DATOS PERSONALES =====
        =============================================-->
        <div id="Personales" class="tabcontent">
            <div class="col-12">
                <div class="form-layout " style="border: none;">
                    <div class="text-center">
                        <h3 class="datos-personales mt-3 mb-5"> Ahora un poco de ti </h3>
                        <p class="col-lg-7 mx-auto">En Mattes buscamos la seguridad de toda nuestra comunidad, tanto estudiantes
                            como propietarios, es por esto que los
                            documentos que pedimos a continuación son necesarios para poder subir tu
                            propiedad en la plataforma. </p>
                    </div>
                    <form class="mg-b-30" id="form-personales" enctype="multipart/form-data">
                        <div class="row justify-content-center mg-t-20">
                            <div class="col-lg-7 mg-b-20 ">
                                <label class="text-left">Foto de perfil</label>
                                <div id="img-datos" class="col-sm-6 mx-auto text-center">
                                    <img style="width: 140px; height: 140px;" class="img-fluid rounded-circle" id="img" src="<?= base_url() ?>/assets/img/default.png" />
                                </div>
                            </div>
                            <div class="col-lg-7 mg-t-20 mg-sm-t-0">
                                <div class="file-drop-area">
                                    <span class="choose-file-button">Subir foto de perfil</span>
                                    <span class="file-message">Arrastra el archivo aqui</span>
                                    <input id="file-user" class="file-input" type="file" name="file" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mg-t-40">
                            <div class="col-lg-7 form__group">
                                <input type="text" class="form__input" id="nombre" name="nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" autocomplete="off" placeholder=" " required>
                                <label class="form__label">Nombre<span class="tx-danger">*</span></label>
                                <div class="requirements">
                                    Tiene que tener mínimo 3 caracteres
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mg-t-40">
                            <div class="col-lg-7 form__group">
                                <input type="text" class="form__input" id="apellido" name="apellido" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" autocomplete="off" placeholder=" " required>
                                <label class="form__label">Primer apellido<span class="tx-danger">*</span></label>
                                <div class="requirements">
                                    Tiene que tener mínimo 3 caracteres
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mg-t-40">
                            <div class="col-lg-7 form__group">
                                <input type="text" class="form__input" id="am" name="segundo_apellido"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="4" maxlength="25" autocomplete="off" placeholder=" " required>
                                <label class="form__label">Segundo apellido<span class="tx-danger">*</span></label>
                                <div class="requirements">
                                    Tiene que tener mínimo 4 caracteres
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mg-t-40">
                            <div class="col-lg-7 form__group">
                                <input type="date" id="f_nacimiento"  class="form__input" name="f_nacimiento" minlength="10" maxlength="10" required>
                                <label class="form__label">Fecha de nacimiento<span class="tx-danger">*</span></label>          
                            </div>
                        </div>


                        <div class="row justify-content-center mg-t-40">
                            <div class="col-lg-7 form__group">
                                <input type="tel" class="form__input"  id="telefono" name="celular" pattern="^[0-9]+" minlength="10" maxlength="10" autocomplete="off" placeholder=" " required>
                                <label class="form__label">Número celular<span class="tx-danger">*</span></label>
                                <div class="requirements">
                                    Tiene que tener 10 dígitos
                                </div>
                            </div>
                        </div>
                       <!--  <div class="files-d row justify-content-center mg-t-20">
                            <label class="col-lg-7 form-control-label">Identificación oficial<span class="tx-danger">*</span> (INE o pasaporte)<sub> Archivos pdf o imagen</sub></label>
                            <div class="col-lg-7 ">
                                <div class="file-drop-area">
                                    <span class="choose-file-button">Subir Archivo</span>
                                    <span class="file-message">Arrastra el archivo aqui</span>
                                    <input id="file-identificacion" class="file-input" type="file" required name="file_identificacion" accept=".pdf, .png , .jpeg, .jpg" multiple>
                                </div> -->
                                <!-- <small id="passwordHelpBlock" class="form-text text-muted">
                                    El archivo debe ser pdf
                                </small> -->
                           <!--  </div>
                        </div> -->
                        <div class="col-sm-12 mt-4">
                            <div class="form-group mt-3 text-center">
                                <div class="custom-control custom-checkbox mb-3">
                                    <!-- <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                                    <label class="custom-control-label" for="customControlValidation1">Aviso de privacidad</label>
                                    <div class="invalid-feedback">Selecciona</div> -->
                                    <input id="id_usuarioper" type="hidden" name="id_usuarioper">

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 row mx-auto px-0 px-lg-2 mt-5">
                            <div class="col-sm-12 text-center text-md-right px-0">
                                <div class="d-flex flex-column flex-sm-row justify-content-end">
                                    <button class="btn btn-info continuar-momento mr-sm-2 mb-2 mb-sm-0" id="continuar-momento" type="button"><i class="fa fa-sign-out fa-lg mr-1" aria-hidden="true"></i>Salir sin guardar</button>
                                    <button class="btn btn-success px-4 py-1" type="submit"><i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i>Guardar</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div> <!-- div row fin -->


    <!--=========================================
        ===== DATOS BANCARIOS =====
    =============================================-->
    <div id="Bancarios" class="tabcontent mg-b-30 mb-md-270">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-layout" style="border: none;">
                        <div class="text-center">
                            <h3 class="datos-bancarios">Datos bancarios </h3>
                        </div>
                        <form class="" id="form-bancarios" enctype="multipart/form-data">
                            <div class="row justify-content-center mg-t-20">
                                <div class="col-lg-7 form__group">
                                    <input type="text"  class="form__input" id="nombre_bancario" name="name_bancario" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="2" maxlength="60" autocomplete="off" placeholder=" " required>
                                    <label class="form__label">Nombre</label>
                                    <div class="requirements">
                                        Tiene que tener mínimo 2 caracteres
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mg-t-40">
                                <div class="col-lg-7 form__group">
                                    <input type="text" id="name_bank"  id="nombre_banco" name="nombre_banco" class="form__input" pattern="[A-Za-z\s]+" minlength="4" maxlength="30" autocomplete="off" placeholder=" " required>
                                    <label class="form__label">Banco</label>
                                    <div class="requirements">
                                        Tiene que tener mínimo 4 caracteres
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mg-t-40">
                                <div class="col-lg-7 form__group">
                                    <input type="text" id="clabe"  class="form__input" id="clabe_bancaria" name="clabe_bancaria" pattern="\d{18}" minlength="18" maxlength="18" autocomplete="off" placeholder=" " required>
                                    <label class="form__label">CLABE</label>
                                    <div class="requirements">
                                        Tiene que tener 18 dígitos númericos
                                    </div>
                                    <input id="id_usuarioban" type="hidden" name="id_usuarioban">
                                </div>
                            </div>

                            <div class="col-lg-7 row mx-auto mt-5 px-0 px-lg-2">
                                <div class="col-sm-12 text-center text-md-right px-0">
                                    <div class="d-flex flex-column flex-sm-row justify-content-end">
                                        <button class="btn btn-info continuar-momento mr-sm-2 mb-2 mb-sm-0" id="continuar-momento" type="button"><i class="fa fa-sign-out fa-lg mr-1" aria-hidden="true"></i>Salir sin guardar</button>
                                        <button class="btn btn-success px-4 py-1" type="submit"><i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i>Guardar</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>

                </div>
            </div>
        </div> <!-- div row fin -->
    </div> <!-- div container fin -->
</div>

<!--=========================================
    ===== DATOS FISCALES =====
=============================================-->
<div id="Fiscales" class="tabcontent mg-b-30 mb-md-355">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="form-layout" style="border: none;">
                    <div class="text-center">
                        <h3 class="datos-fiscales">Datos fiscales </h3>
                    </div>
                    <form class="" id="form-fiscales" enctype="multipart/form-data">
                        <div class="row justify-content-center mg-t-20">
                            <div class="col-lg-7 form__group">
                                <input type="text" id="rfc"  class="form__input" id="rfc_fiscal" name="rfc" pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})" minlength="12" maxlength="13" autocomplete="off" placeholder=" " required>
                                <label class="form__label">RFC</label>
                                <div class="requirements">
                                    No coincide el formato
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mg-t-40">
                            <div class="col-lg-7 form__group">
                                <input type="text" id="fiscal"  class="form__input" id="dir_fiscal" name="direccion_fiscal" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ-z0-9\s]+" minlength="13" maxlength="100" autocomplete="off" placeholder=" " required>
                                <label class="form__label">Dirección fiscal</label>
                                <div class="requirements">
                                    Tiene que tener mínimo 13 caracteres
                                </div>
                                <input id="id_usuariofis" type="hidden" name="id_usuariofis">
                            </div>
                        </div>
                </div>
                <div class="col-lg-7 row mx-auto mt-5 px-0 px-lg-2">
                    <div class="col-sm-12 text-center text-md-right px-0">
                        <div class="d-flex flex-column flex-sm-row justify-content-end">
                            <button class="btn btn-info continuar-momento px-4 py-1  mr-sm-2 mb-2 mb-sm-0" id="continuar-momento" type="button"><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i>Salir sin guardar</button>
                            <button class="btn btn-success px-4 py-1" type="submit"><i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i>Guardar</button>
                        </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>

<!--=========================================
            ===== NOTIFICACIONES =====
        =============================================-->
<div id="Notificaciones" class="tabcontent mg-b-30 mb-md-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="form-layout" style="border: none;">
                    <div class="text-center">
                        <h3 class="notificaciones"> Notificaciones </h3>
                    </div>
                    <form id="form_notificaciones" enctype="multipart/form-data">
                        <div class="row mg-t-20">
                            <p class="col-sm-6 text-center text-sm-right">Notificaciones en correo</p>
                            <div class="col-sm-6 mg-t-10 mg-sm-t-0 text-center">
                                <label class="switch">
                                    <input type="checkbox" checked id="notis-correo" name="notis_correo">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mg-t-40">
                            <h5 class="text-center notificacione">¿Qué notificaciones quieres que lleguen a tu correo?
                            </h5>
                            <div class="row mg-t-30">
                                <p class="col-sm-6 text-center text-sm-right">Nuevas citas</p>
                                <div class="col-sm-6 mg-t-10 mg-sm-t-0 text-center">
                                    <label class="switch">
                                        <input id="nueva-cita" name="nuevas_citas" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row mg-t-30">
                                <p class="col-sm-6 text-center  text-sm-right">Avisos</p>
                                <div class="col-sm-6 mg-t-10 mg-sm-t-0 text-center">
                                    <label class="switch">
                                        <input id="avisos" name="avisos" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row mg-t-30">
                                <p class="col-sm-6 text-center text-sm-right">Mensajes</p>
                                <div class="col-sm-6 mg-t-10 mg-sm-t-0 text-center">
                                    <label class="switch">
                                        <input id="mensajes" name="mensajes" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row mg-t-30">
                                <p class="col-sm-6 text-center text-sm-right">Promociones</p>
                                <div class="col-sm-6 mg-t-10 mg-sm-t-0 text-center">
                                    <label class="switch">
                                        <input id="promos" name="promos" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                    <input id="id_usuarionot" type="hidden" name="id_usuarionot">
                                </div>
                            </div>
                            <div class="col-lg-7 row mx-auto px-0 mt-5">
                                <div class="col-sm-12 text-center text-md-right px-0 pr-sm-2">
                                    <div class="d-flex flex-column flex-sm-row justify-content-end">
                                        <button class="btn btn-info continuar-momento px-4 py-1 mr-sm-2 mb-2 mb-sm-0" id="continuar-momento" type="button"><i class="fa fa-sign-out fa-lg mr-1" aria-hidden="true"></i>Salir sin guardar</button>
                                        <button class="btn btn-success px-4 py-1" type="submit"><i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i>Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- div row fin -->
            <!-- div container fin -->
        </div>
    </div>
</div>

<!--=========================================
            ===== MENSAJES  =====
        =============================================-->
<div id="Mensajes" class="tabcontent mb-200 mg-b-120">
    <div class="container">
        <div class="row form-border">
            <div class="col-lg-12 col-md-6">
                <div class="row chat-box">

                </div>
                <form method="post" name="conversacion" id="conversacion" enctype="multipart/form-data">
                    <div class="col-12 mg-t-30">
                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                            <input id="contestacion" name="contestacion" type="text" class="borde form-control" placeholder="Escribe tu mensaje" required>
                            <input id="renter" name="renter" type="hidden" class="form-control">
                        </div>
                        <div class="form-layout-footer text-right mg-t-30 mb-5">
                            <button id="enviar_msg" class="btn-teal mt-4 px-2 py-2" style="float: right;" type="submit"><i class="fa fa-envelope-o fa-lg mr-1" aria-hidden="true"></i> Guardar y enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div> <!-- div container fin -->