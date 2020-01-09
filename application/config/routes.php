<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'pages/index';

$route['404_override'] = '';
$route['(:any)'] = 'pages/view/$1';
$route['workshops/(:any)'] = 'pages/view_workshops/$1';
$route['translate_uri_dashes'] = FALSE;
