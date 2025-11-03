<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<section class="banner-recuperacuenta mb-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center ht-100v">
                    <form method="POST" id="recuperar" action="<?php echo base_url().'/register/update_password'?>">
                        <div class="recupera-cuenta wd-400 wd-xs-450 pd-25 pd-xs-40 bg-white">
                
                            <div class="tx-center mg-b-30 h3">
                                <p class="signin-logo tx-38">Recupera tu cuenta</p>
                            </div>
                            <div class="text-center">
                                <p>Ingrese el correo al cual desea restablecer la contraseña.</p>
                            </div>
                            <?php if(isset($error)){
                                    echo '<div class="alert alert-danger" role="alert">
                                        <div class="d-flex align-items-center justify-content-start">
                                        <i class="icon ion-ios-close alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                        <span><strong>¡Ha ocurrido un error! <br></strong>'.$error.'</span>
                                        </div><!-- d-flex -->
                                    </div><!-- alert -->';
                                } else if(isset($success)) {
                                    echo '<div class="alert alert-success" role="alert">
                                        <div class="d-flex align-items-center justify-content-start">
                                        <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                        <span><strong>¡Genial! <br></strong>'.$success.'</span>
                                        </div><!-- d-flex -->
                                    </div><!-- alert -->';
                                }
                            ?>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Correo electronico" required >
                            </div><!-- form-group -->

                            <div class="text-center mt-4">
                                <button type="submit" class="btn-entrar px-5 py-2 tx-22">Enviar</button>
                            </div>
                            
                            <!--<div class="mg-t-60 tx-center"><a href="page-signup.html" class="tx-info">Crear cuenta</a></div>-->
                        </div><!-- login-wrapper -->
                    </form>
                </div>
            </div>
        </div>
</section><!-- d-flex -->

    <script src="<?=base_url()?>/../lib/jquery/jquery.js"></script>
    <script src="<?=base_url()?>/../lib/popper.js/popper.js"></script>
    <script src="<?=base_url()?>/../lib/bootstrap/bootstrap.js"></script>


    <script>
    (document).ready(function ()  {
        $(document).on('submit', '#recuperar', function() {
            alert("Hola");
            var formData = new FormData($(this)[0]);
            

            const url = `${BASE_URL}Register/update_password`;

            $.ajax({
                url: url,
                type: 'POST',
                data:  formData,
                dataType: 'json',
                sucess: function(data) {
                    switch (data.status) {
                        case 200:
                            Toastify({
                                text: data.msg.success,
                                duration: 3000,
                                className: "info",
                                style: {
                                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                                },
                                offset: {
                                    x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                                    y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                                },

                            }).showToast();
                            location.href = BASE_URL + "Mattes/Principal";
                            $('#loader').toggle();
                            break;

                        case 400:
                            Toastify({
                                text: data.msg.success,
                                duration: 3000,
                                className: "info",
                                style: {
                                    background: "linear-gradient(to right, #ef1717 , #f90202 )",
                                },
                                offset: {
                                    x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                                    y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                                },

                            }).showToast();
                            $('#loader').toggle();
                            break;

                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
            
            return false;

        });

    });
    </script>