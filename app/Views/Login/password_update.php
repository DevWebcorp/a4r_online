<section class="banner-nuevacontra mb-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center ht-md-100v ">
                    <!-- <form method="POST" action="<?= base_url() . '/register/save_password_updated/' . $token; ?>"> -->
                    <form id="form-password">
                        <div class="nueva-contraseña wd-400 wd-xs-450 pd-25 pd-xs-40 bg-white">
                            <div class="signin-logo tx-38">Nueva contraseña.</div>

                            <div id="alert-error" class="alert alert-danger" role="alert" style="display: none;">
                                <div class="d-flex align-items-center justify-content-start">
                                    <i class="fa fa-times alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                    <span id="error-msg"><strong>Ha ocurrido un error! <br></strong></span>
                                </div><!-- d-flex -->
                            </div><!-- alert -->


                            <div id="alert-success" class="alert alert-success" role="alert" style="display: none;">
                                <div class="d-flex align-items-center justify-content-start">
                                    <i class="fa fa-check alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                    <span id="success-msg"><strong> <br></strong></span>
                                </div><!-- d-flex -->
                                <br>
                                <a href="<?= base_url('inicia-session') ?>">Iniciar sesión</a>
                            </div><!-- alert -->

                            <input name="token" type="hidden" value=<?= $token ?>>
                            
                            <div class="row mg-t-20 formulario__grupo" id="grupo__password">
                                <div class="col-sm-12 mg-t-10 mg-sm-t-0 input-group" id="show_hide_password">
                                    <input id="pass1" type="password" class="form-control" name="password" placeholder="Contraseña" required>
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="row mg-t-20 formulario__grupo" id="grupo__password">
                                <div class="col-sm-12 mg-t-10 mg-sm-t-0 input-group" id="show_hide_password2">
                                    <input id="pass2" type="password" class="form-control" name="confirm_password" placeholder="Confirmar contraseña" required>
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn-entrar px-5 py-2 tx-22">Cambiar</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- d-flex -->


<script src="<?= base_url() ?>/assets/lib/jquery/jquery.js"></script>
<script src="<?= base_url() ?>/../../assets/lib/popper.js/popper.js"></script>
<script src="<?= base_url() ?>/../../assets/lib/bootstrap/bootstrap.js"></script>
<script src="<?= base_url() ?>/../../assets/lib/select2/js/select2.min.js"></script>

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


    //envio de formulario de la contraseña
    document.getElementById('form-password').addEventListener('submit', async function(event) {
        event.preventDefault();

        const password = document.getElementById('pass1').value;
        const confirmPassword = document.getElementById('pass2').value;

        if (password === confirmPassword) {
            const formData = new FormData(this);
            try {
                const URL = `${BASE_URL}Mattes/Api/General/Recovery_password`;

                const response = await fetch(URL, {
                    method: 'POST',
                    body: formData
                });
                if (response.ok) {
                    const data = await response.json();
                    $('#success-msg').text(data.messages.success);
                    $('#alert-success').show();
                    $('pass1'),val(" ");
                    $('pass2'),val(" ");
                } else {
                    console.error('Error en la respuesta del servidor:', response.statusText);
                }
            } catch (error) {
                console.error('Error en la solicitud:', error);
            }

        } else {
            mensaje = 'Las contraseñas no coinciden. Por favor, inténtalo de nuevo.';
            $('#error-msg').text(mensaje);
            $('#alert-error').show();
        }
    });
</script>