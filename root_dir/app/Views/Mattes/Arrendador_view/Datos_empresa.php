<!-- EXTENDIENDO EL LAYOUT PRINCIPAL -->
<?= $this->extend('layout/main') ?>

<!--LIBRERIAS DINAMICAS PARA CSS-->
<?= $this->section('css') ?>
<!-- Aquí puedes agregar hojas de estilo específicas para esta vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="<?= base_url() ?>/assets/lib/SpinKit/spinkit.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="<?= base_url() ?>/assets/css/estilos.css" rel="stylesheet">
<?= $this->endSection() ?>

<!-- CONTENIDO DINAMICO -->
<?= $this->section('content') ?>


<style>
  #datatable1_wrapper {
    margin-bottom: 40px;
  }

  .file-drop-area {
    width: auto !important;
  }
   #datatable1{
    display: block !important;
   }
</style>

<!-- <div id="loader" class="modal fade show" style="display: none; padding-left: 0px;">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="d-flex ht-300 pos-relative align-items-center">
      <div class="sk-chasing-dots">
        <div class="sk-child sk-dot1 bg-red-800"></div>
        <div class="sk-child sk-dot2 bg-green-800"></div>
      </div>
    </div>
  </div>
</div> -->

<section class="section-sub-banner bg-inmobiliaria">
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>Datos de la inmobiliaria</h2><!-- 
                <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>
    </div>
</section>

<div class="alert bg-warning mg-t-100 d-none" id="succes-alert" role="alert">
  <button type="button" class="close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
      <i class="fa fa-exclamation-triangle alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
      <span><strong>SU CORREO ELECTRÓNICO NO HA SIDO VERIFICADO, POR FAVOR VERIFIQUE SU BANDEJA DE ENTRADA</strong> <span id="success"></span></span>
  </div><!-- d-flex -->
</div><!-- alert -->

<!--=========================================
  ===== DATOS PERSONALES ARRENDADOR =====
=============================================-->

