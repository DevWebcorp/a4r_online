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

<section class="segundo-registro mg-b-120 mg-t-70">
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-12 text-center mt-5">
                <h1 class="registrate"><?= $title ?></h1>
            </div>
            <div class="col-12">
                <!-- <h2 class="text-center mt-3">Sé parte de Mattes</h2> -->

                <!-- <div class="progress mt-3 mb-5">
                    <div class="progress-bar progress-bar-striped bg-sucess progress-bar-animated" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
                </div> -->
                <!-- <div class="row justify-content-center pb-5">
                    <nav class="stepper__wrapper">
                        <ul class="stepper">
                            <li class="stepper__item_active">
                            <p class="stepper__link  stepper__link--active">
                                <span class="stepper__icon">
                                    <span class="badge">1</span>
                                </span>
                                <span class="stepper_text">General</span>
                            </p>
                            </li>
                            <li class="stepper__item_active">
                            <p class="stepper__link stepper__link--active">
                                <span class="stepper__icon">
                                    <span class="badge">2</span>  
                                </span>
                                <span class="stepper_text">Documentación</span>
                            </p>
                            </li>                            
                            <li class="stepper__item">
                            <p class="stepper__link ">
                                <span class="stepper__icon">
                                    <span class="badge">3</span>
                                </span>
                                <span class="stepper_text">Notificaciones</span>
                            </p>
                            </li>
                        </ul>
                    </nav>
                </div> -->

                <div class="tab generales d-flex flex-column flex-lg-row justify-content-center">
                    <button class="tablinks visited mb-1 mr-lg-1"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>General</button>
                    <button class="tablinks active mb-1 mr-lg-1"><i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>Cuéntanos de ti</button>
                    <button class="tablinks faltante mb-1 mr-lg-1"><i class="fa fa-bell-o mr-2" aria-hidden="true"></i>Notificaciones</button>                    
                </div>

                <form class="mg-b-90 mb-lg-4" id="segundo-registro" enctype="multipart/form-data">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="">Universidad más cercana<span class="tx-danger">*</span></label>
                            <input type="text" name="universidad" id="autoComplete" class="" placeholder=" " required style="background-color: white !important; color: rgba(0,0,0,.8) !important; ">
                            <input type="hidden" name="id_univ" id="univ" class="form__input">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="" for="nombre">Carrera</label>
                            <input type="text" class="" id="nombre" name="nombre_career" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="60" placeholder=" ">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="" for="estado">¿De qué estado vienes?<span class="tx-danger">*</span></label>
                            <select class="" name="estado" id="estado" data-placeholder="Selecciona una opción" required>
                                <option value="">Selecciona una opción</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="row justify-content-center mg-t-40 px-3">
                        <div class="col-lg-7">
                            <label class="col-12 px-0 form-control-label">Carta de admisión de la universidad o credencial (vigente)<span class="tx-danger">*</span></label>
                            <div class="col-12 px-0 mg-t-10 mg-sm-t-0">
                                <div class="col-12 file-drop-area">
                                    <span class="choose-file-button">Subir Archivo</span>
                                    <span class="file-message">Arrastra el archivo aqui</span>
                                    <input id="file-carta" required class="file-input" type="file" name="file_carta" accept=".pdf, .jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mg-t-40 px-3">
                        <div class="col-lg-7">
                            <label class="col-12 px-0 form-control-label">Identificación oficial (pasaporte o INE)<span class="tx-danger">*</span></label>
                            <div class="col-12 px-0 mg-t-10 mg-sm-t-0">
                                <div class="col-12 file-drop-area">
                                    <span class="choose-file-button">Subir Archivo</span>
                                    <span class="file-message">Arrastra el archivo aqui</span>
                                    <input id="file-identificacion" required class="file-input" type="file" name="file_INE" accept=".pdf, .jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-12 ml-auto form-group mt-4 text-center">
                        <label for="terminos">Términos y condiciones </label>
                        <input type="checkbox" required id="terminos" class="mr-1" value="">
                    </div>

                    <div class="col-lg-12">
                        <div class="text-right mt-3">
                            <button type="submit" class="btn-teal px-4 py-1" id="siguiente" name="registro-uno"><span style="font-size:18px; cursor: pointer;">Siguiente<i class="fa fa-arrow-circle-right fa-lg ml-1" aria-hidden="true"></i></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
<script src="<?= base_url() ?>/../../assets/lib/jquery/jquery.js"></script>
<script src="<?= base_url() ?>/../../assets/lib/jquery-ui/jquery-ui.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/autoComplete.min.js"></script>


<?= $this->endSection() ?>
