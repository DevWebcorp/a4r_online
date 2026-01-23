<!DOCTYPE html>
<html lang="es" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<?= $this->include('layout/head') ?>
<body>
    <div id="preloader">
        <span class="preloader-dot"></span>
    </div>

    <div id="page-wrap">
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