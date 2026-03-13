

<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css" />
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css">
	<link rel="stylesheet" href="/assets/lib/Carousel/owlcarousel/owl.carousel.min.css">
	<link rel="stylesheet" href="/assets/lib/Carousel/owlcarousel/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">


    <link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">    
    <link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">
<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>
<?= $this->include('Layout/header_arrendatario') ?>

<div id="loader" class="modal fade show load">
	<div class="modal-dialog modal-dialog-vertical-center" role="document">
		<div class="d-flex ht-300 pos-relative align-items-center">
			<div class="sk-chasing-dots">
				<div class="sk-child sk-dot1 bg-red-800"></div>
				<div class="sk-child sk-dot2 bg-green-800"></div>
			</div>
		</div>
	</div>
	<!-- <img src="<?= base_url() ?>/../../assets/img/Iconos_Mattes/Iconos/Mattes_Logo.png" alt="Logo mattes" class="img-fluid logo"> -->
</div>

<style>
	.load {
		display: none !important;
		padding-left: 0px;
	}
	.compartir{
		position: inherit;
		text-decoration: none;
	}
	.compartir:hover{
		border-radius: 0px !important;		
	}
	.btn-info:hover{
		background-color: #fff !important;
		color: #17a2b8;
		border-color: #17a2b8;
	}
	/* .fade.show{
		background-color: black !important;
		opacity: 50;
		
	} */

	/*  .carousel-inner {
		width: 100% !important;
		max-height: 380px !important;
	} */
	.fa-heart{
		color: red !important;
	}
	.icon{
		border: 2px solid #eea236;
		margin-right: 6px;
	}
	#agendar_cita{
		font-size: 18px;
		padding: .7em 2em;
		text-transform: uppercase;
		border-radius: 0px;
	}
	#btn_wa{
		border-color: #4cae4c;
		color: #4cae4c;
		font-size: 18px;
		padding: .7em 2em;
		text-transform: uppercase;
	}
	#btn_wa:hover {
		border-color: #4cae4c;
		background-color: #4cae4c;
		box-shadow: inset 0 0 0 2em #4cae4c;
		color: #fff;
	}
	.precio > h1{
		font-weight: bold !important;
	}
	.form-control {
		border: 2px solid black;
	}
	#send-questions{
		padding: .7em 1em;
		border-radius: 0px;
	}
	.form-control {
		height: 45px;
	}

</style>

<!-- <div class="alert bg-warning mg-t-120 d-none" id="succes-alert" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
        <span>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA <span id="success"></span></span>
    </div>
</div> -->

<section class="section-sub-banner bg-16">
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2 class="titulo-prop text-uppercase title"></h2>
            </div>
        </div>
    </div>
