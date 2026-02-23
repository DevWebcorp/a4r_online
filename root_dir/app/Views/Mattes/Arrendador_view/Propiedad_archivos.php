<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">
    <link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">
<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

<style>
    .cajon{
        max-width: 100% !important;
        height: auto !important;
    }
</style>

<!-- <div class="alert bg-warning mg-t-100 d-none" id="succes-alert" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span><strong>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA</strong> <span id="success"></span></span>
    </div>
</div> -->

<section class="section-sub-banner  bg-propiedad">
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>DETALLE DE LA PROPIEDAD</h2><!-- 
                <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>
    </div>
</section>

<section class="propiedad_archivos mg-t-70 mb-200 ">
    <div class="container">
        <div class="row" >
            <!-- <nav class="stepper__wrapper">
                <ul class="stepper">
                    <li class="stepper__item">
                    <p class="stepper__link stepper__link--active">
                        <span class="stepper__icon">
                            <span class="badge">1</span>
                        </span>
                        <span class="stepper_text">Generales</span>
                    </p>
                    </li>
                    <li class="stepper__item">
                    <p class="stepper__link stepper__link--active">
                        <span class="stepper__icon">
                            <span class="badge">2</span> 
                        </span>
                        <span class="stepper_text">Localización</span>
                    </p>
                    </li>
                    <li class="stepper__item">
                    <p class="stepper__link stepper__link--active">
                        <span class="stepper__icon">
                            <span class="badge">3</span>  
                        </span>
                        <span class="stepper_text">Servicios</span>
                    </p>
                    </li>
                    <li class="stepper__item">
                    <p class="stepper__link stepper__link--active">
                        <span class="stepper__icon">
                            <span class="badge">4</span>
                        </span>
                        <span class="stepper_text">Documentos</span>
                    </p>
                    </li>
                </ul>
            </nav> -->
            <div class="col-12">
                <div class="tab d-flex flex-column flex-lg-row justify-content-center">
                    <button class="tablinks visited mb-1 mr-lg-1"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Generales</button>
                    <button class="tablinks visited mb-1 mr-lg-1"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Localización</button>
                    <button class="tablinks visited mb-1 mr-lg-1"><i class="fa fa-bath mr-2" aria-hidden="true"></i>Servicios</button>
                    <button class="tablinks active mb-1"><i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>Documentos</button>
                </div>
            </div>

          <!--   <div class="col-lg-10 mx-auto mt-4">
                <h1 class="detalle-prop text-center">Detalle de propiedad</h1>
            </div> -->
            <div class="col-lg-12 mx-auto">
                <span style="font-size: 12px;"><span class="text-primary">*</span> Ten en cuenta que los estudiantes suelen pedir fotos de: habitación, baño, sala, cocina, áreas comunes. Puedes subir un total de 10 fotos en formato jpg, png o mp4 con un tamaño máximo de 10 MB</span>
                <div class="col-12 col-md-10 col-lg-6 mx-auto">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol id="indicadores" class="carousel-indicators">
                        </ol>
                        <div id="elementos" class="carousel-inner">
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon propiedad" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column flex-lg-row mt-5" style="align-items: center;justify-content: center;">
                    <div class="col-lg-4 mg-t-10 mg-sm-t-0 mt-5">
                        <label class="col-sm-12 pl-0 form-control-label">Fotos y videos <span class="text-danger">*</span></label><span style="font-size: 10px;">(mp4 jpg png jpeg)</span>
                        <div class="file-drop-area files" id="files1">
                            <span class="choose-file-button">Subir Archivo</span>
                            <span class="file-message">Arrastra el archivo aqui</span>
                            <input id="file-user" class="file-input" type="file" multiple required accept=".mp4, .jpg, .png .jpeg" name="file">
                        </div>
                        <div id="name_file">
                            <ul class="fileList"></ul>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 mg-t-10 mg-sm-t-0">
                        <label class="col-sm-12 pl-0 form-control-label">Comprobante de domicilio (Opcional)</label> <span style="font-size: 10px;">(pdf, jpg , jpeg o png)</span>
                        <div class="file-drop-area">
                            <span class="choose-file-button">Subir Archivo</span>
                            <span class="file-message">Arrastra el archivo aqui</span>
                            <input id="file-domicilio" class="file-input" type="file" name="file" accept=".pdf, .jpg, .png , .jpge , jpeg">
                        </div>
                    </div>
                    <div class="col-lg-4 mg-t-10 mt-3 mt-lg-0">
                        <label class="col-sm-12 pl-0 form-control-label">Recibo de agua o predial (Opcional)</label><span style="font-size: 10px;">(pdf, jpg , jpeg o png)</span>
                        <div class="file-drop-area">
                            <span class="choose-file-button">Subir Archivo</span>
                            <span class="file-message">Arrastra el archivo aqui</span>
                            <input id="file-recibo" class="file-input" type="file" name="file" accept=".pdf, .jpg, .png , .jpge , jpeg">
                        </div>
                    </div> -->
                </div>
                <div class="col-md-12 mt-4">
                    <div class="col-12 pr-0">
                        <!-- <div class="form-group mt-4 text-center text-primary">
                            <label><input type="checkbox" id="terminos" class="mr-1" value="">Términos y
                                condiciones</label>
                        </div> -->

                        <div class="form-layout-footer text-right mg-t-30">
                            <button id="send_form" type="button" class="btn btn-save mb-2 text-right bordeado"><i
                                    class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i>
                                    Guardar y enviar
                            </button>
                        </div>
                    </div>                   
                </div>

            </div>
        </div>
    </div>
</section>

<div id="mdConfirm" class="modal fade" data-backdrop="static">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-primary pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Detalle de propiedad</h6>
                <!-- <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    
                </button> -->
            </div>
            <div class=" pd-25">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                    <h6>El equipo está verificando sus propiedades, en cuanto todo esté listo, le daremos respuesta
                        al correo que nos compartiste. ¡Muchas gracias!</h6>
                </div><!-- card -->
            </div>
            <div class="modal-footer">
                <button type="button" id='' class="btn btn-warning pd-x-20">
                    <i class='fa fa-upload fa-lg mr-1' aria-hidden="true"></i>
                    <a href="<?= base_url() ?>/Mattes/Arrendador/Detalle_propiedad"
                        class="text-white text-decoration-none">Subir otra propiedad</a>
                </button>
                <button type="button" class="btn btn-success pd-x-20">
                    <i class="fa fa-thumbs-o-up fa-lg mr-1" aria-hidden="true"></i>
                    <a href="<?= base_url() ?>/home-propietario" class="text-white text-decoration-none">Por hoy esta
                        bien</a>
                </button>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    
    <script>
        let id_propiedad = <?php echo json_encode($id_propiedad); ?>;
    </script>
<?= $this->endSection() ?>
