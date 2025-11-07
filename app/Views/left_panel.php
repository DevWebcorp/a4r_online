    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo">
      <a href="<?=base_url()?>">
        <div>
          <img class="logo-red" src="<?=base_url()?>/../../assets/img/LOGO_CARTA.png" width="100%" height="100%">
        </div>
      </a>
    </div>
    <div class="sl-sideleft">
      

     <!-- <label class="sidebar-label">Navigation</label>  -->
      <div class="sl-sideleft-menu mt-3">
        <table>
          <?php foreach ($menu as $item) : ?>
            <a href="" class="sl-menu-link show-sub">
              <div class="sl-menu-item" style="background-color: #4561a7 !important;
              color: white !important;">
                <?=$item['icon']?>
                <span class="menu-item-label"><?=$item['name']?></span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column" style="display: block; background-color: #4561a7 !important; color: white !important;">
              <?php foreach ($item['subModules'] as $sub) : ?>
                <li class="nav-item"><a href="<?=base_url()."/".$sub->controller?>" class="nav-link"><?=$sub->name?></a></li>
              <?php endforeach; ?>
            </ul>
          <?php endforeach; ?>
        </table>

      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->