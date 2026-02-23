<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">
<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

<!-- 
<div class="alert bg-warning mg-t-100 d-none" id="alert_correo" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span><strong>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA</strong> <span id="success"></span></span>
    </div>
</div> -->

<style>
    .form-control{
        border-radius: 0px !important;
        color: #000;
    }
</style>

<section class="conversacion mg-b-210">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ml-auto datos px-0">
                <div class="form-label">
                    <label for="nombre" class="col-4">Nombre del agente</label>
                    <input type="text" name="nom" class="" placeholder="" id="nombre" readonly>
                </div>
                <!-- <div class="row mg-t-20">
                    <label for="renta" class="col-sm-4 form-control-label">Renta mensual</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" name="renta_mensual" class="form-control" placeholder="" id="renta" readonly>
                    </div>
                </div>    -->
            </div>
        </div>
        
        <div class="col-12"> 
            <div class="container">
                <div class="row chat-box">
                
                </div>
            </div>
        </div>
        <form method="post" name="conversacion" id="conversacion" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-12 mg-t-30 px-0">
                        <div class="col-sm-12 mg-t-10 mg-sm-t-0 px-0">
                            <input id="contestacion" name="contestacion" type="text" class="borde form-control" placeholder="Escribe tu mensaje" required>
                            <input id="renter" name="renter" type="hidden" class="form-control">
                            <input id="conver_id" name="conver_id" type="hidden" class="form-control" value="<?php echo ($conversacion) ?>">
                        </div>
                        <div class="form-layout-footer text-right mg-t-30 mb-5">
                            <button id="enviar_msg" class="btn-teal mt-4 px-2 py-2" style="float: right;" type="submit"><i class="fa fa-paper-plane-o fa-lg mr-1" aria-hidden="true"></i>Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <input id="n_renter" name="n_renter" type="hidden" class="form-control">
    </div>
    
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    let id_group = <?php echo json_encode($group); ?>;
    let id_usuario = <?php echo json_encode($id_usuario); ?>;
    let id_conversacion = <?php echo json_encode($conversacion); ?>;
</script>


<?= $this->endSection() ?>

