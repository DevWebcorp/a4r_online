<!DOCTYPE html>
<html lang="es">

<head>

    <title><?= $title ?></title>
    <!-- vendor css -->
    <link href="<?= base_url() ?>/../../assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url() ?>/../../assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link rel="icon" href="<?=base_url()?>/../../assets/img/logop.png" type="image">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/../../assets/css/starlight.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
        <form method="POST" action="<?php echo base_url() . '/Login/verify_login' ?>">
            <div class="row justify-content-center">
                <div class="login-wrapper col-xs-12 col-md-8 col-lg-8 bg-white">

                    <?php if (!isset($stage)) {
                        $stage = "production";
                    }
                    if ($stage == 'development') {
                        echo '<div class="signin-logo tx-center tx-24 tx-bold tx-inverse"><a href="<?= base_url() ?>/Mattes/Principal"><img src="' . base_url() . '/../../assets/img/Mattes.png" class="img-fluid py-4" height="80%" width="80%"></a></div>';
                       // echo '<div class="card card-body tx-white-8 bg-danger bd-0">ESTAS ENTRANDO A LA VERSION DE DESARROLLO DE MATTES WEBCORP. TODOS LOS DATOS QUE SE INGRESEN EN ESTA INSTANCIA SERAN ELIMINADOS EN UN FUTURO.</div>';
                    } else {
                        echo '<div class="signin-logo tx-center tx-24 tx-bold tx-inverse"><a href="Principal"><img src="' . base_url() . '/../../assets/img/Mattes.png" class="img-fluid py-4" height="80%" width="80%"></a></div>';
                    } ?>
                    <div class="tx-center mg-b-80">Ingresa tu usuario y contraseña.</div>
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
                        <input type="text" class="form-control" name="email" placeholder="Ingrese correo electronico" required>
                    </div><!-- form-group -->
                    <div class="row mg-t-20 formulario__grupo" id="grupo__password">
                  <!--   <label class="col-sm-4 form-control-label">Contraseña: </label> -->
                    <div class="col-sm-12 mg-t-10 mg-sm-t-0 input-group" id="show_hide_password">
                        <input placeholder="Contraseña"  type="password" class="form-control" name="password" id="update_password"
                        required>
                        <!-- <i class="formulario__validacion-estado fas fa-times-circle"></i> -->
                        <div class="input-group-addon">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div><!-- row -->

                    <div class="form-group mt-3 text-center">
                        <label><input type="checkbox" id="aviso" class="mr-1" value="" required >Aviso de privacidad</label>
                    </div><!-- form-group -->

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-info btn-primary disable px-5">Ingresar</button>
                    </div>
                    <!-- <div class="form-group">
                        <div class="col-12 text-right">
                            <a href="<?= base_url() ?>/register/password_recover" class="tx-info tx-12 d-block mg-t-10">Recuperar contraseña</a>
                        </div>
                    </div> -->
                    <div class="col-12 my-3">
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url() ?>/register/password_recover">¿Olvidaste tu contraseña?</a>
                            <a href="<?=base_url()?>/Registro_estudiante">Crear cuenta</a>
                        </div>
                    </div>
                    

                </div><!-- login-wrapper -->

            </div>

        </form>
    </div><!-- d-flex -->

   <!--  <script src="<?= base_url() ?>/../lib/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>/../lib/popper.js/popper.js"></script>
    <script src="<?= base_url() ?>/../lib/bootstrap/bootstrap.js"></script> -->

</body>

</html>

    <script src="<?=base_url()?>/../../assets/lib/jquery/jquery.js"></script>
    <script src="<?=base_url()?>/../../assets/lib/popper.js/popper.js"></script>
    <script src="<?=base_url()?>/../../assets/lib/bootstrap/bootstrap.js"></script>
    <script src="<?=base_url()?>/../../assets/lib/select2/js/select2.min.js"></script>

<script>
    passwd();
passwd2();


function passwd() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("fa-eye-slash");
            $('#show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password i').addClass("fa-eye");
        }
    });
}

function passwd2() {
    $("#show_hide_password2 a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password2 input').attr("type") == "text") {
            $('#show_hide_password2 input').attr('type', 'password');
            $('#show_hide_password2 i').addClass("fa-eye-slash");
            $('#show_hide_password2 i').removeClass("fa-eye");
        } else if ($('#show_hide_password2 input').attr("type") == "password") {
            $('#show_hide_password2 input').attr('type', 'text');
            $('#show_hide_password2 i').removeClass("fa-eye-slash");
            $('#show_hide_password2 i').addClass("fa-eye");
        }
    });
}
</script>