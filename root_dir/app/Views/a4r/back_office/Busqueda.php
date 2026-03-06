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

<link href="<?= base_url() ?>/assets/css/Mattes/Back_office/Mapa.css" rel="stylesheet">
<link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">

<?= $this->endSection() ?>


<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>
<?= $this->include('Layout/header_BO') ?>


<style>
    .item.room-item .price {
        font: 600 16px 'Montserrat';
        color: #E1BD85;
        margin-bottom: 15px;
        text-transform: uppercase;
    }
    .item.room-item .info p .number {
        font: 300 24px 'Montserrat';
    }
    .item.room-item .info p {
        display: inline-block;
        max-width: 80px;
        margin: 0 20px; 
        color: black;
    }
    .section-slider{
        height: auto !important;
    }
    .attraction-maps{
        overflow: inherit !important;
    }
</style>


<!-- CHECK AVAILABILITY -->
<section class="section-check-availability" style="margin-top: -128px;">
    <div class="container">
        <div class="check-availability">
            <div class="row">
                <div class="col-lg-3 pt-3">
                    <h2>Filtros</h2>
                </div>
                <div class="col-lg-9">
                    <form id="" action="" method="post">
                        <div class="availability-form">
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
                                <option value="" selected disabled>$ Minimo</option>
                                <option value="1000">$1,000</option>
                                <option value="20000">$2,000</option>
                                <option value="30000">$3,000</option>
                            </select>

                            <select class="awe-select" name="precio_max">
                                <option value="" selected disabled>$ Maximo</option>
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
                                <button class="awe-btn awe-btn-13">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / CHECK AVAILABILITY -->


<section class="section-attractions bg-white" style="margin-top: 287px; padding-top: 5px;">
    <div class="attraction-maps" id="attraction-maps"></div> 

    <div class="container">
        <div class="attraction">
            <div class="row">
                <div class="col-md-4">
                    <div class="attraction_sidebar">
                        <h2 class="attraction_heading">Propiedades<span class="attraction-icon-drop fa fa-angle-down"></span></h2>

                        <div class="attraction_sidebar-content">
                            <h3 class="attraction_title"><i class="fa fa-map-marker"></i>Carytown Street</h3>

                            <ul class="attraction_location" id="attraction_location">
                                <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.5748755,-98.4596874" data-title="Carytown Street" data-address="3325 West Cary Street">Arthur Ashe Center</a></li>
                                <li class="active"><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.576861,-98.459881" data-title="Carytown Street" data-address="3325 West Cary Street">Carytown Street</a></li>
                                <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.576922,-98.463700" data-title="Carytown Street" data-address="3325 West Cary Street">Greater Richmond Convention Center</a></li>
                                <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.577172,-98.457327" data-title="Carytown Street" data-address="3325 West Cary Street">James River Plantations</a></li>
                                <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.573949,-98.462402" data-title="Carytown Street" data-address="3325 West Cary Street">Jamestown Settlement</a></li>
                                <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.5748755,-98.4596874" data-title="Carytown Street" data-address="3325 West Cary Street">Kings Dominion</a></li>
                                <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.5748755,-98.4596874" data-title="Carytown Street" data-address="3325 West Cary Street">Lewis Ginter Botanical Garden</a></li>
                                <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.5748755,-98.4596874" data-title="Carytown Street" data-address="3325 West Cary Street">Maymont Foundation</a></li>
                                <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.5748755,-98.4596874" data-title="Carytown Street" data-address="3325 West Cary Street">Richmond International Raceway</a></li>
                                <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.5748755,-98.4596874" data-title="Carytown Street" data-address="3325 West Cary Street">Richmond National Battlefield Park</a></li>
                                <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.5748755,-98.4596874" data-title="Carytown Street" data-address="3325 West Cary Street">Short Pump Town Center</a></li>
                                <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.5748755,-98.4596874" data-title="Carytown Street" data-address="3325 West Cary Street">The Diamond- Richmond Flying Squirrels</a></li>
                                <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.5748755,-98.4596874" data-title="Carytown Street" data-address="3325 West Cary Street">University of Richmond</a></li>
                                <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.5748755,-98.4596874" data-title="Carytown Street" data-address="3325 West Cary Street">Virginia Commonwealth University</a></li>
                                <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.5748755,-98.4596874" data-title="Carytown Street" data-address="3325 West Cary Street">Busch Gardens Williamsburg</a></li>
                            </ul>

                        </div>

                    </div> 

                </div>

                <div class="col-md-8">

                    <div class="attraction_detail">
                        <div class="attraction_detail-header">
                            <h2 class="attraction_detail-title"><i class="fa fa-map-marker"></i>Carytown Street</h2>
                            <ul>
                                <li>
                                    <span>Dirección:</span> 3325 West Cary Street<br>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="attraction_content" id="attraction_content">

                        <h2 class="attraction_content-title">Known as the Mile of Style</h2>
                        <br>
                        <!-- <div class="wp_caption aligncenter">
                            <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/img-1.jpg') ?>">
                        </div>
                        <br>
                        <br>

                        <p>Known as the <b>Mile of Style</b>, Carytown offers everything you need to Eat, Shop, and Play. Our sidewalks are lined with unique boutiques, restaurants, specialty shops, spas, and professional services. Enjoy our eclectic collection of award-winning, locally-owned businesses. Spend the day in the area voted “<b>Best Shopping</b> Neighborhood in Virginia” by the readers of Southern <a href="#">Living magazine.</a></p> -->

                        <div class="item room-item accomd-modations-room_1" style="border: 1px solid transparent;">
                            <div class="img">
                                <a href="#">
                                    <img class="img-responsive img-full" src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/img-1.jpg') ?>" alt="">                                    
                                </a>
                            </div>
                           <!--  <h2 class="title"><a href="%21.html#">Luxury Room</a></h2> -->
                            <p class="price">
                                Desde $120 por día
                            </p>
                            <div class="info upper">
                                <p>
                                    <span class="number">2</span>
                                    <span>personas</span>
                                </p>
                                <p>
                                    <span class="number">34.5</span>
                                    <span>M<sup>2</sup></span>

                                </p>
                                <p>
                                    <span class="number">1</span>
                                    <span> dormitorio</span>
                                </p>
                            </div>
                            <a class="awe-btn awe-btn-default btn-medium font-hind f12 bold" href="#" style="margin-top: 1rem;">Ver detalles</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

   


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>        
    <script src="<?= base_url() ?>/assets/js/Mattes/Back_office/Mapa_filtros.js"></script>
    
<?= $this->endSection() ?>
