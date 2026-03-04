<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">   
    <link href="<?= base_url() ?>assets/js/Slider/css/rSlider.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />
    
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
    }
    .dropdown-menu {
        /* top: 0px !important;
        right: 0px;
        left: 0px !important; */
        width: auto;
        background-color: #fff !important;
        border-bottom-color: #ddd;
    }
    .dropdown-toggle::after {
        border-top: 0em solid;
        border-right: 0em solid transparent;
        border-left: 0em solid transparent;
    }
</style>

<!--  <h3 style="margin-top: 7rem;">Resultados de búsqueda</h3> -->
 <!-- CHECK AVAILABILITY -->
<section class="section-check-availability  " style="margin-top: 4.5rem;">
    <div class="container">
        <div class="check-availability">
            <div class="row">
                <div class="col-lg-3">
                    <h2 class="mt-lg-3">Filtros</h2>
                </div>
                <div class="col-lg-9">
                    <form id="form-busqueda" action="" method="post">
                        <div class="availability-form">
                            <!-- <input type="text" name="arrive" class="awe-calendar from" placeholder="Universidad"> -->
                            <select class="awe-select" name="universidad">
                                <option value="" selected disabled>Universidad</option>
                                <option value="1000">UNAM</option>
                                <option value="2000">IPN</option>
                                <option value="5000">UAM</option>
                                <option value="10000">UACM</option>
                                <option value="10000">UVM</option>
                            </select>

                            <select class="awe-select" name="distancia">
                                <option value="" selected disabled>Distancia</option>
                                <option value="1000">1 km</option>
                                <option value="2000">2 km</option>
                                <option value="5000">5 km</option>
                                <option value="10000">10 km</option>
                            </select>

                            <select class="awe-select" name="precio_min">
                                <option value="" selected disabled>Min</option>
                                <option value="1000">$1,000</option>
                                <option value="20000">$2,000</option>
                                <option value="30000">$3,000</option>
                            </select>

                            <select class="awe-select" name="precio_max">
                                <option value="" selected disabled>Max</option>
                                <option value="15000">$15,000</option>
                                <option value="25000">$25,0000</option>
                                <option value="50000">$50,000</option>
                            </select>

                            <div class="vailability-submit" style="margin-right: 1rem;">
                                <button class="awe-btn awe-btn-8" data-toggle="modal" data-target="#exampleModal">Avanzados</button>
                            </div>

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
                                            <label for="capacidad-diferentes"> Acceso para personas con capacidades diferentes</label>
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

                            <div class="vailability-submit">
                                <button id="btn-buscar" type="submit" class="awe-btn awe-btn-13">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> 
<!-- END / CHECK AVAILABILITY -->

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