</section>


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
							<img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/lager/img-1.jpg" alt="">    
							<h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
						</div>
						<div class="room_img-item">
							<img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/lager/img-2.jpg" alt="">    
							<h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
						</div>
						<div class="room_img-item">
							<img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/lager/img-3.jpg" alt="">    
							<h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
						</div>
						<div class="room_img-item">
							<img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/lager/img-5.jpg" alt="">    
							<h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
						</div>
						<div class="room_img-item">
							<img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/lager/img-6.jpg" alt="">    
							<h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
						</div>
						<div class="room_img-item">
							<img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/lager/img-7.jpg" alt="">    
							<h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
						</div>
						<div class="room_img-item">
							<img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/lager/img-5.jpg" alt="">    
							<h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
						</div>
					</div>
					<!-- END / LAGER IMGAE -->
					
					<!-- THUMBNAIL IMAGE -->
					<div class="room-detail_thumbs">
						<a href="#"><img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-2.jpg" alt=""></a>
						<a href="#"><img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-3.jpg" alt=""></a>
						<a href="#"><img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-4.jpg" alt=""></a>
						<a href="#"><img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-5.jpg" alt=""></a>
						<a href="#"><img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-6.jpg" alt=""></a>
						<a href="#"><img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-7.jpg" alt=""></a>
						<a href="#"><img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-8.jpg" alt=""></a>
						<a href="#"><img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/img-6.jpg" alt=""></a>
					</div>
					<!-- END / THUMBNAIL IMAGE -->

				</div>

				<div class="col-lg-3">

					<!-- FORM BOOK -->
					<div class="room-detail_book">

						<div class="room-detail_total">
							<img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/icon-logo.png" alt="" class="icon-logo">
							
							<h6>STARTING ROOM FROM</h6>
							
							<p class="price">
								<span class="amout">$260</span>  /days
							</p>
						</div>
						
						<div class="room-detail_form">
							<label>Arrive</label>
							<input type="text" class="awe-calendar from" placeholder="Arrive Date">
							<label>Depature</label>
							<input type="text" class="awe-calendar to" placeholder="Departure Date">
							<label>Adult</label>
							<select class="awe-select">
								<option>1</option>
								<option>2</option>
								<option selected>3</option>
								<option>4</option>
							</select>
							<label>Chirld</label>
							<select class="awe-select">
								<option>1</option>
								<option>2</option>
								<option selected>3</option>
								<option>4</option>
							</select>
							<button class="awe-btn awe-btn-13">Book Now</button>
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
						<li><a href="#overview" data-toggle="tab">OVERVIEW</a></li>
						<li class="active"><a href="#amenities" data-toggle="tab">amenities</a></li>
						<li><a href="#package" data-toggle="tab">PACKAGE</a></li>
						<li><a href="#rates" data-toggle="tab">RATES</a></li>
						<li><a href="#calendar" data-toggle="tab">Calendar</a></li>
					</ul>
				</div>
								
				<div class="col-md-9">
					<div class="room-detail_tab-content tab-content">
						
						<!-- OVERVIEW -->
						<div class="tab-pane fade" id="overview">

							<div class="room-detail_overview">
								<h5 class='text-uppercase
								'>de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h5>
								<p>Located in the heart of Aspen with a unique blend of contemporary luxury and historic heritage, deluxe accommodations, superb amenities, genuine hospitality and dedicated service for an elevated experience in the Rocky Mountains.</p>

								<div class="row">
									<div class="col-xs-6 col-md-4">
										<h6>SPECIAL ROOM</h6>
										<ul>
											<li>Max: 4 Person(s)</li>
											<li>Size: 35 m2 / 376 ft2</li>
											<li>View: Ocen</li>
											<li>Bed: King-size or twin beds</li>
										</ul>
									</div>
									<div class="col-xs-6 col-md-4">
										<h6>SERVICE ROOM</h6>
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
								<p>Located in the heart of Aspen with a unique blend of contemporary luxury and historic heritage, deluxe accommodations, superb amenities, genuine hospitality and dedicated service for an elevated experience in the Rocky Mountains.</p>
								
								<div class="row">
									<div class="col-xs-6 col-lg-4">
										<h6>LIVING ROOM</h6>
										<ul>
											<li>Oversized work desk</li>
											<li>Hairdryer</li>
											<li>Iron/ironing board upon request</li>
										</ul>
									</div>
									<div class="col-xs-6 col-lg-4">
										<h6>KITCHEN ROOM</h6>
										<ul>
											<li>AM/FM clock radio</li>
											<li>Voicemail</li>
											<li>High-speed Internet access</li>
										</ul>
									</div>
									<div class="col-xs-6 col-lg-4">
										<h6>balcony</h6>
										<ul>
											<li>AM/FM clock radio</li>
											<li>Voicemail</li>
											<li>High-speed Internet access</li>
										</ul>
									</div>
									<div class="col-xs-6 col-lg-4">
										<h6>bedroom</h6>
										<ul>
											<li>Coffee maker</li>
											<li>25 inch or larger TV</li>
											<li>Cable/satellite TV channels</li>
											<li>AM/FM clock radio</li>
											<li>Voicemail</li>
										</ul>
									</div>
									<div class="col-xs-6 col-lg-4">
										<h6>bathroom</h6>
										<ul>
											<li>Dataport</li>
											<li>Phone access fees waived</li>
											<li>24-hour Concierge service</li>
											<li>Private concierge</li>
										</ul>
									</div>
									<div class="col-xs-6 col-lg-4">
										<h6>Oversized work desk</h6>
										<ul>
											<li>Dataport</li>
											<li>Phone access fees waived</li>
											<li>24-hour Concierge service</li>
											<li>Private concierge</li>
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
										<h4><a href="#">package standar</a></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
															
										<div class="room-package_price">
											<p class="price">
												<span class="amout">$260</span> / Package
											</p>
											<a href="#" class="awe-btn awe-btn-default">Book package</a>
										</div>
									</div>
								</div>
								<!-- END / ITEM package -->
															
								<!-- ITEM package -->
								<div class="room-package_item">
								
									<div class="text">
										<h4><a href="#">package standar</a></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
															
										<div class="room-package_price">
											<p class="price">
												<span class="amout">$260</span> / Package
											</p>
											<a href="#" class="awe-btn awe-btn-default">Book package</a>
										</div>
									</div>
								</div>
								<!-- END / ITEM package -->
								
								<!-- ITEM package -->
								<div class="room-package_item">
								
									<div class="text">
										<h4><a href="#">package standar</a></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
															
										<div class="room-package_price">
											<p class="price">
												<span class="amout">$260</span> / Package
											</p>
											<a href="#" class="awe-btn awe-btn-default">Book package</a>
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
											<th>Rate Period</th>
											<th>Nightly</th>
											<th>Weekend Night</th>
											<th>Weekly</th>
											<th>Monthly</th>
											<th>Event</th>
										</tr>
									</thead>
									<tr>
										<td>
											<h6>Spring/Summer Season</h6>
											<ul>
												<li>Jun 1 - Aug 31</li>
												<li>3 night minimum stay</li>
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
											<h6>Summer/Fall Season</h6>
											<ul>
												<li>Jun 1 - Aug 31</li>
												<li>3 night minimum stay</li>
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
											<h6>Christmas Season</h6>
											<ul>
												<li>Jun 1 - Aug 31</li>
												<li>3 night minimum stay</li>
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
											<span class="calendar_month">JUNE</span>
											<span class="calendar_year">2015</span>
									
											<a href="#" class="calendar_prev calendar_corner"><i class="lotus-icon-left-arrow"></i></a>
										</div>
									
										<table class="calendar_tabel">

											<thead>
												<tr>
													<th>Su</th>
													<th>Mo</th>
													<th>Tu</th>
													<th>We</th>
													<th>Th</th>
													<th>Fr</th>
													<th>Sa</th>
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
											<span class="calendar_month">JUNE</span>
											<span class="calendar_year">2015</span>
									
											<a href="#" class="calendar_next calendar_corner"><i class="lotus-icon-right-arrow"></i></a>
										</div>
									
										<table class="calendar_tabel">

											<thead>
												<tr>
													<th>Su</th>
													<th>Mo</th>
													<th>Tu</th>
													<th>We</th>
													<th>Th</th>
													<th>Fr</th>
													<th>Sa</th>
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
									<span>Available</span>
									<span class="not-available">Not Available</span>
								</div>
							</div>

						</div>
						<!-- END / CALENDAR -->

					</div>
				</div>

			</div>

		</div>
		<!-- END / TAB -->

		<!-- COMPARE ACCOMMODATION -->
		<div class="room-detail_compare">
			<h2 class="room-compare_title">COMPARE ACCOMMODATION</h2>

			<div class="room-compare_content">
				
				<div class="row">
					<!-- ITEM -->
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="room-compare_item">
							<div class="img">
								<a href="#"><img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/compare/img-1.jpg" alt=""></a>
							</div>  
						
							<div class="text">
								<h2><a href="#">LUxury room</a></h2>
						
								<ul>
									<li><i class="lotus-icon-person"></i> Max: 2 Person(s)</li>
									<li><i class="lotus-icon-bed"></i> Bed: King-size or twin beds</li>
									<li><i class="lotus-icon-view"></i> View: Ocen</li>
								</ul>
						
								<a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
						
							</div>
						
						</div>
					</div>
					<!-- END / ITEM -->
					
					<!-- ITEM -->
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="room-compare_item">
							<div class="img">
								<a href="#"><img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/compare/img-2.jpg" alt=""></a>
							</div>  
						
							<div class="text">
								<h2><a href="#">Family Room</a></h2>
						
								<ul>
									<li><i class="lotus-icon-person"></i> Max: 2 Person(s)</li>
									<li><i class="lotus-icon-bed"></i> Bed: King-size or twin beds</li>
									<li><i class="lotus-icon-view"></i> View: Ocen</li>
								</ul>
						
								<a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
						
							</div>
						
						</div>
					</div>
					<!-- END / ITEM -->
					
					<!-- ITEM -->
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="room-compare_item">
							<div class="img">
								<a href="#"><img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/compare/img-3.jpg" alt=""></a>
							</div>  
						
							<div class="text">
								<h2><a href="#">standard Room</a></h2>
						
								<ul>
									<li><i class="lotus-icon-person"></i> Max: 2 Person(s)</li>
									<li><i class="lotus-icon-bed"></i> Bed: King-size or twin beds</li>
									<li><i class="lotus-icon-view"></i> View: Ocen</li>
								</ul>
						
								<a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
						
							</div>
						
						</div>
					</div>
					<!-- END / ITEM -->
					
					<!-- ITEM -->
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="room-compare_item">
							<div class="img">
								<a href="#"><img src="<?= base_url() ?>/templates/7 The lotus hotel/landing.engotheme.com/html/lotus/demo/images/room/detail/compare/img-4.jpg" alt=""></a>
							</div>  
						
							<div class="text">
								<h2><a href="#">couple Room</a></h2>
						
								<ul>
									<li><i class="lotus-icon-person"></i> Max: 2 Person(s)</li>
									<li><i class="lotus-icon-bed"></i> Bed: King-size or twin beds</li>
									<li><i class="lotus-icon-view"></i> View: Ocen</li>
								</ul>
						
								<a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
						
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

