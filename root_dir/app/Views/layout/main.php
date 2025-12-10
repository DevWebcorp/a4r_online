<!DOCTYPE html>
<html lang="es" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<?= $this->include('layout/head') ?>
<style>
    #preloader .preloader-dot {
        /* width: 0;
        height: 0;
        border: 2px solid #e1bd85;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        opacity: 1;
        animation: preloader 3s ease infinite;
        -ms-animation: preloader 3s ease infinite;
        -moz-animation: preloader 3s ease infinite;
        -webkit-animation: preloader 3s ease infinite;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%; */
       background-image: url("<?= base_url() ?>/assets/img/Logo-PlataformA4R.png");
    }
</style>
<body class="royal_preloader">
   <!--  <div id="preloader">
        <span class="preloader-dot"></span>
    </div> -->
    <div class="preloader"></div>

    <div id="page-wrap">
        <?= $this->include('Layout/header') ?>
        <!-- Contenido dinámico -->
        <?= $this->renderSection('content') ?>
        <?= $this->include('Layout/footer') ?>
    </div>
    <!-- SCRIPTS GENERALES -->
    <?= $this->include('Layout/scripts') ?>
    <!-- SCRIPTS DINÁMICOS POR PÁGINA -->
    <?= $this->renderSection('scripts') ?>


</body>
</html>