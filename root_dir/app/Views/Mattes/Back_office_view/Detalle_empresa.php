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

<style>
    #datatable1_wrapper {
        margin-bottom: 40px;
    }

    .tab {
        border-bottom: 1px solid transparent !important;
    }

    .datos-empresa .tablinks {
        background-color: white !important;
        color: black;
    }

    .datos-empresa .tablinks:nth-child(5) {
        border-bottom-left-radius: 0px;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
    }

    .datos-empresa .tablinks:nth-child(6) {
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;
    }

    @media(min-width:992px) {
        .datos-empresa .tablinks {
            background-color: #fff !important;
            color: black;
            border: 1px solid #000;
        }

        .datos-empresa .tablinks:nth-child(5) {
            border-top-right-radius: 0px;
        }

        .datos-empresa .tablinks:nth-child(6) {
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
            border-bottom-left-radius: 0px;
        }
    }

    .tab button {
        padding: 10px 30px;
    }
</style>

<!-- <div id="loader" class="modal fade show" style="display: none; padding-left: 0px; z-index: 99999;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="d-flex ht-300 pos-relative align-items-center">
            <div class="sk-chasing-dots">
                <div class="sk-child sk-dot1 bg-red-800"></div>
                <div class="sk-child sk-dot2 bg-green-800"></div>
            </div>
        </div>
    </div>
</div> -->

<section class="section-sub-banner bg-inmobiliaria">
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>Datos de la inmobiliaria</h2><!-- 
                <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>
    </div>
</section>


<div class="container-fluid pb-0 mt-lg-empresa">
    <div class="row d-empresa">
        <div class="col-12">
            <div class="tab datos-empresa d-flex flex-column flex-lg-row justify-content-center">
                <button class="tablinks mr-lg-2" onclick="openCity(event, 'Estatus')" id="defaultOpen"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Estatus</button>
                <button class="tablinks mr-lg-2" onclick="openCity(event, 'Personales')" id="d_personales"><i class="fa fa-user mr-2" aria-hidden="true"></i>Datos personales</button>
                <button class="tablinks mr-lg-2" onclick="openCity(event, 'Bancarios')" id="d_bancarios"><i class="fa fa-university mr-2" aria-hidden="true"></i>Datos bancarios</button>
                <button class="tablinks mr-lg-2" onclick="openCity(event, 'Fiscales')" id="d_fiscales"><i class="fa fa-file-text mr-2" aria-hidden="true"></i>Datos fiscales</button>
                <button class="tablinks mr-lg-2" onclick="openCity(event, 'Notificaciones')" id="notificaciones"><i class="fa fa-bell mr-2" aria-hidden="true"></i>Notificaciones</button>
                <button class="tablinks mr-lg-2" onclick="openCity(event, 'Mensajes')" id="mensajes_chat"><i class="fa fa-comments-o" aria-hidden="true"></i>Mensajes</button>
                <button style="display: none;" class="tablinks" onclick="openCity(event, 'Perfil-agentes')" id="perfil_agentes">Perfil agente</button>
            </div>
        </div>
    </div>
</div>


