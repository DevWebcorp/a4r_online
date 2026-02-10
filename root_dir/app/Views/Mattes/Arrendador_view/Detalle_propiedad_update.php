<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">
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

<div class="container">
    <div class="row">
        <div class="col-12 ">
            <div class="d-flex flex-column align-items-center flex-sm-row justify-content-center justify-content-lg-end mt-3">
                
                <div class="text-center mr-5"> 
                    <button class = "" type="button" title="Da clic solicitar tu sello mattes por un costo" data-toggle="modal" data-target="#model_sello">
                        <i class="ionicons ion-checkmark-circled display-4 text-danger"></i>
                        <p>Solicitar Sello Mates</p>
                    </button>
                </div>
                <div class="text-center">
                    <button class = "" type="button" title="Da clic para posicionar tu propiedad por el costo de" data-toggle="modal" data-target="#model_posicionamiento">
                        <i class="ionicons ion-ios-bolt display-4 text-primary"></i>
                        <p>Posiciona tu propiedad</p>
                    </button>
                </div>
            </div>
            <ul class="nav nav-tabs d-block text-center d-lg-flex justify-content-center" id="myTab" role="tablist">
                <li class="nav-item mr-sm-1 mr-md-2" role="presentation">
                    <a class="nav-link active p-3" id="generales-tab" data-toggle="tab" href="#generales" role="tab" aria-controls="generales" aria-selected="true"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>Generales</a>
                </li>
                <li class="nav-item mr-sm-1 mr-md-2" role="presentation">
                    <a class="nav-link p-3" id="localizacion-tab" data-toggle="tab" href="#localizacion" role="tab" aria-controls="localizacion" aria-selected="true"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Localización</a>
                </li>
                <li class="nav-item mr-sm-1 mr-md-2" role="presentation">
                    <a class="nav-link p-3" id="servicios-tab" data-toggle="tab" href="#servicios" role="tab" aria-controls="servicios" aria-selected="true"><i class="fa fa-bath mr-2" aria-hidden="true"></i>Servicios</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link p-3" id="documentos-tab" data-toggle="tab" href="#documentos" role="tab" aria-controls="documentos" aria-selected="true"><i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>Documentos</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                 <!-------------------------------------------------------
                     GENERALES
                -------------------------------------------------------->
                <div class="tab-pane fade show active mt-5" id="generales" role="tabpanel" aria-labelledby="generales-tab">
                    <!-- <h3 class="text-center mt-4 mb-5 generales-alumno ">Generales</h3>   -->                  
                    <form class="" id="upd_generales" enctype="multipart/form-data">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="">Nombre corto</label>
                                <input type="text" class="" id="nombre_propiedad" name="upd_propiedad" pattern="[A-Za-z\s]+" minlength="5" maxlength="30"  placeholder=" ">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="">Describe tu propiedad</label>
                                <textarea class="" id="descripcion" name="upd_descripcion" pattern="[A-Za-z\s]+" minlength="5" maxlength="250" placeholder=" "></textarea>
                            </div>
                        </div>
                        <!-- <div class="row mg-t-40 px-3">
                            <div class="col-lg-7 form__group">
                                <input type="text" id="horario_visita" name="upd_horario_visita" class="form__input" title="El formato de hora seria hh:mm:ss" placeholder=" " minlength="5" maxlength="250">
                                <label class="form__label">Horario de visita</label>
                                <div class="requirements">
                                    Tienen que ser mínimo 5 caracteres
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="">Disponible a partir de: </label>
                                <input type="date" id="disponibilidad" name="upd_disponibilidad" class="" placeholder=" ">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="">Tipo de alojamiento</label>
                                <select id="tipo_alojamiento" name="upd_alojamiento" class="">
                                </select>
                            </div>
                        </div>

                        <input type="hidden" id="id" name="id">

                        <div class="col-lg-12 row mx-auto px-0 text-md-right mt-5">
                            <div class="col-sm-12 text-center text-md-right pl-lg-0">
                                <div class="d-flex flex-column flex-sm-row justify-content-end mb-5">
                                    <button type="button" class="btn-danger mr-sm-2 mb-2 mb-sm-0" id="btncontinuar_detalles" name="continuar-detalles">
                                        <a href="<?= base_url() ?>/Mattes/Arrendador/Index" class="text-white text-decoration-none">
                                            <i class="fa fa-sign-out fa-lg mr-1" aria-hidden="true"></i>Salir sin guardar
                                        </a>
                                    </button>
                                    <button type="submit" class="btn-teal" style="font-size:1.2rem;"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-------------------------------------------------------
                                        LOCALIZACION
                -------------------------------------------------------->
                <div class="tab-pane fade mt-5" id="localizacion" role="tabpanel" aria-labelledby="localizacion-tab">
                    <section class="propiedad_ubicacion">
                        <div class="container">
                            <div class="row">
                                <!-- <h3 class="text-center mt-4 mb-5  localizacion-alumno">Localización</h3> -->
                                <form method="POST" class="" id="upd_ubicacion">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="">Dirección [calle, número, colonia, CP, estado]</label>
                                                <div class="input-group col-12 px-0  mg-t-10 mg-sm-t-0">
                                                    <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="button-addon2" >
                                                    <!-- <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" style="border-radius: 10px;"><i class="fa fa-map-marker ml-1" aria-hidden="true"></i></button>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="">Código postal </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon ion-search tx-16 lh-0"></i></span>
                                                    <input type="text" name="ZIP_CODE" id="cp_search" class="form-control formulario__input" placeholder="" autocomplete="off" minlength="13" maxlength="200" >
                                                    <input type="hidden" name="ID_CODE" id="cp_id" class="form-control " placeholder="">
                                                    <ul id="cpResult"></ul>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- valores ubicacion uni -->
                                        <input id="latitud" type="hidden" name="latitud" class="form-control">
                                        <input id="longitud" type="hidden" name="longitud" class="form-control">

                                        <!-- valores casa -->
                                        <input id="lat" type="hidden" name="lat" class="form-control">
                                        <input id="lon" type="hidden" name="long" class="form-control">
                                            
                                        <div class="row">
                                            <label class=" d-none">Dirección 2</label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <input type="hidden" id="direccion_dos" name="direccion_dos" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="">Delegación o municipio</label>
                                                <input type="text" id="delegacion" name="delegacion" class="" placeholder=" " readonly style="background-color: #e9ecef;">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class=" form-group">
                                                <label class="">Estado</label>
                                                <input type="text" id="estado" name="estado" class="" placeholder=" " readonly style="background-color: #e9ecef;">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="">Colonia</label>
                                                <input type="text" id="colonia" name="colonia" class="" placeholder=" " readonly style="background-color: #e9ecef;">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="precio" class="">Precio</label>
                                                <input type="text" id="precio_propiedad" name="upd_precio" min="0" pattern="[0-9]+,[0-9]+.[0-9]+" class="" placeholder=" " id="precio" pattern="^[0-9]+" minlength="4" maxlength="8" >
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="">Usted vive en la propiedad</label>
                                                <select class="" placeholder=" " name="upd_habita_propiedad" id="h_propiedad" >
                                                    <option value="">Selecciona </option>
                                                    <option value="Si">Si</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="">Universidad más cercana</label>
                                                <div class="col-12 px-0 mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="universidad" id="autoComplete" class="form__input" autocomplete="off" style="background-color: white !important; color: rgba(0,0,0,.8) !important; border: 2px solid #000 !important;">
                                                    <input type="hidden" name="id_univ" id="id_univ" class="form-control ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="">Distancia</label>
                                                <input type="text" id="distancia" name="distancia" class="" placeholder=" " readonly  style="background-color: #e9ecef;" >
                                            </div>
                                            
                                        </div>
                                        <br>
                                        <br>
                                        <!--  <div class="col-12 col-lg-11 px-0 mt-2 mb-4 my-lg-0 pr-lg-4">
                                            <div class="d-flex flex-column flex-sm-row justify-content-end">
                                                <button class="btn btn-outline-primary" id = "calcular" type="button"><i class="fa fa-calculator mr-1" aria-hidden="true"></i>Calcular Distancia</button>
                                            </div>
                                        </div> -->
                                    
                                        <div class="col-12 mx-auto mt-3 mt-lg-5 px-0 px-lg-4">
                                            <div class="col-12 pt-4" id="map" style="height: 500px;">
                                            </div>
                                        </div>                                    

                                        <input type="hidden" id="id_ubicacion" name="id_ubicacion">

                                        <div class="col-12 row mx-auto px-0 text-md-right mt-5">
                                            <div class="col-12 text-center text-md-right px-0 pr-lg-3">
                                                <div class="d-flex flex-column flex-sm-row justify-content-end mb-5">
                                                    <button type="button" class="btn-danger  mr-sm-2 mb-2 mb-sm-0" id="btncontinuar_detalles" name="continuar-detalles">
                                                        <a href="<?= base_url() ?>/Mattes/Arrendador/Index" class="text-white text-decoration-none">
                                                            <i class="fa fa-sign-out fa-lg mr-1" aria-hidden="true"></i>Salir sin guardar
                                                        </a>
                                                    </button>
                                                    <button type="submit" class="btn-teal" id="btnsiguiente_detalles" name="siguiente_detalles" style="font-size:1.2rem;"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>

                 <!-------------------------------------------------------
                                        SERVICIOS
                -------------------------------------------------------->
                <div class="tab-pane fade mt-5" id="servicios" role="tabpanel" aria-labelledby="servicios-tab">
                    <div class="container">
                        <div class="row">
                            <!-- <h3 class="text-center mt-4 mb-5 servicios-alumno">Servicios</h3> -->
                            <form id="upd_servicios" class="mb-5 " enctype="multipart/form-data">
                                
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="">Número de roomies</label>
                                            <input type="number" class="" id="num_roomies" name="upd_numero_roomies" placeholder=" " pattern="^[0-9]+" min="0" max="10" required>
                                        </div>
                                    </div>
                        
                                    <div class="col-lg-3 ">
                                        <div class="form-group">
                                            <label class="">Número de camas</label>
                                            <input type="number" class="" id="num_camas" name="upd_numero_camas" placeholder=" " pattern="^[0-9]+" min="0" max="10" required>
                                            <input type="hidden" class="id_propiedad" name="id_propiedad" placeholder=" ">
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
                                            <select id="tipo_bano" name="upd_status_bano" class="f" data-placeholder="Choose Browser" required>
                                                <option value="">Selecciona</option>
                                                <option value="Compartido">Compartido</option>
                                                <option value="Privado">Privado</option>
                                            </select>
                                        </div>
                                    </div>
                        
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="">Petfriendly</label>
                                            <select id="mascotas" name="upd_petfriendly" class="" data-placeholder="Choose Browser" required>
                                                <option value="">Selecciona</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                        
                                    <div class="col-lg-3 mb-md-3 mt-md-4 mt-lg-0">
                                        <div class="form-group">
                                            <label class="">Disponible para: </label>
                                            <select name="upd_disponible" id="disponible_para" class="" data-placeholder="Choose Browser" required>
                                                <option value="">Selecciona</option>
                                                <option value="Mujeres">Mujeres</option>
                                                <option value="Hombres">Hombres</option>
                                                <option value="Mixto">Mixto</option>
                                            </select>
                                        </div>
                                    </div>
                        
                                    <div class="col-lg-6 pl-1 pl-lg-4 mt-lg-4">
                                        <label for="capacidades_diferentes"> Acceso para personas con capacidades diferentes</label>
                                        <input class="check" type="checkbox" id="capacidades_diferentes" name="upd_capacidades" checked>
                                    </div>
                                    <div class="col-lg-1">
                                        <label for="wifi"> Wifi</label>
                                        <input type="checkbox" id="wifi" name="upd_wifi" checked>
                                    </div>
                                    <div class="col-lg-1">
                                        <label for="limpieza"> Limpieza</label>
                                        <input type="checkbox" id="limpieza" name="upd_limpieza" checked>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="estacionamiento"> Estacionamiento</label>
                                        <input type="checkbox" id="estacionamiento" name="upd_estacionamiento" onchange="javascript:showContent()" checked>
                                    </div>
                                    <div class="col-lg-3 ">
                                        <div class="form-group mb-3" id="num_estac">
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
                                        <label for="seguridad"> Seguridad</label>
                                        <input type="checkbox" id="seguridad" name="upd_seguridad" checked>
                                    </div>
                                    <div class="col-lg-1">
                                        <label for="lavadora"> Lavadora</label>
                                        <input type="checkbox" id="lavadora" name="upd_lavadora" checked>
                                    </div>
                                    <div class="col-lg-1">
                                        <label for="cocina"> Cocina</label>
                                        <input type="checkbox" id="cocina" name="upd_cocina" checked>
                                    </div>
                                    <input type="hidden" id="id_servicios" name="id_servicios">
                                    <div class="col-12 row mx-auto px-0 text-md-right mt-5">
                                        <div class="col-12 text-md-right">
                                            <div class="d-flex flex-column flex-sm-row justify-content-end">
                                                <button type="button" class="btn-danger mr-sm-1 mb-2 mb-sm-0" id="btncontinuar_detalles" name="continuar-detalles">
                                                    <a href="<?= base_url() ?>/Mattes/Arrendador/Index" class="text-white text-decoration-none">
                                                        <i class="fa fa-sign-out fa-lg mr-1" aria-hidden="true"></i>Salir sin guardar
                                                    </a>
                                                </button>
                                                <button type="submit" class="btn-teal" id="btnsiguiente_detalles" name="siguiente_detalles" style="font-size:1.2rem;"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button>
                                            </div>
                                        </div>
                                    </div>
                                
                            </form>
                        </div>
                    </div>
                </div>

                <!-------------------------------------------------------
                                    DOCUMENTOS
                -------------------------------------------------------->
                <div class="tab-pane fade mb-200 mt-5" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                    <!-- <h3 class="text-center mt-4 mb-5 documentos-alumno">Documentos</h3> -->
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

                        <div class="col-md-12 row mt-5" style="align-items: center;justify-content: center;">
                            <div class="col-lg-4 mg-t-10 mg-sm-t-0 mt-5">
                                <label class="col-sm-12 form-control-label pl-0">Fotos y Videos</label>
                                <div class="file-drop-area files" id="files1">
                                    <span class="choose-file-button">Subir Archivo</span>
                                    <span class="file-message">Arrastra el archivo aqui</span>
                                    <input id="file-user" class="file-input" type="file" multiple name="file">
                                </div>
                                <div id="name_file">
                                    <ul class="fileList"></ul>
                                </div>
                            </div> 
                           <!--  <div class="col-lg-4 mg-t-10 mg-sm-t-0">
                                <label class="col-sm-12 form-control-label pl-0">Comprobante de domicilio</label>
                                <div class="file-drop-area">
                                    <span class="choose-file-button">Subir Archivo</span>
                                    <span class="file-message">Arrastra el archivo aqui</span>
                                    <input id="file-domicilio" class="file-input" type="file" name="file">
                                </div>
                            </div> -->
                           <!--  <div class="col-lg-4 mg-t-10 mg-sm-t-0">
                                <label class="col-sm-12 form-control-label pl-0">Recibo de Agua o Predial</label>
                                <div class="file-drop-area">
                                    <span class="choose-file-button">Subir Archivo</span>
                                    <span class="file-message">Arrastra el archivo aqui</span>
                                    <input id="file-recibo" class="file-input" type="file" name="file">
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="col-12">
                                <!-- <div class="form-group mt-4 text-center text-primary">
                                    <label><input type="checkbox" id="terminos" class="mr-1" value="">Terminos y
                                        condiciones</label>
                                </div> -->

                                 <div class="col-12 row mx-auto px-0 text-md-right mt-5 pr-lg-3">
                                    <div class="col-12 text-center text-md-right px-0 pr-lg-3">
                                        <div class="d-flex flex-column flex-sm-row justify-content-end">
                                            <button type="button" class="btn-danger mr-sm-1 mb-2 mb-sm-0 px-4 py-1" id="btncontinuar_detalles" name="continuar-detalles">
                                                <a href="<?= base_url() ?>/Mattes/Arrendador/Index" class="text-white text-decoration-none">
                                                    <i class="fa fa-sign-out fa-lg mr-1" aria-hidden="true"></i>Salir sin guardar
                                                </a>
                                            </button>
                                            <button id="send_form" type="submit" class="btn-teal px-4 py-1" id="btnsiguiente_detalles" name="siguiente_detalles" style="font-size:1.2rem;"><i class="fa fa-pencil fa-lg mr-1" aria-hidden="true"></i>Actualizar</button>
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
</div> <!-- div row fin -->

