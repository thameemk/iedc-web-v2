<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('googleplus');
		$this->load->model('user_model');
	}

	public function index()
	{
		redirect(base_url());
	}

	public function oauth2callback()
	{
		$google_data_auth = $this->googleplus->getAuthenticate();
		$google_data = $this->googleplus->getUserInfo();
		$user_type = $this->getusertype($google_data['email']);
		$session_data = array(
			'name' => $google_data['name'],
			'email' => $google_data['email'],
			'source' => 'google',
			'profile_pic' => $google_data['picture'],
			'sess_logged_in' => 1,
			'user_type' => $user_type
		);
		$this->session->set_userdata($session_data);
		if ($this->session->userdata('last_page') == base_url()) {
			redirect(base_url().'user/dashboard');
		} else {
			redirect($this->session->userdata('last_page'));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->googleplus->revokeToken();
		$session_data = array(
			'sess_logged_in' => 0
		);
		$this->session->set_userdata($session_data);
		redirect('');
	}

	function getusertype($email)
	{
		$email = $this->security->xss_clean($email);
		$this->db->where('email', $email);
		$query = $this->db->get('userRegister');
		$data = $query->result_array();
		if ($query->num_rows() == 1) {
			$user_type = $data[0]['user_type'];
			return $user_type;
		} else {
			return false;
		}
	}
}
