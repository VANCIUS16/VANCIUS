<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//Seccion A
$route['default_controller'] = "sye";
$route['404_override'] = '';
$route['credencializacion'] = 'sye/credencializacion';


//$route['desarrollo'] = 'sye/loadpage/desarrollo/desarrollo';

// Primer Conjunto del Menu (Productos)
$route['etiquetas'] 	= 'sye/loadpage/Etiquetas/etiquetas';
$route['impresion'] 	= 'sye/loadpage/Impresiones/impresion';
$route['compumoviles'] 	= 'sye/loadpage/computadoras móviles/compumoviles';
$route['rfid'] 			= 'sye/loadpage/Identificación por radio/rfid';
$route['comunicacion'] 	= 'sye/loadpage/Redes de comunicación/comunicacion';
$route['software'] 		= 'sye/loadpage/Software a la medida/software';

// Segundo Conjunto del Menu (Servicio)
$route['asesoria'] 		= 'sye/loadpage/Asesoría Técnica/asesoria';
$route['soluciones'] 	= 'sye/loadpage/Soluciones Integrales/soluciones';
$route['trazabilidad'] 	= 'sye/loadpage/Trazabilidad y Rastreo/trazabilidad';
$route['capacitacion']	= 'sye/loadpage/Capacitación/capacitacion';

// Tercer Conjunto del Menu (Soporte)
$route['consumibles'] 	= 'sye/loadpage/Consumibles/consumibles';
$route['produDetalle']= 'sye/loadpage/Detalle de Producto/produDetalle';
$route['impresoras'] 	= 'sye/loadpage/Impresoras de códigos de barras/impresoras';
$route['redysistema'] 	= 'sye/loadpage/Red y Sistema/redysistema';

$route['nosotros'] 		= 'sye/loadpage/Nosotros/nosotros';
$route['contacto'] 		= 'email_controller';

// Cuarto Conjunto del Menu (Acerca de) FOOTER
$route['equipo'] 		= 'sye/loadpage/Equipo/equipo';
$route['instalaciones'] = 'sye/loadpage/Nuestras Instalaciones/instalaciones';
$route['filosofia'] 	= 'sye/loadpage/Nuestra Filosofia/filosofia';
$route['vacantes'] 		= 'sye/loadpage/Nuestras Vacantes/vacantes';

// Conjunto del menu de en medio (Tres Imagenes)
//$route['productos'] 	= 'sye/loadpage/Productos/productos';
$route['servicios'] 	= 'sye/loadpage/Servicios/servicios';
$route['soporte']	 	= 'sye/loadpage/Soporte técnico/soporte';


//$route['productos/info'] = 'sye';
//$route['info'] = 'sye/loadpage/Nuestras Vacantes/vacantes';

/* End of file routes.php */
/* Location: ./application/config/routes.php */