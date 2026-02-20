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

<!-- <div id="loader" class="modal fade show" style="display: none; padding-left: 0px;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="d-flex ht-300 pos-relative align-items-center">
            <div class="sk-chasing-dots">
                <div class="sk-child sk-dot1 bg-red-800"></div>
                <div class="sk-child sk-dot2 bg-green-800"></div>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="alert bg-warning mg-t-100 d-none" id="succes-alert" role="alert">
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

<section class="propiedad_ubicacion mg-t-70 ">
    <div class="container">
        <div class="row ">
            <!-- <nav class="stepper__wrapper">
                <ul class="stepper">
                    <li class="stepper__item_active">
                    <p class="stepper__link  stepper__link--active">
                        <span class="stepper__icon">
                            <span class="badge">1</span>
                        </span>
                        <span class="stepper_text">Generales</span>
                    </p>
                    </li>
                    <li class="stepper__item_active">
                    <p class="stepper__link stepper__link--active">
                        <span class="stepper__icon">
                            <span class="badge">2</span>  
                        </span>
                        <span class="stepper_text">Localización</span>
                    </p>
                    </li>
                    <li class="stepper__item">
                    <p class="stepper__link ">
                        <span class="stepper__icon">
                            <span class="badge">3</span>          
                        </span>
                        <span class="stepper_text">Servicios</span>
                    </p>
                    </li>
                    <li class="stepper__item">
                    <p class="stepper__link ">
                        <span class="stepper__icon">
                            <span class="badge">4</span>
                        </span>
                        <span class="stepper_text">Documentos</span>
                    </p>
                    </li>
                </ul>
            </nav> -->
            <div class="col-12 mb-lg-4">
                <div class="tab d-flex flex-column flex-lg-row justify-content-center">
                    <button class="tablinks visited mb-1 mr-lg-1"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Generales</button>
                    <button class="tablinks active mb-1 mr-lg-1"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Localización</button>
                    <button class="tablinks faltante mb-1 mr-lg-1"><i class="fa fa-bath mr-2" aria-hidden="true"></i>Servicios</button>
                    <button class="tablinks faltante mb-1"><i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>Documentos</button>
                </div>
            </div>

            <div class="col-12 mt-2">
               <!--  <h1 class="text-center mt-3 prop-ubi">Detalle de propiedad</h1> -->
            </div>
            
            <form class=" " id="propiedad_ubicacion">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-12">
                            <label class="">Dirección [calle, número, colonia, CP, estado]<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" class="" id="direccion" name="direccion" aria-describedby="button-addon2" placeholder=" " required>
                                <input class="id_propiedad" type="hidden" name="id_propiedad" placeholder="">
                                <!--  <div class="input-group-append">
                                    <button class="btn-outline-secondary" type="button" id="button-addon2" style="border-radius: 10px;"><i class="fa fa-map-marker mr-1 text-secondary" aria-hidden="true"></i>Buscar</button>
                                </div> -->
                            </div>
                            <!--  <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                                <input type="text" id="direccion" name="direccion" class="form-control formulario__input" placeholder="" aria-describedby="button-addon2">
                                <button id="button-addon2"  type="button"  class="ml-3 btn btn-teal pd-x-20 btncolor"><i class="fa fa-map-marker ml-1" aria-hidden="true"></i></button></span>
                            </div> -->
                        </div>                        

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="">Código postal <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="ZIP_CODE" id="cp_search" class="form-control formulario__input" placeholder=" " autocomplete="off" required minlength="13" maxlength="200">
                                    <input type="hidden" name="ID_CODE" id="cp_id" class="form-control " placeholder=" " required>
                                    <span class="input-group-addon"><i class="icon ion-search tx-16 lh-0 op-6"></i></span>
                                    <ul id="cpResult"></ul>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>

                        <!-- ubicacion casa -->
                        <input id="casalat" type="hidden" name="latitud" class="form-control" placeholder="">
                        <input id="casalong" type="hidden" name="longitud" class="form-control" placeholder="">
                        
                        <div class="row mg-t-20">
                            <!--  <label class="col-sm-4 form-control-label">Dirección 2</label> -->
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="hidden" id="direccion_dos" name="direccion_dos" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="">Delegación o municipio<span class="text-danger">*</span></label>
                                <input type="text" id="delegacion" name="delegacion" class="" placeholder=" " readonly style="background-color: #e9ecef;">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="">Estado<span class="text-danger">*</span></label>
                                <input type="text" id="estado" name="estado" class="" placeholder=" " readonly style="background-color: #e9ecef;">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="">Colonia<span class="text-danger">*</span></label>
                                <input type="text" id="colonia" name="colonia" class="" placeholder=" " readonly style="background-color: #e9ecef;">
                            </div>
                        </div>
                        <!--   <div class="row mg-t-20">
                            <button type="button" id="submit_form_busqueda"
                                class="ml-3 btn btn-teal pd-x-20 btncolor">Buscar dirección <i
                                    class="fa fa-map-marker ml-1" aria-hidden="true"></i></button>
                        </div> -->

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="precio" class="">Precio<span class="text-danger">*</span></label>
                                <input type="text" name="precio" min="0" pattern="[0-9]+,[0-9]+.[0-9]+" class="" placeholder=" " id="precio" pattern="[0-9]+)?" minlength="4" maxlength="8" title="Solo se permiten números" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="">Usted vive en la propiedad<span class="text-danger">*</span></label>
                                <select class="" name="habita_propiedad" id="h_propiedad" required>
                                    <option value="">Selecciona </option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="">Universidad más cercana<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="universidad" id="autoComplete" class="" autocomplete="off" placeholder=" " required style="background-color: white !important; color: rgba(0,0,0,.8) !important; border: 2px solid #000 !important;">
                                <input type="hidden" name="id_univ" id="univ" class="form-control ">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="">Distancia<span class="text-danger">*</span></label>
                                <input type="text" id="distancia" name="distancia" class="" placeholder=" " readonly required style="background-color: #e9ecef;">
                            </div>
                        </div>
                        <!--  <div class="col-12 col-lg-11 px-0 mt-2 mb-4 my-lg-0 pr-lg-4">
                            <div class="d-flex flex-column flex-sm-row justify-content-end">
                                <button class="btn btn-outline-primary py-1 px-4" id="calcular" type="button"><i class="fa fa-calculator" aria-hidden="true"></i>
                                    Calcular Distancia</button>
                            </div>
                        </div> -->

                        <div class="col-12 mx-auto mt-3 mt-lg-5 px-0 pl-lg-4 pr-lg-3">
                            <div class="col-12 pt-4" id="map" style="height: 500px;">
                            </div>
                        </div>

                        <div class="col-12 row mx-auto px-0 text-md-right mt-5">
                            <div class="col-12 text-center text-md-right px-0 pr-lg-3">
                                <div class="d-flex flex-column flex-sm-row justify-content-end">
                                    <button class="btn-danger mr-sm-2 mb-2 mb-sm-0" id="submit_ficha">
                                        <a href="<?= base_url() ?>/Mattes/Arrendador/Index" class="text-white" style="text-decoration: none;"><i class="fa fa-sign-out fa-lg mr-1" aria-hidden="true"></i>Salir sin guardar</a>
                                    </button>
                                    <button type="submit" class="btn-teal">
                                        <i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Guardar</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            
        </div>
    </div>
</section>

<form method="POST" id="servicios" class="mb-200" action="<?php echo base_url() ?>/propiedad-servicios">
    <input class="id_propiedad" type="hidden" name="id_propiedad" id="id">
</form>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/autoComplete.min.js"></script>

    <script src="https://unpkg.com/currency.js@2.0.4/dist/currency.min.js"></script>

    <script>
        let id_propiedad = <?php echo json_encode($id_propiedad); ?>;

        $('#precio').on('change', function() {
            let precio = $(this).val();
            let new_precio = currency(precio, {
                symbol: "",
                separator: ","
            }).format();
            console.log(new_precio);
            $('#precio').val(new_precio);
        });
    </script>


<?= $this->endSection() ?>


<style>
    .autoComplete_wrapper>ul>li {
        height: 68px !important;
        overflow-x: auto !important;
        text-overflow: inherit !important;
    }
</style>