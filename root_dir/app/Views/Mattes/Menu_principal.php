<section class="inicio mb-5">
    <header class="fixed-top mb-5">
        <nav class="navbar navbar-light bg-white navbar-expand-lg " id="menu-navegacion">
            <div class="container-fluid">
                <!-- Botón del menú responsive -->
                <button type="button" class="navbar-toggler d-lg-none order-1" data-toggle="collapse" data-target="#menu-principal" aria-controls="menu-principal" arial-expanded=" false" arial-label="Desplegar menu de navegacion">
                    <span class="boton-menu"></span>
                </button>

                <a href="<?= base_url() ?>/" class="navbar-brand d-lg-none mx-auto">
                    <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/LogoRMattes.png" alt="Logo mattes" class="img-fluid logo">
                </a>
                <!--Barra de navegación -->
                <div class="collapse navbar-collapse bg-menu" id="menu-principal">
                    <ul class="navbar-nav ml-lg-auto d-lg-none">
                       <li class="nav-item soy-propietario mr-lg-4 px-3 order-1">
                            <a href="<?= base_url() ?>/registro-propietario" class="nav-link b-lg-none">Soy propietario</a>
                        </li> 
                        <li class="nav-item inicio-sesion px-3">
                            <a href="<?= base_url() ?>/inicia-session" class="nav-link b-lg-none">Iniciar sesión</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-lg-auto">
                       <a style="cursor: pointer;" onclick="history.back()" class="d-none d-lg-block">
                            <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Atras.png" alt="Logo mattes" class="img-fluid wd-50 rounded-circle ml-2">
                        </a> 
                        <li class="nav-item order-lg-2 px-3"><a href="<?= base_url() ?>/about" class="nav-link">About</a></li>
                        <li class="nav-item order-lg- px-3"><a href="<?= base_url() ?>/Inicio" class="nav-link">Inicio</a></li>
                        <li class="nav-item order-lg-4 px-3"><a href="<?= base_url() ?>/contacto" class="nav-link">Contacto</a></li>
                    </ul>
                    <!--LOGOTIPO DEL SITIO-->
                    <a href="<?= base_url() ?>/Mattes/Principal" class="navbar-brand d-none d-lg-block">
                        <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/LogoRMattes.png" alt="Logo mattes" class="img-fluid logo">
                    </a>
                    <ul class="d-none d-lg-flex navbar-nav ml-lg-auto">
                        <li class="nav-item soy-propietario mr-lg-4 px-3 py-lg-1" id="prop">
                            <a href="<?= base_url() ?>/registro-propietario" class="nav-link b-lg-none">Soy propietario</a>
                        </li>
                        <li class="nav-item inicio-sesion px-3 py-lg-1" id="ses">
                            <a href="<?= base_url() ?>/inicia-session" class="nav-link b-lg-none">Iniciar sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</section>