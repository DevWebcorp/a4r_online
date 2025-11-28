<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
<?= $this->endSection() ?>


<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

<!-- SUB BANNER -->
<section class="section-sub-banner bg-9">
    <div class="awe-overlay"></div>
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>Habitaciones &amp; precios</h2>
                <p>Habitaciones que puedes encontrar en la casa sol</p>
            </div>
        </div>
    </div>
</section>
<!-- END / SUB BANNER -->
   

<!-- ROOM -->
<section class="section-room bg-white">
    <div class="container">

        <div class="room-wrap-1">
            <div class="row">
                
                <!-- ITEM -->
                <div class="col-md-6">
                    <div class="room_item-1">
                    
                        <h2><a href="#">Habitación familiar</a></h2>
                    
                        <div class="img">
                            <a href="#">
                                <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/grid/img-1.jpg') ?>" alt="">
                            </a>
                        </div>
                    
                        <div class="desc">
                            <p>Ubicado en el corazón de Aspen con una combinación única de lujo contemporáneo y patrimonio histórico, alojamiento de lujo, excelentes comodidades, hospitalidad genuina y servicio dedicado para una experiencia elevada en las Montañas Rocosas.</p>
                            <ul>
                                <li>Max: 4 Personas</li>
                                <li>Tamaño: 35 m2 / 376 ft2</li>
                                <li>Vista: Oceáno</li>
                                <li>Cama: King-size o dos camas</li>
                            </ul>
                        </div>
                    
                        <div class="bot">
                            <span class="price">Desde <span class="amout">$260</span> /día</span>
                            <a href="#" class="awe-btn awe-btn-13">Ver detalles</a>
                        </div>
                    
                    </div>
                </div>
                <!-- END / ITEM -->
                
                <!-- ITEM -->
                <div class="col-md-6">
                    <div class="room_item-1">
                    
                        <h2><a href="#">Habitación de lujo</a></h2>
                    
                        <div class="img">
                            <a href="#">
                                <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/grid/img-2.jpg') ?>" alt="">
                            </a>
                        </div>
                    
                        <div class="desc">
                            <p>Ubicado en el corazón de Aspen con una combinación única de lujo contemporáneo y patrimonio histórico, alojamiento de lujo, excelentes comodidades, hospitalidad genuina y servicio dedicado para una experiencia elevada en las Montañas Rocosas.</p>
                            <ul>
                                <li>Max: 4 Personas</li>
                                <li>Tamaño: 35 m2 / 376 ft2</li>
                                <li>Vista: Oceáno</li>
                                <li>Cama: King-size o dos camas</li>
                            </ul>
                        </div>
                    
                        <div class="bot">
                            <span class="price">Desde <span class="amout">$260</span> /día</span>
                            <a href="#" class="awe-btn awe-btn-13">Ver detalles</a>
                        </div>
                    
                    </div>
                </div>
                <!-- END / ITEM -->

                <!-- ITEM -->
                <div class="col-md-6">
                    <div class="room_item-1">
                    
                        <h2><a href="#">Habitación de pareja</a></h2>
                    
                        <div class="img">
                            <a href="#">
                                <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/grid/img-3.jpg') ?>" alt="">
                            </a>
                        </div>
                    
                        <div class="desc">
                            <p>Ubicado en el corazón de Aspen con una combinación única de lujo contemporáneo y patrimonio histórico, alojamiento de lujo, excelentes comodidades, hospitalidad genuina y servicio dedicado para una experiencia elevada en las Montañas Rocosas.</p>
                            <ul>
                                <li>Max: 4 Personas</li>
                                <li>Tamaño: 35 m2 / 376 ft2</li>
                                <li>Vista: Oceáno</li>
                                <li>Cama: King-size o dos camas</li>
                            </ul>
                        </div>
                    
                        <div class="bot">
                            <span class="price">Desde <span class="amout">$260</span> /día</span>
                            <a href="#" class="awe-btn awe-btn-13">Ver detalles</a>
                        </div>
                    
                    </div>
                </div>
                <!-- END / ITEM -->
                
                <!-- ITEM -->
                <div class="col-md-6">
                    <div class="room_item-1">
                    
                        <h2><a href="#">Habitación estandar</a></h2>
                    
                        <div class="img">
                            <a href="#">
                                <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/grid/img-4.jpg') ?>" alt="">
                            </a>
                        </div>
                    
                        <div class="desc">
                            <p>Ubicado en el corazón de Aspen con una combinación única de lujo contemporáneo y patrimonio histórico, alojamiento de lujo, excelentes comodidades, hospitalidad genuina y servicio dedicado para una experiencia elevada en las Montañas Rocosas.</p>
                            <ul>
                                <li>Max: 4 Personas</li>
                                <li>Tamaño: 35 m2 / 376 ft2</li>
                                <li>Vista: Oceáno</li>
                                <li>Cama: King-size o dos camas</li>
                            </ul>
                        </div>
                    
                        <div class="bot">
                            <span class="price">Desde <span class="amout">$260</span> /día</span>
                            <a href="#" class="awe-btn awe-btn-13">Ver detalles</a>
                        </div>
                    
                    </div>
                </div>
                <!-- END / ITEM -->

            </div>
        </div>
        
    </div>
</section>
<!-- END / ROOM -->

<!--HTML-->


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        // Aquí van los scripts específicos de esta página
    </script>
<?= $this->endSection() ?>
