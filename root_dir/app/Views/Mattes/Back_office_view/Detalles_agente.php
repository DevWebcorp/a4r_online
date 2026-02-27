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
    .tab {
        border-bottom: 1px solid transparent;
    }
</style>

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

<div class="mg-t-120 mg-b-120">
    <div class="container">
        <div class="tab datos-propietario d-flex flex-column flex-lg-row justify-content-center">
            <button class="tablinks ml-md-4 mr-sm-2" onclick="openCity(event, 'Estatus')" id="defaultOpen" >
                <i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Estatus</button>
            <button class="tablinks mr-sm-2" onclick="openCity(event, 'Personales')" id="d_personales"><i class="fa fa-user mr-2" aria-hidden="true"></i>Datos personales</button>
            <button class="tablinks" onclick="openCity(event, 'Mensajes')" id="mensajes_chat"><i class="fa fa-comments-o mr-2" aria-hidden="true"></i>Mensajes</button>
        </div>

        <!--=========================================
            ===== DATOS PERSONALES =====
        =============================================-->
        <div id="Personales" class="tabcontent">
            <div class="form-layout " style="border: none;">
                <form class="mg-b-80 mb-md-0 " id="alta_agente" enctype="multipart/form-data">
                    <div class="row justify-content-center mg-t-20 px-3">
                        <div class="col-lg-7 px-0">
                            <div class="col-12 text-center">
                                <div class="col-12">
                                    <img style="width: 150px;" class="img-fluid rounded-circle" id="img" src="<?= base_url() ?>/../../assets/img/default.png" />
                                </div>
                            </div>
                            <div class="col-12 mg-t-10 mg-sm-t-20 mb-4">
                                <div class="file-drop-area">
                                    <span class="choose-file-button">Subir Archivo</span>
                                    <span class="file-message">Arrastra el archivo aqui</span>
                                    <input id="file-user" class="file-input" type="file" name="file" accept=".jpg, .png">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="">Nombre<span class="tx-danger">*</span></label>
                                <input type="text" class="" id="nombre_agente" name="nombre_agente" placeholder=" " required minlength="3" maxlength="25" aria-describedby="passwordHelpBlock">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="">Primer Apellido<span class="tx-danger">*</span></label>
                                <input type="text" class="" id="apellidof" name="apellidof" placeholder=" " required minlength="3" maxlength="25" aria-describedby="passwordHelpBlock">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="">Segundo Apellido<span class="tx-danger">*</span></label>
                                <input type="text" class="" id="apellidos" name="apellidos" placeholder=" " required minlength="3" maxlength="25" aria-describedby="passwordHelpBlock">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="">Correo<span class="tx-danger">*</span></label>
                                <input type="email" class="" id="correo" name="correo_agente" placeholder=" " required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="">Teléfono<span class="tx-danger">*</span></label>
                                <input type="text" class="" id="telefono_agente" name="telefono" placeholder=" " required pattern="^[0-9]+" minlength="10" maxlength="10" title="Solo se permiten números">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="">Identificación oficial (agente)<span class="tx-danger">*</span><sub> Archivos pdf o imagen</sub></label>
                                <div class="file-drop-area">
                                    <span class="choose-file-button">Actualizar Archivo</span>
                                    <span class="file-message">Arrastra el archivo aqui</span>
                                    <input id="file_agente" class="file-input" type="file" required name="ine_agente" accept=".pdf, .png, .jpg">
                                </div>
                               
                                <div class="col-lg-1 text-center text-lg-left">
                                    <i class="fa fa-file-pdf-o fa-3x text-danger" aria-hidden="true" id="text-val"></i> <br>
                                    <a id="down_ine" class="down-doc" download>Ver archivo</a>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="id_user" name="id_user">
                        <input type="hidden" class="form-control" id="id_identity" name="id_identity">
                        <input type="hidden" class="form-control" id="name-img" name="name_img">
                        <div class="col-12">
                            <div class="text-right">
                                <button class="px-4 py-2 btn btn-aceptar btn-teal mt-3" id="enviar_agente" name="enviar_agente"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--=========================================
            ===== MENSAJES  =====
        =============================================-->
        <div id="Mensajes" class="tabcontent height-mensajes-agente">
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
                                    <button id="enviar_msg" class="btn-teal mt-4 px-2 py-2" style="float: right;" type="submit"><i class="fa fa-paper-plane-o fa-lg mr-1" aria-hidden="true"></i>Enviar</button>
                                </div>
                            </div>
                        </form>
                        <input id="n_renter" name="n_renter" type="hidden" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <!--=========================================
            ===== ESTATUS =====
        =============================================-->
        <div id="Estatus" class="tabcontent height-mensajes-agente">
            <form id="upd_agente" class="pb-5">
                <div class="form-layout text-center justify-content-center" style="border: none;">
                    <div class="col-12 mg-b-20">
                        <div class="col-12 mx-auto">
                            <img style="width: 250px;" class="img-fluid rounded-circle" id="img2" />
                            <h3 id="name-agente"></h3>
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
                <div class="col-12 text-center mt-5 pb-5 order-3 order-lg-0">
                    <button type="submit" class="btn-teal px-4 py-1 mg-b-100 mb-md-0" id="btnsiguiente_detalles" name="siguiente_detalles"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Actualizar</span></button>
                </div>
            </form>
        </div>

    </div> <!-- div container fin -->
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
            id_usuario : id_usuario
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


