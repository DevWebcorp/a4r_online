<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">
<link href="<?= base_url() ?>/assets/js/Slider/css/rSlider.min.css" rel="stylesheet">

<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.js"></script> -->

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<!-- or -->
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>

<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
<!-- or -->
<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.js"></script>

<!-- <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script> -->
<!-- or -->
<!-- <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.js"></script> -->


<!--tip-->
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>
<link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/autoComplete.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">

<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">
<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

<style>
    @media(min-width:992px) {
        .m-l-lg-2 {
            margin-left: 2.4rem;
        }

        .mt-lg-3_5 {
            margin-top: 3.5rem !important;
        }

        .autoComplete_wrapper>input {
            background-color: white !important;
        }

        #autoComplete {
            color: black !important;
        }
        .form-control {
            border: 2px solid #000 !important;
            border-radius: 0px !important;
            height: calc(1.5em + .75rem + 2px) !important;
        }
        #btn-buscar{
            border-radius: 0px !important;
            height: calc(1.5em + .75rem + 2px) !important;
        }
        .boton-precio{
            border-radius: 0px !important;
            border: 2px solid #000;
            border-right: 2px solid transparent;
        }
    }
</style>

<div id="loader" class="modal fade show" style="display: none; padding-left: 0px;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="d-flex ht-300 pos-relative align-items-center">
            <div class="sk-chasing-dots">
                <div class="sk-child sk-dot1 bg-red-800"></div>
                <div class="sk-child sk-dot2 bg-green-800"></div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="alert bg-warning mg-t-100 d-none" id="succes-alert" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA<span id="success"></span></span>
    </div>
</div> -->

