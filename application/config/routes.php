<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'pages/index';
$route['events/dare2develop'] = 'pages/dare2develop';
$route['events/(:any)'] = 'pages/view_events/$1';
$route['admin/dashboard/(.+)'] = 'admin/dynamic_admin/$1';
$route['user/dashboard/project-proposal'] = 'user/public_user_pages/project-proposal';
$route['user/dashboard/profile'] = 'user/public_user_pages/profile';
$route['user/dashboard/(.+)'] = 'Member/dynamic_member/$1';
$route['(:any)'] = 'pages/view/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