<div class="container">
   
    <!--=============================================
    ===== DATOS PERSONALES ARRENDADOR BACK OFFICE =====
    ==================================================-->
    <div id="Personales" class="tabcontent">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card form-layout mb-5" style="height: auto; border: none;">
                        <form class="" id="form_perso_emp" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <div class="form-group">
                                        <label class="">Nombre inmobiliaria<span class="tx-danger">*</span></label>
                                    <input type="text" class="" id="inmobiliaria" name="nombre_inmobiliaria" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="50" autocomplete="off" placeholder=" " required>
                                </div>
                            </div>
                            <!-- <div class="row justify-content-center mg-t-40">
                                <div class="col-lg-7 form__group">
                                    <input type="text" class="form__input" id="rfc_inmobiliaria" name="rfc_inmobiliaria" pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})" minlength="12" maxlength="13" autocomplete="off" placeholder=" " required>
                                    <label class="form__label">RFC<span class="tx-danger">*</span></label>
                                    <div class="requirements">
                                        No coincide el formato
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="">Razón social<span class="tx-danger">*</span></label>
                                    <input type="text" class="" id="razonsocial" name="razonsocial_inmobiliaria" minlength="13" maxlength="100" autocomplete="off" placeholder=" " required>
                                </div>
                            </div>
                            <!-- <div class="row justify-content-center mg-t-40">
                                <div class="col-lg-7 form__group">
                                    <input type="text" class="form__input" id="dir_inmobiliaria" name="direccion_inmobiliaria" minlength="13" maxlength="100" autocomplete="off" placeholder=" " required>
                                    <label class="form__label">Dirección<span class="tx-danger">*</span></label>
                                    <div class="requirements">
                                        Tiene que tener mínimo 13 caracteres
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="">Representante legal<span class="tx-danger">*</span></label>
                                    <input type="text" class="" id="representante" name="representante_legal" minlength="13" maxlength="100" autocomplete="off" placeholder=" " required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="">Número telefónico<span class="tx-danger">*</span></label>
                                    <input type="tel" class="" id="tel_inmobiliaria" name="telefono_inmobiliaria" pattern="[0-9]+" minlength="10" maxlength="10" autocomplete="off" placeholder=" " required>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-lg-3">
                                <div class="form-group">
                                    <label class="">Comprobante de domicilio (inmobiliaria)<span class="tx-danger">*</span></label>
                                    <div class="col-lg-6 mg-t-10 mg-sm-t-0">
                                        <div class="file-drop-area">
                                            <span class="choose-file-button">Subir Archivo</span>
                                            <span class="file-message">Arrastra el archivo aqui</span>
                                            <input id="file_comp" class="file-input" type="file" name="file" accept=".pdf">
                                        </div>
                                    </div>
                                    <div class="">
                                        <i class="fa fa-file-pdf-o fa-3x text-danger" aria-hidden="true" id="text-val"></i> <br>
                                        <a id="down_comp" class="down-doc" download>Ver archivo</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <div class="form-group mt-3 text-center">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customControlValidation1" name="terminosycond" required>
                                        <label class="custom-control-label" for="customControlValidation1">Términos y condiciones</label>
                                        <input id="id_usuarioper" type="hidden" name="id_usuarioper">
                                    </div>
                                </div><!-- form-group -->
                            </div>
                            
                            <div class="col-sm-12 text-center px-0 pr-sm-2 text-md-right">
                                <button class="btn btn-teal" id="btnactualizar-inmob-per" name="actualizarper-inmob" type="submit"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=========================================
    ===== DATOS BANCARIOS ARRENDADOR BACK OFFICE =====
    =============================================-->
    <div id="Bancarios" class="tabcontent" >
        <div class="card form-layout mb-5" style="height: auto !important; border: none;">
            <form class="" id="form_bancarios_inmobiliaria" enctype="multipart/form-data">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="">Nombre<span class="tx-danger">*</span></label>
                        <input type="text" class="" id="nombre_inmobi" name="inmobiliaria_nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="60" autocomplete="off" placeholder=" " required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="">Banco<span class="tx-danger">*</span></label>
                        <input type="text" class="" id="banco_nombre" name="banco_nombre" pattern="[A-Za-z\s]+" minlength="4" maxlength="30" autocomplete="off" placeholder=" " required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="">CLABE<span class="tx-danger">*</span></label>
                        <input type="text" class="" id="clabe_banco" name="clabe_bancaria" pattern="^[0-9]+" minlength="18" maxlength="18" autocomplete="off" placeholder=" " required>
                        <input id="id_usuarioban" type="hidden" name="id_usuarioban">
                    </div>
                </div>
                <div class="col-lg-12 row mx-auto px-0 px-lg-2 mt-3">
                    <div class="col-sm-12 text-center px-0 pr-sm-2 text-md-right">
                        <div class="d-flex flex-column flex-sm-row justify-content-end">
                            <button class="btn btn-teal mt-3 mx-3 mx-sm-2 mx-lg-0" id="btnactualizar_banco_inmob" name="actualizarban-inmob"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--=========================================
    ===== DATOS FISCALES ARRENDADOR BACK OFFICE=====
    =============================================-->
    <div id="Fiscales" class="tabcontent">
        <div class="card form-layout" style="height: auto !important; border: none;">
            <form class="" id="form_fiscales" enctype="multipart/form-data">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="">RFC<span class="tx-danger">*</span></label>
                        <input type="text" class="" name="rfc" id="rfc" pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})" minlength="12" maxlength="13" autocomplete="off" placeholder=" " required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="">Dirección fiscal<span class="tx-danger">*</span></label>
                        <input type="text" class="" name="direccion_fiscal" id="direccion_fiscal" minlength="13" maxlength="100" autocomplete="off" placeholder=" " required>
                        <input id="id_usuariofis" type="hidden" name="id_usuariofis">
                    </div>
                </div>
                <div class="col-lg-12 row mx-auto px-0 px-lg-2 mt-3 mb-4">
                    <div class="col-sm-12 text-center px-0 pr-sm-2 text-md-right">
                        <div class="d-flex flex-column flex-sm-row justify-content-end">
                            <button class="btn btn-teal mt-3 mx-3 mx-sm-2 mx-lg-0" id="btnactualizar_fiscales_inmob" name="actualizar-fiscales-inmob">
                                <i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--=========================================
    ===== NOTIFICACIONES ARRENDADORBACK OFFICE=====
    =============================================-->
    <div id="Notificaciones" class="tabcontent" >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card form-layout mb-5" style="height: auto !important; border: none;">
                       <!--  <div class="text-center">
                            <h3 class="notificaciones-empresa"> Notificaciones </h3>
                        </div> -->
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
                                <h5 class="text-center notificaciones-emprsa">¿Qué notificaciones quieres que lleguen a tu correo?:</h5>
                                <div class="row mg-t-30 px-4">
                                    <p class="col-sm-6 text-center  text-sm-right">Nuevas citas</p>
                                    <div class="col-sm-6 mg-t-10 mg-sm-t-0 text-center">
                                        <label class="switch">
                                            <input id="nueva-cita" name="nuevas_citas" type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row mg-t-30 px-4">
                                    <p class="col-sm-6 text-center  text-sm-right">Avisos</p>
                                    <div class="col-sm-6 mg-t-10 mg-sm-t-0 text-center">
                                        <label class="switch">
                                            <input id="avisos" type="checkbox" name="avisos" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row mg-t-30 px-4">
                                    <p class="col-sm-6 text-center  text-sm-right">Mensajes</p>
                                    <div class="col-sm-6 mg-t-10 mg-sm-t-0 text-center">
                                        <label class="switch">
                                            <input id="mensajes" type="checkbox" name="mensajes" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row mg-t-30 px-4">
                                    <p class="col-sm-6 text-center text-sm-right">Promociones</p>
                                    <div class="col-sm-6 mg-t-10 mg-sm-t-0 text-center">
                                        <label class="switch">
                                            <input id="promos" name="promos" type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                        <input id="id_usuarionot" type="hidden" name="id_usuarionot">
                                    </div>
                                </div>
                                <div class="col-lg-12 row mx-auto px-0 text-md-right mt-3">
                                    <div class="col-sm-10 text-center text-md-right pl-lg-0">
                                        <div class="d-flex flex-column flex-sm-row justify-content-end">
                                            <button class="btn btn-teal mt-3" id="btnactualizar_notificaciones_inmob" name="actualizar-notis-inmob">
                                                <i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar
                                            </button>
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
    <div id="Mensajes" class="tabcontent" style="height: auto !important;">
        <div class="container">
            <div class="row form-border">
                <div class="col-12 mb-5">
                    <div class="row chat-box"> </div>
                    <form method="post" name="conversacion" id="conversacion" enctype="multipart/form-data">
                        <div class="col-12 px-0 mg-t-30">
                            <div class="col-12 px-0 mg-t-10 mg-sm-t-0">
                                <input id="contestacion" name="contestacion" type="text" class="borde rounded form-control" placeholder="Escribe tu mensaje" required>
                                <input id="renter" name="renter" type="hidden" class="form-control">
                                <input id="conver_id" name="conver_id" type="hidden" class="form-control">
                            </div>
                            <div class="form-layout-footer text-right mg-t-30 mb-5">
                                <button id="enviar_msg" class="btn-teal mt-4 px-2 py-2" style="float: right;" type="submit"><i class="fa fa-envelope-o fa-lg mr-1" aria-hidden="true"></i>Enviar</button>
                            </div>
                        </div>
                    </form>
                    <input id="n_renter" name="n_renter" type="hidden" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <!--=========================================
    ===== ESTATUS ARRENDADOR BACK OFFICE=====
    =============================================-->
    <div id="Estatus" class="tabcontent" style="height: auto !important;">
        <form id="upd_status" class="pb-5">
            <div class="form-layout" style="border: none;">
                <div class="row align-items-center mg-t-30">
                    <p class="text-right" style="width:53%;">Usuario activo</p>
                    <div class="ml-3 mg-t-10 mg-sm-t-0" style="width:38%;">
                        <label class="switch">
                            <input id="user-activo" name="user_activo" type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>

                <div class="row align-items-center mg-t-30">
                    <p class="text-right " style="width:53%;">Usuario verificado</p>
                    <div class="ml-3 mg-t-10 mg-sm-t-0" style="width:38%;">
                        <label class="switch">
                            <input id="verify" name="user_verificado" type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 px-0 mt-5 mb-5">
                <div class="col-sm-12 pl-lg-0">
                    <div class="d-flex flex-column flex-sm-row justify-content-end">
                        <button type="submit" class="btn-teal px-4 py-1 mg-b-100 mb-md-0" id="btnsiguiente_detalles" name="siguiente_detalles"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Actualizar</span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
       
