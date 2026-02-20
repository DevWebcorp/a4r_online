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

<!-- <div id="loader" class="modal fade show" style="display: none; padding-left: 0px;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="d-flex ht-300 pos-relative align-items-center">
            <div class="sk-chasing-dots">
                <div class="sk-child sk-dot1 bg-red-800"></div>
                <div class="sk-child sk-dot2 bg-green-800"></div>
            </div>
        </div>
    </div>
</div>
 -->

<section class="section-sub-banner bg-9">
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>Datos del agente</h2><!-- 
                <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>
    </div>
</section>

<section class="mg-t-80 mg-b-120">
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-12 mt-5">
                <h3 class="mt-5 text-center agentes">Mi perfil</h3> 
                <form class="mg-b-80 mb-lg-0" id="alta_agente" enctype="multipart/form-data">
                    <div class="row justify-content-center mg-t-20 pr-5-5 pr-lg-6 pl-3 pl-lg-4">
                        <div class="col-lg-7 px-0">
                            <div class="col-sm-12 text-center">
                                <div class="col-12">
                                    <img class="img-fluid rounded-circle" style="width: 140px; height: 140px;" id="img"
                                        src="<?= base_url() ?>/../../assets/img/default.png" />
                                </div>
                            </div>
                            <div class="col-12 mg-t-10 mg-sm-t-0">
                                <div class="file-drop-area">
                                    <span class="choose-file-button">Subir foto de perfil</span>
                                    <span class="file-message">Arrastra el archivo aqui</span>
                                    <input id="file_user" class="file-input" type="file"  name="file_agente"
                                        accept=".jpeg, .png, .jpg">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="">Nombre<span class="tx-danger">*</span></label>
                            <input type="text" class="" id="nombre_agente" name="nombre_agente"
                            pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3"
                            maxlength="25" autocomplete="off" placeholder=" " required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="">Primer Apellido<span class="tx-danger">*</span></label>
                            <input type="text" class="" id="apellidof" name="apellidof"
                            pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3"
                            maxlength="25" autocomplete="off" placeholder=" " required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="">Segundo Apellido<span class="tx-danger">*</span></label>
                            <input type="text" class="" id="apellidos" name="apellidos"
                            pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3"
                            maxlength="25" autocomplete="off" placeholder=" " required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="">Correo<span class="tx-danger">*</span></label>
                            <input type="email" class="" id="correo" name="correo_agente"
                            placeholder=" " required  style="background-color: #e9ecef; border: 1px solid green;" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="">Teléfono<span class="tx-danger">*</span></label>
                            <input type="tel" class="" id="telefono_agente" name="telefono"
                            pattern="^[0-9]+" minlength="10" maxlength="10"
                            autocomplete ="off" placeholder=" " required>
                        </div>
                    </div>

                    <div class="col-lg-4" id="show_hide_password">
                        <div class="form-group">
                            <label class="">Contraseña<span class="tx-danger">*</span></label>
                            <input placeholder=" " type="password" class="" name="password" id="update_password1" required
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="off">
                            <!-- <i class="formulario__validacion-estado fas fa-times-circle"></i> -->
                            <div class="input-group-addon" style="border-radius: 10px; padding: 0.5rem 0.75rem">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mx-auto mg-t-30 input-group" id="show_hide_password2">
                        <div class="form-group">
                            <label class="">Repetir contraseña<span class="tx-danger">*</span></label>
                            <input placeholder=" " type="password" class="" name="password" id="update_password2" required
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="off">
                            <!-- <i class="formulario__validacion-estado fas fa-times-circle"></i> -->
                            <div class="input-group-addon" style="border-radius: 10px; padding: 0.5rem 0.75rem">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="id_user" name="id_user">
                    <input type="hidden" class="form-control" id="id_identity" name="id_identity">
                    <input type="hidden" class="form-control" id="name-img" name="name_img">
                   
                    <div class="col-lg-7 mx-auto">
                        <div class="mg-t-50 text-right">
                            <button class="px-4 py-1 btn actualizar" id="enviar_agente" name="enviar_agente">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
    <script src="<?= base_url() ?>/../../assets/lib/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>/../../assets/lib/jquery-ui/jquery-ui.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
   
    <script>
        let token = <?php echo json_encode($token); ?>;
    </script>

<?= $this->endSection() ?>
