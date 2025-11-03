<section class="inicio mb-5 text-center">
    <header class="fixed-top mb-5">
        <nav class="navbar navbar-light bg-white navbar-expand-lg head-section" id="menu-navegacion">
            <div class="container-fluid">
                <!-- Botón del menú responsive -->
                <button type="button" class="navbar-toggler d-lg-none order-1" data-toggle="collapse" data-target="#menu-principal" aria-controls="menu-principal" arial-expanded=" false" arial-label="Desplegar menu de navegacion">
                    <span class="boton-menu"></span>
                </button>

                <a href="" class="navbar-brand d-lg-none mx-auto">
                    <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Logo.png" alt="Logo mattes" class="img-fluid logo">
                </a>

                <!--Barra de navegación -->
                <div class="collapse navbar-collapse bg-menu" id="menu-principal">
                    <ul class="navbar-nav mr-lg-auto">
                        <a href="<?= base_url() ?>/Mattes/Arrendador/Datos_empresa">
                            <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Atras.png" alt="Logo mattes" class="img-fluid wd-50 rounded-circle ml-2">
                        </a>
                       <!--  <a href="<?= base_url() ?>/Mattes/Arrendador/Index">
                            <img src="<?= base_url() ?>/../../assets/img/Iconos/home_1.png" class="img-fluid wd-40 rounded-circle ml-2" alt="casa">
                        </a> -->
                        <li class="nav-item"><a href="<?= base_url() ?>/about" class="mr-3 nav-link py-3">About</a></li>
                        <li class="nav-item"><a href="<?= base_url() ?>/Inicio" class="mr-3 nav-link py-3">Inicio</a></li>
                        <li class="nav-item"><a href="<?= base_url() ?>/contacto" class="nav-link py-3">Contacto</a></li> 
                        <li class="nav-item"><a class="d-lg-none nav-link" href="">

                    </ul>
                    <!--LOGOTIPO DEL SITIO-->
                    <a href="<?= base_url() ?>/Mattes/Principal" class="navbar-brand d-none d-lg-block">
                        <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Logo.png" alt="Logo mattes" class="img-fluid logo">
                    </a>
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item soy-propietario d-none d-lg-inline" style="padding-top: .7rem !important;">
                            <a class="noti">
                                <div class="pos-relative">
                                    <img src="<?= base_url() ?>/assets/img/Iconos/Campanita.png" class="img-fluid wd-50 rounded-circle ml-2 campana" alt="notificaciones">
                                    <p class="notificacion-general"></p>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item inicio-sesion px-3 py-1">
                            <a href="<?= base_url() ?>/datos-agentes" class="nav-link">
                                <img src="<?= base_url() ?>/assets/img/profile.png" class="img-fluid wd-50 rounded-circle ml-2" alt="perfil" style="cursor: pointer;">
                            </a>
                        </li> 
                        
                        <li class="nav-item inicio-sesion px-3 py-1 my-lg-auto">
                            <div class="dropdown show">
                                <a class=" " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars fa-2x text-dark" aria-hidden="true"></i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <!-- <a class="dropdown-item" href="<?= base_url() ?>/Mattes/Arrendador/Index">
                                        <img src="<?= base_url() ?>/../../assets/img/Iconos/Home_outline.png" class="img-fluid wd-40 rounded-circle ml-2" alt="icono inicio">
                                        Home
                                    </a> -->
                                    <a id="fisica" class="dropdown-item" href="<?= base_url() ?>/Mattes/Arrendador/Datos_propietario">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Usuario.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono persona" style="cursor: pointer;">
                                        Mi cuenta
                                    </a>
                                    <a id="moral" class="dropdown-item" href="<?= base_url() ?>/Mattes/Arrendador/Datos_empresa">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Empresa.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                                        Mi cuenta
                                    </a>
                                    <a id="agente" class="dropdown-item" href="<?= base_url() ?>/datos-agentes">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Usuario.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono persona" style="cursor: pointer;">
                                        Mi cuenta
                                    </a>
                                    <a class="dropdown-item" href="<?= base_url() ?>/avisos-agente">
                                        <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Avisos.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                                        Avisos
                                    </a>
                                   <!--  <a class="dropdown-item" href="<?= base_url() ?>/Mattes/Arrendador/Propiedades">
                                        <img src="<?= base_url() ?>/../../assets/img/Iconos/Mensaje.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono mensajes">
                                        Mensajes
                                    </a> -->
                                    <a id="mensajes-agente" class="dropdown-item" href="<?= base_url() ?>/avisos-agente">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Mensaje.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono mensajes">
                                        Mensajes de agente
                                    </a>
                                    <a class="dropdown-item" href="<?= base_url() ?>/home-propietario">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Mis_Propiedades.png" class="img-fluid wd-40 rounded-circle ml-2" alt="<?= base_url() ?>/Mattes/Arrendador/Propiedades">
                                        Mis propiedades
                                    </a>
                                    <a class="dropdown-item" href="<?= base_url() ?>/subir-propiedad">
                                        <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Alta propiedad.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                                        Alta propiedad
                                    </a>
                                    <a class="dropdown-item pr-6" href="<?= base_url() ?>/beneficios">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Compartir_a_usuarios.png" class="img-fluid wd-40 rounded-circle ml-2" alt="">
                                        Invita a otro propietario
                                    </a>
                                    <a id="add_agente" class="dropdown-item" href="<?= base_url() ?>/Mattes/Arrendador/Datos_empresa">
                                        <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Subir agentes.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                                        Subir agentes
                                    </a>
                                    <!-- <a class="dropdown-item" href="">
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
                    </ul><!-- /.navbar-nav-->
                </div><!-- /.collapse-->
            </div><!-- /.container-->
        </nav><!-- /.navbar-->
    </header><!-- /.fixed-top-->
</section><!-- /#inicio-->

<script>
    let persona = <?php echo json_encode($menu);  ?>;

    switch (persona) {
        case "1":
            document.getElementById("moral").style.display = "none";
            document.getElementById("agente").style.display = "none";
            document.getElementById("add_agente").style.display = "none";
            document.getElementById("mensajes-agente").style.display = "none";
            break;

        case "2":
            document.getElementById("fisica").style.display = "none";
            document.getElementById("agente").style.display = "none";
            break;

        default:
            document.getElementById("fisica").style.display = "none";
            document.getElementById("moral").style.display = "none";
            document.getElementById("add_agente").style.display = "none";
            document.getElementById("mensajes-agente").style.display = "none";

            break;
    }
</script>