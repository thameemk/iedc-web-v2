<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
|
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
|
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/

$config['google']['client_id']        = '870850862261-c6f0tti5skp8cto73p396ngg78recgcs.apps.googleusercontent.com';
$config['google']['client_secret']    = 'ql0oMDW1r5S_Rp7DlbPF0cs2';

// $config['google']['redirect_uri']     = 'http://localhost/iedc-web-v2/login';
$config['google']['redirect_uri']     = 'https://www.iedctkmce.com/login';


$config['google']['application_name'] = 'iedcweb';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();

?>
