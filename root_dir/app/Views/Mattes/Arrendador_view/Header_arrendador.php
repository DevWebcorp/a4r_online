<!-- <div class="alert bg-warning mg-t-100 d-none" id="alert_correo" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span><strong>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA</strong> <span id="success"></span></span>
    </div>
</div> -->
<style>
    .btn-agregar{
        color: #fff !important;
        background-color: #eea236 !important;
        border-color: #eea236 !important;
    }
    .btn-agregar:hover{
        color: #eea236 !important;
        background-color: #fff !important;
        border-color: #000 !important;
    }
    .accomd-modations-room .text h2 a:hover {
        text-decoration: none;
    }
</style>

<section class="pt-md-1 mt-md-5">
    <div class="container mt-md-5">
        <div class="row ">
            <div class="col-12 mt-5 pt-3 pt-lg-0 mt-md-3 text-right">
                <a href="<?= base_url() ?>/subir-propiedad" title="Agregar propiedad" class="btn btn-agregar mb-3 mb-sm-0">
                    <div class="d-flex align-items-center">
                        <img src="<?= base_url() ?>/assets/img/Iconos/AgregarPropiedad.png" class="img-fluid wd-30 ml-2" alt="Agregar Propiedad">
                        <span>Agregar propiedad</span>
                    </div>
                </a>
                <a href="<?= base_url() ?>/beneficios" class="text-center btn btn-agregar" title="Invita a otro propietario">
                    <div class="d-flex align-items-center">
                        <img src="<?= base_url() ?>/assets/img/Iconos/Compartir.png" class="img-fluid wd-30 ml-lg-3" alt="Compartir">
                        <span>Invitar propietarios</span>
                    </div>
                </a>                
            </div>
        </div>
    </div>
</section>