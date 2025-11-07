<section class="banner-mattes">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">   
                <form method="POST" action="<?php echo base_url() . '/Login/verify_login' ?>">
                    <div class="row justify-content-right">
                        <div class="col-12">

                            <div class="wd-400 wd-md-500 login">
                                <?php if (!isset($stage)) {
                                    $stage = "production";
                                }
                                if ($stage == 'development') {
                                    echo '';
                                    // echo '<div class="card card-body tx-white-8 bg-danger bd-0">ESTAS ENTRANDO A LA VERSION DE DESARROLLO DE MATTES WEBCORP. TODOS LOS DATOS QUE SE INGRESEN EN ESTA INSTANCIA SERAN ELIMINADOS EN UN FUTURO.</div>';
                                } else {
                                } ?>
                                <div class="ingresa">Ingresa</div>
                                <?php if (isset($error)) {
                                    echo '<div class="alert alert-danger" role="alert">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                            <span><strong>Ha ocurrido un error! <br></strong>' . $error . '</span>
                                        </div><!-- d-flex -->
                                    </div><!-- alert -->';
                                } else if (isset($error_warning)) {
                                    echo '<div class="alert alert-warning" role="alert">
                                            <div class="d-flex align-items-center justify-content-start">
                                                <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                            <span><strong>oh no! <br></strong>' . $error_warning . '</span>
                                            </div><!-- d-flex -->
                                        </div><!-- alert -->';
                                } else if (isset($success)) {
                                    echo '<div class="alert alert-success" role="alert">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                            <span><strong>Genial! <br></strong>' . $success . '</span>
                                        </div><!-- d-flex -->
                                    </div><!-- alert -->';
                                }
                                ?>
                                <div class="form-group">
                                    <label class="form-control-label">Usuario* </label>
                                    <input type="text" class="form-control" style="padding: 0.8rem;" name="email" placeholder=" " required>
                                </div>
                                <div class="row mg-t-20 formulario__grupo" id="grupo__password">
                                    <label class="col-12 form-control-label">Contraseña* </label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0 input-group" id="show_hide_password">
                                        <input placeholder=" " type="password" class="form-control" name="password" id="update_password" required>
                                        <!-- <i class="formulario__validacion-estado fas fa-times-circle"></i> -->
                                        <div class="input-group-addon" style="border-radius: 10px;">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                 
                                </div> 
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-entrar disable px-5">Entrar</button>
                                </div>
                                <div class="col-12 mt-5">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="<?= base_url()?>/Recuperar-contrasena" class=" contrasenia" >¿Olvidaste tu contraseña?</a>
                                        <a href="<?= base_url()?>/Registro" class="btn btn-cuenta ml-5">Crear cuenta</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.gradiente-->
        </div>
    </div>
</section>


<script src="<?= base_url() ?>/assets/lib/jquery/jquery.js"></script>
<script src="<?= base_url() ?>/assets/js/Mattes/Login.js"></script>

