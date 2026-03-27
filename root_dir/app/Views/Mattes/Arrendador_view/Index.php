<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css" />
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
    .detalle-propiedad{
        position: absolute;
        top: 10px;
        right: 30px;
    }
    .eliminar-propiedad{
        position: absolute;
        top: 4px;
        right: 0px;
    }
    
    .btn-secondary:hover {
        border-radius: 0px !important;
        background-color: #fff !important;
        color: #545b62 !important; 
        border: 2px solid #545b62 !important;
    }
    .accomd-modations-room .text h2 {
        color: white;
    }
    
</style>


 <section class="section-accomd mb-5">
    <div class="container">
        <h2 class="heading mb-4 mt-5 mt-lg-0">Mis propiedades</h2>
         <h5 class="">A continuación, te mostramos tus propiedades registradas en nuestra plataforma con las cuales cuentas en este momento.</h5>
        <div id="sn-propiedades" class="col-12 p-3 mb-5" style="display:none">
            <img src="<?= base_url() ?>/assets/img/9527463.jpg" alt="Logo mattes" class="img-fluid ml-2">
            <h3>De momento no cuentas con propiedades registradas. Te invitamos a registrar una.</h3>
        </div>

        <div class="accomd-modations">
            <div class="accomd-modations-content owl-single">                    
                <div class="row grid-template">
                </div>
            </div>
        </div>
    </div>

</section>
<!-- END / ACCOMD ODATIONS -->


<!--Modal eliminar -->
<div id="modal_eliminar" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-danger pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar propiedad</h6>
                <button type="button" class="close text-white " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_delete">
                <div class="modal-body">
                    <div class="form-layout form-layout-4">
                        <h5>¿Deseas eliminar la propiedad <span id="mensaje" style="font-weight: bold;"></span>?</h5>
                        <br>
                        <p style="color:red;">No se podrán deshacer los cambios una vez realizada la acción</p>
                        <input type="hidden" id="id_delete" name="id_delete">
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="delete_prop" type="submit" class="btn btn-danger pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                    <button type="button" class="btn btn-secondary mt-3 py-3 px-5" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<form method="POST" id="propiedad_id">
    <input class="id_propiedad" type="hidden" name="id" id="id">
</form>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
<!-- or -->
<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.js"></script>


<?= $this->endSection() ?>
