<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Mattes/Principal');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

//home
$routes->get('registro-propietario', 'Registro_propietario::index');
$routes->post('Registro','Registro_propietario::register');
$routes->get('inicia-session', 'Mattes/Login::index');
$routes->get('registro-estudiante', 'Registro_estudiante::index');
$routes->get('Registro', 'Mattes/General/Registro::index');
$routes->get('Recuperar-contrasena', 'Register::password_recover');

//Arrendador
$routes->get('datos-propietario', 'Mattes/Arrendador/Datos_propietario::index');
$routes->get('home-propietario', 'Mattes/Arrendador/Index::index');
$routes->get('avisos-propietario', 'Mattes/Arrendador/Propiedades::index');
$routes->get('subir-propiedad', 'Mattes/Arrendador/Detalle_propiedad::index');
$routes->get('beneficios', 'Mattes/Arrendador/Beneficios_invitacion::index');
$routes->match(['post', 'get'],'propiedad-ubicacion','Mattes/Arrendador/Propiedad_ubicacion::index');
$routes->match(['post', 'get'],'propiedad-servicios','Mattes/Arrendador/Detalles_servicios::index');
$routes->match(['post', 'get'],'propiedad-documentos','Mattes/Arrendador/Propiedad_archivos::index');
$routes->match(['post', 'get'],'propiedad-datos','Mattes/Arrendador/Detalle_propiedad::update');

//Arendador Inmobilaria
$routes->get('datos-inmobiliaria', 'Mattes/Arrendador/Datos_empresa::index');
$routes->get('actividad-agentes', 'Mattes/Arrendador/Mensajes_agente::index');
$routes->get('Agentes', 'Mattes/Arrendador/Subir_agente::index');
$routes->get('conversacion-agente/(:any)', 'Mattes/Arrendador/Propiedad_conversacion::index');

//Agentes
$routes->get('datos-agentes', 'Mattes/Agente/Datos_agente::actualiza');
$routes->get('avisos-agente', 'Mattes/Arrendador/Propiedades::index');

//Alumno Arrendatario
$routes->get('registro-alumno', 'Mattes/Arrendatario/Registro::index');
$routes->get('registro-documentos', 'Mattes/Arrendatario/Segundo_registro::index');
$routes->get('registro-notificaciones', 'Mattes/Arrendatario/Notificaciones::index');
$routes->get('home-alumno', 'Mattes/Arrendatario/Index::index');
$routes->get('detalle-propiedad/(:any)', 'Mattes/Arrendatario/Propiedad_detalle::index');
$routes->post('agendar-cita', 'Mattes/Arrendatario/Agendar_cita::index');
$routes->get('renta-propiedad/(:any)', 'Mattes/Arrendatario/Renta_propiedad::index');
$routes->get('favoritos', 'Mattes/Arrendatario/Favoritos::index');
$routes->get('mensajes', 'Mattes/Arrendatario/Mensajes::index');
$routes->get('datos-alumno', 'Mattes/Arrendatario/Datos_alumno::index');
$routes->get('rentadas', 'Mattes/Arrendatario/Propiedades_rentadas::index');
$routes->get('calificar/(:any)', 'Mattes/Arrendatario/Calificar::index');
//sin session
$routes->post('home', 'Mattes/Arrendatario/Index::index');

//Paginas info
$routes->get('aviso-privacidad', 'Mattes/Aviso_privacidad::index');
$routes->get('preguntas-frecuentes', 'Mattes/Preguntas_frecuentes::index');
$routes->get('about', 'Mattes/About::index');
$routes->get('contacto', 'Mattes/Contacto::index');

//Back Office
$routes->get('back-office','Mattes/Back_office/Inicio::index');
$routes->get('busqueda','Mattes/Back_office/Mapa_filtros::index');
$routes->get('propiedades','Mattes/Back_office/Propiedades::index');
$routes->get('propietarios','Mattes/Back_office/Propietarios::index');
$routes->get('alumnos','Mattes/Back_office/Alumnos::index');
$routes->get('mensajes-bo','Mattes/Back_office/Mensajes::index');
$routes->get('reportes','Mattes/Back_office/Reportes::index');
$routes->get('reporte_whats','Mattes/Back_office/Contacto_por_whats::index');
$routes->get('datos-propiedad/(:any)','Mattes/Back_office/Datos_Propiedad::index');
$routes->get('detalle-propietario/(:any)','Mattes/Back_office/Detalles_propietario::index');
$routes->get('detalle-agente/(:any)','Mattes/Back_office/Detalles_agente::index');
$routes->get('detalle-empresa/(:any)','Mattes/Back_office/Detalle_empresa::index');
$routes->get('detalle-alumno/(:any)','Mattes/Back_office/Detalle_alumno::index');
$routes->get('subir_propietario', 'Mattes/Back_office/Subir_propietario::index');
$routes->get('subir-propiedad/(:any)','Mattes/Back_office/Subir_propiedad::index');

//generales
$routes->get('Terminos-condiciones','Mattes/Terminos::index');



/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Mattes/Principal::index');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
