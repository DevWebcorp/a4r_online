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

<section class="section-sub-banner bg-9">
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>BENEFICIOS</h2><!-- 
                <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>
    </div>
</section>

<section class="beneficios_invitacion mg-b-210 mb-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 m-auto">
                <h1 class="text-center">Invita a otro propietario</h1>
                <div class="d-flex flex-column align-items-center justify-content-around flex-sm-row">
                    <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Beneficios_Insta.png" alt="Logo mattes" class="mg-fluid wd-90 rounded-circle ml-2">
                    <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Beneficios_Balanza.png" alt="Logo mattes" class="mg-fluid wd-90 rounded-circle ml-2">
                    <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Beneficios_Bicicleta.png" alt="Logo mattes" class="mg-fluid wd-90 rounded-circle ml-2">
                    <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Beneficios_Mano.png" alt="Logo mattes" class="mg-fluid wd-90 rounded-circle ml-2">
                    <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Beneficios_Diamante.png" alt="Logo mattes" class="mg-fluid wd-90 rounded-circle ml-2">
                </div>
                <p class="mt-5">Nota: Solo se aplicarán los beneficios en caso de que dicha persona ingrese y su cuenta sea verificada con éxito por Mattes</p>

                <form method="post" id="beneficios_invitacion">
                    <div class="row" id = "drow">
                        <div class="col-sm-5">
                            <div class="form-group" id = "rnombre">
                                <label class="">Nombre de la persona</label>
                                <div class="" id="dnombre">
                                    <input type="text" id="nombre" name="nombre[]" class="" placeholder="Nombre completo" title="Solo se permiten letras" autocomplete = "off">
                                </div> 
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group" id = "rcorreo">
                                <label class="">Correo de la persona</label>
                                <div class="" id = "dcorreo">
                                    <input type="email" id="correo" name="correo[]" class="" placeholder="nombre@dominio.com" autocomplete = "off">
                                </div> 
                            </div>
                        </div>
                        <div class="col-sm-2 mt-sm-4" id = "btns">
                            <div class="row mg-t-10 justify-content-center">
                                <button type="button" class="btn btn-primary mg-t-30" id = "clone">
                                    <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submmit" class="py-1 px-3 btn-save mt-4" id = "sendmail">
                            <i class="fa fa-envelope-o fa-lg mr-2" aria-hidden="true"></i><a class="text-white">Enviar</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<form method="POST" id="usuario_id" >
    <input class="id_usuario" type="hidden" name="id" id="id">
</form>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
    <script src="<?= base_url() ?>/assets/lib/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>/assets/lib/jquery-ui/jquery-ui.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?= $this->endSection() ?>