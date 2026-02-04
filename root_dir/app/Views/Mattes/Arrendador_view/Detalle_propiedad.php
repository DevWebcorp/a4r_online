<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">
<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>


<!-- <div class="alert bg-warning mg-t-100 d-none" id="alert_correo" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span><strong>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA</strong> <span id="success"></span></span>
    </div>
</div> -->

<section class="section-sub-banner bg-9">
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>DETALLE DE LA PROPIEDAD</h2><!-- 
                <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>
    </div>
</section>

<div class="container form-border mg-b-170">
    <div class="row">
        <div class="col-12 mg-t-10">
            <div class="tab generales d-flex flex-column flex-lg-row justify-content-center">
                <button class="tablinks active mb-1 mr-lg-1"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Generales</button>
                <button class="tablinks faltante mb-1 mr-lg-1"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Localización</button>
                <button class="tablinks faltante mb-1 mr-lg-1"><i class="fa fa-bath mr-2" aria-hidden="true"></i>Servicios</button>
                <button class="tablinks faltante mb-1 "><i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>Documentos</button>
            </div>

           
            <form class="mb-5" id="detalle-propiedad" enctype="multipart/form-data">
                <div class="col-12">
                    <div class="form-group">
                        <label class="" for="nombre-propiedad">
                            Nombre<span class="tx-danger">*</span>
                        </label>
                        <input type="text" class="" id="nombre-propiedad" name="nombre_propiedad" minlength="5" maxlength="50" autocomplete="off" placeholder=" " required>
                            <!--  <div class="col-lg-7 form__group">
                            <input type="text" class="form__input" id="nombre-propiedad" name="nombre_propiedad" minlength="5" maxlength="50" autocomplete="off" placeholder=" " required>
                            <label class="form__label">Nombre corto <span class="text-danger">*</span></label>
                            <div class="requirements">
                                Tiene que tener mínimo 5 caracteres
                            </div>
                        </div> -->
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                        <label class="" for="validationTextarea">
                           Describe tu propiedad<span class="tx-danger">*</span>
                        </label>
                        <textarea class="" id="validationTextarea" name="descripcion" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ-z0-9\s]+" minlength="5" maxlength="250" autocomplete="off" placeholder=" " required></textarea>
                            <!--  <div class="col-lg-7 form__group">
                            <textarea class="form__input" id="validationTextarea" name="descripcion" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ-z0-9\s]+" minlength="5" maxlength="250" autocomplete="off" placeholder=" " required></textarea>
                            <label class="form__label">Describe tu propiedad<span class="text-danger">*</span></label>
                            <div class="requirements">
                                Tiene que tener mínimo 5 caracteres
                            </div>
                        </div> -->
                    </div>
                </div>
              
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="" for="disponibilidad">
                            Disponible a partir de<span class="tx-danger">*</span>
                        </label>
                        <input type="date" style="display: block;" id="disponibilidad" name="disponibilidad" class="" placeholder=" " required>
                        <!-- <input type="date" id="disponibilidad" name="disponibilidad" class="form__input" placeholder=" " required>
                        <label class="form__label">Disponible a partir de: <span class="text-danger">*</span></label> -->
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="" for="tipo-alojamiento">Tipo de alojamiento<span class="text-danger">*</span></label>
                        <select id="tipo-alojamiento" name="tipo_alojamiento" class="" data-placeholder="Choose Browser" required>
                            <div class="valid-feedback">Valido.</div>
                            <div class="invalid-feedback">SELECCIONA VALOR VALIDO</div>
                        </select>
                    </div>
                </div>

                <div class="col-lg-12 row mx-auto px-0 text-md-right mt-5">
                    <div class="col-sm-12 text-center text-md-right pl-lg-0">
                        <div class="d-flex flex-column flex-sm-row justify-content-end">
                            <!-- <button class="btn-danger mr-sm-2 mb-2 mb-sm-0 px-4 py-1" id="btncontinuar_detalles" name="continuar-detalles">
                                <a href="<?= base_url() ?>/Mattes/Arrendador/Index" class="text-white" style="text-decoration: none;">
                                    <i class="fa fa-sign-out fa-lg mr-1" aria-hidden="true"></i>Salir sin guardar
                                </a>
                            </button> -->
                            <button type="submit" class="btn-save px-4 py-1" id="btnsiguiente_detalles" name="siguiente_detalles"><span style="font-size:18px;">Guardar</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> 
</div> 

<form method="POST" id="ubicacion" action="<?php echo base_url() ?>/propiedad-ubicacion">
    <input type="hidden" name="id" id="id">
</form>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
    <script src="<?= base_url() ?>/assets/lib/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>/assets/lib/jquery-ui/jquery-ui.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> 
    
    
    <script>
        //Fecha posterior de entrada
        var fecha = new Date();
        fecha.setDate(fecha.getDate() + 1);
        var dia = ("0" + fecha.getDate()).slice(-2);
        var mes = ("0" + (fecha.getMonth() + 1)).slice(-2);
        var hoyMasUnDia = fecha.getFullYear()+"-"+(mes)+"-"+(dia) ;

        document.getElementById("disponibilidad").setAttribute("min", hoyMasUnDia);
        let id_goup = <?php echo json_encode($grupo); ?>;
    </script>
<?= $this->endSection() ?>

