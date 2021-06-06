<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'pages/index';
$route['events/dare2develop'] = 'pages/dare2develop';
$route['events/(:any)'] = 'pages/view_event/$1';
$route['admin/dashboard/(.+)'] = 'admin/dynamic_admin/$1';
$route['admin/event-participants/(.+)'] = 'admin/event_participants/$1';
$route['admin/upload-certificate/(.+)'] = 'admin/upload_certificate/$1';
$route['admin/edit-event/(.+)'] = 'admin/edit_event/$1';
$route['user/dashboard/(.+)'] = 'user/dynamic_user/$1';
$route['forbidden'] = 'pages/forbidden';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
