<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->model('report_model');
      $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
    $data['page_title'] = 'Home - Innovation and Entrepreneurship Development Cell, TKM College of Engineering';    
		$this->load->view('templates/header',$data);
		$this->load->view('static/home',$data);
		$this->load->view('templates/footer');
	}

    function view($page){
      if ( ! file_exists(APPPATH.'views/static/'.$page.'.php')){
          show_404();
      }
      $temp = ucfirst($page);
      $data['page_title'] = $temp;
      $this->load->view('templates/header',$data);
      $this->load->view('static/'.$page,$data);
      $this->load->view('templates/footer');
    }

}
