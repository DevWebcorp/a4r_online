<section class="menu-arrendatario mb-5">
    <header class="fixed-top mb-5">
        <nav class="navbar navbar-light bg-white navbar-expand-lg head-section" id="menu-navegacion">
            <div class="container-fluid">
                <!-- Botón del menú responsive -->
                <button type="button" class="navbar-toggler d-lg-none order-1" data-toggle="collapse" data-target="#menu-principal" aria-controls="menu-principal" arial-expanded=" false" arial-label="Desplegar menu de navegacion">
                    <span class="boton-menu"></span>
                </button>

                <a href="<?= base_url() ?>/Inicio" class="navbar-brand d-lg-none mx-auto">
                    <img src="<?= base_url() ?>/assets/img/Logo-PlataformA4R.png" alt="Logo mobil" class="img-fluid logo">
                </a>

                <!--Barra de navegación -->
                <div class="collapse navbar-collapse bg-menu text-center" id="menu-principal">
                    <ul class="navbar-nav mr-lg-auto">
                        <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() ?>/home-alumno">
                                <img src="<?= base_url() ?>/assets/img/Iconos/Home_outline.png" class="img-fluid wd-40 rounded-circle ml-2" alt="icono inicio">
                                Home
                            </a></li>
                        <li class="nav-item"><a id="fisica" class="d-lg-none nav-link" href="<?= base_url() ?>/datos-alumno">
                                <img src="<?= base_url() ?>/assets/img/Iconos/Usuario.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono persona">
                                Mi cuenta
                            </a></li>
                        <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() ?>/mensajes">
                                <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Avisos.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                                Notificaciones
                            </a></li>
                        <li class="nav-item"><a class="d-lg-none nav-link py-3" href="<?= base_url() ?>/favoritos">
                                <i class="fa fa-heart-o fa-lg ml-3 mr-2" aria-hidden="true"></i>
                                Favoritos
                            </a></li>
                        <li class="nav-item"><a class="d-lg-none nav-link py-3" href="<?= base_url() ?>/rentadas">
                                <i class="fa fa-handshake-o fa-lg ml-3 mr-2" aria-hidden="true"></i>
                                Rentadas
                            </a></li>

                        <a style="cursor: pointer;" onclick="history.back()" class="d-none d-lg-block">
                            <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Atras.png" alt="Atras" class="img-fluid wd-50 rounded-circle ml-2">
                        </a>

                        <li class="nav-item"><a href="<?= base_url() ?>/about" class="mr-3 nav-link py-3">About</a></li>
                        <li class="nav-item order-lg- px-3"><a href="<?= base_url() ?>/Inicio" class="mr-3 nav-link py-3">Inicio</a></li>
                        <li class="nav-item"><a href="<?= base_url() ?>/Mattes/contacto" class="nav-link py-3">Contacto</a></li>
                        <!-- <li class="nav-item"><a class="d-lg-none nav-link" href="">
                                <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Ayuda.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono mensajes">
                                Ayuda
                            </a></li> -->
                        <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() . "/login/sign_out" ?>">
                                <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Cerrar sesion.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono mensajes">
                                Cerrar sesión
                            </a></li>
                    </ul>

                    <!--LOGOTIPO DEL SITIO-->
                    <a href="<?= base_url() ?>/Inicio" class="navbar-brand d-none d-lg-block">
                        <img src="<?= base_url() ?>/assets/img/Logo-PlataformA4R.png" alt="Logo desktop" class="img-fluid logo">
                    </a>

                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item inicio-sesion px-3 pt-2 d-none d-lg-inline">
                            <a href="<?= base_url() ?>/favoritos" class="nav-link" style="border-bottom: 2px solid transparent;">
                                <i class="fa fa-heart" aria-hidden="true" style="font-size: 2.3em;"></i>
                            </a>
                        </li>
                        <li class="nav-item soy-propietario pt-1 d-none d-lg-inline">
                            <a class="nav-link noti" style="border-bottom: 2px solid transparent;">
                                <div class="pos-relative" style="cursor: pointer;">
                                    <img src="<?= base_url() ?>/assets/img/Iconos/Campanita.png" class="img-fluid wd-50 rounded-circle ml-2 campana" alt="notificaciones">
                                    <p class="notificacion-general"></p>
                                </div>
                            </a>
                        </li>

                        <?php
                        if ($verificado != null) {
                            if ($verificado['verify'] == 0) {
                                echo ('<li class="nav-item inicio-sesion px-3 pb-2 d-none d-lg-inline">
                                <a href="' . base_url() . '/datos-alumno" class="nav-link" style="border-bottom: 2px solid transparent;">
                                    <img src="' . base_url() . '/assets/img/profile.png" class="img-fluid wd-50 rounded-circle ml-2" alt="perfil" title="Perfil no verificado">
                                </a>
                                </li>');
                            } else {
                                echo ('<li class="nav-item inicio-sesion px-3 pb-2 d-none d-lg-inline">
                                <a href="' . base_url() . '/datos-alumno" class="nav-link" style="border-bottom: 2px solid transparent;">
                                    <img src="' . base_url() . '/assets/img/verified-user.png" class="img-fluid wd-50 rounded-circle ml-2" alt="perfil" title="Perfil verificado">
                                </a>
                                </li>');
                            }
                        } else {
                            echo ('<li class="nav-item inicio-sesion px-3 pb-2 d-none d-lg-inline">
                                <a href="' . base_url() . '/datos-alumno" class="nav-link" style="border-bottom: 2px solid transparent;">
                                    <img src="' . base_url() . '/assets/img/profile.png" class="img-fluid wd-50 rounded-circle ml-2" alt="perfil" title="Perfil no verificado">
                                </a>
                                </li>');
                        }
                        ?>


                        <!--     <li class="nav-item inicio-sesion px-3 pb-2 d-none d-lg-inline">
                            <a href="<?= base_url() ?>/Mattes/Arrendatario/Datos_alumno" class="nav-link">
                                <img src="<?= base_url() ?>/../../assets/img/Iconos/Usuario.png" class="img-fluid wd-50 rounded-circle ml-2" alt="perfil">
                            </a>
                        </li> -->

                        <li class="nav-item inicio-sesion px-3 py-1 my-lg-auto d-none d-lg-inline">
                            <div class="dropdown show d-none d-lg-block">
                                <a class=" " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars fa-2x text-dark" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="<?= base_url() ?>/home-alumno">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Home_outline.png" class="img-fluid wd-40 rounded-circle ml-2" alt="icono inicio">
                                        Home
                                    </a>
                                    <a id="fisica" class="dropdown-item" href="<?= base_url() ?>/datos-alumno">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Usuario.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono persona">
                                        Mi cuenta
                                    </a>
                                    <!-- <a id="moral" class="dropdown-item"
                                        href="<?= base_url() ?>/Mattes/Arrendatario/Mensajes">
                                        <img src="<?= base_url() ?>/../../assets/img/Iconos_Mattes/Iconos/IconoMattes_Citas.png"
                                            class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                                        Mi citas
                                    </a>
                                    <a id="agente" class="dropdown-item"
                                        href="<?= base_url() ?>/Mattes/Arrendatario/Mensajes">
                                        <img src="<?= base_url() ?>/../../assets/img/Iconos/Mensaje.png"
                                            class="img-fluid wd-40 rounded-circle ml-2" alt="Icono mensajes"> 
                                        Mensajes
                                    </a> -->
                                    <a class="dropdown-item" href="<?= base_url() ?>/mensajes">
                                        <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Avisos.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                                        Notificaciones
                                    </a>
                                    <a class="dropdown-item py-3" href="<?= base_url() ?>/favoritos">
                                        <i class="fa fa-heart-o fa-lg ml-3 mr-2" aria-hidden="true"></i>
                                        Favoritos
                                    </a>

                                    <a class="dropdown-item py-3" href="<?= base_url() ?>/rentadas">
                                        <i class="fa fa-handshake-o fa-lg ml-3 mr-2" aria-hidden="true"></i> Rentadas
                                    </a>

                                    <!-- <a class="dropdown-item" href="">
                                        <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Ayuda.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono mensajes">
                                        Ayuda
                                    </a> -->
                                    <a class="dropdown-item" href="<?= base_url() . "/login/sign_out" ?>">
                                        <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Cerrar sesion.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono mensajes">
                                        Cerrar sesión
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul><!-- /.navbar-nav-->
                </div><!-- /.collapse-->
            </div><!-- /.container-->
        </nav><!-- /.navbar-->
    </header><!-- /.fixed-top-->
</section><!-- /#inicio-->

<script>
    //let persona = <?php  /* echo json_encode($menu); */  ?>;

    /* switch (persona) {
        case "1":
            document.getElementById("moral").style.display = "none";
            document.getElementById("agente").style.display = "none";
            document.getElementById("add_agente").style.display = "none";
            break;

        case "2":
            document.getElementById("fisica").style.display = "none";
            document.getElementById("agente").style.display = "none";
            break;

        default:
            document.getElementById("fisica").style.display = "none";
            document.getElementById("moral").style.display = "none";
            document.getElementById("add_agente").style.display = "none";

            break;
    } */
</script>