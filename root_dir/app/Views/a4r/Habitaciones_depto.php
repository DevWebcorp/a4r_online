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
                <h2>Habitaciones &amp; tarifas</h2>
                <p>Habitaciones disponibles en el edificio Webcorp</p>
            </div>
        </div>
    </div>
</section>
<!-- END / SUB BANNER -->

  <!-- ROOM -->
<section class="section-room bg-white">
    <div class="container">

        <div class="room-wrap-6">

            <!-- ITEM -->
            <div class="room_item-6" data-background="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/list/img-1.jpg') ?>">

                <div class="text">
                    <h2><a href="#">HABITACIÓN DE LUJO</a></h2>
                    <span class="price">Desde <span class="amout">$120</span> por día</span>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley ...</p>
                    <ul>
                        <li>Max: 4 Personas</li>
                        <li>Tamaño: 35 m2 / 376 ft2</li>
                        <li>Vista: Oceáno</li>
                        <li>Cama: King-size o dos camas</li>
                    </ul>
                    <a href="#" class="awe-btn awe-btn-13">Ver detalles</a>
                </div>

            </div>
            <!-- END / ITEM -->

            <!-- ITEM -->
            <div class="room_item-6 event" data-background="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/list/img-2.jpg') ?>">

                <div class="text">
                    <h2><a href="#">Habitación familiar</a></h2>
                    <span class="price">Desde <span class="amout">$120</span> por día</span>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley ...</p>
                    <ul>
                        <li>Max: 4 Personas</li>
                        <li>Tamaño: 35 m2 / 376 ft2</li>
                        <li>Vista: Oceáno</li>
                        <li>Cama: King-size o dos camas</li>
                    </ul>
                    <a href="#" class="awe-btn awe-btn-13">Ver detalles</a>
                </div>

            </div>
            <!-- END / ITEM -->

            <!-- ITEM -->
            <div class="room_item-6" data-background="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/list/img-3.jpg') ?>">

                <div class="text">
                    <h2><a href="#">Habitacion en pareja</a></h2>
                    <span class="price">Desde <span class="amout">$120</span> por día</span>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley ...</p>
                    <ul>
                        <li>Max: 4 Personas</li>
                        <li>Tamaño: 35 m2 / 376 ft2</li>
                        <li>Vista: Oceáno</li>
                        <li>Cama: King-size o dos camas</li>
                    </ul>
                    <a href="#" class="awe-btn awe-btn-13">Ver detalles</a>
                </div>

            </div>
            <!-- END / ITEM -->

            <!-- ITEM -->
            <div class="room_item-6 event" data-background="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/list/img-4.jpg') ?>">

                <div class="text">
                    <h2><a href="#">Habitación estandar</a></h2>
                    <span class="price">Desde <span class="amout">$120</span> por día</span>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley ...</p>
                    <ul>
                        <li>Max: 4 Personas</li>
                        <li>Tamaño: 35 m2 / 376 ft2</li>
                        <li>Vista: Oceáno</li>
                        <li>Cama: King-size o dos camas</li>
                    </ul>
                    <a href="#" class="awe-btn awe-btn-13">Ver detalles</a>
                </div>

            </div>
            <!-- END / ITEM -->

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
