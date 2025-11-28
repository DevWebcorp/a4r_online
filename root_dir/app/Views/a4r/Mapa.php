<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
<?= $this->endSection() ?>


<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

 <!-- ATTRACTIONS -->
        <section class="section-attractions bg-white">

            <!-- MAPS -->
            <div class="attraction-maps" id="attraction-maps"></div>
            <!-- END / MAPS -->

            <div class="container">

                <div class="attraction">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="attraction_sidebar">

                                <h2 class="attraction_heading">ATTRACTIONS <span class="attraction-icon-drop fa fa-angle-down"></span></h2>

                                <div class="attraction_sidebar-content">
                                    <h3 class="attraction_title"><i class="fa fa-map-marker"></i>lotus HOTEL &amp; RESORT</h3>

                                    <select class="attraction_select awe-select">
                                        <option>Local Attractions</option>
                                        <option>Arthur Ashe Center</option>
                                        <option>Carytown Street</option>
                                        <option>Greater Richmond Convention Center</option>
                                        <option>James River Plantations</option>
                                        <option>Jamestown Settlement</option>
                                        <option>Kings Dominion</option>
                                    </select>

                                    <ul class="attraction_location" id="attraction_location">
                                        <li class="active"><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.5748755,-98.4596874" data-title="Carytown Street" data-address="3325 West Cary Street">Arthur Ashe Center</a></li>
                                        <li><i class="fa fa-map-marker"></i><a href="ajax/ajax-attraction.html" data-latlng="36.576861,-98.459881" data-title="Carytown Street" data-address="3325 West Cary Street">Carytown Street</a></li>
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
                                            <span>ADDRESS:</span> 3325 West Cary Street<br>
                                        </li>
                                        <li>
                                            <span>Website:</span> <a href="#">Carytown street</a><br>
                                        </li>
                                        <li>
                                            <span>google map:</span> <a href="#">Google Map</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="attraction_content" id="attraction_content">

                                <h2 class="attraction_content-title">Known as the Mile of Style</h2>
                                <br>
                                <div class="wp_caption aligncenter">
                                    <img src="images/attractions/img-1.jpg" alt="">
                                </div>
                                <br>
                                <br>

                                <p>Known as the <b>Mile of Style</b>, Carytown offers everything you need to Eat, Shop, and Play. Our sidewalks are lined with unique boutiques, restaurants, specialty shops, spas, and professional services. Enjoy our eclectic collection of award-winning, locally-owned businesses. Spend the day in the area voted “<b>Best Shopping</b> Neighborhood in Virginia” by the readers of Southern <a href="#">Living magazine.</a></p>
                                <br><br>

                                <div class="wp_caption alignleft">
                                    <img src="images/attractions/img-2.jpg" alt="">
                                </div>

                                <br>
                                <br>
                                
                                <h2 class="attraction_content-title">Known as the Mile of Style</h2>
                                <br>
                                <p>
                                    Known as the Mile of Style, <b>Carytown</b> offers everything you need to Eat, Shop, and Play. Our sidewalks are lined with unique boutiques, restaurants, specialty shops, spas, and professional services. Enjoy our eclectic collection of award-winning, locally-owned businesses. Spend the day in the area voted “<b>Best Shopping Neighborhood in Virginia</b>” by the readers of <a href="#">Southern Living magazine.</a>
                                </p>

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