</div>


<!--Modal Agentes -->
<div id="updateModal" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header bg-primary pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">EDITAR AGENTE</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formUpdate" enctype="multipart/form-data">
                <div class="pd-20">
                    <div class="card pd-20 pd-sm-40" style="height: auto !important;">
                        <!-- h6 class="card-body-title">Datos del Agente</h6>
                        <p class="mg-b-20 mg-sm-b-30">Rellena todos los campos</p> -->
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-lg-12 ">
                                    <div id="imagen" class="text-center" style="margin-bottom: 50px;"></div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Nombre: <span><span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="nombre" id="upd-nombre" required>

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Primer Apellido: <span><span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="apellido" id="upd-apellido" required>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Segundo Apellido: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="apellidos" id="upd-apellidos" required>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Correo: <span class="tx-danger">*</span></label>
                                        <input type="email" class="form-control" name="correo" id="upd-correo" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Telefono: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" class="form-control" id="upd-phone" name="telefono" required>
                                    </div>
                                </div><!-- col-4 -->

                                <input class="form-control" type="hidden" class="form-control" id="id_agente" name="id" required>

                                <div class="row">
                                    <div class="col-lg-7 mg-t-20 mg-sm-t-0">
                                        <div class="file-drop-area">
                                            <span class="choose-file-button">Subir Archivo</span>
                                            <span class="file-message">Arrastra el archivo aqui</span>
                                            <input id="file-user" class="file-input" type="file" name="file" accept=".jpg, .png">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mg-t-20 mg-sm-t-0">
                                        <img style="width: 100px;" class="img-fluid" id="img" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="update-agente" type="submit" class="btn btn-primary pd-x-20">Actualizar</button>
                    <button type="button" class="btn btn btn-danger pd-x-20" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    

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

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<?= $this->endSection() ?>