<div class="container pd-90">
  <div class="row d-empresa">
    <div class="col-12">
      <div class="tab datos-empresa d-flex flex-column flex-md-row  justify-content-center mb-4">
        <button class="tablinks mr-2" onclick="openCity(event, 'Personales')" id="defaultOpen"><i class="fa fa-user mr-2" aria-hidden="true"></i>Datos personales</button>
        <button class="tablinks mr-2" onclick="openCity(event, 'Bancarios')" id="d_bancarios"><i class="fa fa-university mr-2" aria-hidden="true"></i>Datos bancarios</button>
        <button class="tablinks mr-2" onclick="openCity(event, 'Fiscales')" id="d_fiscales"><i class="fa fa-file-text mr-2" aria-hidden="true"></i>Datos fiscales</button>
        <button class="tablinks mr-2" onclick="openCity(event, 'Notificaciones')" id="notificaciones"><i class="fa fa-bell mr-2" aria-hidden="true"></i>Notificaciones</button>
        <button class="tablinks mr-2" onclick="openCity(event, 'Agentes')" id="agentes"> 
          <i class="fa fa-users mr-1" aria-hidden="true"></i>
          <!-- <i class="ionicons ion-ios-people h2 mr-2"></i> -->
          Agentes
        </button>
        <button style="display: none;" class="tablinks" onclick="openCity(event, 'Perfil-agentes')" id="perfil_agentes">Perfil agente</button>
      </div>

      <div id="Personales" class="tabcontent mb-340 mb-sm-360 mb-md-280 mb-lg-270 mb-xl-250">
        <div class=" mb-430 mb-sm-360 mb-md-280 mb-lg-270 mb-xl-250">
          
           <!--  <div class="text-center">
              <h3 class="datos-personales-empresa mb-sm-5">Ahora un poco de ti </h3>
              <p class="col-lg-7 mx-auto">En Mattes buscamos la seguridad de toda nuestra comunidad, tanto estudiantes como propietarios, es por esto que los
                documentos que pedimos a continuación son necesarios para poder subir tu propiedad en la plataforma. </p>
            </div> -->
            <form class="mb-430 mb-sm-360 mb-md-280 mb-lg-270 mb-xl-250" id="form_perso_emp" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="">Nombre inmobiliaria<span class="tx-danger">*</span></label>
                    <input type="text" class="" id="inmobiliaria_name" name="nombre_inmobiliaria" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="50" autocomplete="off" placeholder=" " required>
                  </div>
                </div>
                <!-- <div class="row justify-content-center mg-t-40">
                  <div class="col-lg-7 form__group px-sm-4">
                    <input type="text" class="form__input" id="rfc_inmobiliaria" name="rfc_inmobiliaria" pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})" minlength="12" maxlength="13" autocomplete="off" placeholder=" " required>
                    <label class="form__label px-sm-2">RFC<span class="tx-danger">*</span></label>
                    <div class="requirements">
                      No coincide el formato
                    </div>
                  </div>
                </div> -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="">Razón social<span class="tx-danger">*</span></label>
                    <input type="text" class="" id="razonsocial" name="razonsocial_inmobiliaria" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="5" maxlength="100" autocomplete="off" placeholder=" " required>
                  </div>
                </div>
                <!-- <div class="row justify-content-center mg-t-40">
                  <div class="col-lg-7 form__group px-sm-4">
                    <input type="text" class="form__input" id="dir_inmobiliaria" name="direccion_inmobiliaria"  minlength="13" maxlength="100" autocomplete="off" placeholder=" " required>
                    <label class="form__label px-sm-2">Dirección<span class="tx-danger">*</span></label>
                    <div class="requirements">
                      Tiene que tener mínimo 13 caracteres
                    </div>
                  </div>
                </div> -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="">Representante legal<span class="tx-danger">*</span></label>
                    <input type="text" class="" id="representante" name="representante_legal" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="13" maxlength="100" autocomplete="off" placeholder=" " required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="">Número telefónico<span class="tx-danger">*</span></label>
                    <input type="tel" class="" id="tel_inmobiliaria" name="telefono_inmobiliaria" pattern="[0-9]+" minlength="10" maxlength="10" autocomplete="off" placeholder=" " required>
                  </div>
                </div>
                <!--  <div class="row justify-content-center mg-t-30">
                  <label class="col-lg-7 form-control-label px-sm-4">Comprobante de domicilio (inmobiliaria)<span class="tx-danger">*</span><sub> Archivos pdf o imagen</sub></label>
                  <div class="col-lg-7 mg-t-10 mg-sm-t-0 px-sm-4">
                    <div class="file-drop-area">
                      <span class="choose-file-button">Subir Archivo</span>
                      <span class="file-message">Arrastra el archivo aqui</span>
                      <input id="file_comp" class="file-input" type="file" required name="file" accept=".pdf, .png, .jpg">
                    </div>
                  </div>
                </div> -->
                <div class="col-sm-12 d-none">
                  <div class="form-group mt-3 text-center">
                    <div class="custom-control custom-checkbox mb-3 text-primary">
                      <!-- <input type="checkbox" class="custom-control-input" id="customControlValidation1" name="terminosycond" required>
                      <label class="custom-control-label" for="customControlValidation1">Términos y condiciones</label> -->
                    </div>
                    <input id="id_usuarioper" type="hidden" name="id_usuarioper">
                  </div>
                </div>
                <div class="col-12 pr-sm-2">
                  <div class="d-flex flex-column flex-sm-row justify-content-end align-items-end">
                    <button class="btn cancelar btn-danger continuar-momento mr-sm-2 mb-2 mb-sm-0" id="btncontinuar_inmobiliaria" name="continuar-inmob" type="button">
                      <i class="fa fa-sign-out mr-1" aria-hidden="true"></i>Salir sin guardar
                    </button>
                    <button class="btn btn-save" id="btnactualizar-inmob-per" name="actualizarper-inmob" type="submit"><i class="fa fa-floppy-o mr-1" aria-hidden="true"></i>Guardar</button>
                  </div>
                </div>
              </div>
            </form>
          
        </div>
      </div>


      <!--=========================================
        ===== DATOS BANCARIOS =====
      =============================================-->
      <div id="Bancarios" class="tabcontent mg-b-30 mb-md-75">
          <div class="text-center">
            <h3 class="datos-bancarios-empresa mb-sm-5"> Datos bancarios <span><br>(opcional)</span></h3>
          </div>
          <form class="" id="form_bancarios_inmobiliaria" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="">Nombre</label>
                  <input type="text" class="" id="nombre_inmobi" name="inmobiliaria_nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="60" autocomplete="off" placeholder=" " required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="">Banco</label>
                  <input type="text" class="" id="banco_nombre" name="banco_nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="4" maxlength="30" autocomplete="off" placeholder=" " required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="">CLABE</label>
                  <input type="text" class="" id="clabe_banco" name="clabe_bancaria" pattern="^[0-9]+" minlength="18" maxlength="18" autocomplete="off" placeholder=" " required>
                  <input id="id_usuarioban" type="hidden" name="id_usuarioban">
                </div>
              </div>
              <div class="col-12 pr-sm-2">
                <div class="d-flex flex-column flex-sm-row justify-content-end align-items-end">
                  <button class="btn cancelar btn-danger continuar-momento mr-sm-2 mb-2 mb-sm-0" id="btncontinuar_inmob-banco" name="continuarbanco-inmob">
                    <i class="fa fa-sign-out mr-1" aria-hidden="true"></i>Salir sin guardar
                  </button>
                  <button class="btn btn-save" id="btnactualizar_banco_inmob" name="actualizarban-inmob"><i class="fa fa-floppy-o mr-1" aria-hidden="true"></i>Guardar</button>
                </div>
              </div>
            </div>
          </form>
        
      </div>


      <!--=========================================
        ===== DATOS FISCALES =====
      =============================================-->
      <div id="Fiscales" class="tabcontent mg-b-60 mb-sm-3">
          <div class="text-center">
            <h3 class="datos-fiscales-empresa mb-5"> Datos fiscales <span><br>(opcional)</span></h3>
          </div>
          <form class="" id="form_fiscales" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="">RFC</label>
                  <input type="text" class="" id="rfc" name="rfc" pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})" minlength="12" maxlength="13" autocomplete="off" placeholder=" " required>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="">Dirección fiscal</label>
                  <input type="text" class="" id="direccion_fiscal" name="direccion_fiscal" minlength="13" maxlength="100" autocomplete="off" placeholder=" " required>
                  <input id="id_usuariofis" type="hidden" name="id_usuariofis">
                </div>
              </div>
              <div class="col-12 pr-sm-2">
                <div class="d-flex flex-column flex-sm-row justify-content-end align-items-end">
                  <button class="btn cancelar btn-danger continuar-momento mr-sm-2 mb-2 mb-sm-0" id="btncontinuar_fiscales_inmob" name="continuar-fiscales-inmob">
                    <i class="fa fa-sign-out mr-1" aria-hidden="true"></i>Salir sin guardar
                  </button>
                  <div id="omitir">
                  </div>
                  <button class="btn btn-save" id="btnactualizar_fiscales_inmob" name="actualizar-fiscales-inmob">
                    <i class="fa fa-floppy-o mr-1" aria-hidden="true"></i>Guardar
                  </button>
                </div>
              </div>
              
            </div>
          </form>
        
      </div>


      <!--=========================================
        ===== NOTIFICACIONES =====
      =============================================-->
      <div id="Notificaciones" class="tabcontent mb-580 mb-sm-327">
        <div class="container">
          <div class="row">
            <div class="col-12">
                <div class="text-center">
                  <h3 class="notificaciones-empresa mb-5"> Notificaciones </h3>
                </div>
                <form class="" id="form_notificaciones" enctype="multipart/form-data">
                  <div class="row mg-t-20">
                    <p class="col-sm-6 text-center text-sm-right">Notificaciones en correo</p>
                    <div class="col-sm-6 mg-t-10 mg-sm-t-0 text-center">
                      <label class="switch mr-lg-3">
                        <input type="checkbox" checked id="notis-correo" name="notis_correo">
                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="mg-t-40">
                    <h5 class="text-center notificaciones-emprsa">¿Qué notificaciones quieres que lleguen a tu correo?:</h5>
                    <div class="row mg-t-30">
                      <p class="col-sm-6 text-center  text-sm-right">Nuevas citas</p>
                      <div class="col-sm-6 mg-t-10 mg-sm-t-0 text-center">
                        <label class="switch mr-lg-3">
                          <input id="nueva-cita" name="nuevas_citas" type="checkbox" checked>
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                    <div class="row mg-t-30">
                      <p class="col-sm-6 text-center  text-sm-right">Avisos</p>
                      <div class="col-sm-6 mg-t-10 mg-sm-t-0 text-center">
                        <label class="switch mr-lg-3">
                          <input id="avisos" type="checkbox" name="avisos" checked>
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                    <div class="row mg-t-30">
                      <p class="col-sm-6 text-center text-sm-right">Mensajes</p>
                      <div class="col-sm-6 mg-t-10 mg-sm-t-0 text-center">
                        <label class="switch mr-lg-3">
                          <input id="mensajes" name="mensajes" type="checkbox" checked>
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                    <div class="row mg-t-30">
                      <p class="col-sm-6 text-center text-sm-right">Promociones</p>
                      <div class="col-sm-6 mg-t-10 mg-sm-t-0 text-center">
                        <label class="switch mr-lg-3">
                          <input id="promos" name="promos" type="checkbox" checked>
                          <span class="slider round"></span>
                        </label>
                        <input id="id_usuarionot" type="hidden" name="id_usuarionot">
                      </div>
                    </div>
                    <div class="col-sm-12 pl-lg-0">
                      <div class="d-flex flex-column flex-sm-row justify-content-end align-items-end">
                        <button class="btn cancelar btn-danger continuar-momento mr-sm-2 mb-2 mb-sm-0" id="btncontinuar_notificaciones_inmob" name="continuar-notis-inmob">
                          <i class="fa fa-sign-out mr-1" aria-hidden="true"></i>Salir sin guardar
                        </button>
                        <button class="btn btn-save" id="btnactualizar_notificaciones_inmob" name="actualizar-notis-inmob">
                          <i class="fa fa-floppy-o mr-1" aria-hidden="true"></i>Guardar</button>
                      </div>
                    </div>
                    
                  </div>
                </form>
              
            </div>
          </div>
        </div>
      </div>

      <!--=========================================
        ===== AGENTES =====
      =============================================-->

      <div id="Agentes" class="tabcontent mb-470 mb-md-280">
          <div class="text-center">
            <h3 class="agentes-empresa mb-3"> Agentes</h3>
            <p class="mb-0">Presúmenos a tu Equipo</p>
            <div class="col-12 mg-t-10 mg-sm-t-0 text-md-right">
              <button id="addagent" class="btn btn-enviar mb-3">
                <i class="ionicons ion-person-add text-white"></i> <br>
                <span>Añadir agente</span>
              </button>

              <!-- <img src="<?= base_url() ?>/../../assets/img/Iconos_Mattes/Iconos/Mattes_Menu_Subir agentes.png" class="img-fluid rounded-circle ml-2" id="addagent" alt="Icono empresa" style="width:120px;cursor: pointer;"> -->
            </div>
            <div>
              <table id="datatable1" class="table display table-responsive datos-agentes" style="width: 100% !important; ">
                <thead>
                  <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Propiedades</th>
                    <th>Activo/Inactivo </th>
                    <th>Enviar acceso </th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
            <button class="btn btn-primary" id="process" type="button"><i class="fa fa-floppy-o mr-1" aria-hidden="true"></i>Guardar</button>
          </div>
        
      </div>



      <!--=========================================
         ===== PERFIL AGENTE =====
      =============================================-->
      <div id="Perfil-agentes" class="tabcontent mb-xl-235">
          <div class="text-center">
            <h3 class="perfil-agente-empresa">Perfil agente </h3>
          </div>
          <form class="mb-xl-270" id="form-perfilagent" enctype="multipart/form-data">
            
              <div class="row justify-content-center mg-t-20 px-3">
                <div class="col-lg-7">
                  <div class="col-sm-12 text-center">
                    <img style="width: 140px; height: 140px;" id="img-user" class="img-fluid rounded-circle" src="<?= base_url() ?>/assets/img/default.png" />
                  </div>
                </div>
                <div class="col-lg-7 mg-t-10 mg-sm-t-0 mt-4 mb-lg-5">
                  <div class="file-drop-area">
                    <span class="choose-file-button">Subir foto de perfil</span>
                    <span id="file-msg" class="file-message">Arrastra el archivo aqui</span>
                    <input id="file_user-img" class="file-input" type="file" required name="file_agente" accept=".jpeg, .png, .jpg">
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="form-group">
                  <label class="">Nombre<span class="tx-danger">*</span></label>
                  <input type="text" class="" id="nombre_agente" name="nombre_agente" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" autocomplete="off" placeholder=" " required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="">Primer Apellido<span class="tx-danger">*</span></label>
                  <input type="text" class="" id="nombre_agente" name="apellidof" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" autocomplete="off" placeholder=" " required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="">Segundo Apellido<span class="tx-danger">*</span></label>
                  <input type="text" class="" id="nombre_agente" name="apellidos" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" minlength="3" maxlength="25" autocomplete="off" placeholder=" " required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="">Correo<span class="tx-danger">*</span></label>
                  <input type="email" class="" id="email_agente" name="correo_agente" autocomplete="off" placeholder=" " required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="">Teléfono<span class="tx-danger">*</span></label>
                  <input type="tel" class="" id="tel_agente" name="tel_agente" pattern="^[0-9]+" minlength="10" maxlength="10" autocomplete="off" placeholder=" " required>
                </div>
              </div>
              <!--   <div class="row justify-content-center mg-t-30">
                <label class="col-lg-7 form-control-label px-sm-4">Identificación oficial (agente)<span class="tx-danger">*</span><sub> Archivos pdf o imagen</sub></label>
                <div class="col-lg-7 mg-t-10 mg-sm-t-0 px-sm-4">
                  <div class="file-drop-area">
                    <span class="choose-file-button">Subir Archivo</span>
                    <span class="file-message">Arrastra el archivo aqui</span>
                    <input id="file_agente" class="file-input" type="file" required name="ine_agente" accept=".pdf, .png, .jpg">
                  </div>
                </div>
              </div> -->
              <div class="col-lg-12 mx-auto px-0 px-lg-2 ">
                <div class="col-sm-12 text-center text-md-right px-3 px-lg-2">
                  <div class="d-flex justify-content-end">
                    <button class="px-4 py-1 btn btn-save" id="btnactualizar_agente_inmob" name="actualizar-agente"><i class="fa fa-floppy-o mr-1" aria-hidden="true"></i>Guardar</button>
                  </div>
                </div>
              </div>
            </div>
        </form>
      
    </div>


    <!--=========================================
          ===== ALTA AGENTES =====
      =============================================-->
    <div id="Alta-agentes" class="tabcontent">
      <div class="pd-20 pd-sm-40 form-layout form-layout-4">
        <div class="text-center">
          <h3 class="agentes-empresa"> Agentes </h3>
          <p>Presúmenos a tu Equipo</p>
        </div>
        <form id="form-alta-agent" enctype="multipart/form-data">
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Nombre</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" id="alta_nombre_agente" name="alta-nombre-agente" placeholder=" " autocomplete="off">
            </div>
          </div>
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Email</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" id="alta_email_agente" name="alta-email-agente" placeholder="correo@mail.com">
            </div>
          </div>
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Teléfono</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" id="alta_tel_agenete" name="alta-tel-agente" placeholder="(55) 5555-5555" title="Solo se permiten numeros">
            </div>
          </div>

          <div class="mg-t-50 text-right">
            <button class="col-sm-4" id="addsend" name="addsend"><i class="icon ion-ios-email-outline"></i> Agregar y Enviar Acceso</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<!--Modal Agentes -->
