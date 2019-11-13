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
      $data['page_title'] = 'Home';
      $data['upcomingInfo']=$this->report_model->upcomingEvents();
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
      $data['upcomingInfo']=$this->report_model->upcomingEvents();
      $data['incubated']=$this->report_model->ecellInfo('incubated');
			$data['incubating']=$this->report_model->ecellInfo('incubating');
      $this->load->view('templates/header',$data);
      $this->load->view('static/'.$page,$data);
      $this->load->view('templates/footer');
    }

}
