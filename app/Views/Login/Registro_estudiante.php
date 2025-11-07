<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $title ?></title>

    <!-- vendor css -->
    <link href="<?= base_url() ?>/assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/lib/select2/css/select2.min.css" rel="stylesheet">
     <!--favicon -->
     <link rel="icon" href="<?=base_url()?>/assets/img/Mattes.png" type="image">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/starlight.css">
</head>

<body>

<section class="banner-registro-estudiante">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center ht-md-100v">
                    <div class="registro wd-400 wd-xs-500 pd-25 pd-xs-40 bg-white">
                   
                    <div class="signin-logo tx-38">Registro estudiante</div>
                    <div class=" mg-b-30">
                        <a href="<?= base_url() ?>/Mattes/Login" class="text-cuenta">Ya tengo una cuenta</a>
                    </div>
                    <?php
                    if (isset($error)) {
                        echo '<div class="alert alert-danger" role="alert">
                            <div class="d-flex align-items-center justify-content-start">
                            <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                            <span><strong>Ha ocurrido un error! <br></strong>' . $error . '</span>
                            </div><!-- d-flex -->
                        </div><!-- alert -->';
                    }
                    ?>
                            <form method="POST" action="<?= base_url() ?>/Registro_estudiante/register">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required <?php if (isset($email)) {
                                                                                                                            echo 'value="' . $email . '"';
                                                                                                                        } ?>>
                                </div><!-- form-group -->

                                <div class="row mg-t-20 formulario__grupo" id="grupo__password">
                                    <!--   <label class="col-sm-4 form-control-label">Contraseña: </label> -->
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0 input-group" id="show_hide_password">
                                        <input placeholder="Contraseña" type="password" class="form-control" name="password"
                                            id="update_password" required>
                                        <!-- <i class="formulario__validacion-estado fas fa-times-circle"></i> -->
                                        <div class="input-group-addon" style="border-radius: 10px;">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div><!-- row -->

                                <div class="row mg-t-20 formulario__grupo" id="grupo__password">
                                    <!--   <label class="col-sm-4 form-control-label">Contraseña: </label> -->
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0 input-group" id="show_hide_password2">
                                        <input placeholder="Repite la contraseña" type="password" class="form-control"
                                            name="confirm_password" id="update_password" required>
                                        <!-- <i class="formulario__validacion-estado fas fa-times-circle"></i> -->
                                        <div class="input-group-addon" style="border-radius: 10px;">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div><!-- row -->

                                <div class="form-group mt-3 row" style="margin-left: 5px;">
                                    <label><input type="checkbox" id="aviso" class="mr-1" value="" required></label><a href="<?= base_url() ?>/aviso-privacidad">Aviso de privacidad</a><p>|</p><a href="<?= base_url() ?>/Terminos-condiciones">Términos y Condiciones</a>
                                </div><!-- form-group -->
                                                                                                        <div class="text-center">
                                    <button type="submit" class="btn-entrar px-5 py-2 tx-22">Registrar</button>                        
                                </div>
                                
                            </form>

                        </div><!-- login-wrapper -->
                    </div><!-- d-flex -->
                </div>
            </div>
        </div>
    </div>
</section>

  

    <script src="<?= base_url() ?>/assets/lib/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>/assets/lib/popper.js/popper.js"></script>
    <script src="<?= base_url() ?>/assets/lib/bootstrap/bootstrap.js"></script>
    <script src="<?= base_url() ?>/assets/lib/select2/js/select2.min.js"></script>
</body>

</html>



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