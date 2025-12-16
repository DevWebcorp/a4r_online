<?php
/**
 * FOOTER COMPONENT
 * Ubicación: app/Views/Layouts/Footer.php
 */
?>
<footer id="footer">

    <!-- FOOTER TOP -->
    <div class="footer_top">
        <div class="container">
            <div class="row">

                
                
                <!-- WIDGET SOCIAL -->
                <div class="col-lg-3">
                    <div class="social">
                        <div class="social-content">
                            <a href="#"><i class="fa fa-facebook" style="margin-top: 5px;"></i></a>
                            <a href="#"><i class="fa fa-instagram" style="margin-top: 5px;"></i></a>
                        </div>
                    </div>
                </div>
                <!-- END / WIDGET SOCIAL -->

            </div>
        </div>
    </div>
    <!-- END / FOOTER TOP -->

    <!-- FOOTER CENTER -->
    <div class="footer_center">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-lg-5">
                    <div class="widget widget_logo">
                        <div class="widget-logo">
                            <div class="img">
                                <a href="#"><img src="<?= base_url('../assets/img/Logo-PlataformA4R.png') ?>" alt=""></a>
                            </div>
                            <div class="text">
                                <p><i class="lotus-icon-location"></i> CDMX</p>
                                <p><i class="lotus-icon-phone"></i> 1-548-854-8898</p>
                                <p><i class="fa fa-envelope-o"></i> <a href="https://landing.engotheme.com/cdn-cgi/l/email-protection#b7dfd2dbdbd8f7c3dfd2dbd8c3c2c4dfd8c3d2db99d4d8da"><span class="__cf_email__" data-cfemail="9df5f8f1f1f2dde9f5f8f1f2e9e8eef5f2e9f8f1b3fef2f0">info@gmail.com</span></a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Pagina del sitio</h4>
                        <ul>
                            <li><a href="<?=base_url()?>/a4r/Mapa">Inicio</a></li>
                            <li><a href="#">Nosotros</a></li>
                            <li><a href="<?=base_url()?>/a4r/Habitaciones_casa">Casas</a></li>
                            <li><a href="<?=base_url()?>/a4r/Habitaciones_depto">Edificio</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">ABOUT</h4>
                        <ul>
                            <li><a href="<?=base_url()?>/a4r/Terminos_condiciones">Términos y condiciones</a></li>
                            <li><a href="#">Aviso de privacidad</a></li>
                        </ul>
                    </div>
                </div>

                


            </div>
        </div>
    </div>
    <!-- END / FOOTER CENTER -->

    <!-- FOOTER BOTTOM -->
    <div class="footer_bottom">
        <div class="container">
            <p>&copy;2025 Webcorp. Todos los derechos reservados.</p>
        </div>
    </div>
    <!-- END / FOOTER BOTTOM -->

</footer>