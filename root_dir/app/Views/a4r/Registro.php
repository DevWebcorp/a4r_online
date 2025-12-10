<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
 <link rel="stylesheet" type="text/css" href="<?= base_url('/../templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/helper.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('/../templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/custom.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('/../templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/css/responsive.css') ?>">

<?= $this->endSection() ?>


<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>
<style>
    .section-deals .item-deal:hover img {
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>


<!-- ACCOUNT -->
<section class="section-account parallax bg-11 section-deals">
    <div class="awe-overlay"></div>
        <div class="container">
            <div class="login-register">
                <div class="text text-center">
                    <div class="container">
                        <div class="content">
                            <div class="row">
                                <div class="col col-xs-12 col-lg-6 col-lg-offset-3">
                                    <div class="ot-heading row-20 mb30 text-center">
                                        <h2>Registro</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row v-align">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="item item-deal">
                                        <div class="img">
                                            <img class="img-responsive" src="<?= base_url('../assets/img/anuncio8.jpg') ?>"> 
                                        </div>
                                        <div class="info">
                                            <a class="title bold f26 font-monserat upper" href="<?=base_url()?>/a4r/Registro_propietario">Registro <br> propietario</a> <br>
                                            <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="<?=base_url()?>/a4r/Registro_propietario">Registrarse</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="item item-deal">
                                        <div class="img">
                                            <img class="img-responsive" src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/home/ourbest/img-1.jpg') ?>"> 
                                        </div>
                                        <div class="info">
                                            <a class="title bold f26 font-monserat upper" href="<?=base_url()?>/a4r/Registro_usuario">Registro <br> usuario</a> <br>
                                            <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="<?=base_url()?>/a4r/Registro_usuario">Registrarse</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / ACCOUNT -->

<!--HTML-->


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>   
 

<?= $this->endSection() ?>
