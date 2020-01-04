<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller{

	function __construct() {
    parent::__construct();
		$this->load->library('googleplus');
		$this->load->model('user_model');
	}

	public function index(){
		redirect(base_url());
	}

	public function oauth2callback(){
		$google_data_auth = $this->googleplus->getAuthenticate();
		$google_data = $this->googleplus->getUserInfo();
		$session_data=array(
			'name'=>$google_data['name'],
			'email'=>$google_data['email'],
			'source'=>'google',
			'profile_pic'=>$google_data['picture'],
			'link'=>$google_data['link'],
			'sess_logged_in'=>1
		);
		$this->session->set_userdata($session_data);
		redirect(base_url().'user/complete');
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->googleplus->revokeToken();
		$session_data=array(
			'sess_logged_in'=>0);
		$this->session->set_userdata($session_data);
		redirect('');
	}


}
