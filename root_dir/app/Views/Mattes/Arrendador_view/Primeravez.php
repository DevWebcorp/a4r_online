<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->

<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
<div class="alert bg-warning mg-t-100 d-none" id="succes-alert" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span><strong>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA</strong> <span id="success"></span></span>
    </div>
</div>


<section id="primeravez">
    <div class="col-12 principal height-primeravez" >
        <div class="col-12 row justify-content-center ">
            <h1 id="titulo" class="mt-primeravez text-center"> Antes de comenzar, cuéntanos ...</h1>
        </div>
    
        <div class="col-12 col-lg-10 d-sm-flex mx-auto mt-md-5">
            <div class="col-sm-4 card-comienzo mr-sm-1 mx-lg-3">
    
                <div class="col-sm-12 mt-2 mt-md-5 text-center">
                    <img id="agente" class="img-fluid" src="<?= base_url() ?>/assets/img/Iconos/Casa.png" alt="">
                </div>
                <div class="col-12 mt-2 mt-md-5">
                    <p class="text-center subtitulo">Solo quiero rentar mi propiedad</p>
                    <p class="text-center subtitulo mt-3">Propiedades: 2</p>
                    <div class="col-md-12 text-center mt-md-5 mt-xl-4">
                        <button id="1" type="button" class="btn-mattes mt-md-4 mb-1 continuarprop">Quiero rentar</button>
                    </div>
                </div>
    
            </div>
    
            <div class="col-sm-4 card-comienzo mx-sm-2 mx-lg-3">
                <div class="col-sm-12 mt-2 mt-md-5 text-center">
                    <img id="agente" class="img-fluid" src="<?= base_url() ?>/assets/img/Iconos/Agente.png" alt="">
                </div>
                <div class="col-12 mt-2 mt-md-5">
                    <p class="text-center subtitulo">Soy agente inmobiliario</p>
                    <p class="text-center subtitulo mt-3">Propiedades: 2-10</p>
                    <div class="col-md-12 text-center mt-md-5 mt-xl-4">
                        <button id="2" type="button" class="btn-mattes mt-md-5 mb-3 continuarprop">Soy agente</button>
                    </div>
                </div>
            </div>
    
            <div class="col-sm-4 card-comienzo ml-sm-2 ml-lg-3">
                <div class="col-sm-12 mt-2 mt-md-5 text-center">
                    <img id="agente" class="img-fluid" src="<?= base_url() ?>/assets/img/Iconos/Edificios.png" alt="">
                </div>
                <div class="col-12 mt-md-5">
                    <p class="text-center subtitulo">Soy parte de una inmobiliaria</p>
                    <p class="text-center subtitulo mt-3">Propiedades: 10 en adelante</p>
                    <div class="col-md-12 text-center mt-md-4 mt-xl-4">
                        <button id="3" type="button" class="btn-mattes mt-md-5 continuarprop">Soy inmobilaria</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    



<?= $this->endSection() ?>
