<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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

<div class="container mg-t-70 mg-b-120">
    <form id="form-detalles-servicios" class=" " enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
               <!--  <nav class="stepper__wrapper">
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
                                <span class="stepper_text ">Localización</span>
                            </p>
                        </li>
                        <li class="stepper__item_active">
                            <p class="stepper__link stepper__link--active">
                                <span class="stepper__icon">
                                    <span class="badge">3</span>          
                                </span>
                                <span class="stepper_text ">Servicios</span>
                            </p>
                        </li>
                        <li class="stepper__item">
                            <p class="stepper__link stepper__link--disabled">
                                <span class="stepper__icon">
                                    <span class="badge">4</span>
                                </span>
                                <span class="stepper_text ">Documentos</span>
                            </p>
                        </li>
                    </ul>
                </nav> -->

                <div class="tab d-flex flex-column flex-lg-row justify-content-center mb-lg-5">
                    <button class="tablinks visited mb-1 mr-lg-1"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Generales</button>
                    <button class="tablinks visited mb-1 mr-lg-1"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Localización</button>
                    <button class="tablinks active mb-1 mr-lg-1"><i class="fa fa-bath mr-2" aria-hidden="true"></i>Servicios</button>
                    <button class="tablinks faltante mb-1"><i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>Documentos</button>
                </div>

               <!--  <div class="mg-t-30 text-center">
                    <h1 class="detalle-prop mb-5">Detalle de propiedad</h1>
                </div> -->
            
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="" style="left:18px;">Número de roomies</label>
                            <input type="number" class="" id="roomies" name="numero_roomies" placeholder=" " pattern="^[0-9]+" min="0" max="10" required>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="">Número de camas</label>
                            <input type="number" class="" id="camas" name="numero_camas" placeholder=" " pattern="^[0-9]+" min="0" max="10" required>
                        </div>
                    </div>
                   
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="">Número de baños</label>
                            <select id="baños" name="numero_baños" class="" data-placeholder="Choose Browser" required>
                                <option value="">Selecciona</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="">Baño</label>
                            <select id="tipo-baño" name="tipo_baño" class="" data-placeholder="Choose Browser" required>
                                <option value="">Selecciona</option>
                                <option value="Compartido">Compartido</option>
                                <option value="Privado">Privado</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="">Petfriendly</label>
                            <select id="petfriendly" name="petfriendly" class="" data-placeholder="Choose Browser" required>
                                <option value="">Selecciona</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="">Disponible para: </label>
                            <select id="disponible" name="disponible" class="" data-placeholder="Choose Browser" required>
                                <option value="">Selecciona</option>
                                <option value="Mujeres">Mujeres</option>
                                <option value="Hombres">Hombres</option>
                                <option value="Mixto">Mixto</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="capacidades-diferentes"> Acceso para personas con capacidades diferentes</label>
                        <input type="checkbox" id="capacidades-diferentes" name="capacidades">
                    </div>
                    <div class="col-lg-1">
                        <label for="wifi"> Wifi</label>
                        <input type="checkbox" id="wifi" name="wifi">
                    </div>
                    <div class="col-lg-1">
                        <label for="limpieza">Limpieza</label>
                        <input type="checkbox" id="limpieza" name="limpieza">
                    </div>
                    <div class="col-lg-2">
                        <label for="estacionamiento"> Estacionamiento</label>
                        <input type="checkbox" id="estacionamiento" name="estacionamiento" onchange="javascript:showContent()">
                    </div>
                    <div class="col-lg-3 pl-0">
                        <div class="form-group" id="num_cajones">
                            <label class="">Número de cajones</label>
                            <select id="cajones-estacionamiento" name="cajones" class="" data-placeholder="Choose Browser">
                                <option value="">Selecciona</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <!--  <input type="number" class="form-control" id="cajones-estacionamiento" name="cajones" placeholder=" " pattern="^[0-9]+" minlength="1" maxlength="3" title="Solo se permiten números" required> -->
                        </div>
                    </div>

                    <div class="col-lg-1">
                        <label for="seguridad"> Seguridad</label>
                        <input type="checkbox" id="seguridad" name="seguridad">
                    </div>
                    <div class="col-lg-1">
                        <label for="lavadora"> Lavadora</label>
                        <input type="checkbox" id="lavadora" name="lavadora">
                    </div>
                    <div class="col-lg-1">
                        <label for="cocina"> Cocina</label>
                        <input type="checkbox" id="cocina" name="cocina">
                    </div>

                    <input type="hidden" class="form-control id_propiedad" name="id_propiedad">

                    <div class="col-12 row mx-auto px-0 text-md-right mt-5 pr-lg-3">
                        <div class="col-12 text-center text-md-right px-0 pr-lg-3">
                            <div class="d-flex flex-column flex-sm-row justify-content-end">
                                <button class="btn-danger mr-sm-1 mb-2 mb-sm-0" id="btncontinuar_servicios" name="continuar-servicios" >
                                    <a href="<?= base_url() ?>/Mattes/Arrendador/Index" class="text-white" style="text-decoration: none;">
                                        <i class="fa fa-sign-out fa-lg mr-1" aria-hidden="true"></i>Salir sin guardar
                                    </a>
                                </button>
                                <button type="submit" class="btn-save " id="btnsiguiente_servicios" name="siguiente-servicios">
                                    <i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Guardar</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<form method="POST" id="form-img" action="<?php echo base_url() ?>/propiedad-documentos">
    <input  class="id_propiedad" type="hidden" name="id" id="id">
</form>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        let id_propiedad = <?php echo json_encode($id_propiedad); ?>;
    </script>

    <script type="text/javascript">
        function showContent() {
            element = document.getElementById("num_cajones");
            check = document.getElementById("estacionamiento");
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }
    </script>

<?= $this->endSection() ?>


