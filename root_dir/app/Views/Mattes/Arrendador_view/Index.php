<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">
    <link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">

    <!--prefijo -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    <link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">
<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

<!-- <div class="alert bg-warning mg-t-100 d-none" id="succes-alert" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span><strong>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA</strong> <span id="success"></span></span>
    </div>
</div> -->

<style>
    .tab{
        border: 1px solid transparent;
        background-color:transparent;
    }
    .tablinks.active,
    .nav-tabs .nav-link.active{
        border: 1px solid #000 !important;
        border-radius: 0px !important;
        color: white !important;
        background-color: #000 !important;
    }
    .tablinks.faltante,
    .nav-tabs .nav-link,
    .tab button {
        border: 1px solid #000;
        border-radius: 8px !important;
        border-radius: 0px !important;
        color: #000;
        background-color: white !important;
    }
    .tablinks.faltante:hover,
    .nav-tabs .nav-link:hover,
    .tab button:hover {
        border: 1px solid #000;
        border-radius: 0px !important;
        color: white;
        background-color: #000 !important;
    }
    .accomd-modations-room .text .price .amout {
        color: #fff !important;
    }
    .accomd-modations-room .img img {
        height: 330px;
        overflow: hidden;
    }
    .accomd-modations {
        padding: 0;
    }
</style>


 <section class="section-accomd mb-5">
    <div class="container">
        <div id="sn-propiedades" class="text-center col-12 p-3 mb-5 bg-white rounded" style="height: 230px; display: none ">
            <h2 class="heading mb-4">Mis propiedades</h2>
            <p>A continuación, te mostramos tus propiedades registradas en nuestra plataforma con las cuales cuentas en este momento.</p>
            <div class="col-12">
                <h3>De momento no cuentas con propiedades registradas. Te invitamos a registrar una.</h3>
                <!-- <img src="<?= base_url() ?>/assets/img/9527463.jpg" alt="Logo mattes" class="img-fluid ml-2"> -->
            </div>
            </h1>
        </div>
        <div class="accomd-modations">
            <div class="row">
                <div class="col-md-12">
                    <div class="">
                       
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="accomd-modations-content owl-single">
                        <div class="row grid-template">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- END / ACCOMD ODATIONS -->



<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
<script src="<?= base_url() ?>/../../assets/lib/jquery/jquery.js"></script>
<script src="<?= base_url() ?>/../../assets/lib/jquery-ui/jquery-ui.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/autoComplete.min.js"></script>


<?= $this->endSection() ?>
