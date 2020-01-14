<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'pages/index';
$route['(:any)'] = 'pages/view/$1';
$route['workshops/(:any)'] = 'pages/view_workshops/$1';
// $route['user/dashboard/(.+)'] = 'user/dynamic_auser/$1';
$route['admin/dashboard/(.+)'] = 'admin/dynamic_admin/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
