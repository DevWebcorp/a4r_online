<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->

<?= $this->endSection() ?>


<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>
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

 <!-- BANNER SLIDER -->
<section class="section-slider">
    <h1 class="element-invisible">Slider</h1>
    <div id="slider-revolution">
        <ul>
            <li data-transition="fade">
                <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/slider/img-5.jpg') ?>" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
                
                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="100" data-speed="700" data-start="1500" data-easing="easeOutBack">
                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/slider/hom1-slide1.png') ?>" alt="icons"> 
                </div>

                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="240" data-speed="700" data-start="1500" data-easing="easeOutBack">
                    Bienvenido a
                </div>

                <div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1" data-x="center" data-y="280" data-speed="700" data-easing="easeOutBack"  data-start="2000">THE LOTUS HOTEL</div>
                
            </li> 

            <li data-transition="fade">
                <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/slider/img-4.jpg') ?>" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
                
                <div class="tp-caption sft fadeout" data-x="center" data-y="195" data-speed="700" data-start="1300" data-easing="easeOutBack">
                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/slider/icon-slider-1.png') ?>" alt="">
                </div>
    
                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="220" data-speed="700" data-start="1500" data-easing="easeOutBack">
                    Cada habitacion es diferente
                </div>

                <div class="tp-caption sfb fadeout slider-caption slider-caption-3" data-x="center" data-y="260" data-speed="700" data-easing="easeOutBack"  data-start="2000">
                   60% de descuento
                </div>
                
                <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="365" data-easing="easeOutBack" data-speed="700" data-start="2200">Justo ahora</div>

                <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="395" data-easing="easeOutBack" data-speed="700" data-start="2400">
                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/slider/icon-slider-2.png') ?>" alt="">
                </div>
            </li> 
        </ul>
    </div>
</section>
<!-- END / BANNER SLIDER -->

<!-- CHECK AVAILABILITY -->
<section class="section-check-availability">
    <div class="container">
        <div class="check-availability">
            <div class="row">
                <div class="col-lg-3">
                    <h2>Filtros</h2>
                </div>
                <div class="col-lg-9">
                    <form id="ajax-form-search-room" action="https://landing.engotheme.com/html/lotus/demo/search_step_2.php" method="post">
                        <div class="availability-form">
                            <input type="text" name="arrive" class="awe-calendar from" placeholder="Llegada">
                            <input type="text" name="departure" class="awe-calendar to" placeholder="Partida">

                            <select class="awe-select" name="adults">
                                <option>Adultos</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                            <select class="awe-select" name="children">
                                <option>Precio</option>
                                <option>Menos de $5000</option>
                                <option>Menos de $10000</option>
                                <option>Menos de $15000</option>
                            </select>
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

 <!-- ATTRACTIONS -->
<section class="section-attractions bg-white" style="padding-top: 5px;">
    <!-- MAPS -->
    <div class="attraction-maps" id="attraction-maps"></div>
    <!-- END / MAPS -->

    <div class="container">

        <div class="attraction">

            <div class="row">

                <div class="col-md-4">

                    <div class="attraction_sidebar">

                        <h2 class="attraction_heading">Hospedajes <span class="attraction-icon-drop fa fa-angle-down"></span></h2>

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
<!-- END / ATTRACTIONS -->
   
<!--HTML-->


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        // Aquí van los scripts específicos de esta página
    </script>
<?= $this->endSection() ?>
