
<section class="inicio mb-5 ">
    <header class="fixed-top mb-5">
        <nav class="navbar navbar-light bg-white navbar-expand-lg head-section" id="menu-navegacion">
            <div class="container-fluid">
                <!-- Botón del menú responsive -->
                <button type="button" class="navbar-toggler d-lg-none order-1" data-toggle="collapse" data-target="#menu-principal" aria-controls="menu-principal" arial-expanded=" false" arial-label="Desplegar menu de navegacion">
                    <span class="boton-menu"></span>
                </button>

                <a href="<?= base_url() ?>/Inicio" class="navbar-brand d-lg-none mx-auto">
                    <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/LogoRMattes.png" alt="Logo mattes" class="img-fluid logo">
                </a>

                <!--Barra de navegación -->
                <div class="collapse navbar-collapse bg-menu" id="menu-principal">
                    <ul class="navbar-nav mr-lg-auto">
                        <a style="cursor: pointer;"  onclick="history.back()" class="d-none d-lg-block">
                            <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Atras.png" alt="Atras" class="img-fluid wd-50 rounded-circle ml-2">
                        </a>
                        <!-- <a href="<?= base_url() ?>/Mattes/Arrendador/Index" class="d-none d-lg-block">
                            <img src="<?= base_url() ?>/../../assets/img/Iconos/home_1.png" class="img-fluid wd-40 rounded-circle ml-2" alt="casa">
                        </a>  -->

                       <!--  <li class="nav-item"><a class="d-lg-none nav-link"href="<?= base_url() ?>/Mattes/Arrendador/Index">
                            <img src="<?= base_url() ?>/../../assets/img/Iconos/Home_outline.png" class="img-fluid wd-40 rounded-circle ml-2" alt="icono inicio">
                            Home
                        </a></li> -->
                         <li class="nav-item"><a id="fisica-mobil" class="fisica d-lg-none nav-link" href="<?= base_url() ?>/datos-propietario">
                            <img src="<?= base_url() ?>/assets/img/Iconos/Usuario.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono persona">
                            Mi cuenta
                        </a></li>                        
                        <li class="nav-item"><a id="moral-mobil" class="moral d-lg-none nav-link" href="<?= base_url() ?>/datos-inmobiliaria">
                            <img src="<?= base_url() ?>/assets/img/Iconos/Empresa.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono persona">
                            Mi cuenta
                        </a></li>                        
                        <li class="nav-item"><a id="agente-mobil" class="agente d-lg-none nav-link" href="<?= base_url() ?>/Mattes/Agente/Datos_agente/actualiza">
                            <img src="<?= base_url() ?>/assets/img/Iconos/Usuario.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono persona">
                            Mi cuenta
                        </a></li>                        
                        <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() ?>/Mattes/avisos-propietario">
                            <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Avisos.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                            Avisos
                        </a></li>
                        <!-- <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() ?>/Mattes/Arrendador/Propiedades">
                            <img src="<?= base_url() ?>/../../assets/img/Iconos/Mensaje.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                            Mensajes
                        </a></li> -->
                        <li class="nav-item"><a id="mensajes-agente-mobil" class="d-lg-none nav-link" href="<?= base_url() ?>/actividad-agentes">
                            <!-- <i class="fa fa-comment-o fa-lg ml-3 mr-2" aria-hidden="true"></i>  -->
                            <img src="<?= base_url() ?>/assets/img/Iconos/Mensaje.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono mensajes">
                            Actividad de agentes
                        </a></li>
                        <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() ?>/home-propietario">
                            <img src="<?= base_url() ?>/assets/img/Iconos/Mis_Propiedades.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                            Mis propiedades
                        </a></li>
                        <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() ?>/subir-propiedad">
                            <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Alta propiedad.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                            Alta propiedad
                        </a></li>
                        <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() ?>/beneficios">
                            <img src="<?= base_url() ?>/assets/img/Iconos/Compartir_a_usuarios.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                            Invita a otro propietario
                        </a></li>
                        <li class="nav-item"><a id="add_agente-mobil" class="d-lg-none nav-link" href="<?= base_url() ?>/Agentes">
                            <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Subir agentes.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                            Subir agentes
                        </a></li>
                        <li class="nav-item"><a href="<?= base_url() ?>/about" class="mr-lg-3 nav-link py-3">About</a></li>
                        <li class="nav-item"><a href="<?= base_url() ?>/Inicio" class="mr-lg-3 nav-link py-3">Inicio</a></li>
                        <li class="nav-item"><a href="<?= base_url() ?>/contacto" class="nav-link py-3">Contacto</a></li> 
                        <!-- <li class="nav-item"><a class="d-lg-none nav-link" href="">
                            <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Ayuda.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono mensajes">
                            Ayuda
                        </a></li> -->
                        <li class="nav-item"><a class="d-lg-none nav-link" href="<?= base_url() . "/login/sign_out" ?>">
                            <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Cerrar sesion.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono mensajes">
                            Cerrar sesión
                        </a>
                    </ul>
                    <!--LOGOTIPO DEL SITIO-->
                    <a href="<?= base_url() ?>/Inicio" class="navbar-brand d-none d-lg-block">
                        <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/LogoRMattes.png" alt="Logo mattes" class="img-fluid logo">
                    </a>
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item soy-propietario d-none d-lg-inline" style="padding-top: .7rem !important;">
                            <a class="noti">
                                <div class="pos-relative" style="cursor: pointer;">
                                    <img src="<?= base_url() ?>/assets/img/Iconos/Campanita.png" class="img-fluid wd-50 rounded-circle ml-2 campana" alt="notificaciones">
                                    <p class="notificacion-general"></p>
                                </div>
                            </a>
                        </li>

                        <?php
                            if($verificado != null){
                                if($verificado['verify'] == 0){
                                    echo('<li id="inmobiliaria" class="nav-item inicio-sesion px-3 pb-2 d-none d-lg-inline">
                                    <a href="'.base_url().'/datos-inmobiliaria"
                                     class="nav-link">
                                        <img src="'.base_url().'/assets/img/profile.png" class="img-fluid wd-50 rounded-circle ml-2" alt="perfil" title="Perfil no verificado">
                                    </a>
                                    </li>');
    
                                    echo('<li id="agente-perfil"  class="nav-item inicio-sesion px-3 pb-2 d-none d-lg-inline">
                                        <a href="'.base_url().'/Mattes/Agente/Datos_agente/actualiza"
                                        class="nav-link">
                                            <img src="'.base_url().'/assets/img/profile.png" class="img-fluid wd-50 rounded-circle ml-2" alt="perfil" title="Perfil no verificado">
                                        </a>
                                    </li>');

                                    echo('<li id="arrendador" class="nav-item inicio-sesion px-3 pb-2 d-none d-lg-inline">
                                        <a  href="'.base_url().'/datos-propietario"
                                        class="nav-link">
                                            <img src="'.base_url().'/assets/img/profile.png" class="img-fluid wd-50 rounded-circle ml-2" alt="perfil" title="Perfil no verificado">
                                        </a>
                                    </li>');
    
                                }else{
                                    echo('<li id="inmobiliaria" class="nav-item inicio-sesion px-3 pb-2 d-none d-lg-inline">
                                        <a  href="'.base_url().'/datos-inmobiliaria" class="nav-link" style="border-bottom: 2px solid transparent;">
                                            <img src="'.base_url().'/assets/img/verified-user.png" class="img-fluid wd-50 rounded-circle ml-2" alt="perfil" title="Perfil verificado">
                                        </a>
                                    </li>');
    
                                    echo('<li id="arrendador" class="nav-item inicio-sesion px-3 pb-2 d-none d-lg-inline">
                                        <a  href="'.base_url().'/datos-propietario" class="nav-link" style="border-bottom: 2px solid transparent;">
                                            <img src="'.base_url().'/assets/img/verified-user.png" class="img-fluid wd-50 rounded-circle ml-2" alt="perfil" title="Perfil verificado">
                                        </a>
                                    </li>');

                                    echo('<li id="agente-perfil" class="nav-item inicio-sesion px-3 pb-2 d-none d-lg-inline">
                                        <a  href="'.base_url().'/Mattes/Agente/Datos_agente/actualiza" class="nav-link" style="border-bottom: 2px solid transparent;">
                                            <img src="'.base_url().'/assets/img/verified-user.png" class="img-fluid wd-50 rounded-circle ml-2" alt="perfil" title="Perfil verificado">
                                        </a>
                                    </li>');
                                }
                            } else{
                                echo('<li id="inmobiliaria" class="nav-item inicio-sesion px-3 pb-2 d-none d-lg-inline">
                                    <a  href="'.base_url().'/datos-inmobiliaria"
                                     class="nav-link">
                                        <img src="'.base_url().'/assets/img/profile.png" class="img-fluid wd-50 rounded-circle ml-2" alt="perfil" title="Perfil no verificado">
                                    </a>
                                </li>');
    
                                echo('<li id="arrendador" class="nav-item inicio-sesion px-3 pb-2 d-none d-lg-inline">
                                    <a href="'.base_url().'/datos-propietario"
                                    class="nav-link">
                                        <img src="'.base_url().'/assets/img/profile.png" class="img-fluid wd-50 rounded-circle ml-2" alt="perfil" title="Perfil no verificado">
                                    </a>
                                </li>');

                                echo('<li id="agente-perfil" class="nav-item inicio-sesion px-3 pb-2 d-none d-lg-inline">
                                    <a href="'.base_url().'/Mattes/Agente/Datos_agente/actualiza"
                                    class="nav-link">
                                        <img src="'.base_url().'/assets/img/profile.png" class="img-fluid wd-50 rounded-circle ml-2" alt="perfil" title="Perfil no verificado">
                                    </a>
                                </li>');
                            }
                            
                        ?>

                        <li class="nav-item inicio-sesion px-3 py-1 my-lg-auto d-none d-lg-inline">
                            <div class="dropdown show">
                                <a class=" " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars fa-2x text-dark" aria-hidden="true"></i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <!-- <a class="dropdown-item" href="<?= base_url() ?>/Mattes/Arrendador/Index">
                                        <img src="<?= base_url() ?>/../../assets/img/Iconos/Home_outline.png" class="img-fluid wd-40 rounded-circle ml-2" alt="icono inicio">
                                        Home
                                    </a> -->
                                    <a id="fisica" class="fisica dropdown-item" href="<?= base_url() ?>/datos-propietario">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Usuario.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono persona">
                                        Mi cuenta
                                    </a>
                                    <a id="moral" class="moral dropdown-item" href="<?= base_url() ?>/datos-inmobiliaria">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Empresa.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                                        Mi cuenta
                                    </a>
                                    <a id="agente" class="agente dropdown-item" href="<?= base_url() ?>/Mattes/Agente/Datos_agente/actualiza">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Usuario.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono persona">
                                        Mi cuenta
                                    </a>
                                    <a class="dropdown-item" href="<?= base_url() ?>/avisos-propietario">
                                        <img src="<?= base_url() ?>/assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Avisos.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono empresa">
                                        Avisos
                                    </a>
                                    <!-- <a class="dropdown-item" href="<?= base_url() ?>/Mattes/Arrendador/Propiedades">
                                        <img src="<?= base_url() ?>/../../assets/img/Iconos/Mensaje.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono mensajes">
                                        Mensajes
                                    </a> -->
                                    <a id="mensajes-agente" class="dropdown-item" href="<?= base_url() ?>/actividad-agentes">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Mensaje.png" class="img-fluid wd-40 rounded-circle ml-2" alt="Icono mensajes">
                                        Actividad de agentes
                                    </a>
                                    <a class="dropdown-item" href="<?= base_url() ?>/home-propietario">
                                        <img src="<?= base_url() ?>/assets/img/Iconos/Mis_Propiedades.png" class="img-fluid wd-40 rounded-circle ml-2" alt="<?= base_url() ?>/avisos-propietario">
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
                                    <a id="add_agente" class="dropdown-item" href="<?= base_url() ?>/Agentes">
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
                    </ul>
                </div><!-- /.collapse-->
            </div>
        </nav><!-- /.navbar-->
    </header>
</section>

<script>
    let persona = <?php echo json_encode($menu);  ?>;

    switch (persona) {
        //persona fisica
        case "1":
            document.getElementById("moral").style.display = "none";
            document.getElementById("agente-perfil").remove();
            document.getElementById("inmobiliaria").remove();
           /*  document.getElementById("agente-perfil").style.display = "none";
            document.getElementById("inmobiliaria").style.display = "none"; */
            document.getElementById("moral-mobil").style.display = "none";
            document.getElementById("agente-mobil").style.display = "none";
            document.getElementById("agente").style.display = "none";
            document.getElementById("add_agente").style.display = "none";
            document.getElementById("mensajes-agente").style.display = "none";
            document.getElementById("add_agente-mobil").style.display = "none";
            document.getElementById("mensajes-agente-mobil").style.display = "none";
            break;

            //persona moral arre

        case "2":
            document.getElementById("fisica").style.display = "none";
            //document.getElementById("agente-perfil").style.display = "none";
            //document.getElementById("arrendador").style.display = "none";
            document.getElementById("agente-perfil").remove();
            document.getElementById("arrendador").remove(); 
            document.getElementById("fisica-mobil").style.display = "none";
            document.getElementById("agente").style.display = "none";
            document.getElementById("agente-mobil").style.display = "none";
            break;

        default:
            document.getElementById("fisica").style.display = "none";
            document.getElementById("arrendador").remove();
            document.getElementById("fisica-mobil").style.display = "none";
            document.getElementById("inmobiliaria").remove();
            document.getElementById("moral").style.display = "none";
            document.getElementById("moral-mobil").style.display = "none";
            document.getElementById("add_agente").style.display = "none";
            document.getElementById("mensajes-agente").style.display = "none";
            document.getElementById("add_agente-mobil").style.display = "none";
            document.getElementById("mensajes-agente-mobil").style.display = "none";
            break;
    }
</script>

