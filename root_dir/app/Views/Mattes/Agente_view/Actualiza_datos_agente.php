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
</div> -->

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
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <h3 class="text-center">Mi perfil</h3> 
                <form class="mg-b-80 mb-lg-0" id="alta_agente" enctype="multipart/form-data">
                    <div class="row justify-content-center mg-t-20 pr-5-5 pr-lg-6 pl-3 ">
                        <div class="col-lg-7 px-0 mb-5">
                            <div class="col-sm-12 text-center">
                                <div class="col-12">
                                    <img class="img-fluid rounded-circle mg-b-20" style="width: 140px; height: 140px;" id="img"
                                        src="<?= base_url() ?>/assets/img/default.png" />
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

                    <div class="col-lg-4 ">
                        <div class="form-group">
                            <label class="">Nombre<span class="tx-danger">*</span></label>
                            <input type="text" class="" id="nombre_agente" name="nombre_agente"
                            placeholder=" " pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3"
                            maxlength="25" aria-describedby="passwordHelpBlock">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="">Primer Apellido<span class="tx-danger">*</span></label>
                            <input type="text" class="" id="apellidof" name="apellidof"
                                placeholder=" " pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3"
                                maxlength="25" aria-describedby="passwordHelpBlock">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="">Segundo  apellido<span class="tx-danger">*</span></label>
                            <input type="text" class="" id="apellidos" name="apellidos"
                            placeholder=" " pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3"
                            maxlength="25" aria-describedby="passwordHelpBlock">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="">Correo<span class="tx-danger">*</span></label>
                            <input type="email" class="" id="correo" name="correo_agente"
                            placeholder=" " style="background-color: #e9ecef;" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="">Teléfono<span class="tx-danger">*</span></label>
                            <input type="tel" class="" id="telefono_agente" name="telefono"
                            pattern="^[0-9]+" minlength="10" maxlength="10" placeholder=" ">
                        </div>
                    </div>

                    <div class="col-lg-4 form-group" id="show_hide_password">
                        <label class="">Contraseña</label>
                        <div class="d-flex">
                            <input type="password" class="" autocomplete="off" name="password" id="update_password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="off" placeholder=" ">
                            
                            <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 form-group" id="show_hide_password2">
                        <label class="">Repetir contraseña</label>
                        <div class="d-flex">
                            <input placeholder=" " type="password" class="" name="password" id="update_password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="off">
                            <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>


                    <input type="hidden" class="form-control" id="id_user" name="id_user">
                    <input type="hidden" class="form-control" id="id_identity" name="id_identity">
                    <input type="hidden" class="form-control" id="name-img" name="name_img">
                   
                    <div class="col-lg-12 mx-auto">
                        <div class="mg-t-50 text-right mr-5">
                            <button class="py-1 px-4 btn actualizar btn-teal" id="enviar_agente" name="enviar_agente"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
    <script src="<?= base_url() ?>/assets/lib/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>/assets/lib/jquery-ui/jquery-ui.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
   // let token = <?/*php  echo json_encode($token); */ ?>;
    </script>

<?= $this->endSection() ?>

