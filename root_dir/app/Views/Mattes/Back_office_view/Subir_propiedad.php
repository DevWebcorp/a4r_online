<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">
    <link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">
<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

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

<!-- <div id="loader" class="modal fade show" style="padding-left: 0px !important;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="d-flex ht-300 pos-relative align-items-center">
            <div class="sk-chasing-dots">
                <div class="sk-child sk-dot1 bg-red-800"></div>
                <div class="sk-child sk-dot2 bg-green-800"></div>
            </div>
        </div>
    </div>
</div> -->

<section class="section-sub-banner bg-propiedad mb-lg-5">
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>DETALLE DE LA PROPIEDAD</h2><!-- 
                <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-12 mg-b-120 ">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <!-- <li class="nav-item tab-boprop ml-sm-2 mr-sm-1 ml-md-3 mr-md-2" role="presentation">
                    <a class="nav-link active" id="bo-tab" data-toggle="tab" href="#bo" role="tab" aria-controls="bo" aria-selected="true"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Estatus</a>
                </li> -->
                <li class="nav-item tab-boprop mr-sm-1 mr-md-2" role="presentation">
                    <a class="nav-link active" id="generales-tab" data-toggle="tab" href="#generales" role="tab" aria-controls="generales" aria-selected="true"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Generales</a>
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
            </ul>

            <div class="tab-content" id="myTabContent">
                <!-------------------------------------------------------
                    GENERALES
                -------------------------------------------------------->
                <div class="tab-pane fade my-4 py-3 show active bg-body rounded" id="generales" role="tabpanel" aria-labelledby="generales-tab">
                    <form id="detalle-propiedad" enctype="multipart/form-data" class="mb-5">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="">Nombre corto</label>
                                <input type="text" class="" required id="nombre_propiedad" name="nombre_propiedad" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ-z0-9\s]+" minlength="5" maxlength="30" autocomplete="off" placeholder=" ">
                                <input type="hidden" id="nombre_prop" name="nombre_prop">
                            </div>
                        </div>                        
                       
                        <div class="col-12">
                            <div class="form-group">
                                <label class="">Describe tu propiedad</label>
                                <textarea class="" id="descripcion" required name="descripcion" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ-z0-9\s]+" minlength="5" maxlength="250" autocomplete="off" placeholder=" "></textarea>
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
                        <div class="col-12">
                            <div class="form-group">
                                <label class="">Disponible a partir de: </label>
                                <input type="date" id="disponibilidad" required name="disponibilidad" class="" placeholder=" ">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="">Tipo de alojamiento</label>
                                <select id="tipo-alojamiento" required name="tipo_alojamiento" class="">
                                </select>
                            </div>
                        </div>

                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="id_propietario" name="id_propietario">

                        <div class="col-lg-12 row mx-auto px-0 px-lg-2 mt-5">
                            <div class="col-sm-12 text-center px-0 pr-sm-2 text-md-right">
                                <div class="d-flex flex-column flex-sm-row justify-content-end">
                                    <button type="submit" class="btn-teal mb-5 px-4 py-1"><i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;"> Guardar</span></button>
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
                                            
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="">Dirección [calle, número, colonia, CP, estado]</label>
                                                        <div class="input-group col-12 px-0  mg-t-10 mg-sm-t-0">
                                                            <input type="text" class="" id="direccion" name="direccion" aria-describedby="button-addon2" title="Solo se permiten letras y numeros">
                                                           <!--  <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary" type="button" id="button-addon2" style="border-radius: 10px;"><i class="fa fa-map-marker ml-1" aria-hidden="true"></i></button>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-20">
                                                    <label class=" form-control-label d-none">Dirección 2</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input type="hidden" id="direccion_dos" name="direccion_dos" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="">Código postal </label>
                                                        <div class="col-12 px-0 mg-t-10 mg-sm-t-0">
                                                            <div class="input-group">
                                                                <input type="text" name="ZIP_CODE" id="cp_search" class="form-control formulario__input" placeholder="" autocomplete="off" minlength="13" maxlength="200" title="Solo se permiten numeros">
                                                                <span class="input-group-addon"><i class="icon ion-search tx-16 lh-0 op-6"></i></span>
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
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="">Delegación o municipio</label>
                                                        <input type="text" id="delegacion" name="delegacion" class="" placeholder=" " readonly style="background-color: #e9ecef;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="">Estado</label>
                                                        <input type="text" id="estado" name="estado" class="" placeholder=" " readonly style="background-color: #e9ecef;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class=" form-group">
                                                        <label class="">Colonia</label>
                                                        <input type="text" id="colonia" name="colonia" class="" placeholder=" " readonly style="background-color: #e9ecef;">
                                                    </div>
                                                </div>
                                            
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="precio" class="">Precio</label>
                                                        <input type="text" id="precio_propiedad" name="upd_precio" min="0" pattern="[0-9]+,[0-9]+.[0-9]+" class="" placeholder=" " id="precio" pattern="^[0-9]+" minlength="4" maxlength="8" title="Solo se permiten números">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="">Usted vive en la propiedad</label>
                                                        <select class="" placeholder=" " name="upd_habita_propiedad" id="h_propiedad">
                                                            <option value="">Selecciona </option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="">Universidad más cercana</label>
                                                        <div class="col-12 px-0 mg-t-10 mg-sm-t-0">
                                                            <input type="text" name="universidad" id="autoComplete" class="" autocomplete="off" style="background-color: white !important; color: rgba(0,0,0,.8) !important;">
                                                            <input type="hidden" name="id_univ" id="id_univ" class="form-control ">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="">Distancia</label>
                                                        <input type="text" id="distancia" name="distancia" class="" placeholder=" " readonly >
                                                    </div>
                                                </div>
                                                <!-- <div class="col-12 col-lg-11 px-0 mt-4 mb-4 pr-lg-4">
                                                    <div class="d-flex flex-column flex-sm-row justify-content-end">
                                                        <button class="btn btn-outline-primary" id="calcular" type="button"><i class="fa fa-calculator mr-1" aria-hidden="true"></i>Calcular Distancia</button>
                                                    </div>
                                                </div> -->
                                            <div class="col-12 mx-auto mt-3 mt-lg-5">
                                                <div class="col-12 pt-4" id="map" style="height: 500px; border-radius: 0px !important;">
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" id="id_propiedadubi" name="id_propiedad">
                                        <input type="hidden" id="id_ubicacion" name="id_ubicacion">

                                        <div class="col-12 row mx-auto px-0 text-md-right mt-5">
                                            <div class="col-12 text-center text-md-right px-0 pr-lg-3">
                                                <div class="d-flex flex-column flex-sm-row justify-content-end">
                                                    <button type="submit" class="btn-teal px-4 py-1 mb-5 mb-md-2" id="btnsiguiente_detalles" name="siguiente_detalles"><i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Guardar</span></button>
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
                               
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="">Número de roomies</label>
                                            <input type="number" class="" id="num_roomies" name="upd_numero_roomies" placeholder=" " pattern="^[0-9]+" min="0" max="10" title="Solo se permiten números">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="">Número de camas</label>
                                            <input type="number" class="" id="num_camas" name="upd_numero_camas" placeholder=" " pattern="^[0-9]+" min="0" max="10" title="Solo se permiten números">
                                            <input type="hidden" class="form__input id_propiedad" name="id_propiedad" placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="">Número de baños</label>
                                            <select name="upd_numero_banos" id="num_banos" class="" data-placeholder="Choose Browser" required>
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
                                            <select id="tipo_bano" name="upd_status_bano" class="" data-placeholder="Choose Browser">
                                                <option value="">Selecciona</option>
                                                <option value="Compartido">Compartido</option>
                                                <option value="Privado">Privado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="">Petfriendly</label>
                                            <select id="mascotas" name="upd_petfriendly" class="" data-placeholder="Choose Browser">
                                                <option value="">Selecciona</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="">Disponible para: </label>
                                            <select name="upd_disponible" id="disponible_para" class="" data-placeholder="Choose Browser">
                                                <option value="">Selecciona</option>
                                                <option value="Mujeres">Mujeres</option>
                                                <option value="Hombres">Hombres</option>
                                                <option value="Mixto">Mixto</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-lg-6">
                                        <label for="capacidades_diferentes"> Acceso para personas con capacidades diferentes</label><br>
                                        <input class="check" type="checkbox" id="capacidades_diferentes" name="upd_capacidades" checked>                                        
                                    </div>
                                        
                                    <div class="col-lg-1">
                                        <label for="wifi"> Wifi</label>
                                        <input type="checkbox" id="limpieza" name="upd_limpieza" checked>
                                    </div>

                                    <div class="col-lg-1">
                                        <label for="limpieza"> Limpieza</label><br>
                                        <input type="checkbox" id="wifi" name="upd_wifi" checked>
                                    </div>

                                        
                                    <div class="col-lg-2">
                                        <label for="estacionamiento"> Estacionamiento</label>
                                        <input type="checkbox" id="estacionamiento" name="upd_estacionamiento" onchange="javascript:showContent()" checked>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group" id="cajones">
                                            <label class="" style="left: 3px;">Número de cajones</label>
                                            <select name="upd_cajones" id="num_cajones" class="" data-placeholder="Choose Browser">
                                                <option value="">Selecciona</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-1">
                                        <label for="seguridad"> Seguridad</label><br>
                                        <input type="checkbox" id="seguridad" name="upd_seguridad" checked>
                                    </div>

                                    <div class="col-lg-1">
                                        <label for="lavadora"> Lavadora</label><br>
                                        <input type="checkbox" id="lavadora" name="upd_lavadora" checked>
                                    </div> 

                                    <div class="col-lg-1">
                                        <label for="cocina"> Cocina</label><br>
                                        <input type="checkbox" id="cocina" name="upd_cocina" checked>
                                    </div>

                                    <input type="hidden" id="id_propiedadser" name="id_propiedad">
                                    <input type="hidden" id="id_servicios" name="id_servicios">
                                </div>
                                
                            </div>
                            <div class="col-lg-12 row mx-auto px-0 px-lg-2 mt-3">
                                <div class="col-sm-12 text-center px-0 pr-sm-2 text-md-right">
                                    <div class="d-flex flex-column flex-sm-row justify-content-end">
                                        <button type="submit" class="btn-teal px-4 py-1 mb-5" id="btnsiguiente_detalles" name="siguiente_detalles"><i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Guardar</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

                        <input type="hidden" id="id_propiedaddocs" name="id_propiedad">                       

                        <div class="col-md-12 mt-4">
                            <div class="col-12">
                                <div class="form-group mt-5 text-center text-primary">
                                    <label><input type="checkbox" id="terminos" class="mr-1" value="">Terminos y
                                        condiciones</label>
                                    <input type="hidden" id="id_propiedaddoc" name="id_propiedad">
                                    <input type="hidden" id="id_documentos" name="id">
                                </div>

                                <div class="col-12 row mx-auto px-0 text-md-right pr-lg-3">
                                    <div class="col-12 text-center text-md-right px-0 pr-lg-3">
                                        <div class="d-flex flex-column flex-sm-row justify-content-end">
                                            <button id="send_form" type="submit" class="btn-teal px-4 py-1" name="siguiente_detalles"><i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i><span style="font-size:18px;">Guardar</span></button>
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

<style>
    .title {
        font-family: "Gothicb" !important;
        color: var(--mattes);
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>  
<script>
    let id_usuario = <?php echo json_encode($id_usuario); ?>;
    let id_propiedad;
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
<link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/autoComplete.min.js"></script>


<script src="https://unpkg.com/currency.js@2.0.4/dist/currency.min.js"></script>

<?= $this->endSection() ?>

