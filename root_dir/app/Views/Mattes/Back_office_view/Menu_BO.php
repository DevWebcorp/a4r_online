<section class="inicio mb-5">
    <header class="fixed-top mb-5">
        <nav class="navbar bg-menu navbar-expand-lg head-section" id="menu-navegacion">
            <div class="container-fluid">
                <!-- Botón del menú responsive -->
                <button type="button" class="navbar-toggler d-lg-none order-1" data-toggle="collapse"
                    data-target="#menu-principal" aria-controls="menu-principal" arial-expanded=" false"
                    arial-label="Desplegar menu de navegacion">
                    <span class="boton-menu"></span>
                </button>

                <a href="" class="navbar-brand d-lg-none mx-auto">
                    <img src="<?= base_url() ?>/assets/img/Logo-PlataformA4R.png" alt="Logo mattes" class="img-fluid logo">
                </a>

                <!--Barra de navegación -->
                <div class="collapse navbar-collapse bg-menu text-center" id="menu-principal">
                    <ul class="navbar-nav mr-lg-auto">
                        <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() ?>/back-office">
                            <img src="<?= base_url() ?>/assets/img/Iconos/Home_outline.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Inicio">
                            Home
                        </a></li>
                        <!-- <li class="nav-item">
                            <a class="d-lg-none nav-link py-3" href="<?= base_url() ?>/Mattes/Back_office/Mapa_filtros">
                                <i class="fa fa-map-marker fa-lg ml-3 mr-2" aria-hidden="true"></i>
                                Ubicación propiedades
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="d-lg-none nav-link py-3" href="<?= base_url() ?>/a4r/back_office/Busqueda">
                                <i class="fa fa-map-marker fa-lg ml-3 mr-2" aria-hidden="true"></i>
                                Ubicación propiedades
                            </a>
                        </li>
                        <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() ?>/propiedades">
                            <img src="<?= base_url() ?>/assets/img/Iconos/Mis_Propiedades.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Propiedades">
                            Propiedades
                        </a></li>
                        <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() ?>/propietarios">
                            <img src="<?= base_url() ?>/assets/img/Iconos/Usuario.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Propietarios">
                            Propietarios
                        </a></li>
                        <li class="nav-item"><a class="d-lg-none nav-link py-3" href="<?= base_url() ?>/alumnos">
                            <i class="fa fa-users fa-lg ml-3 mr-2" aria-hidden="true"></i>
                            Alumnos
                        </a></li>
                        <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() ?>/mensajes-bo">
                            <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Avisos.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Mensajes">
                            Mensajes
                        </a></li>
                        <li class="nav-item"><a class="d-lg-none nav-link py-3" href="<?= base_url() ?>/reportes">
                        <!-- <img src="<?= base_url() ?>/../../assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Avisos.png" class="img-fluid wd-40 rounded-circle ml-2" alt="icono inicio"> -->
                        <i class="fa fa-file-excel-o ml-3 mr-2" aria-hidden="true" style="font-size: 1.7em;"></i>
                           Reportes
                        </a></li>
                        <li class="nav-item"><a class="d-lg-none nav-link py-3" href="<?= base_url() ?>/reporte_whats">
                        <!-- <img src="<?= base_url() ?>/../../assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Avisos.png" class="img-fluid wd-40 rounded-circle ml-2" alt="icono inicio"> -->
                        <i class="fa fa-whatsapp ml-3 mr-2" aria-hidden="true" style="font-size: 1.7em;"></i>
                           Reporte WhatsApp
                        </a></li>
                        
                        <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() . "/login/sign_out" ?>">
                            <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Cerrar sesion.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Salir">
                            Cerrar sesión
                        </a></li>
                    </ul>
                    <!--LOGOTIPO DEL SITIO-->
                    <a href="<?= base_url() ?>/Inicio" class="navbar-brand d-none d-lg-block">
                        <img src="<?= base_url() ?>/assets/img/Logo-PlataformA4R.png" alt="Logo mattes"
                            class="img-fluid logo">
                    </a>
                    <ul class="navbar-nav ml-lg-auto"> 
                           
                        <li class="nav-item inicio-sesion px-3 py-1 my-lg-auto d-none d-lg-inline">
                            <div class="dropdown show">
                                <a class=" " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars fa-2x" style="color: #e2b811;" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="<?= base_url() ?>/back-office">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Home_outline.png"
                                            class="img-fluid wd-40 rounded-circle ml-2" alt="icono inicio">
                                        Home
                                    </a>
                                    <a class="dropdown-item py-3" href="<?= base_url() ?>/a4r/back_office/Busqueda">
                                        <i class="fa fa-map-marker fa-lg ml-3 mr-2" aria-hidden="true"></i>
                                        Ubicación propiedades
                                    </a>
                                    <a id="fisica" class="dropdown-item py-lg-2"
                                        href="<?= base_url() ?>/propiedades">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Mis_Propiedades.png"
                                            class="img-fluid wd-40 rounded-circle ml-2" alt="Propiedades">
                                        Propiedades
                                    </a>
                                    <a id="fisica" class="dropdown-item py-lg-2"
                                        href="<?= base_url() ?>/propietarios">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Usuario.png"
                                            class="img-fluid wd-40 rounded-circle ml-2" alt="Propietarios">
                                        Propietarios
                                    </a>
                                    <a class="dropdown-item py-3" href="<?= base_url() ?>/alumnos">
                                        <i class="fa fa-users fa-lg ml-3 mr-2" aria-hidden="true"></i>
                                        Alumnos
                                    </a>
                                    <a class="dropdown-item py-lg-2" href="<?= base_url() ?>/mensajes-bo">
                                        <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Avisos.png"
                                            class="img-fluid wd-40 rounded-circle ml-2" alt="Mensajes">
                                        Mensajes
                                    </a>   
                                    <a class="dropdown-item py-lg-3" href="<?= base_url() ?>/reportes">
                                        <!-- <img src="<?= base_url() ?>/../../assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Avisos.png"
                                            class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa"> -->
                                            <i class="fa fa-file-excel-o ml-3 mr-2" aria-hidden="true" style="font-size: 1.7em;"></i>
                                            Reportes
                                    </a>
                                    <a class="dropdown-item py-lg-3" href="<?= base_url() ?>/reporte_whats">
                                        <!-- <img src="<?= base_url() ?>/../../assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Avisos.png"
                                            class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa"> -->
                                            <i class="fa fa-whatsapp ml-3 mr-2" aria-hidden="true" style="font-size: 1.7em;"></i>
                                            Reporte contacto
                                    </a> 
                                    <a class="dropdown-item" href="<?= base_url() . "/login/sign_out" ?>">
                                        <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Cerrar sesion.png"
                                            class="img-fluid wd-50 rounded-circle ml-2" alt="Salir">    
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