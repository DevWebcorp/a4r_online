<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
<link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/autoComplete.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">

<script src="https://unpkg.com/currency.js@2.0.4/dist/currency.min.js"></script>

<style>
    #preguntas-propiedad_length>label>select,
    #visitas-propiedad_length>label>select {
        background: none;
        border: 1px solid #000;
    }

    .cajon {
        max-width: 100% !important;
        height: auto !important;
    }
</style>

<div id="loader" class="modal fade show" style="padding-left: 0px !important;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="d-flex ht-300 pos-relative align-items-center">
            <div class="sk-chasing-dots">
                <div class="sk-child sk-dot1 bg-red-800"></div>
                <div class="sk-child sk-dot2 bg-green-800"></div>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row">
        <div class="col-12 mg-t-90 mg-b-120 ">
            <h3 class="text-center mb-4 detalle-property">Detalle de propiedad</h3>
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item tab-boprop ml-sm-2 mr-sm-1 ml-md-3 mr-md-2" role="presentation">
                    <a class="nav-link active" id="bo-tab" data-toggle="tab" href="#bo" role="tab" aria-controls="bo" aria-selected="true"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Estatus</a>
                </li>
                <li class="nav-item tab-boprop mr-sm-1 mr-md-2" role="presentation">
                    <a class="nav-link" id="generales-tab" data-toggle="tab" href="#generales" role="tab" aria-controls="generales" aria-selected="true"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Generales</a>
                </li>
                <li class="nav-item tab-boprop mr-sm-1 mr-md-2" role="presentation">
                    <a class="nav-link" id="localizacion-tab" data-toggle="tab" href="#localizacion" role="tab" aria-controls="localizacion" aria-selected="true"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Localización</a>
                </li>
                <li class="nav-item tab-boprop mr-sm-1 mr-md-2" role="presentation">
                    <a class="nav-link" id="servicios-tab" data-toggle="tab" href="#servicios" role="tab" aria-controls="servicios" aria-selected="true"><i class="fa fa-bath mr-2" aria-hidden="true"></i>Servicios</a>
                </li>
                <li class="nav-item tab-boprop mr-sm-1 mr-md-2" role="presentation">
                    <a class="nav-link" id="documentos-tab" data-toggle="tab" href="#documentos" role="tab" aria-controls="documentos" aria-selected="true"><i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>Documentos</a>
                </li>
                <li class="nav-item tab-boprop mr-sm-1 mr-md-2" role="presentation">
                    <a class="nav-link" id="preguntas-tab" data-toggle="tab" href="#preguntas" role="tab" aria-controls="preguntas" aria-selected="true"><i class="fa fa-question-circle-o mr-2" aria-hidden="true"></i>Preguntas</a>
                </li>
                <li class="nav-item tab-boprop mr-sm-1 mr-md-2" role="presentation">
                    <a class="nav-link" id="visitas-tab" data-toggle="tab" href="#visitas" role="tab" aria-controls="visitas" aria-selected="true"><i class="fa fa-street-view mr-2" aria-hidden="true"></i>Visitas</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active bg-body rounded mt-4 mb-bo-estatus" id="bo" role="tabpanel" aria-labelledby="bo-tab">
                    <form id="updaStatus">
                        <div class="col-12 row">
                            <div class="col-12 col-lg-5 text-center mt-4 order-2 order-lg-0">
                                <div class="row justify-content-center justify-content-lg-start mg-t-30">
                                    <p class="col-sm-4 col-md-7  text-center text-sm-left">Verificado</p>
                                    <div class="col-sm-2 mg-t-10 mg-sm-t-0 text-center">
                                        <label class="switch">
                                            <input id="verificado" name="verificado" type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                        <input id="id_propiedad" name="id" type="hidden">
                                    </div>
                                </div>
                                <div class="row justify-content-center justify-content-lg-start mg-t-30">
                                    <p class="col-sm-4 col-md-7  text-center text-sm-left">Posicionamiento</p>
                                    <div class="col-sm-2 mg-t-10 mg-sm-t-0 text-center">
                                        <label class="switch">
                                            <input id="pocisionamiento" name="pocisionamiento" type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row justify-content-center justify-content-lg-start mg-t-30">
                                    <p class="col-sm-4 col-md-7 text-center text-sm-left">Sello Mattes</p>
                                    <div class="col-sm-2 mg-t-10 mg-sm-t-0 text-center">
                                        <label class="switch">
                                            <input id="sello" name="sello" type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="p-verificada" class="col-lg-2 text-center order-1 order-lg-0">
                                <!--  <i class="fa fa-exclamation-triangle fa-5x mt-5" aria-hidden="true" style="color: #FFC733"></i>
                                <p>Propiedad no Verificada</p> -->
                            </div>

                            <div class="col-lg-5 text-center mt-4 order-0">
                                <?php
                                if (isset($propretario)) {
                                    if ($propretario['photo'] == "") {
                                        echo ('<img src="'.base_url().'/assets/img/default.png" style="width: 130px; height: 130px; " class="rounded-circle img-fluid">');
                                        echo ("<p>" . $propretario['name'] . $propretario['first_name'] . $propretario['second_name'] . "</p>");
                                    } else {
                                        switch ($propretario['id_group']) {
                                            case 3:
                                                echo ('<img class="img-fluid rounded-circle" src="'.base_url().'/writable/uploads/Mattes/Arrendador/' . $propretario['photo'] . '" style="width: 130px; height: 130px;">');
                                                echo ("<p>" . $propretario['name'] . $propretario['first_name'] . $propretario['second_name'] . "</p>");
                                                break;
                                            case 5:
                                                echo ('<img class="rounded-circle img-fluid" src="'.base_url().'/writable/uploads/Mattes/Agente/' . $propretario['photo'] . '" style="width: 130px; height: 130px;">');
                                                echo ("<p>" . $propretario['name'] . $propretario['first_name'] . $propretario['second_name'] . "</p>");
                                                break;
                                        }
                                    }
                                } else {
                                    echo ('<img src="'.base_url().'/assets/img/default.png" style="width: 130px; height: 130px;" class="img-fluid rounded-circle">');
                                    echo ("<p>SIN DATOS</p>");
                                }

                                ?>
                                <!--   <img src="<?php //echo '../..7'$img; 
                                                    ?>"  alt=""> -->
                            </div>

                            <div class="col-12 text-center mt-5 pb-5 order-3 order-lg-0">
                                <button type="submit" class="btn-teal px-4 py-1 mg-b-100 mb-md-0" id="btnsiguiente_detalles" name="siguiente_detalles"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Actualizar</span></button>
                            </div>
                        </div>

                    </form>
                </div>

                <!-------------------------------------------------------
                                        GENERALES
                -------------------------------------------------------->
                <div class="tab-pane fade my-4 py-3 bg-body rounded" id="generales" role="tabpanel" aria-labelledby="generales-tab">
                    <form id="upd_generales" enctype="multipart/form-data" class="mb-5">
                        <div class="row mg-t-20 ">
                            <div class="col-lg-7 form__group">
                                <input type="text" class="form__input" id="nombre_propiedad" name="upd_propiedad" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ-z0-9\s]+" minlength="5" maxlength="30" autocomplete="off" placeholder=" ">
                                <label class="form__label">Nombre corto</label>
                                <input type="hidden" id="nombre_prop" name="nombre_prop">
                                <div class="requirements">
                                    Tienen que ser mínimo 5 caracteres
                                </div>
                            </div>
                        </div>
                        <div class="row mg-t-40 ">
                            <div class="col-lg-7 form__group">
                                <textarea class="form__input" id="descripcion" name="upd_descripcion" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ-z0-9\s]+" minlength="5" maxlength="250" autocomplete="off" placeholder=" "></textarea>
                                <label class="form__label">Describe tu propiedad</label>
                                <div class="requirements">
                                    Tienen que ser mínimo 5 caracteres
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row mg-t-40 ">
                            <div class="col-lg-7 form__group">
                                <input type="text" id="horario_visita" name="upd_horario_visita" class="form__input" title="El formato de hora seria hh:mm:ss" placeholder=" " minlength="5" maxlength="250">
                                <label class="form__label">Horario de visita</label>
                                <div class="requirements">
                                    No coincide el formato
                                </div>
                            </div>
                        </div> -->
                        <div class="row mg-t-40 ">
                            <div class="col-lg-7 form__group">
                                <input type="date" id="disponibilidad" name="upd_disponibilidad" class="form__input" placeholder=" ">
                                <label class="form__label">Disponible a partir de: </label>
                                <div class="requirements">
                                    No coincide el formato
                                </div>
                            </div>
                        </div>
                        <div class="row mg-t-40 ">
                            <div class="col-lg-7 form__group">
                                <select id="tipo_alojamiento" name="upd_alojamiento" class="form__input select2">
                                </select>
                                <label class="form__label">Tipo de alojamiento</label>
                            </div>
                        </div>

                        <input type="hidden" id="id" name="id">

                        <div class="col-lg-7 row mx-auto px-0 px-lg-2 mt-5">
                            <div class="col-sm-12 text-center px-0 pr-sm-2 text-md-right">
                                <div class="d-flex flex-column flex-sm-row justify-content-end">
                                    <button type="submit" class="btn-teal mb-5 px-4 py-1"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Actualizar</span></button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                <!-------------------------------------------------------
                                        LOCALIZACION
                -------------------------------------------------------->
                <div class="tab-pane fade p-lg-3 bg-body rounded mt-4" id="localizacion" role="tabpanel" aria-labelledby="localizacion-tab">
                    <section class="propiedad_ubicacion">
                        <div class="container mg-b-50 mb-md-0">
                            <div class="row">
                                <div class="col-12">
                                    <form method="POST" class=" " id="upd_ubicacion">
                                        <div class="row">
                                            <div class="col-lg-6">

                                                <div class="row justify-content-center mg-t-0">
                                                    <div class="col-lg-9">
                                                        <label class="col-12 px-0 form-control-label">Código postal </label>
                                                        <div class="col-12 px-0 mg-t-10 mg-sm-t-0">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="icon ion-search tx-16 lh-0 op-6"></i></span>
                                                                <input type="text" name="ZIP_CODE" id="cp_search" class="form-control formulario__input" placeholder="" autocomplete="off" minlength="13" maxlength="200" title="Solo se permiten numeros">
                                                                <input type="hidden" name="ID_CODE" id="cp_id" class="form-control " placeholder="">
                                                                <ul id="cpResult"></ul>
                                                                <div class="clear"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- valores ubicacion casa -->
                                                <input id="latitud" type="hidden" name="latitud" class="form-control">
                                                <input id="longitud" type="hidden" name="longitud" class="form-control">

                                                <!-- valores universidad -->
                                                <input id="lat" type="hidden" name="lat" class="form-control">
                                                <input id="lon" type="hidden" name="long" class="form-control">


                                                <div class="row justify-content-center mg-t-20">
                                                    <div class="col-lg-9">
                                                        <label class="col-12 px-0  form-control-label">Dirección [calle, número, colonia, CP, estado]</label>
                                                        <div class="input-group col-12 px-0  mg-t-10 mg-sm-t-0">
                                                            <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="button-addon2" title="Solo se permiten letras y numeros">
                                                           <!--  <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary" type="button" id="button-addon2" style="border-radius: 10px;"><i class="fa fa-map-marker ml-1" aria-hidden="true"></i></button>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-20">
                                                    <label class="col-sm-4 form-control-label d-none">Dirección 2</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input type="hidden" id="direccion_dos" name="direccion_dos" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row mg-t-20">
                                                    <div class="col-lg-9 form__group">
                                                        <input type="text" id="delegacion" name="delegacion" class="form__input" placeholder=" " readonly style="background-color: #e9ecef;">
                                                        <label class="form__label">Delegación o municipio</label>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-40">
                                                    <div class="col-lg-9 form__group">
                                                        <input type="text" id="estado" name="estado" class="form__input" placeholder=" " readonly style="background-color: #e9ecef;">
                                                        <label class="form__label">Estado</label>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-40">
                                                    <div class="col-lg-9 form__group">
                                                        <input type="text" id="colonia" name="colonia" class="form__input" placeholder=" " readonly style="background-color: #e9ecef;">
                                                        <label class="form__label">Colonia</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-5 mt-3 mt-lg-0">
                                                <div class="row mg-t-20">
                                                    <div class="col-lg-9 form__group">
                                                        <input type="text" id="precio_propiedad" name="upd_precio" min="0" pattern="[0-9]+,[0-9]+.[0-9]+" class="form__input" placeholder=" " id="precio" pattern="^[0-9]+" minlength="4" maxlength="8" title="Solo se permiten números">
                                                        <label for="precio" class="form__label">Precio</label>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-40">
                                                    <div class="col-lg-9 form__group">
                                                        <select class="form__input select2" placeholder=" " name="upd_habita_propiedad" id="h_propiedad">
                                                            <option value="">Selecciona </option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                        <label class="form__label">Usted vive en la propiedad</label>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center mg-t-20">
                                                    <div class="col-lg-9">
                                                        <label class="col-12 px-0  form-control-label">Universidad más cercana</label>
                                                        <div class="col-12 px-0 mg-t-10 mg-sm-t-0">
                                                            <input type="text" name="universidad" id="autoComplete" class="form__input" autocomplete="off" style="background-color: white !important; color: rgba(0,0,0,.8) !important; border: 1px solid #28a745 !important;">
                                                            <input type="hidden" name="id_univ" id="id_univ" class="form-control ">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-40">
                                                    <div class="col-lg-9 form__group">
                                                        <input type="text" id="distancia" name="distancia" class="form__input" placeholder=" " readonly style="background-color: #e9ecef;">
                                                        <label class="form__label">Distancia</label>
                                                    </div>

                                                </div>
                                                <!-- <div class="col-12 col-lg-11 px-0 mt-4 mb-4 pr-lg-4">
                                                    <div class="d-flex flex-column flex-sm-row justify-content-end">
                                                        <button class="btn btn-outline-primary" id="calcular" type="button"><i class="fa fa-calculator mr-1" aria-hidden="true"></i>Calcular Distancia</button>
                                                    </div>
                                                </div> -->
                                            </div>

                                            <div class="col-12 col-lg-11 mx-auto mt-3 mt-lg-5 px-3 pl-lg-5 pr-lg-4">
                                                <div class="col-12 pt-4" id="map" style="height: 500px;">
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" id="id_ubicacion" name="id_ubicacion">

                                        <div class="col-12 col-lg-11 row mx-auto px-0 text-md-right mt-5">
                                            <div class="col-12 text-center text-md-right px-0 pr-lg-3">
                                                <div class="d-flex flex-column flex-sm-row justify-content-end">
                                                    <button type="submit" class="btn-teal px-4 py-1 mb-5 mb-md-2" id="btnsiguiente_detalles" name="siguiente_detalles"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Actualizar</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-------------------------------------------------------
                                        SERVICIOS
                -------------------------------------------------------->
                <div class="tab-pane fade p-lg-3 bg-body rounded mt-4 mb-bo-servicios" id="servicios" role="tabpanel" aria-labelledby="servicios-tab">
                    <form id="upd_servicios" class=" " enctype="multipart/form-data">
                        <div class="col-12 pb-5 pb-md-0">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mg-t-20 row">
                                        <div class="col-lg-6 form__group">
                                            <input type="number" class="form__input" id="num_roomies" name="upd_numero_roomies" placeholder=" " pattern="^[0-9]+" min="0" max="10" title="Solo se permiten números">
                                            <label class="form__label">Número de roomies</label>
                                            <div class="requirements">
                                                Solo se permiten números positivos
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mt-5 mt-lg-0 form__group">
                                            <input type="number" class="form__input" id="num_camas" name="upd_numero_camas" placeholder=" " pattern="^[0-9]+" min="0" max="10" title="Solo se permiten números">
                                            <input type="hidden" class="form__input id_propiedad" name="id_propiedad" placeholder=" ">
                                            <label class="form__label">Número de camas</label>
                                            <div class="requirements">
                                                Solo se permiten números positivos
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">Número de baños</label>
                                        <div class="col-sm-6">
                                            <select name="upd_numero_banos" id="num_banos" class="form__input select2" data-placeholder="Choose Browser" required>
                                                <option value="">Selecciona</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 mg-t-40 mg-sm-t-0">
                                            <select id="tipo_bano" name="upd_status_bano" class="form__input select2" data-placeholder="Choose Browser">
                                                <option value="">Selecciona</option>
                                                <option value="Compartido">Compartido</option>
                                                <option value="Privado">Privado</option>
                                            </select>
                                            <label class="form__label">Baño</label>
                                        </div>
                                    </div>
                                    <div class="row mg-t-20">
                                        <div class="col-lg-6 px-0">
                                            <label class="col-sm-12 form-control-label">Petfriendly</label>
                                            <div class="col-sm-12">
                                                <select id="mascotas" name="upd_petfriendly" class="form__input select2" data-placeholder="Choose Browser">
                                                    <option value="">Selecciona</option>
                                                    <option value="Si">Si</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 px-0 mb-md-3 mt-md-4 mt-lg-0">
                                            <label class="col-sm-12 form-control-label mt-4 mt-md-0 ">Disponible para: </label>
                                            <div class="col-sm-12 ">
                                                <select name="upd_disponible" id="disponible_para" class="form__input select2" data-placeholder="Choose Browser">
                                                    <option value="">Selecciona</option>
                                                    <option value="Mujeres">Mujeres</option>
                                                    <option value="Hombres">Hombres</option>
                                                    <option value="Mixto">Mixto</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="col-12 pl-0 mt-3 mt-md-1 mt-lg-0">
                                        <input class="check" type="checkbox" id="capacidades_diferentes" name="upd_capacidades" checked>
                                        <label for="capacidades_diferentes"> Acceso para personas con capacidades
                                            diferentes</label><br>
                                        <input type="checkbox" id="wifi" name="upd_wifi" checked>
                                        <label for="wifi"> Wifi</label><br>
                                        <input type="checkbox" id="limpieza" name="upd_limpieza" checked>
                                        <label for="limpieza"> Limpieza</label><br>
                                        <div class="col-12">
                                            <div class="row flex-column">
                                                <div class="pl-0 col-lg-5">
                                                    <input type="checkbox" id="estacionamiento" name="upd_estacionamiento" onchange="javascript:showContent()" checked>
                                                    <label for="estacionamiento"> Estacionamiento</label>
                                                </div>
                                                <div class="col-lg-6 pl-0">
                                                    <div class="form__group mt-4 mb-3" id="cajones">
                                                        <select name="upd_cajones" id="num_cajones" class="form__input select2" data-placeholder="Choose Browser" required>
                                                            <option value="">Selecciona</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                        <label class="form__label" style="left: 3px;">Número de cajones</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="checkbox" id="seguridad" name="upd_seguridad" checked>
                                        <label for="seguridad"> Seguridad</label><br>
                                        <input type="checkbox" id="lavadora" name="upd_lavadora" checked>
                                        <label for="lavadora"> Lavadora</label><br>
                                        <input type="checkbox" id="cocina" name="upd_cocina" checked>
                                        <label for="cocina"> Cocina</label><br>

                                        <input type="hidden" id="id_servicios" name="id_servicios">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 row mx-auto px-0 px-lg-2 mt-3">
                                <div class="col-sm-12 text-center px-0 pr-sm-2 text-md-right">
                                    <div class="d-flex flex-column flex-sm-row justify-content-end">
                                        <button type="submit" class="btn-teal px-4 py-1 mb-5" id="btnsiguiente_detalles" name="siguiente_detalles"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Actualizar</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-------------------------------------------------------
                                        VISITAS
                -------------------------------------------------------->
                <div class="tab-pane fade bg-body rounded mt-4 height-preguntas" id="visitas" role="tabpanel" aria-labelledby="visitas-tab">
                    <table id="visitas-propiedad" class="table table-responsive display table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">Propietario</th>
                                <th scope="col">Alumno</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-------------------------------------------------------
                                        PREGUNTAS
                -------------------------------------------------------->
                <div class="tab-pane fade p-3 bg-body mg-b-120 mb-md-0 rounded mt-4 height-preguntas" id="preguntas" role="tabpanel" aria-labelledby="preguntas-tab">
                    <table id="preguntas-propiedad" class="table table-responsive display table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">Estudiante</th>
                                <th scope="col">Propiedad</th>
                                <th scope="col">Universidad</th>
                                <th scope="col">Pregunta</th>
                                <th scope="col">Respuesta</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-------------------------------------------------------
                                    DOCUMENTOS
                -------------------------------------------------------->
                <div class="tab-pane fade bg-body mg-b-120 mb-md-0 rounded mt-4 height-documentos" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                    <div class="col-lg-12 mx-auto">
                        <div class="col-12 col-md-10 col-lg-6 mx-auto mt-6">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol id="indicadores" class="carousel-indicators">
                                </ol>
                                <div id="elementos" class="carousel-inner">
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 row">
                            <div class="col-lg-4 mg-t-10 mg-sm-t-0">
                                <label class="col-sm-12 form-control-label px-0">Fotos y vídeos</label>
                                <div class="d-flex flex-column flex-sm-row flex-lg-column justify-content-center align-items-center">
                                    <div class="col-sm-8 col-lg-12 px-0 mr-auto">
                                        <div class="file-drop-area files" id="files1">
                                            <span class="choose-file-button">Subir Archivo</span>
                                            <span class="file-message">Arrastra el archivo aqui</span>
                                            <input id="file-user" class="file-input" type="file" multiple name="file">
                                        </div>
                                        <div id="name_file">
                                            <ul class="fileList"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mg-t-10 mg-sm-t-0">
                                <label class="col-sm-12 form-control-label px-0">Comprobante de domicilio</label>
                                <div class="d-flex flex-column flex-sm-row flex-lg-column justify-content-center align-items-center">
                                    <div class="col-sm-8 col-lg-12 px-0">
                                        <div class="file-drop-area">
                                            <span class="choose-file-button">Subir Archivo</span>
                                            <span class="file-message">Arrastra el archivo aqui</span>
                                            <input id="file-domicilio" class="file-input" type="file" name="file">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-12 mt-3">
                                        <div class="text-center" id="desc-comp">
                                            <i class="fa fa-file-pdf-o fa-3x text-danger" aria-hidden="true" id="text-val"></i> <br>
                                            <a id="down_comp" class="down-doc" download>Ver comprobante</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 mg-t-10 mg-sm-t-0">
                                <label class="col-sm-12 form-control-label px-0">Recibo de agua o predial</label>
                                <div class="d-flex flex-column flex-sm-row flex-lg-column justify-content-center align-items-center">
                                    <div class="col-sm-8 col-lg-12 px-0">
                                        <div class="file-drop-area">
                                            <span class="choose-file-button">Subir Archivo</span>
                                            <span class="file-message">Arrastra el archivo aqui</span>
                                            <input id="file-recibo" class="file-input" type="file" name="file">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-12 mt-3">
                                        <div class=" text-center" id="desc-rec">
                                            <i class="fa fa-file-pdf-o fa-3x text-danger" aria-hidden="true" id="text-val"></i> <br>
                                            <a id="down_rec" class="down-doc" download>Ver recibo</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="col-12">
                                <div class="form-group mt-5 text-center text-primary">
                                    <label><input type="checkbox" id="terminos" class="mr-1" value="">Terminos y
                                        condiciones</label>
                                </div>

                                <div class="col-12 row mx-auto px-0 text-md-right pr-lg-3">
                                    <div class="col-12 text-center text-md-right px-0 pr-lg-3">
                                        <div class="d-flex flex-column flex-sm-row justify-content-end">
                                            <button id="send_form" type="submit" class="btn-teal px-4 py-1" id="btnsiguiente_detalles" name="siguiente_detalles"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Actualizar</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<div id="mdConfirm" class="modal fade">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-primary pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Detalle de propiedad</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class=" pd-25">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                    <h6>El equipo está verificando sus propiedades, en cuanto todo esté listo, le daremos respuesta
                        al correo que nos compartiste. ¡Muchas gracias!</h6>
                </div><!-- card -->
            </div>
            <div class="modal-footer">
                <button type="button" id='' class="btn btn-warning pd-x-20"><i class="fa fa-upload fa-lg mr-1" aria-hidden="true"></i><a href="<?= base_url() ?>/Mattes/Arrendador/Detalle_propiedad" class="text-white">Subir otra propiedad</a></button>
                <button type="button" class="btn btn-success pd-x-20" data-dismiss="modal"><i class="fa fa-thumbs-o-up fa-lg mr-1" aria-hidden="true"></i><a href="<?= base_url() ?>/Mattes/Arrendador/Busca_propiedades" class="text-white">Por hoy esta
                        bien</a></button>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!--Modal eliminar -->
<div id="show_eliminar" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header bg-danger pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar pregunta</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-lg">
                <div class="pd-80 pd-sm-80 form-layout form-layout-4">
                    <h6 style="text-align:center;">¿Deseas continuar con esta acción?</h6>
                    <br>
                    <p style="color:red; text-align:center;">No se podrán deshacer las acciones una vez realizada la acción</p>
                    <input type="hidden" name="id_pregunta" id="id_pregunta">
                </div><!-- card -->
            </div>

            <div class="modal-footer">
                <button id="eliminar_pregunta" type="button" class="btn btn-danger pd-x-20"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<style>
    .title {
        font-family: "Gothicb" !important;
        color: var(--mattes);
    }
</style>

<script>
    let id_propiedad = <?php echo json_encode($id_propiedad); ?>;
    let id_goup = <?php echo json_encode($grupo); ?>;
    //alert(id_propiedad);
</script>

<script type="text/javascript">
    function showContent() {
        element = document.getElementById("cajones");
        check = document.getElementById("estacionamiento");
        if (check.checked) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }
</script>