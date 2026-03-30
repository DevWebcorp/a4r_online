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
<section class="section-account parallax bg-registro-propietario">
    <div class="awe-overlay"></div>
    <div class="container">
        <div class="login-register">
            <div class="text text-center">
                <h2>Registro de propietario</h2>
                <?php 
                    if(isset($error)){
                        echo '<div class="alert alert-danger" role="alert">
                                <div class="d-flex align-items-center justify-content-start">
                                    <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                    <span><strong>¡Ha ocurrido un error! <br></strong>'.$error.'</span>
                                </div><!-- d-flex -->
                            </div><!-- alert -->';
                    }else if (isset($success)) {
                        echo '<div class="alert alert-success" role="alert">
                                <div class="d-flex align-items-center justify-content-start">
                                    <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                    <span><strong>Genial! <br></strong>' . $success . '</span>
                                </div><!-- d-flex -->
                            </div><!-- alert -->';
                    }
                ?>
                <form method="POST" action="<?= base_url() ?>/a4r/Registro_propietario/register" class="account_form">
                    <div class="field-form">
                        <input type="email" name="email" class="field-text" placeholder="Correo*" required <?php if (isset($email)) {
                                                                                                                            echo 'value="' . $email . '"';
                                                                                                                        } ?>>
                    </div>
                    <div class="field-form">
                        <input type="password" name="password" class="field-text" placeholder="Contraseña*" required>
                        <span class="view-pass"><i class="lotus-icon-view"></i></span>
                    </div>
                    <div class="field-form">
                        <input type="password" name="confirm_password" class="field-text" placeholder="Confirmar contraseña*" required>
                        <span class="view-pass"><i class="lotus-icon-view"></i></span>
                    </div>
                    <div class="field-form field-submit">
                        <button type="submit" class="awe-btn awe-btn-13">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- END / ACCOUNT -->

<!--HTML-->


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        // Aquí van los scripts específicos de esta página
    </script>
<?= $this->endSection() ?>