<section class="filtro mg-t-90">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div>
                    <!-- <h3 class="resultados-busqueda">Resultados de búsqueda</h3> -->
                    <!-- <div class="ml-lg-4 mx-auto d-none d-lg-block">
                        <div class="d-flex align-items-center ">
                            <div class="filtro-icono" style="color:#000;">
                                <i class="fa fa-exchange fa-lg" aria-hidden="true"></i>
                            </div>
                            <h2 class="ml-2" style="color:#000;">Filtros</h2>
                        </div>
                    </div> -->
                    <nav class="navbar navbar-light  navbar-expand-lg pt-3 pt-lg-0" id="menu-filtros">
                        <div class="container-fluid ml-gl-5">
                            <button class="navbar-toggler d-lg-none" data-target="#filtros" data-toggle="collapse" type="button" aria-controls="filtros" arial-expanded="false" arial-label="Desplegar menu de navegacion">
                                <div class="d-flex align-items-center">
                                    <div class="filtro-icono" style="color:#000;"><i class="fa fa-exchange fa-lg" aria-hidden="true"></i></div>
                                    <h2 class="ml-2" style="color:#000;">Filtros</h2>
                                </div>
                            </button>
                            <div class="collapse navbar-collapse" id="filtros">
                                <form class=" " id="form-busqueda2">
                                    <div class="d-flex flex-column flex-lg-row ">
                                        <!-- <div class="mg-lg-r-30">
                                            <label class="px-0 mt-3 form-control-label">Universidad <span style="color: red !important;">*</span></label>
                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 px-0 was-validated">
                                                <input type="text" name="universidad" id="autoComplete" class="form-control universidad" autocomplete="off" required placeholder="BUSCA TU UNIVERSIDAD" style="background-color: white !important; color: rgba(0,0,0,.8) !important; border: 1px solid #28a745 !important;">
                                                <input type="hidden" name="id_univ" id="univ" class="form-control ">
                                                <input type="hidden" name="latitud" id="latitud" class="form-control ">
                                                <input type="hidden" name="longitud" id="longitud" class="form-control ">
                                            </div>
                                        </div> -->
                                        <!-- <div class="mg-lg-r-30">
                                            <label class="col-sm-12 form-control-label px-0 mt-3">Distancia <span style="color: red !important;">*</span></label>
                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 px-0 was-validated">
                                                <select id="kilometros" name="distancia" class="form-control select2" data-placeholder="Selecciona una opción" required>
                                                    <option value="">SELECCIONA</option>
                                                    <option value="1000">1 km</option>
                                                    <option value="2000">2 km</option>
                                                    <option value="5000">5 km</option>
                                                    <option value="10000" selected>10 km</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <!-- <div class="d-block mg-t-20 mg-lg-t-0 mr-lg-3">
                                            <label class="col-lg-8 px-0 mb-0 m-l-lg-2" style="margin-top: 1.2rem; ">Precio
                                                <div class="col-12 col-lg-9 d-flex flex-column flex-lg-row px-0">
                                                    <div class="mb-1 mb-lg-0 mr-lg-1">
                                                        <div class="d-flex align-items-center was-validated">
                                                            <p class="mr-lg-1 mt-2">Min</p>
                                                            <i class="fa fa-usd boton-precio bg-white  py-precio" aria-hidden="true"></i>
                                                            <input class="form-control" type="text" id="min" name="precio_min" value="<?= $min[0]->price; ?>" style="padding-bottom: 1.3rem; padding-top: 1.3rem;">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="d-flex align-items-center was-validated">
                                                            <p class="ml-lg-2 mr-lg-1 mt-2">Max</p>
                                                            <i class="fa fa-usd boton-precio bg-white py-precio" aria-hidden="true"></i>
                                                            <input class="form-control col-lg-8" type="text" id="max" name="precio_max" value="<?= $max[0]->price; ?>" style="padding-bottom: 1.3rem; padding-top: 1.3rem;">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div> -->
                                        <div class="text-right mg-lg-r-30" style="margin-top: 3rem;">
                                           <!--  <button type="button" class="btn btn-success col-12 col-md-auto" data-toggle="modalh" data-target="#exampleModal2">
                                                <i class="fa fa-filter mr-1" aria-hidden="true"></i>Filtros avanzados
                                            </button> -->
                                            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            </div> -->
                                        </div>
                                       <!--  <div class="text-right pt-2 pt-lg-0 mt-lg-5 mb-1">
                                            <button id="btn-buscar" type="submit" class="col-12 col-md-auto btn-mattes px-4 py-1"><i class="fa fa-search mr-1" aria-hidden="true"></i>BUSCAR</button>
                                        </div> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
                
            </div>


            <div class="col-lg-6 ml-auto">
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
                        <div class="grid mx-auto mt-lg-1">
                        <img src="<?= base_url() ?>/assets/img/sin-propiedades.png" class="sin-propiedades" alt="" style="margin-left: 5rem;">
                    </div>
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

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>  



<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/autoComplete.min.js"></script>


<?= $this->endSection() ?>

