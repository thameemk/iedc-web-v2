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
      if(isset($_GET['code']))
      {
        $this->googleplus->getAuthenticate();
        $this->session->set_userdata('login',true);
        $this->session->set_userdata('userProfile',$this->googleplus->getUserInfo());
        redirect('Auth/profile');
      }
      $data['loginURL'] = $this->googleplus->loginURL();
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
      $temp = str_replace("-"," ",$page);
      $temp1 = ucfirst($temp);
      $data['page_title'] = $temp1;
      $data['upcomingInfo']=$this->report_model->upcomingEvents();
      $data['incubated']=$this->report_model->ecellInfo('incubated');
			$data['incubating']=$this->report_model->ecellInfo('incubating');
      $data['execomYear']=$this->report_model->execomYear();
      $data['execom']=$this->report_model->execomInfo();
      $this->load->view('templates/header',$data);
      $this->load->view('static/'.$page,$data);
      $this->load->view('templates/footer');
    }

}
