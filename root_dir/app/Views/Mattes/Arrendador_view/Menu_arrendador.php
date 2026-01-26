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