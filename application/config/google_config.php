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

$config['google_client_id']        = '184229103860-jh8tpg261u3ma9450tohs279sgqoqto2.apps.googleusercontent.com';
$config['google_client_secret']    = 'o9o4W1JyV-ZhfJgMVvrQNri5';

// $config['google_redirect_url']     =  base_url().'auth/oauth2callback';

$config['google_redirect_url']     =  'http://iedclocal.com/iedc-web-v2/auth/oauth2callback/';

$config['google_application_name'] = 'iedc-web';

$config['google_api_key']          = '';

// $config['google']['scopes']           = array();
$config['google_scopes']           = array();


?>
