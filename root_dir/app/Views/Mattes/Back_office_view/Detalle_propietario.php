<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">    
    <link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">
<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

<!-- <div id="loader" class="modal fade show" style="display: none; padding-left: 0px;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="d-flex ht-300 pos-relative align-items-center">
            <div class="sk-chasing-dots">
                <div class="sk-child sk-dot1 bg-red-800"></div>
                <div class="sk-child sk-dot2 bg-green-800"></div>
            </div>
        </div>
    </div>
</div> -->

<div class="mb-120 mg-t-120">
    <div class="container-fluid">
        <div class="row d-empresa">
            <div class="col-12">
                <div class="tab datos-propietario d-flex flex-column flex-lg-row justify-content-center">
                    <button class="tablinks" onclick="openCity(event, 'Estatus')" id="defaultOpen"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Estatus</button>
                    <button class="tablinks" onclick="openCity(event, 'Personales')" id="d_personales"><i class="fa fa-user mr-2" aria-hidden="true"></i>Datos personales</button>
                    <button class="tablinks" onclick="openCity(event, 'Bancarios')" id="d_bancarios"><i class="fa fa-university mr-2" aria-hidden="true"></i>Datos bancarios</button>
                    <button class="tablinks" onclick="openCity(event, 'Fiscales')" id="d_fiscales"><i class="fa fa-file-text mr-2" aria-hidden="true"></i>Datos fiscales</button>
                    <button class="tablinks" onclick="openCity(event, 'Notificaciones')" id="notificaciones"><i class="fa fa-bell mr-2" aria-hidden="true"></i>Notificaciones</button>
                    <button class="tablinks" onclick="openCity(event, 'Mensajes')" id="mensajes_chat"><i class="fa fa-comments-o mr-2" aria-hidden="true"></i>Mensajes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!--=========================================
            ===== ESTATUS =====
        =============================================-->
        <div id="Estatus" class="tabcontent height-status-indep">
            <form id="formStatus">
                <div class="form-layout text-center justify-content-center" style="border: none;">
                    <div class="col-12 mg-b-20 ">
                        <div class="col-12 mx-auto">
                            <img style="width: 140px; height: 140px;" class="img-fluid rounded-circle" id="img2" src="<?= base_url() ?>/../../assets/img/default.png" />
                            <h3 id="user-name" class="text-center"> </h3>
                        </div>
                    </div>

                    <div class="row mg-t-30">
                        <p class="col-sm-6 text-center text-sm-right">Usuario activo</p>
                        <div class="col-sm-2 mg-t-10 mg-sm-t-0 ">
                            <label class="switch">
                                <input id="user-activo" name="user_activo" type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>

                    </div>

                    <div class="row mg-t-30">
                        <p class="col-sm-6 text-center text-sm-right">Usuario verificado</p>
                        <div class="col-sm-2 mg-t-10 mg-sm-t-0 ">
                            <label class="switch">
                                <input id="verify" name="user_verificado" type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>

                    </div>
                </div>
                <div class="col-12 text-center mt-5 pb-5 order-3 order-lg-0 mb-5">
                    <button type="submit" class="btn-teal px-4 py-1 mg-b-100 mb-md-0"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Actualizar</span></button>
                </div>
            </form>
        </div>

        <!--=========================================
                    ===== DATOS PERSONALES =====
                =============================================-->
        <div id="Personales" class="tabcontent">
            <div class="col-12">
                <div class="form-layout " style="border: none;">
                    <div class="text-center">
                    </div>
                    <form class="mb-200" id="form-personales" enctype="multipart/form-data">
                        <div class="row justify-content-center mg-t-20 mb-5">
                            <div class="col-lg-7 mg-b-20 text-center">
                                <div class="col-sm-6 mx-auto">
                                    <img style="width: 140px; height: 140px;" class="img-fluid rounded-circle" id="img" src="<?= base_url() ?>/../../assets/img/default.png" />
                                </div>
                            </div>
                            <div class="col-lg-7 mg-t-20 mg-sm-t-0">
                                <div class="file-drop-area">
                                    <span class="choose-file-button">Subir Archivo</span>
                                    <span class="file-message">Arrastra el archivo aqui</span>
                                    <input id="file-user" class="file-input" type="file" name="file" accept=".jpg, .png">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="">Nombre<span class="tx-danger">*</span></label>
                                <input id="nombre" type="text" class="" placeholder=" " required name="nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="">Primer apellido<span class="tx-danger">*</span></label>
                                <input id="apellido" type="text" class="" placeholder=" " name="apellido" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="">Segundo apellido<span class="tx-danger">*</span></label>
                                <input id="am" type="text" class="" placeholder=" " name="segundo_apellido" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="4" maxlength="25">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="">Número celular<span class="tx-danger">*</span></label>
                                <input id="telefono" type="text" class="" placeholder=" " name="celular" required pattern="^[0-9]+" minlength="10" maxlength="10">
                            </div>
                        </div>

                        <div class="col-lg-6 files-d">
                            <div class="form-group">
                                <label class="">Identificación oficial<span class="tx-danger">*</span></label>
                                <div class="">
                                    <div class="file-drop-area">
                                        <span class="choose-file-button">Subir Archivo</span>
                                        <span class="file-message">Arrastra el archivo aqui</span>
                                        <input id="file-identificacion" class="file-input" type="file" name="file_identificacion" accept=".pdf">
                                    </div>
                                    <!-- <small id="passwordHelpBlock" class="form-text text-muted">
                                        El archivo debe ser pdf
                                    </small> -->
                                </div>
                                <div class="col-lg-1 text-center">
                                    <i class="fa fa-file-pdf-o fa-3x text-danger" aria-hidden="true" id="text-val"></i> <br>
                                    <a id="down_ine" class="down-doc" download>Ver archivo</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <div class="form-group mt-3 text-center">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                                    <label class="custom-control-label" for="customControlValidation1">Aviso de privacidad</label>
                                    <div class="invalid-feedback">Selecciona</div>
                                    <input id="id_usuarioper" type="hidden" name="id_usuarioper">

                                </div>
                            </div><!-- form-group -->
                        </div>

                        <div class="col-lg-12 px-0 px-lg-2 mt-3 mb-5">
                            <div class="col-sm-12 text-center text-md-right px-0">
                                <div class="d-flex flex-column flex-sm-row justify-content-end">
                                    <button class="btn btn-teal px-4 py-1" type="submit"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button>
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
        <div id="Bancarios" class="tabcontent mb-200 height-datos-indep">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-layout" style="border: none;">
                            <div class="text-center">
                                <h3 class="datos-bancarios"> Datos bancarios </h3>
                            </div>
                            <form class="" id="form-bancarios" enctype="multipart/form-data">
                                <div class="row justify-content-center mg-t-20">
                                    <div class="col-lg-7 form__group">
                                        <input id="name_bancario" type="text" class="form__input" id="nombre_bancario" name="name_bancario" placeholder=" " required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="2" maxlength="60" aria-describedby="passwordHelpBlock">
                                        <label class="form__label">Nombre<span class="tx-danger">*</span></label>
                                        <div class="requirements">
                                            Tiene que tener mínimo 2 caracteres
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mg-t-40">
                                    <div class="col-lg-7 form__group">
                                        <input id="name_bank" type="text" id="nombre_banco" name="nombre_banco" class="form__input" placeholder=" " required pattern="[A-Za-z\s]+" minlength="4" maxlength="30">
                                        <label class="form__label">Banco<span class="tx-danger">*</span></label>
                                        <div class="requirements">
                                            Tiene que tener mínimo 4 caracteres
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mg-t-40">
                                    <div class="col-lg-7 form__group">
                                        <input id="clabe" type="text" class="form__input" id="clabe_bancaria" name="clabe_bancaria" placeholder=" " pattern="^[0-9]+" minlength="18" maxlength="18" required>
                                        <label class="form__label">CLABE<span class="tx-danger">*</span></label>
                                        <div class="requirements">
                                            Tiene que tener 18 dígitos
                                        </div>
                                        <input id="id_usuarioban" type="hidden" name="id_usuarioban">
                                    </div>
                                </div>
                                <div class="col-lg-7 row mx-auto px-0 px-lg-2 mt-3">
                                    <div class="col-sm-12 text-center text-md-right px-0">
                                        <div class="d-flex flex-column flex-sm-row justify-content-end">
                                            <button class="btn btn-teal px-4 py-1" type="submit"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button>
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
                    ===== DATOS FISCALES =====
                =============================================-->
        <div id="Fiscales" class="tabcontent mb-200 height-datos-indep">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-layout" style="border: none;">
                            <div class="text-center">
                                <h3 class="datos-fiscales"> Datos fiscales </h3>
                            </div>
                            <form class="" id="form-fiscales" enctype="multipart/form-data">
                                <div class="row justify-content-center mg-t-20">
                                    <div class="col-lg-7 form__group">
                                        <input id="rfc" type="text" class="form__input" id="rfc_fiscal" name="rfc" placeholder=" " pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})" minlength="12" maxlength="13" required>
                                        <label class="form__label">RFC<span class="tx-danger">*</span></label>
                                        <div class="requirements">
                                            No coincide el formato
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mg-t-40">
                                    <div class="col-lg-7 form__group">
                                        <input id="fiscal" type="text" class="form__input" id="dir_fiscal" name="direccion_fiscal" placeholder=" " pattern="^[A-Za-z0-9\s]+" minlength="13" maxlength="100" required>
                                        <label class="form__label">Dirección fiscal<span class="tx-danger">*</span></label>
                                        <div class="requirements">
                                            Tiene que tener mínimo 13 caracteres
                                        </div>
                                        <input id="id_usuariofis" type="hidden" name="id_usuariofis">
                                    </div>
                                </div>
                        </div>
                        <div class="col-lg-7 row mx-auto px-0 px-lg-2 mt-3">
                            <div class="col-sm-12 text-center text-md-right px-0">
                                <div class="d-flex flex-column flex-sm-row justify-content-end">
                                    <button class="btn btn-teal px-4 py-1" type="submit"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button>
                                </div>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <!--=========================================
      ===== NOTIFICACIONES =====
    =============================================-->
        <div id="Notificaciones" class="tabcontent mb-200 height-noti-indep">
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
                                        </div>
                                        <input id="id_usuarionot" type="hidden" name="id_usuarionot">
                                    </div>
                                    <div class="col-lg-7 row mx-auto px-0 px-lg-2 mt-3">
                                        <div class="col-sm-12 text-center text-md-right px-0">
                                            <div class="d-flex flex-column flex-sm-row justify-content-end">
                                                <button class="btn btn-teal px-4 py-1" type="submit"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button>
                                            </div>
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
            ===== MENSAJES  =====
        =============================================-->
        <div id="Mensajes" class="tabcontent height-mensajes-indep">
            <div class="container">
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
                                    <button id="enviar_msg" class="btn-teal mt-4 px-2 py-2" style="float: right;" type="submit"><i class="fa fa-paper-plane fa-lg mr-1" aria-hidden="true"></i>Enviar</button>
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

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>  
<script src="<?= base_url() ?>assets/lib/jquery/jquery.js"></script>
<script src="<?= base_url() ?>assets/lib/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    let id_usuario = <?php echo json_encode($id_usuario); ?>;
    let id_group = <?php echo json_encode($group); ?>;

    $('#conversacion').on('click', function() {
        $('#loader').toggle();
        const url = `${BASE_URL}Mattes/Api/Back_office_api/ConversacionBO_rest/status`;
        data = {
            id_usuario: id_usuario
        }

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(result) {
                console.log(result);
                $('#loader').toggle();

            }
        });
    });
    
</script>

<?= $this->endSection() ?>

