<?php $session = session(); ?>

<!-- ########## START: HEAD PANEL ########## -->
<div class="sl-header" style="left: 0px !important; background-color: #2f3844;">
  <div class="sl-header-left" style=" background-color: #2f3844;">
    <div class="navicon-left hidden-md-down" style=" background-color: #2f3844;"><a id="btnLeftMenu" href=""><!-- <i class="icon ion-navicon-round"></i> --></a></div>
    <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
  </div><!-- sl-header-left -->

  <!--LOGOTIPO DEL SITIO-->
  <a href="<?=base_url()?>">
    <img src="<?= base_url() ?>/../../assets/img/Mattes.png" class="img-fluid " alt="Logo mattes" style="width: 100px;">
  </a>

  <div class="sl-header-right" style=" background-color: #2f3844;">
    <nav class="nav">
      <div class="dropdown">
        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
          <!-- <span class="logged-name"><?= $session->get('username') ?><span class="hidden-md-down"></span> -->
          <span class="logged-name">Arrendador<span class="hidden-md-down"></span>
          <img src="<?= base_url() ?>/../../assets/img/img2.jpg" class="wd-32 rounded-circle ml-2" alt=""> 
        </a>
        <div class="dropdown-menu dropdown-menu-header wd-200">
          <ul class="list-unstyled user-profile-nav">

            <?php

            $session = session();

            //echo '<script>alert("'.$session->get('utype').')</script>';

            switch ($session->get('utype')) {
              case (1):

                break;
              case (2):
                echo '<li><a href="#" id="breaks"><i class="icon ion-ios-person-outline"></i>Break</a></li>';

                break;
              case (3):
                echo '<li><a href="' . base_url() . '/Operativo/Hcv_Ficha_Identificacion_operativo/update"><i class="icon ion-ios-person-outline"></i>Editar perfil</a></li>';
                break;
            }

            ?>
              <li><a href=""><i class="icon ion-ios-gear-outline"></i> Home</a></li>
              <li><a href=""><i class="icon  ion-ios-person"></i>Mi perfil persona</a></li>
              <li><a href=""><i class="icon ion-ios-star-outline"></i> Mi perfil empresa</a></li>
              <li><a href=""><i class="fa fa-exclamation-triangle fa-lg mr-2" aria-hidden="true"></i>Avisos</a></li>
              <li><a href=""><i class="fa fa-commenting fa-lg mr-2" aria-hidden="true"></i>Mensajes</a></li>
              <li><a href=""><i class="icon ion-ios-folder-outline"></i>Mis propiedades</a></li>
              <li><a href=""><i class="ionicons ion-android-people h5 mr-2"></i>Invita a otro propietario</a></li>
              <li><a href=""><i class="ionicons ion-android-person-add h5 mr-2"></i>Subir agentes (solo inmobiliario)</a></li>
              <li><a href=""><i class="fa fa-question-circle fa-lg mr-2" aria-hidden="true"></i>Ayuda</a></li>
              <li><a href="<?= base_url() . "/login/sign_out" ?>"><i class="icon ion-power"></i>Cerrar sesión</a></li>
          </ul>
        </div><!-- dropdown-menu -->
      </div><!-- dropdown -->
    </nav>
    <div class="navicon-right mr-4" style=" background-color: #2f3844;">
      <a id="btnRightMenu" href="" class="pos-relative">
        <i class="icon ion-ios-bell-outline"></i>
        <!-- start: if statement -->
        <span class="square-8 bg-danger"></span>
        <!-- end: if statement -->
      </a>
    </div><!-- navicon-right -->
  </div><!-- sl-header-right -->
</div><!-- sl-header -->
<!-- ########## END: HEAD PANEL ########## -->