<section id="sec_filtros" class="filtro mb-200 mg-t-90">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div style="">
                    <h3 class="">Resultados de búsqueda</h3>
                    <div class="ml-lg-4 mx-auto d-none d-lg-block">
                        <div class="d-flex align-items-center ">
                            <div class="filtro-icono" style="color:#000;">
                                <i class="fa fa-exchange fa-lg" aria-hidden="true"></i>
                            </div>
                            <h2 class="ml-2" style="color:#000;">Filtros</h2>
                        </div>
                    </div>
                    <nav class="navbar navbar-light  navbar-expand-lg pt-3 pt-lg-0" id="menu-filtros">
                        <div class="container-fluid ml-gl-5">
                            <button class="navbar-toggler d-lg-none" data-target="#filtros" data-toggle="collapse" type="button" aria-controls="filtros" arial-expanded="true" arial-label="Desplegar menu de navegacion">
                                <div class="d-flex align-items-center">
                                    <div class="filtro-icono" style="color:#000;"><i class="fa fa-exchange fa-lg" aria-hidden="true"></i></div>
                                    <h2 class="ml-2" style="color:#000;">Filtros</h2>
                                </div>
                            </button>
                          

                            <div class="collapse navbar-collapse in show" id="filtros">
                                <form class=" " id="form-busqueda">
                                    <div class="d-flex flex-column flex-lg-row ">
                                        <div class="mg-lg-r-30">
                                            <label class="px-0 mt-3 form-control-label">Universidad <span style="color: red !important;">*</span></label>
                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 px-0 was-validated">
                                                <input type="text" name="universidad" id="autoComplete" class="form-control universidad" autocomplete="off" required placeholder="BUSCA TU UNIVERSIDAD" style="background-color: white !important; color: rgba(0,0,0,.8) !important; ">
                                                <input type="hidden" name="id_univ" id="univ" class="form-control ">
                                                <input type="hidden" name="latitud" id="latitud" class="form-control ">
                                                <input type="hidden" name="longitud" id="longitud" class="form-control ">
                                            </div>
                                        </div>

                                        <div class="mg-lg-r-30">
                                            <label class="col-sm-12 form-control-label px-0 mt-3">Distancia <span style="color: red !important;">*</span></label>
                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 px-0 ">
                                                <select id="kilometros" name="distancia" class="form-control select2" data-placeholder="Selecciona una opción" required>
                                                    <option value="">SELECCIONA</option>
                                                    <option value="1000">1 km</option>
                                                    <option value="2000">2 km</option>
                                                    <option value="5000">5 km</option>
                                                    <option value="10000" selected>10 km</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="d-block mg-t-20 mg-lg-t-0 mr-lg-3">
                                            <label class="col-lg-8 px-0 mb-0 m-l-lg-2" style="margin-top: 1.2rem; ">Precio
                                                <div class="col-12 col-lg-9 d-flex flex-column flex-lg-row px-0">
                                                    <div class="mb-1 mb-lg-0 mr-lg-1">
                                                        <div class="d-flex align-items-center ">
                                                            <p class="mr-lg-1 mt-2">Min</p>
                                                            <i class="fa fa-usd boton-precio" aria-hidden="true"></i>
                                                            <input class="form-control" type="text" id="min" name="precio_min" value="<?= $min[0]->price; ?>" style="padding-bottom: 1.3rem; padding-top: 1.3rem;">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="d-flex align-items-center ">
                                                            <p class="ml-lg-2 mr-lg-1 mt-2">Max</p>
                                                            <i class="fa fa-usd boton-precio" aria-hidden="true"></i>
                                                            <input class="form-control col-lg-8" type="text" id="max" name="precio_max" value="<?= $max[0]->price; ?>" style="padding-bottom: 1.3rem; padding-top: 1.3rem;">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div style="display: none;" class="text-right mg-lg-r-30" style="margin-top: 3rem;">
                                            <button  type="button" class="btn btn-success col-12 col-md-auto" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-filter mr-1" aria-hidden="true"></i>Filtros avanzados
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success text-white">
                                                            <h5 class="modal-title" id="exampleModalLabel">Filtros avanzados</h5>
                                                            <button type="button" style="color: white !important;" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                <p aria-hidden="true">&times;</p>
                                                            </button>
                                                        </div>
                                                        <div class="mg-t-20">
                                                            <label class="col-sm-12 form-control-label">Tipo</label>
                                                            <div class="col-sm-12 mg-sm-t-0">
                                                                <select id="tipo-alojamiento" name="tipo_alojamiento" class="form-control select2">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mg-t-20">
                                                            <label class="col-sm-12 form-control-label">Fecha de ingreso<span class="tx-danger"></span></label>
                                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                                                <input type="date" name="fecha_ingreso" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mg-t-20">
                                                            <label class="col-sm-12 form-control-label">Número de roomies</label>
                                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                                                <select id="rommie" name="rommie" class="form-control select2">
                                                                    <option value="">Selecciona</option>
                                                                    <option value="0">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 px-0 mg-t-20">
                                                            <label class="col-sm-12 form-control-label">Número de baños</label>
                                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                                                <select id="baños" name="numero_baños" class="form-control select2" data-placeholder="Choose Browser">
                                                                    <option value="">Selecciona</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 px-0 mg-t-20">
                                                            <label class="col-sm-12 form-control-label">Petfriendly</label>
                                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                                                <select id="petfriendly" name="petfriendly" class="form-control select2">
                                                                    <option value="">Selecciona</option>
                                                                    <option value="Si">Si</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 px-0 mg-t-20">
                                                            <label class="col-sm-12 form-control-label">Disponible para: </label>
                                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                                                <select id="disponible" name="disponible" class="form-control select2">
                                                                    <option value="">Selecciona</option>
                                                                    <option value="Mujeres">Mujeres</option>
                                                                    <option value="Hombres">Hombres</option>
                                                                    <option value="Mixto">Mixto</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mg-t-20">
                                                            <input type="checkbox" id="capacidades-diferentes" name="capacidades">
                                                            <label for="capacidad-diferentes"> Acceso para personas con capacidades
                                                                diferentes</label><br>
                                                            <input type="checkbox" id="wifi" name="wifi">
                                                            <label for="wifi"> Wifi</label><br>
                                                            <input type="checkbox" id="limpieza" name="limpieza">
                                                            <label for="limpieza"> Limpieza</label><br>
                                                            <input type="checkbox" id="estacionamiento" name="estacionamiento">
                                                            <label for="estacionamiento"> Estacionamiento</label><br>
                                                            <input type="checkbox" id="seguridad" name="seguridad">
                                                            <label for="seguridad"> Seguridad</label><br>
                                                            <input type="checkbox" id="lavadora" name="lavadora">
                                                            <label for="lavadora"> Lavadora</label><br>
                                                            <input type="checkbox" id="cocina" name="cocina">
                                                            <label for="cocina"> Cocina</label><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right pt-2 pt-lg-0 mt-lg-50 mb-1 mt-lg-5">
                                            <button id="btn-buscar" type="submit" class="col-12 col-md-auto btn-mattes px-4 py-1"><i class="fa fa-search mr-1 d-none d-xl-inline-block" aria-hidden="true"></i>BUSCAR</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>

            </div>


            <div class="col-lg-6 ml-auto mt-lg-5">
                <div class="container ">
                    <div class="col-lg-8 col-xl-9">
                        <div id="map"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mx-auto mb-4 position-lg-fixed mt-4 mt-lg-0" style="height:600px;">
                <h3 class="text-center ">Propiedades</h3>
                <div class="container casas mg-b-20 propiedades-busqueda">
                    <div class="grid mx-auto mt-lg-1">
                        <img src="<?= base_url() ?>/assets/img/sin-propiedades.png" class="sin-propiedades" alt="">
                    </div>
                    <div class="page-load-status mg-t-20">
                        <div class="loader-ellips infinite-scroll-request">
                            <span class="loader-ellips__dot"></span>
                            <span class="loader-ellips__dot"></span>
                            <span class="loader-ellips__dot"></span>
                            <span class="loader-ellips__dot"></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>


<div id="template" style="display: none;">
    <strong>Rentame</strong>
</div>

<script>
    let id_uni = <?php echo json_encode($id_uni); ?>;
    let uni = <?php echo json_encode($universidad); ?>;
    let latitude = <?php echo json_encode($latitude); ?>;
    let longitude = <?php echo json_encode($longitud); ?>;
</script>

<style>
    .autoComplete_wrapper>ul>li {
        height: 68px !important;
        overflow-x: auto !important;
        text-overflow: inherit !important;
    }
</style>