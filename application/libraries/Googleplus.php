<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Googleplus {

	public function __construct() {

		$CI =& get_instance();
		$CI->config->load('googleplus');

		require APPPATH .'third_party/google-login-api/apiClient.php';
		require APPPATH .'third_party/google-login-api/contrib/apiOauth2Service.php';

		$this->client = new apiClient();
		$this->CI->load->library('session');
		$this->client->setApplicationName($CI->config->item('application_name', 'googleplus'));
		$this->client->setClientId($CI->config->item('client_id', 'googleplus'));
		$this->client->setClientSecret($CI->config->item('client_secret', 'googleplus'));
		$this->client->setRedirectUri($CI->config->item('redirect_uri', 'googleplus'));
		$this->client->setDeveloperKey($CI->config->item('api_key', 'googleplus'));
		$this->client->setScopes($CI->config->item('scopes', 'googleplus'));
		$this->client->setAccessType('online');
		$this->client->setApprovalPrompt('auto');
		$this->oauth2 = new apiOauth2Service($this->client);

	}

	public function loginURL() {
        return $this->client->createAuthUrl();
    }

	public function getAuthenticate() {
        // return $this->client->authenticate();
				if (isset($_GET['code'])) {
				 $this->client->authenticate($_GET['code']);
					$_SESSION['access_token'] = $this->client->getAccessToken();
				 }

				if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
					$this->client->setAccessToken($_SESSION['access_token']);
					$plus = new Google_Service_Plus($this->client);
					$person = $plus->people->get('me');
					$info['id']=$person['id'];
					$info['email']=$person['emails'][0]['value'];
					$info['name']=$person['displayName'];
					$info['link']=$person['url'];
					$info['profile_pic']=$person['image']['url'];
					return  $info;
				}

    }

	public function getAccessToken() {
        return $this->client->getAccessToken();
    }

	public function setAccessToken() {
        return $this->client->setAccessToken();
    }

	public function revokeToken() {
        return $this->client->revokeToken();
    }

	public function getUserInfo() {
        return $this->oauth2->userinfo->get();
    }

}
?>
