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
</style>



 <section class="section-accomd ">
            <div class="container">
                <div class="accomd-modations">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="accomd-modations-header">
                                <h2 class="heading">Mis propiedades</h2>
                                <p>A continuación, te mostramos tus propiedades registradas en nuestra plataforma con las cuales cuentas en este momento.</p>
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

































































<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.js"></script>

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>

<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>

<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.js"></script>

<script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>

<script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.js"></script>
<link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">

<style>
    .accomd-modations-room .text {
        position: absolute;
        background-color: rgba(0,0,0,0.7);
        padding: 10px 20px;
        bottom: 20px;
        left: 0;
        right: 0;
    }
    
</style>

<div id="loader" class="modal fade show" style="display: none; padding-left: 0px;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="d-flex ht-300 pos-relative align-items-center">
            <div class="sk-chasing-dots">
                <div class="sk-child sk-dot1 bg-red-800"></div>
                <div class="sk-child sk-dot2 bg-green-800"></div>
            </div>
        </div>
    </div>
</div> 

<section class="container-fluid casas mg-b-120 height-casas">
    <h3 class="text-center mb-4 hola font-weight-bold">Bienvenid@ </h3>
    <div class="col-12 col-sm-10 col-lg-6 m-auto" style="margin-bottom: 50px !important;">
        <div class="input-group p-3 p-xl-0">
            <div class="input-group-append">
                <button class="lupa-buscar py-0 px-4 pl-xl-3 pr-xl-0" type="button">
                    <i class="ionicons ion-ios-search-strong h2 mb-0 mr-2" style="margin-top: 0.2rem;"></i>
                </button>
            </div>
            <input id="buscar" type="text" name="campo-buscar" class="form-control input-buscar" placeholder="Buscar">
        </div>
    </div>

    <div class="container">
        <div id="sn-propiedades" class="text-center col-12 p-3 mb-5" style="height: 230px; display: none ">
            <h1 class="text-center ">Sin propiedades</h1>
            <img class="img-fluid mg-b-20" src="<?= base_url() ?>/assets/img/anuncio1.jpg" />
        </div>
    </div>

    <div class="grid mx-auto">
    </div>

    <div class="page-load-status mg-t-20">
        <div class="loader-ellips infinite-scroll-request">
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
        </div>
        <p class="infinite-scroll-last">Fin del contenido</p>
        <p class="infinite-scroll-error">No hay mas para cargar</p>
    </div>

</section>


<div id="modal_eliminar" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header btn-danger pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar propiedad</h6>
                <button type="button" class="close text-white " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_delete">
                <div class="modal-lg">
                    <div class="pd-80 pd-sm-80 form-layout form-layout-4">
                        <h5 style="text-align:center;">¿Deseas eliminar la propiedad <span id="mensaje" style="font-weight: bold;"></span>?</h5>
                        <br>
                        <p style="color:red; text-align:center;">No se podrán deshacer los cambios una vez realizada la acción</p>
                        <input type="hidden" id="id_delete" name="id_delete">
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="delete_prop" type="submit" class="btn btn-danger pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<form method="POST" id="propiedad_id">
    <input class="id_propiedad" type="hidden" name="id" id="id">
</form> -->