<div class="container mg-b-150">
	<div class="row mg-t-30">
		<div class="col-12 col-md-8">
			<div class="d-flex">
				<h2 class="titulo-prop text-uppercase title"></h2>
				<div class="favorito-btn group ml-3" title="Agregar a favoritos"></div>
			</div>
			<div id="estrellas" class="starrr mg-b-10"></div>
		</div>
		<div class="col-12 col-md-4 text-right">
			<a class="compartir btn btn-info" href="javascript:getlink();"><i class="fa fa-share-alt" aria-hidden="true"></i> Compartir</a>
		</div>
	</div>

	<div class="col-12 pl-0">
		<div class="precio d-lg-none"></div>
	</div>

	<div class="row">
		<div id="wrap" class="col-lg-8 mt-5 my-lg-5 text-center">
			<div id="c-principal" class="col-12 ">
				<!-- Carousel -->
				<div id="carousel" class="carousel slide gallery" data-ride="carousel">
					<div class="carousel-inner c-inicio">
					</div>
					<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Siguiente</span>
					</a>					
				</div>

				<!-- Carousel Navigatiom -->
				<div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active" data-slide-number="0">
							<div class="row mx-0 thumbs">
								
							</div>
						</div>
						<div id="#prueba">
						</div>
						
					</div>
					<a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Siguiente</span>
					</a>
				</div>

				<!-- Carrusel de Miniaturas -->
				<div id="carousel-thumbs" class="owl-carousel owl-theme">
					<div class="item"><h4>1</h4></div>
					<div class="item"><h4>2</h4></div>
					<div class="item"><h4>3</h4></div>
				</div>
			</div>
			
			
			
			
			<!--descripcion -->
			<div class="col-12 text-left mt-4">
				<h3 class="title text-uppercase">Descripción</h3>
				<!-- <img src="<?= base_url() ?>/assets/icons/recibo.gif" alt="Computer man" style="width:48px;height:48px;">
				<hr> -->
				<p class="info-des mt-2"></p>
			</div>
			
			<div class="col-12 text-left mt-4">
				<h3 class="servicios">Servicios</h3>
				<p>Estos son los servicios con los que cuenta esta propiedad</p>
				<div id="iconos" class="d-flex flex-column flex-md-row justify-content-between iconos-s mg-t-10"></div>
			</div>

			<div class="col-12 text-left mt-4 d-lg-none">
				<h3 class="title text-uppercase">Detalles</h3>
				<!-- <img src="<?= base_url() ?>/assets/icons/edificio.gif" alt="Computer man" style="width:48px;height:48px;">
				<hr> -->
				<div class="detalles info-prop"></div>
			</div>
		</div>

		<div class="col-lg-4 propietario text-center mt-lg-precio">
			<div class="col-12 d-none d-lg-block">
				<div class="precio"></div>
			</div>

			<div id="datos_inmob" class="col-12 mt-5">
				<h3 class="title">Propietario</h3>
				<figure class="photo-prop"></figure>
				<p class="info-nprop mt-2"></p>
				<p id="n_inmobiliaria"></p>
				<p class="telefono"></p>
				<p class="correo"></p>
				<hr>

				<?php 
					if(isset($alumno_verify)){
						if($alumno_verify){
							echo('<button id = "agendar_cita" class="col-12 mg-t-5 mg-l-5 agendar-cita btn-efect group-btn fill"><i class="fa fa-calendar" aria-hidden="true"></i> Agendar cita</button>');
							echo('<button id="btn_wa" class="col-12 mg-t-5 mg-l-5 btn-efect group-btn fill" style="right:10px;"><i class="fa fa-whatsapp fa-lg" aria-hidden="true"></i> Enviar Mensaje</button>');
						}
						
					}else{
						echo('<button id = "agendar_cita" class="col-12 mg-t-5 mg-l-5 agendar-cita btn-efect group-btn fill"><i class="fa fa-calendar" aria-hidden="true"></i> Agendar cita</button>');
						echo('<button id="btn_wa" class="col-12 mg-t-5 mg-l-5 btn-efect group-btn fill" style="right:10px;"><i class="fa fa-whatsapp fa-lg" aria-hidden="true"></i> Enviar Mensaje</button>');

					}

				?>
				<!-- <button id="btn_rentar" class="col-12 mg-t-5 mg-l-5 rentar-casa btn-efect group-btn up"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Rentar</button> -->
			</div>
			<div class="col-12 text-left mt-4 d-none d-lg-block">
				<h3 class="title text-uppercase">Detalles</h3>
				<!-- <img src="<?= base_url() ?>/assets/icons/edificio.gif" alt="Computer man" style="width:48px;height:48px;">
				<hr> -->
				<div class="detalles info-prop"></div>
			</div>	

		</div>
		
	</div>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="title text-uppercase mt-5 mt-lg-0">Ubicación de la propiedad</h3>
				<!-- <img src="<?= base_url() ?>/assets/icons/casa.gif" alt="Computer man" style="width:48px;height:48px;">
				<hr> -->
				<!-- <div class="distancia info-prop mg-t-10">Distancia a la universidad: </div> -->
				<div class="col-12 mg-b-50  mt-2" id="map" style="height: 320px; border-radius: 0px;"></div>
			</div>
		</div>
	</div>
	

	<div class="col-12 shadow-sm p-3 pb-lg-5 mb-3 bg-body rounded border mt-2 mt-lg-4">
		<h3 class="title"><i class="fa fa-question-circle" aria-hidden="true"></i> Preguntas y respuestas</h3>
		<hr>
		<h5 class="mensaje text-center">Inicia sesión para preguntarle al propietario</h5>
		<form id="form-questions" enctype="multipart/form-data" class="group">
			<div class="row mg-t-20">
				<div class="col-12 mg-t-10 mg-sm-t-0 mg-b-10">
					<input id="dudas" name="dudas" class="form-control select2" placeholder="Deja tus preguntas y dudas aquí" required>
					<input class="propiedad" type="hidden" name="propiedad" id="propiedad">
				</div>
				<div class="col-12 text-right mg-md-t-5">
					<button id="send-questions" class="col-6 col-md-2 float-right enviar-dudas" type="submit"><i class="fa fa-question-circle" aria-hidden="true"></i> Enviar</button>
				</div>
			</div>
		</form>
		<div class="questions"></div>
	</div>

	<!-- <div class="col-sm-12 shadow-sm p-3 mb-5 bg-body rounded border mt-4">
		<div class="buttons">
			<h1>Simple hover effects with <code>box-shadow</code></h1>
			<button class="btn-efect fill">Fill In</button>
			<button class="btn-efect pulse">Pulse</button>
			<button class="btn-efect close">Close</button>
			<button class="btn-efect raise">Raise</button>
			<button class="btn-efect up">Fill Up</button>
			<button class="btn-efect slide">Slide</button>
			<button class="btn-efect offset">Offset</button>
		</div>
	</div> -->



	<div class="col-12 shadow-sm p-3 mb-5 bg-body rounded border mt-3 mt-lg-4 opinions">
		<h3 class="title"><i class="fa fa-star" aria-hidden="true"></i> Reseñas</h3>
		<hr>
	</div>

