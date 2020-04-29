<?php

class Contact extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url','form');
	}

	public function postmessage(){

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
      redirect(base_url() . "contact");
    }
		else {

				$this->load->model('report_model');
				$data = $this->input->post();
				$data = $this->security->xss_clean($data);
		    $this->form_validation->set_rules('email','Email','required');
		    $this->form_validation->set_rules('name','Name','required');
		    $this->form_validation->set_rules('subject','subject','required');
		    $this->form_validation->set_rules('message','Message','required');
		    if($this->form_validation->run() == FALSE){
		               $this->session->set_flashdata('fail', 'Fill all fields! ');
		               redirect(base_url() . "contact");
		      }
		    else {
		      	  $data = array(
		      		  'name' => $this->input->post('name'),
		      	    'email' => $this->input->post('email'),
		      	    'subject' => $this->input->post('subject'),
		      	    'message' => $this->input->post('message'),
		      	    );
		      		$this->report_model->messages($data);
		      		$config = array();
		      		$config['smtp_user'] = 'no-reply@iedctkmce.com';
		      		$this->load->library('email',$config);
		      		$this->email->set_newline("\r\n");
		      		$this->email->from($data['email'],$data['name']);
		      		$this->email->to('info@iedctkmce.com');
		      		$this->email->subject($data['subject']);
		      		$this->email->message($data['message']);
		           // echo $this->email->print_debugger();
		      		if($this->email->send()){
		      			$this->session->set_flashdata('success', 'Email Sent Successfully!');
		      			redirect(base_url() . "contact");
		            }
		          else{
		            $this->session->set_flashdata('fail', 'Email not Sent!');
		            redirect(base_url() . "contact");
		            }
		          }
			}
	}
}
