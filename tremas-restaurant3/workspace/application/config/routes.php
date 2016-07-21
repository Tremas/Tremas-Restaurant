<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['register'] = 'user/register';


$route['login'] = 'user/login';
$route['logout'] = 'user/logout';
$route['home'] = 'user/home';

$route['mostrar_usuarios'] = 'admin/mostrar_usuarios';
$route['add_empleado'] = 'admin/add_empleado';
$route['modificar_empleado'] = 'admin/modificar_empleado';
$route['borrar_usuario'] = 'admin/borrar_usuario';


$route['mostrar_platos'] = 'platos/mostrar_platos';
$route['add_platos'] = 'platos/add_platos';
$route['modificar_platos'] = 'platos/modificar_platos';
$route['borrar_platos'] = 'platos/borrar_platos';

$route['add_reserva'] = 'reserva/add_reserva';

$route['mostrar_reserva'] = 'reserva/mostrar_reserva';
$route['modificar_reserva'] = 'reserva/modificar_reserva';
$route['borrar_reserva'] = 'reserva/borrar_reserva';

$route['mostrar_reserva_user'] = 'reserva/mostrar_reserva_user';
$route['add_reserva_user'] = 'reserva/add_reserva_user';



$route['mostrar_comanda'] = 'comanda/mostrar_comanda';
$route['comanda'] = 'comanda/mostrar_reserva';

$route['perfil'] = 'perfil/mostrar_perfil';
$route['change_password'] = 'perfil/cambiar_password';

$route['mostrar_factura_reserva'] = 'factura/mostrar_factura';
$route['mostrar_factura'] = 'factura/mostrar_factura_comanda';
$route['mostrar_factura_admin'] = 'factura/mostrar_factura_admin';

$route['default_controller'] = 'user/home';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
