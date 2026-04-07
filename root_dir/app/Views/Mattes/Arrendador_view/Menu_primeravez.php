<section class="inicio mb-5 ">
    <header class="fixed-top mb-5">
        <nav class="navbar navbar-light bg-white navbar-expand-lg head-section" id="menu-navegacion">
            <div class="container-fluid">
                <!-- Botón del menú responsive -->
                <button type="button" class="navbar-toggler d-lg-none order-1" data-toggle="collapse" data-target="#menu-principal" aria-controls="menu-principal" arial-expanded=" false" arial-label="Desplegar menu de navegacion">
                    <span class="boton-menu"></span>
                </button>

                <a href="<?= base_url() ?>/Inicio" class="navbar-brand d-lg-none mx-auto">
                    <img src="<?= base_url() ?>/assets/img/Logo-PlataformA4R.png" alt="Logo" class="img-fluid logo">
                </a>

                <!--Barra de navegación -->
                <div class="collapse navbar-collapse bg-menu" id="menu-principal">
                    <ul class="navbar-nav mr-lg-auto">
                        <a style="cursor: pointer;" onclick="history.back()" class="d-none d-lg-block">
                            <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Atras.png" alt="Atras" class="img-fluid wd-50 rounded-circle ml-2">
                        </a>
                        <li class="nav-item"><a href="#" class="mr-lg-3 nav-link py-3">About</a></li>
                        <li class="nav-item"><a href="<?= base_url() ?>/Inicio" class="mr-lg-3 nav-link py-3">Inicio</a></li>
                        <li class="nav-item"><a href="#" class="nav-link py-3">Contacto</a></li> 
                       <!--  <li class="nav-item"><a class="d-lg-none nav-link" href="">
                            <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Ayuda.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono mensajes">
                            Ayuda
                        </a></li> -->
                        <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() . "/login/sign_out" ?>">
                            <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Cerrar sesion.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono mensajes">
                            Cerrar sesión
                        </a>
                    </ul>
                    <!--LOGOTIPO DEL SITIO-->
                    <a href="<?= base_url() ?>/Inicio" class="navbar-brand d-none d-lg-block mr-lg-16">
                        <img src="<?= base_url() ?>/assets/img/Logo-PlataformA4R.png" alt="Logo mattes" class="img-fluid logo">
                    </a>
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item inicio-sesion px-3 py-0 my-lg-auto d-none d-lg-inline">
                            <div class="dropdown show">
                                <a class=" " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars fa-2x text-dark" aria-hidden="true"></i>
                                </a>

                                <div class="dropdown-menu" style="min-width: 14rem;" aria-labelledby="dropdownMenuLink">
                                   <!--  <a class="dropdown-item" href="">
                                        <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Ayuda.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                                        Ayuda
                                    </a> -->
                                    <a class="dropdown-item" href="<?= base_url() . "/login/sign_out" ?>">
                                        <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Cerrar sesion.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                                        Cerrar sesión
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div><!-- /.collapse-->
            </div>
        </nav><!-- /.navbar-->
    </header>
</section>


