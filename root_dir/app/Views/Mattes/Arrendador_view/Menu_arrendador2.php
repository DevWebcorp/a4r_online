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
<!-- HEADER -->
<header id="header" style="z-index:9999;">            
    
    <!-- END / HEADER TOP -->
    
    <!-- HEADER LOGO & MENU -->
    <div class="header_content" id="header_content">

        <div class="container">
            <!-- HEADER LOGO -->
            <div class="header_logo">
                <a href="<?=base_url()?>/a4r/Mapa">
                    <img src="<?= base_url('../assets/img/Logo-PlataformA4R.png') ?>" alt="">
                </a>
            </div>
            <!-- END / HEADER LOGO -->
            
            <!-- HEADER MENU -->
            <nav class="header_menu">
                <ul class="menu">
                    <li><a href="<?=base_url()?>/datos-propietario">Mi cuenta</a></li>
                    <!-- <li class="current-menu-item"> -->
                    <li>
                        <a href="<?=base_url()?>/a4r/propietario/Home_propietario">Mis propiedades</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>/a4r/Habitaciones_casa">Alta propiedad</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>/a4r/Habitaciones_depto">Subir agentes</a>
                    </li>                    
                    <li><a href="<?= base_url() . "/login/sign_out" ?>">Cerrar sesión</a></li>
                </ul>
            </nav>
            <!-- END / HEADER MENU -->

            <!-- MENU BAR -->
            <span class="menu-bars">
                <span></span>
            </span>
            <!-- END / MENU BAR -->

        </div>
    </div>
    <!-- END / HEADER LOGO & MENU -->

</header>
<!-- END / HEADER -->

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
    <script src="<?= base_url() ?>/assets/lib/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>/assets/lib/jquery-ui/jquery-ui.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?= $this->endSection() ?>
