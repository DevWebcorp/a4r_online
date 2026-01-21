<?= $this->extend('layout/main') ?>
<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
    <style>
        .logo-container {
            margin: 20px 0 30px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-login {
            max-width: 300px;
            height: auto;
            width: 100%;
            object-fit: contain;
        }

        /* Responsive para pantallas pequeñas */
        @media (max-width: 768px) {
            .logo-login {
                max-width: 150px;
            }
        }

        /* Responsive para móviles */
        @media (max-width: 480px) {
            .logo-login {
                max-width: 120px;
            }
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section-account parallax bg-11">
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="login-register">
                <div class="text text-center">
                    
                    <div class="logo-container">
                        <img src="<?= base_url('../assets/img/Logo-PlataformA4R.png') ?>" alt="Logo A4R" class="logo-login">
                    </div>
                    <h5>Iniciar Sesión</h5>
                    <form method="$_POST" class="account_form">
                        <div class="field-form">
                            <input type="text" class="field-text" placeholder="Correo" name="email">
                        </div>
                        <div class="field-form">
                            <input type="password" class="field-text" placeholder="Contraseña" name="password">
                            <span class="view-pass"><i class="lotus-icon-view"></i></span>
                        </div>
                        <div class="field-form field-submit">
                            <button type="submit" id="btnLoginSubmit" class="awe-btn awe-btn-13">Entrar</button>
                        </div>
                        <span class="account-desc">No tengo una cuenta - <a href="#">Olvidé la contraseña</a></span>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    var baseUrl = "<?= base_url() ?>";
</script>
<script src="<?= base_url() ?>/assets/lib/jquery/jquery.js"></script>
<script src="<?= base_url() ?>/assets/js/Mattes/Login.js"></script>
<?= $this->endSection() ?>








