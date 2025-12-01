<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
<?= $this->endSection() ?>


<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>

<style>
    .ot-out-best .content .item img {
        max-height: 60px;
        margin: 0 auto;
        margin-bottom: 0px;
    }
</style>
 <!-- SUB BANNER -->
        <section class="section-sub-banner bg-16">
            <div class="awe-overlay"></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>HABITACION WEBCORP</h2>
                        <p>Lorem Ipsum is simply dummy text</p>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->
        
        <!-- ROOM DETAIL -->
        <section class="section-room-detail bg-white">
            <div class="container">
                
                <!-- DETAIL -->
                <div class="room-detail">
                    <div class="row">
                        <div class="col-lg-9">
                            
                            <!-- LAGER IMGAE -->
                            <div class="room-detail_img">
                                <div class="room_img-item">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/lager/img-1.jpg') ?>">    
                                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                                </div>
                                <div class="room_img-item">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/lager/img-2.jpg') ?>">
                                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                                </div>
                                <div class="room_img-item">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/lager/img-3.jpg') ?>"> 
                                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                                </div>
                                <div class="room_img-item">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/lager/img-5.jpg') ?>"> 
                                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                                </div>
                                <div class="room_img-item">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/lager/img-6.jpg') ?>">
                                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                                </div>
                                <div class="room_img-item">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/lager/img-7.jpg') ?>">
                                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                                </div>
                                <div class="room_img-item">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/lager/img-5.jpg') ?>">
                                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                                </div>
                            </div>
                            <!-- END / LAGER IMGAE -->
                            
                            <!-- THUMBNAIL IMAGE -->
                            <div class="room-detail_thumbs">
                                <a href="#">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-2.jpg') ?>">
                                </a>
                                <a href="#">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-3.jpg') ?>">
                                </a>
                                <a href="#">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-4.jpg') ?>">
                                </a>
                                <a href="#">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-5.jpg') ?>">
                                </a>
                                <a href="#">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-6.jpg') ?>">
                                </a>
                                <a href="#">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-7.jpg') ?>">
                                </a>
                                <a href="#">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-8.jpg') ?>">
                                </a>
                                <a href="#">
                                    <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-6.jpg') ?>">
                                </a>
                            </div>
                            <!-- END / THUMBNAIL IMAGE -->

                        </div>

                        <div class="col-lg-3">

                            <!-- FORM BOOK -->
                            <div class="room-detail_book">

                                <div class="room-detail_total">
                                    <img src="images/icon-logo.png" alt="" class="icon-logo">
                                    
                                    <h6>APARTA DESDE</h6>
                                    
                                    <p class="price">
                                        <span class="amout">$260</span>  /dia
                                    </p>
                                </div>
                                
                                <div class="room-detail_form">
                                    <label>Llegada</label>
                                    <input type="text" class="awe-calendar from" placeholder="Fecha de llegada">
                                    <label>Partida</label>
                                    <input type="text" class="awe-calendar to" placeholder="Fecha de partida">
                                    <label>Adultos</label>
                                    <select class="awe-select">
                                        <option>1</option>
                                        <option>2</option>
                                        <option selected>3</option>
                                        <option>4</option>
                                    </select>
                                    <label>Niños</label>
                                    <select class="awe-select">
                                        <option>1</option>
                                        <option>2</option>
                                        <option selected>3</option>
                                        <option>4</option>
                                    </select>
                                    <button class="awe-btn awe-btn-13">RESERVAR AHORA</button>
                                </div>

                            </div>
                            <!-- END / FORM BOOK -->

                        </div>
                    </div>
                </div>
                <!-- END / DETAIL -->
                
                <!-- TAB -->
                <div class="room-detail_tab">
                    
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="room-detail_tab-header">
                                <li><a href="#overview" data-toggle="tab">DESCRIPCION GENERAL</a></li>
                                <li class="active"><a href="#amenities" data-toggle="tab">AMENIDADES</a></li>
                                <li><a href="#package" data-toggle="tab">PAQUETES</a></li>
                                <li><a href="#rates" data-toggle="tab">Tarifas</a></li>
                                <li><a href="#calendar" data-toggle="tab">Calendario</a></li>
                            </ul>
                        </div>
                                        
                        <div class="col-md-9">
                            <div class="room-detail_tab-content tab-content">
                                
                                <!-- OVERVIEW -->
                                <div class="tab-pane fade" id="overview">

                                    <div class="room-detail_overview">
                                        <h5 class='text-uppercase
                                        '>de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h5>
                                        <p>Ubicado en el corazón de Aspen con una combinación única de lujo contemporáneo y patrimonio histórico, alojamiento de lujo, excelentes comodidades, hospitalidad genuina y servicio dedicado para una experiencia elevada en las Montañas Rocosas.</p>

                                        <div class="row">
                                            <div class="col-xs-6 col-md-4">
                                                <h6>HABITACION ESPECIAL</h6>
                                                <ul>
                                                    <li>Max: 4 Personas</li>
                                                    <li>Tamaño: 35 m2 / 376 ft2</li>
                                                    <li>Vista: Oceáno</li>
                                                    <li>Cama: King-size o dos camas</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-md-4">
                                                <h6>CUARTO DE SERVICIO</h6>
                                                <ul>
                                                    <li>Oversized work desk</li>
                                                    <li>Hairdryer</li>
                                                    <li>Iron/ironing board upon request</li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- END / OVERVIEW -->

                                <!-- AMENITIES -->
                                <div class="tab-pane fade active in" id="amenities">
                                    
                                    <div class="room-detail_amenities">
                                        <p>Ubicado en el corazón de Aspen con una combinación única de lujo contemporáneo y patrimonio histórico, alojamiento de lujo, excelentes comodidades, hospitalidad genuina y servicio dedicado para una experiencia elevada en las Montañas Rocosas.</p>
                                        
                                        <div class="row">
                                            <div class="col-xs-6 col-lg-4">
                                                <h6>SALA DE ESTAR</h6>
                                                <ul>
                                                    <li>Escritorio de gran tamaño</li>
                                                    <li>Secador de pelo</li>
                                                    <li>Plancha disponible bajo petición</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-lg-4">
                                                <h6>COCINA</h6>
                                                <ul>
                                                    <li>Radio reloj AM/FM</li>
                                                    <li>Buzón de voz</li>
                                                    <li>Acceso a internet de alta velocidad</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-lg-4">
                                                <h6>BALCON</h6>
                                                <ul>
                                                    <li>Radio reloj AM/FM</li>
                                                    <li>Buzón de voz</li>
                                                    <li>Acceso a internet de alta velocidad</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-lg-4">
                                                <h6>DORMITORIO</h6>
                                                <ul>
                                                    <li>Cafetera</li>
                                                    <li>Televisor de 25 pulgadas o más</li>
                                                    <li>Canales de televisión por cable/satélite</li>
                                                    <li>Radio reloj AM/FM</li>
                                                    <li>Buzón de voz</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-lg-4">
                                                <h6>BAÑO</h6>
                                                <ul>
                                                    <li>Puerto de datos</li>
                                                    <li>Sin cargos por acceso telefónico</li>
                                                    <li>Servicio de conserjería 24 horas</li>
                                                    <li>Conserjería privada</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-lg-4">
                                                <h6>ESCRITORIO DE TRABAJO</h6>
                                                <ul>
                                                    <li>Puerto de datos</li>
                                                    <li>Sin cargos por acceso telefónico</li>
                                                    <li>Servicio de conserjería 24 horas</li>
                                                    <li>Conserjería privada</li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- END / AMENITIES -->

                                <!-- PACKAGE -->
                                <div class="tab-pane fade" id="package">
                            
                                    <div class="room-detail_package">

                                        <!-- ITEM package -->
                                        <div class="room-package_item">
                                        
                                            <div class="text">
                                                <h4><a href="#">Paquete básico</a></h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
                                                                    
                                                <div class="room-package_price">
                                                    <p class="price">
                                                        <span class="amout">$260</span>
                                                    </p>
                                                    <a href="#" class="awe-btn awe-btn-default">Elegir paquete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END / ITEM package -->
                                                                    
                                        <!-- ITEM package -->
                                        <div class="room-package_item">
                                        
                                            <div class="text">
                                                <h4><a href="#">Paquete estandar</a></h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
                                                                    
                                                <div class="room-package_price">
                                                    <p class="price">
                                                        <span class="amout">$360</span>
                                                    </p>
                                                    <a href="#" class="awe-btn awe-btn-default">Elegir paquete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END / ITEM package -->
                                        
                                        <!-- ITEM package -->
                                        <div class="room-package_item">
                                        
                                            <div class="text">
                                                <h4><a href="#">Paquete premium</a></h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
                                                                    
                                                <div class="room-package_price">
                                                    <p class="price">
                                                        <span class="amout">$460</span>
                                                    </p>
                                                    <a href="#" class="awe-btn awe-btn-default">Elegir paquete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END / ITEM package -->
                                    </div>
                            
                                </div>
                                <!-- END / PACKAGE -->

                                <!-- RATES -->
                                <div class="tab-pane fade" id="rates">

                                    <div class="room-detail_rates">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Periodo</th>
                                                    <th>Noche</th>
                                                    <th>Fin de semana</th>
                                                    <th>Semanal</th>
                                                    <th>Mensual</th>
                                                    <th>Evento</th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <td>
                                                    <h6>Primavera/Verano</h6>
                                                    <ul>
                                                        <li>Marzo 21 - Agosto 31</li>
                                                        <li>3 noches de estancia minima</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$320</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$23</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$120</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$100</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$89</span></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Verano/Otoño</h6>
                                                    <ul>
                                                        <li>Septiembre - Noviembre</li>
                                                        <li>3 noches de estancia minima</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$320</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$23</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$120</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$100</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$89</span></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Invierno</h6>
                                                    <ul>
                                                        <li>Diciembre - Febrero</li>
                                                        <li>3 noches de estancia minima</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$320</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$23</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$120</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$100</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$89</span></p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                                <!-- END / RATES -->

                                <!-- CALENDAR -->
                                <div class="tab-pane fade" id="calendar">

                                    <div class="room-detail_calendar-wrap row">

                                        <div class="col-sm-6">
                                            <!-- CALENDAR ITEM -->
                                            <div class="calendar_custom">
                                        
                                                <div class="calendar_title">
                                                    <span class="calendar_month">JUNIO</span>
                                                    <span class="calendar_year">2025</span>
                                            
                                                    <a href="#" class="calendar_prev calendar_corner"><i class="lotus-icon-left-arrow"></i></a>
                                                </div>
                                            
                                                <table class="calendar_tabel">

                                                    <thead>
                                                        <tr>
                                                            <th>Dom</th>
                                                            <th>Lun</th>
                                                            <th>Mar</th>
                                                            <th>Mie</th>
                                                            <th>Jue</th>
                                                            <th>Vie</th>
                                                            <th>Sab</th>
                                                        </tr>
                                                    </thead>

                                                    <tr>
                                                        <td></td>
                                                        <td class="apb-calendar_current-date">
                                                            <a href="#"><small>1</small></a>
                                                        </td>
                                                        <td><a href="#"><small>2</small></a></td>
                                                        <td><a href="#"><small>3</small></a></td>
                                                        <td><a href="#"><small>4</small></a></td>
                                                        <td><a href="#"><small>5</small></a></td>
                                                        <td><a href="#"><small>6</small></a></td>
                                                    </tr>

                                                    <tr>
                                                        <td><a href="#"><small>7</small></a></td>
                                                        <td><a href="#"><small>8</small></a></td>
                                                        <td><a href="#"><small>9</small></a></td>
                                                        <td><a href="#"><small>10</small></a></td>
                                                        <td class="apb-calendar_current-select"><a href="#"><small>11</small></a></td>
                                                        <td class="apb-calendar_current-select"><a href="#"><small>12</small></a></td>
                                                        <td><a href="#"><small>13</small></a></td>
                                                    </tr>

                                                    <tr>
                                                        <td><a href="#"><small>14</small></a></td>
                                                        <td><a href="#"><small>15</small></a></td>
                                                        <td class="not-available"><a href="#"><small>16</small></a></td>
                                                        <td class="not-available"><a href="#"><small>17</small></a></td>
                                                        <td><a href="#"><small>18</small></a></td>
                                                        <td><a href="#"><small>19</small></a></td>
                                                        <td><a href="#"><small>20</small></a></td>
                                                    </tr>

                                                    <tr>
                                                        <td><a href="#"><small>21</small></a></td>
                                                        <td><a href="#"><small>22</small></a></td>
                                                        <td><a href="#"><small>23</small></a></td>
                                                        <td><a href="#"><small>24</small></a></td>
                                                        <td><a href="#"><small>25</small></a></td>
                                                        <td><a href="#"><small>26</small></a></td>
                                                        <td><a href="#"><small>27</small></a></td>
                                                    </tr>

                                                    <tr>
                                                        <td><a href="#"><small>28</small></a></td>
                                                        <td><a href="#"><small>29</small></a></td>
                                                        <td><a href="#"><small>30</small></a></td>
                                                        <td><a href="#"><small>31</small></a></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                </table>
                                            
                                            </div>
                                            <!-- END CALENDAR ITEM -->
                                        </div>

                                        <div class="col-sm-6">

                                            <!-- CALENDAR ITEM -->
                                            <div class="calendar_custom">
                                        
                                                <div class="calendar_title">
                                                    <span class="calendar_month">JULIO</span>
                                                    <span class="calendar_year">2025</span>
                                            
                                                    <a href="#" class="calendar_next calendar_corner"><i class="lotus-icon-right-arrow"></i></a>
                                                </div>
                                            
                                                <table class="calendar_tabel">

                                                    <thead>
                                                        <tr>
                                                            <th>Dom</th>
                                                            <th>Lun</th>
                                                            <th>Mar</th>
                                                            <th>Mie</th>
                                                            <th>Jue</th>
                                                            <th>Vie</th>
                                                            <th>Sab</th>
                                                        </tr>
                                                    </thead>

                                                    <tr>
                                                        <td></td>
                                                        <td class="apb-calendar_current-date">
                                                            <a href="#"><small>1</small></a>
                                                        </td>
                                                        <td><a href="#"><small>2</small></a></td>
                                                        <td><a href="#"><small>3</small></a></td>
                                                        <td><a href="#"><small>4</small></a></td>
                                                        <td><a href="#"><small>5</small></a></td>
                                                        <td><a href="#"><small>6</small></a></td>
                                                    </tr>

                                                    <tr>
                                                        <td><a href="#"><small>7</small></a></td>
                                                        <td><a href="#"><small>8</small></a></td>
                                                        <td><a href="#"><small>9</small></a></td>
                                                        <td><a href="#"><small>10</small></a></td>
                                                        <td class="apb-calendar_current-select"><a href="#"><small>11</small></a></td>
                                                        <td class="apb-calendar_current-select"><a href="#"><small>12</small></a></td>
                                                        <td><a href="#"><small>13</small></a></td>
                                                    </tr>

                                                    <tr>
                                                        <td><a href="#"><small>14</small></a></td>
                                                        <td><a href="#"><small>15</small></a></td>
                                                        <td class="not-available"><a href="#"><small>16</small></a></td>
                                                        <td class="not-available"><a href="#"><small>17</small></a></td>
                                                        <td><a href="#"><small>18</small></a></td>
                                                        <td><a href="#"><small>19</small></a></td>
                                                        <td><a href="#"><small>20</small></a></td>
                                                    </tr>

                                                    <tr>
                                                        <td><a href="#"><small>21</small></a></td>
                                                        <td><a href="#"><small>22</small></a></td>
                                                        <td><a href="#"><small>23</small></a></td>
                                                        <td><a href="#"><small>24</small></a></td>
                                                        <td><a href="#"><small>25</small></a></td>
                                                        <td><a href="#"><small>26</small></a></td>
                                                        <td><a href="#"><small>27</small></a></td>
                                                    </tr>

                                                    <tr>
                                                        <td><a href="#"><small>28</small></a></td>
                                                        <td><a href="#"><small>29</small></a></td>
                                                        <td><a href="#"><small>30</small></a></td>
                                                        <td><a href="#"><small>31</small></a></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                </table>
                                            
                                            </div>
                                            <!-- END CALENDAR ITEM -->
                                        </div>
                                        
                                        <div class="calendar_status text-center col-sm-12">
                                            <span>Disponible</span>
                                            <span class="not-available">No disponible</span>
                                        </div>
                                    </div>

                                </div>
                                <!-- END / CALENDAR -->

                            </div>
                        </div>

                    </div>

                </div>
                <!-- END / TAB -->

                <!-- OUR BEST -->
                <section class="ot-out-best mt60">
                    <div class="container">
                        <div class="content">
                            <div class="row">
                                <div class="col col-xs-12 col-lg-6 col-lg-offset-3">
                                    <div class="ot-heading mb40 row-20 text-center">
                                        <h2>Nuestros servicios</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-single owl-best" data-single_item="false" data-desktop="6"
                                data-small_desktop="4"
                                data-tablet="3" data-mobile="2"
                                data-nav="true"
                                data-pagination="false">
                                <div class="item text-center">
                                    <img class="img-responsive mb10" src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/home-3/icon/icon-11.png') ?>" alt="icon">
                                    <span class="font-hind f-500">Wifi gratis</span>
                                </div>
                                <div class="item text-center">
                                    <img class="img-responsive mb10" src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/home-3/icon/icon-12.png') ?>" alt="icon">
                                    <span class="font-hind f-500">Estacionamiento</span>
                                </div>
                                <div class="item text-center">
                                    <img class="img-responsive mb10" src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/home-3/icon/icon-13.png') ?>" alt="icon">
                                    <span class="font-hind f-500">Servicio de habitacion</span>
                                </div>
                               <!--  <div class="item text-center">
                                    <img class="img-responsive mb10" src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/home-3/icon/icon-14.png') ?>" alt="icon">
                                    <span class="font-hind f-500">Aire acondicionado</span>
                                </div> -->
                                <div class="item text-center">
                                    <img class="img-responsive mb10" src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/home-3/icon/icon-15.png') ?>" alt="icon">
                                    <span class="font-hind f-500">TV de paga</span>
                                </div>
                                <div class="item text-center">
                                    <img class="img-responsive mb10" src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/home-3/icon/icon-16.png') ?>" alt="icon">
                                    <span class="font-hind f-500">Equipaje</span>
                                </div>
                                <div class="item text-center">
                                    <img class="img-responsive mb10" src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/home-3/icon/icon-12.png') ?>" alt="icon">
                                    <span class="font-hind f-500">Estacionamiento</span>
                                </div>
                                <div class="item text-center">
                                    <img class="img-responsive mb10" src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/home-3/icon/icon-13.png') ?>" alt="icon">
                                    <span class="font-hind f-500">Servicio de habitación</span>
                                </div>
                                <div class="item text-center">
                                    <img class="img-responsive mb10" src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/home-3/icon/icon-11.png') ?>" alt="icon">
                                    <span class="font-hind f-500">Wifi gratis</span>
                                </div>
                               
                                <div class="item text-center">
                                    <img class="img-responsive mb10" src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/home-3/icon/icon-15.png') ?>" alt="icon">
                                    <span class="font-hind f-500">TV de paga</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END / OUR BEST -->

                <!-- COMPARE ACCOMMODATION -->
                <div class="room-detail_compare">
                    <h2 class="room-compare_title">COMPARAR ALOJAMIENTO</h2>

                    <div class="room-compare_content">
                        
                        <div class="row">
                            <!-- ITEM -->
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="room-compare_item">
                                    <div class="img">
                                        <a href="#">
                                            <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/compare/img-1.jpg') ?>"> 
                                        </a>
                                    </div>  
                                
                                    <div class="text">
                                        <h2><a href="#">Habitacion de lujo</a></h2>
                                
                                        <ul>
                                            <li><i class="lotus-icon-person"></i> Max: 2 Personas</li>
                                            <li><i class="lotus-icon-bed"></i> Cama: King-size o dos camas</li>
                                            <li><i class="lotus-icon-view"></i> Vista: Oceáno</li>
                                        </ul>
                                
                                        <a href="#" class="awe-btn awe-btn-default">VER DETALLE</a>
                                
                                    </div>
                                
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            
                            <!-- ITEM -->
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="room-compare_item">
                                    <div class="img">
                                        <a href="#">
                                            <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/compare/img-2.jpg') ?>"> 
                                        </a>
                                    </div>  
                                
                                    <div class="text">
                                        <h2><a href="#">Habitacion familiar</a></h2>
                                
                                        <ul>
                                            <li><i class="lotus-icon-person"></i> Max: 2 Personas</li>
                                            <li><i class="lotus-icon-bed"></i> Cama: King-size o dos camas</li>
                                            <li><i class="lotus-icon-view"></i> Vista: Oceáno</li>
                                        </ul>
                                
                                        <a href="#" class="awe-btn awe-btn-default">VER DETALLE</a>
                                
                                    </div>
                                
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            
                            <!-- ITEM -->
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="room-compare_item">
                                    <div class="img">
                                        <a href="#">
                                            <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/compare/img-3.jpg') ?>"> 
                                        </a>
                                    </div>  
                                
                                    <div class="text">
                                        <h2><a href="#">Habitacion estandar</a></h2>
                                
                                        <ul>
                                            <li><i class="lotus-icon-person"></i> Max: 2 Personas</li>
                                            <li><i class="lotus-icon-bed"></i> Cama: King-size o dos camas</li>
                                            <li><i class="lotus-icon-view"></i> Vista: Oceáno</li>
                                        </ul>
                                
                                        <a href="#" class="awe-btn awe-btn-default">VER DETALLE</a>
                                
                                    </div>
                                
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            
                            <!-- ITEM -->
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="room-compare_item">
                                    <div class="img">
                                        <a href="#">
                                            <img src="<?= base_url('templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/compare/img-4.jpg') ?>"> 
                                        </a>
                                    </div>  
                                
                                    <div class="text">
                                        <h2><a href="#">Habitacion de pareja</a></h2>
                                
                                        <ul>
                                            <li><i class="lotus-icon-person"></i> Max: 2 Personas</li>
                                            <li><i class="lotus-icon-bed"></i> Cama: King-size o dos camas</li>
                                            <li><i class="lotus-icon-view"></i> Vista: Oceáno</li>
                                        </ul>
                                
                                        <a href="#" class="awe-btn awe-btn-default">VER DETALLE</a>
                                
                                    </div>
                                
                                </div>
                            </div>
                            <!-- END / ITEM -->
                        </div>

                    </div>
                </div>
                <!-- END / COMPARE ACCOMMODATION -->

            </div>
        </section>
        <!-- END / SHOP DETAIL -->
   

<!--HTML-->


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        // Aquí van los scripts específicos de esta página
    </script>
<?= $this->endSection() ?>