<div id="updateModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="formUpdate" enctype="multipart/form-data">

        <div class="modal-header" style="background-color: #EAA654;">
          <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">EDITAR AGENTE</h6>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="mg-t-20">
            <div id="imagen" class="text-center"></div>
          </div>
          <div class="mg-t-20">
            <div class="form-group">
              <label class="">Nombre: <span><span class="tx-danger">*</span></label>
              <input class="" type="text" name="nombre" id="upd-nombre" required>
            </div>
          </div>

          <div class="mg-t-20">
            <div class="form-group">
              <label class="">Primer Apellido: <span><span class="tx-danger">*</span></label>
              <input class="" type="text" name="apellido" id="upd-apellido" required>
            </div>           
          </div>

          <div class="mg-t-20">
            <div class="form-group">
              <label class="">Segundo Apellido: <span class="tx-danger">*</span></label>
              <input class="" type="text" name="apellidos" id="upd-apellidos" required>
            </div>            
          </div>

          <div class="mg-t-20">
            <div class="form-group">
              <label class="">Correo: <span class="tx-danger">*</span></label>
              <input type="email" class="" name="correo" id="upd-correo" readonly>
            </div>
          </div>

          <div class="mg-t-20">
            <div class="form-group">
              <label class="">Teléfono: <span class="tx-danger">*</span></label>
              <input class="" type="text" class="form-control" id="upd-phone" name="telefono" required>
            </div>            
          </div>

          <input class="form-control" type="hidden" class="form-control" id="id_agente" name="id" required>

          <div class="mg-t-20">
            <label class="form-control-label">Foto: <span class="tx-danger">*</span></label>
            <div class="file-drop-area">
              <span class="choose-file-button">Subir foto de perfil</span>
              <span class="file-message">Arrastra el archivo aqui</span>
              <input id="file-user" class="file-input" type="file" name="file" accept=".jpg, .png, .jpeg">
            </div>
          </div>

          <div class="mg-t-20 mg-sm-t-0">
            <img style="width: 100px;" class="img-fluid" id="img" />
          </div>
        </div>
        <div class="modal-footer">
          <div class="mg-t-20">
            <button id="update-agente" type="submit" class="btn btn-teal pd-x-20" style="background-color: #da850a; border-color:#da850a;"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Editar</button>
          </div>
          <div class="mg-t-20">
            <button type="button" class="btn btn btn-danger pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>    
    <script src="<?= base_url() ?>/assets/lib/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>/assets/lib/jquery-ui/jquery-ui.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?= $this->endSection() ?>