<!--Modal posicionamiento -->
<div id="model_posicionamiento" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header btn-enviar pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Posiciona tu propiedad</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-lg">
                <div class="pd-80 pd-sm-80 form-layout form-layout-4">
                    <h5 style="text-align:center;">¿Deseas solicitar el posicionamiento de tu propiedad?</h5>
                    <br>
                    <p style="color:red; text-align:center;">Esta acción tiene un costo extra, si deseas solicitarla un asesor Mattes se pondrá en contacto contigo pronto</p>
                    <input type="hidden" name="id_cita" id="id_cita">
                </div><!-- card -->
            </div>

            <div class="modal-footer">
                <button  type="button" class="btn btn-enviar pd-x-20 posiciona-propiedad"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!--Modal sello -->
<div id="model_sello" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header btn-enviar pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Solicitar Sello Mattes</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-lg">
                <div class="pd-80 pd-sm-80 form-layout form-layout-4">
                
                    <h4 style="text-align:center;">¿Deseas solicitar tu Sello Mattes?</h4>
                    <br>
                    <p style="color:red; text-align:center;">Esta acción tiene un costo extra, si deseas solicitarlo un asesor de Mattes se pondrá en contacto contigo</p>
                    <input type="hidden" name="id_cita" id="id_cita">
                </div><!-- card -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-enviar pd-x-20 sello-propiedad"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Aceptar</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times-circle mr-1" aria-hidden="true"></i>Cancelar</button>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->


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

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/autoComplete.min.js"></script>

    <script src="https://unpkg.com/currency.js@2.0.4/dist/currency.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    <script>
        let id_propiedad = <?php echo json_encode($id_propiedad); ?>;
        let id_goup = <?php echo json_encode($grupo); ?>;
    </script>

    <script type="text/javascript">
        function showContent() {
            element = document.getElementById("num_estac");
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

