<style>
    a:hover {
        text-decoration: none;
    }
</style>
<!-- HEADER -->
<header id="header">
    
    <!-- HEADER LOGO & MENU -->
    <div class="header_content" id="header_content">

        <div class="container">
            <!-- HEADER LOGO -->
            <div class="header_logo col-12 text-lg-center">
                <a href="<?= base_url() ?>/back-office">
                    <img src="<?= base_url('../assets/img/Logo-PlataformA4R.png') ?>" alt="">
                </a>
            </div>
            <!-- END / HEADER LOGO -->
            
            <!-- HEADER MENU -->
            <nav class="header_menu">
                <ul class="menu">
                    <li class="current-menu-item">
                        <a href="<?= base_url() ?>/back-office">Home </a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>/a4r/back_office/Busqueda">Ubicacion de propiedades</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>/propiedades">Propiedades</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>/propietarios">Propietarios</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>/alumnos">Alumnos</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>/mensajes-bo">Mensajes</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>/reportes">Reportes</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>/reporte_whats">Reporte contacto</a>
                    </li>
                    <li>
                        <a href="<?= base_url() . "/login/sign_out" ?>">Cerrar sesión</a>
                    </li>              
                </ul>
            </nav>

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