</div>

<form method="POST" id="propiedad_id">
	<input class="id_propiedad" type="hidden" name="id" id="id">
	<input class="id_propiedatio" type="hidden" name="propietario" id="propietario">
</form>

<script>
	let id_propiedad = <?php echo json_encode($id_propiedad); ?>;
	let name_property = <?php echo json_encode($nombre_popiedad); ?>;
	let group = <?php echo json_encode($group); ?>;
	let verify = <?php echo json_encode($verify); ?>;
</script>





<style>
	.title {
		font-family: "Gothicb" !important;
		color: var(--mattes);
	}

	.tb-max {
		width: 296px !important;
		height: 100px !important;
		max-height: 100px !important;

	}

	.w-new {
		width: 713px !important;
		height: 500px !important;
		max-height: 500px !important;

	}

	.carousel {
		position: relative;
	}

	.carousel-item img {
		object-fit: cover;
	}

	#carousel-thumbs {
		background: #f0f0f0;
		padding: 0 50px;
	}

	#carousel-thumbs img:hover {
		opacity: 100%;
	}

	#carousel-thumbs img {
		opacity: 80%;
		border: 3px solid transparent;
		cursor: pointer;
	}

	#carousel-thumbs .selected img {
		opacity: 100%;
	}

	.carousel-control-prev,
	.carousel-control-next {
		width: 50px;
	}

	.carousel-fullscreen-icon {
		position: absolute;
		top: 1rem;
		left: 1rem;
		width: 1.75rem;
		height: 1.75rem;
		z-index: 4;
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(255,255,255,.80)'  viewBox='0 0 16 16'%3E%3Cpath d='M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1h-4zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zM.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5z' /%3E%3C/svg%3E");
	}

	.carousel-fullscreen-icon:hover {
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgb(255,255,255)' viewBox='0 0 16 16'%3E%3Cpath d='M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1h-4zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zM.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5z' /%3E%3C/svg%3E");
	}

	.pause .carousel-pause-icon {
		position: absolute;
		top: 3.75rem;
		left: 1rem;
		width: 1.75rem;
		height: 1.75rem;
		z-index: 4;
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(255,255,255,.80)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5zm3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5z' /%3E%3C/svg%3E");
	}

	.pause .carousel-pause-icon:hover {
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgb(255,255,255)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5zm3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5z' /%3E%3C/svg%3E");
	}

	.play .carousel-pause-icon {
		position: absolute;
		top: 3.75rem;
		left: 1rem;
		width: 1.75rem;
		height: 1.75rem;
		z-index: 4;
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(255,255,255,.80)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z' /%3E%3C/svg%3E");
	}

	.play .carousel-pause-icon:hover {
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgb(255,255,255)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z' /%3E%3C/svg%3E");
	}

	#carousel-thumbs .carousel-control-prev-icon {
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(0,0,0,.60)' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
	}

	#carousel-thumbs .carousel-control-next-icon {
		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%60000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
	}

	.modal-content {
		border-radius: 0;
		background-color: transparent;
		border: none;
	}

	#lightbox-container-image img {
		width: auto;
		max-height: 520px;
	}
