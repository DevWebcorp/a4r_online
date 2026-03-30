<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
 <link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">
<?= $this->endSection() ?>


<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

<?= $this->include('Layout/header') ?>

 <!-- ACCOUNT -->
        <section class="section-account parallax bg-login">
            <div class="awe-overlay"></div>
            <div class="container">
                <div class="login-register">
                    <div class="text text-center">
                        <h2>Inicio de sesión</h2>
                        <p>Ingresa tu correo y contraseña</p>
                        <form method="POST" action="<?php echo base_url() . '/a4r/Login/verify_login' ?>" class="account_form">
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
                            <div class="field-form">
                                <input type="text" class="field-text" name="email" placeholder="Usuario" required>
                            </div>
                            <div class="field-form">
                                <input type="password" class="field-text" placeholder="Contraseña" name="password" required>
                                <span class="view-pass"><i class="lotus-icon-view"></i></span>
                            </div>
                            <div class="field-form field-submit">
                                <button type="submit" class="awe-btn awe-btn-13">Entrar</button>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <a href="<?php echo base_url() . '/a4r/Registro' ?>"><span class="account-desc">No tengo una cuenta</span></a>
                                <a href="<?php echo base_url() . '/Register/password_recover' ?>"><span class="account-desc">¿Olvidaste tu contraseña?</span></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / ACCOUNT -->

<!-- END / ROOM -->
   

<!--HTML-->


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        // Aquí van los scripts específicos de esta página
    </script>
<?= $this->endSection() ?>
