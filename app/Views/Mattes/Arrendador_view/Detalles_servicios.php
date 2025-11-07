<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<div class="alert bg-warning mg-t-100 d-none" id="succes-alert" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span><strong>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA</strong> <span id="success"></span></span>
    </div><!-- d-flex -->
</div><!-- alert -->

<div class="container mg-t-70 mg-b-120">
    <form id="form-detalles-servicios" class="mb-200 " enctype="multipart/form-data">
        <div class="row" style="margin-top: 135px;">
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

                <div class="tab d-flex flex-column flex-lg-row justify-content-center">
                    <button class="tablinks visited mb-1 mr-lg-1"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Generales</button>
                    <button class="tablinks visited mb-1 mr-lg-1"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Localización</button>
                    <button class="tablinks active mb-1 mr-lg-1"><i class="fa fa-bath mr-2" aria-hidden="true"></i>Servicios</button>
                    <button class="tablinks faltante mb-1"><i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>Documentos</button>
                </div>

                <div class="mg-t-30 text-center">
                    <h1 class="detalle-prop mb-5">Detalle de propiedad</h1>
                </div>
            
            </div>
            <div class="col-lg-6 row">
                <div class="col-12">
                    <div class="mg-t-20 row">
                        <div class="col-lg-6 form__group">
                            <input type="number" class="form__input" id="roomies" name="numero_roomies" placeholder=" " pattern="^[0-9]+" min="0" max="10" required>
                            <label class="form__label" style="left:18px;">Número de roomies</label>
                            <div class="requirements">
                                Solo se permiten números positivos
                            </div>
                        </div>
                        <div class="col-lg-6 form__group mt-5 mt-lg-0">
                            <input type="number" class="form__input" id="camas" name="numero_camas" placeholder=" " pattern="^[0-9]+" min="0" max="10" required>
                            <label class="form__label">Número de camas</label>
                            <div class="requirements">
                                Solo se permiten números positivos
                            </div>
                        </div>
                    </div>
                    <div class="row mg-t-30">
                        <div class="col-lg-6 mg-t-10">
                            <div class="form__group">
                                <select id="baños" name="numero_baños" class="form__input select2" data-placeholder="Choose Browser" required>
                                    <option value="">Selecciona</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <label class="form__label">Número de baños</label>
                            </div>
                        </div>
                        <div class="col-lg-6 mg-t-40 mt-lg-2">
                            <div class="form__group">
                                <select id="tipo-baño" name="tipo_baño" class="form__input select2" data-placeholder="Choose Browser" required>
                                    <option value="">Selecciona</option>
                                    <option value="Compartido">Compartido</option>
                                    <option value="Privado">Privado</option>
                                </select>
                                <label class="form__label">Baño</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mg-t-40">
                        <div class="col-lg-6">
                            <div class="form__group">
                                <select id="petfriendly" name="petfriendly" class="form__input select2" data-placeholder="Choose Browser" required>
                                    <option value="">Selecciona</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                                <label class="form__label">Petfriendly</label>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-5 mt-lg-0">
                            <div class="form__group">
                                <select id="disponible" name="disponible" class="form__input select2" data-placeholder="Choose Browser" required>
                                    <option value="">Selecciona</option>
                                    <option value="Mujeres">Mujeres</option>
                                    <option value="Hombres">Hombres</option>
                                    <option value="Mixto">Mixto</option>
                                </select>
                                <label class="form__label">Disponible para: </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="col-12 pl-1 pl-lg-4 mg-t-20">
                    <input type="checkbox" id="capacidades-diferentes" name="capacidades">
                    <label for="capacidades-diferentes"> Acceso para personas con capacidades
                        diferentes</label><br>
                    <input type="checkbox" id="wifi" name="wifi">
                    <label for="wifi"> Wifi</label><br>
                    <input type="checkbox" id="limpieza" name="limpieza">
                    <label for="limpieza"> Limpieza</label><br>
                    <div class="col-12">
                        <div class="row flex-column">
                            <div class="pl-0 col-lg-5">
                                <input type="checkbox" id="estacionamiento" name="estacionamiento" onchange="javascript:showContent()">
                                <label for="estacionamiento"> Estacionamiento</label>
                            </div>
                            <div class="col-lg-6 pl-0">
                                <div class="form__group mt-4 mb-3" id="num_cajones" style="display: none;">
                                    <select id="cajones-estacionamiento" name="cajones" class="form__input select2" data-placeholder="Choose Browser">
                                        <option value="">Selecciona</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <!--  <input type="number" class="form-control" id="cajones-estacionamiento" name="cajones" placeholder=" " pattern="^[0-9]+" minlength="1" maxlength="3" title="Solo se permiten números" required> -->
                                    <label class="form__label">Número de cajones</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="checkbox" id="seguridad" name="seguridad">
                    <label for="seguridad"> Seguridad</label><br>
                    <input type="checkbox" id="lavadora" name="lavadora">
                    <label for="lavadora"> Lavadora</label><br>
                    <input type="checkbox" id="cocina" name="cocina">
                    <label for="cocina"> Cocina</label><br>

                </div>
            </div>

            <input type="hidden" class="form-control id_propiedad" name="id_propiedad">

            <div class="col-12 col-lg-11 col-xl-9 row mx-auto px-0 text-md-right mt-5 pr-lg-3">
                <div class="col-12 text-center text-md-right px-0 pr-lg-3">
                    <div class="d-flex flex-column flex-sm-row justify-content-end">
                        <button class="btn-danger px-4 py-1 mr-sm-1 mb-2 mb-sm-0" id="btncontinuar_servicios" name="continuar-servicios" >
                            <a href="<?= base_url() ?>/Mattes/Arrendador/Index" class="text-white" style="text-decoration: none;">
                                <i class="fa fa-sign-out fa-lg mr-1" aria-hidden="true"></i>Salir sin guardar
                            </a>
                        </button>
                        <button type="submit" class="btn-primary px-4 py-1" id="btnsiguiente_servicios" name="siguiente-servicios">
                            <i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Guardar</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<form method="POST" id="form-img" action="<?php echo base_url() ?>/propiedad-documentos">
    <input  class="id_propiedad" type="hidden" name="id" id="id">
</form>


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