</style>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>  

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.js"></script>

<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	/*  $("[id^=carousel-thumbs]").carousel({
	interval: false
}); */

	/** Pause/Play Button **/
	$(".carousel-pause").click(function() {
		var id = $(this).attr("href");
		if ($(this).hasClass("pause")) {
			$(this).removeClass("pause").toggleClass("play");
			$(this).children(".sr-only").text("Play");
			$(id).carousel("pause");
		} else {
			$(this).removeClass("play").toggleClass("pause");
			$(this).children(".sr-only").text("Pause");
			$(id).carousel("cycle");
		}
		$(id).carousel;
	});

	/** Fullscreen Buttun **/
	$(".carousel-fullscreen").click(function() {
		var id = $(this).attr("href");
		$(id).find(".active").ekkoLightbox({
			type: "image"
		});
	});

	if ($("[id^=carousel-thumbs] .carousel-item").length < 2) {
		$("#carousel-thumbs [class^=carousel-control-]").remove();
		$("#carousel-thumbs").css("padding", "0 5px");
	}

	$("#carousel").on("slide.bs.carousel", function(e) {
		var id = parseInt($(e.relatedTarget).attr("data-slide-number"));
		var thumbNum = parseInt(
			$("[id=carousel-selector-" + id + "]")
			.parent()
			.parent()
			.attr("data-slide-number")
		);
		$("[id^=carousel-selector-]").removeClass("selected");
		$("[id=carousel-selector-" + id + "]").addClass("selected");
		$("#carousel-thumbs").carousel(thumbNum);
	});
</script>

<?= $this->endSection() ?>

