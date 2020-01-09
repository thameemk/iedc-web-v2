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
      $data['loginURL'] = $this->googleplus->loginURL();
      $data['upcomingInfo']=$this->report_model->upcomingEvents();
      $data['incubated']=$this->report_model->ecellInfo('incubated');
			$data['incubating']=$this->report_model->ecellInfo('incubating');
      $data['execomYear']=$this->report_model->execomYear();
      $data['execom']=$this->report_model->execomInfo();
      $data['webYear']=$this->report_model->webYear();
      $data['web_team']=$this->report_model->web_team_info();
      $this->load->view('templates/header',$data);
      $this->load->view('static/'.$page,$data);
      $this->load->view('templates/footer');
    }

    function innovate_reg(){

      $data = $this->input->post();
      $data = $this->security->xss_clean($data);
      $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
        // $userIp=$this->input->ip_address();
        $secret='6LclF8kUAAAAADHKdPmhmxRQ6wY2sJ9YXtV9fSsq';
        $credential = array(
                'secret' => $secret,
                'response' => $this->input->post('g-recaptcha-response')
        );
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        $status= json_decode($response, true);


        if(!$status['success'])
    		{
          $this->session->set_flashdata('fail', 'Sorry Google Recaptcha Unsuccessful!!');
          redirect(base_url() . "innovate4tkm");
        }
    		else {
                $this->form_validation->set_rules('tlemail','Email','required|is_unique[users_innovate_4_tkm.tlemail]');
                if($this->form_validation->run() == FALSE){
                     $this->session->set_flashdata('fail', 'You have already registred');
                     redirect(base_url() . "innovate4tkm");
                }
                else{
                      $this->form_validation->set_rules('tlname','Name','required');
                      $this->form_validation->set_rules('tlphone','Phone','required');
                      $this->form_validation->set_rules('tlyear','year of Study','required');
                      $this->form_validation->set_rules('abstract','Abstract','required');
                      $this->form_validation->set_rules('accept_rule','Rules and Regulations','required');
                      if($this->form_validation->run() == FALSE){
                          $this->session->set_flashdata('fail', 'Fill all fields! ');
                          redirect(base_url() . "innovate4tkm");
                      }
                      else{
                        $data = array(
                          'tlname' => $this->input->post('tlname'),
                          'tlemail' => $this->input->post('tlemail'),
                          'tlphone' => $this->input->post('tlphone'),
                          'tlyear' => $this->input->post('tlyear'),
                          'abstract' => $this->input->post('abstract'),
                          'member_one' => $this->input->post('member_one'),
                          'member_two' => $this->input->post('member_two'),
                          'member_three' => $this->input->post('member_three'),
                          );
                        $this->report_model->registration_innovate4tkm($data);
                        $this->session->set_flashdata('success', 'Registration successful! ');
                        redirect(base_url() . "innovate4tkm");
                      }
                  }
              }
      }

}
