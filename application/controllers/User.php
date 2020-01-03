<?php
class User extends CI_Controller {

    function __construct() {
    parent::__construct();
		$this->load->model('user_model');
		$this->load->library('googleplus');
    }

    public function complete(){
      if($this->session->userdata('sess_logged_in')==1){
          if($this->user_model->is_profile_completed($this->session->email) == TRUE) {
                redirect(base_url("user/dashboard"));
          }
          else{
              $data['title'] = ucfirst('Complete Profile');
              $this->load->view('dashboard/complete',$data);
              $user = $this->input->post();
              $user = $this->security->xss_clean($user);
              $this->form_validation->set_rules('branch','Branch','required');
              $this->form_validation->set_rules('phone','Phone','required');
              $this->form_validation->set_rules('fullname','Full Name','required');
              $this->form_validation->set_rules('course_duration_from','Course Duration ','required');
              $this->form_validation->set_rules('course_duration_to','Course Duration To ','required');      
              if($this->form_validation->run() == FALSE){
                  $this->session->set_flashdata('fail', 'Fill all fields! ');
              }else{
                  if($this->user_model->check_access($this->session->email,$this->input->post('access_code')) == TRUE){
                      $user['branch'] = $this->input->post('branch');
                      $user['phone'] = $this->input->post('phone');
                      $user['fullname'] = $this->input->post('fullname');
                      $user['course_duration_from'] = $this->input->post('course_duration_from');
                      $user['course_duration_to'] = $this->input->post('course_duration_to');
                      $user['whyiedc'] = $this->input->post('whyiedc');
                      echo "true";
                  }
                  else{
                    $this->session->set_flashdata('fail', 'You are not authorized to access.<br> Wrong Access code !!');
                  }
              }
          }
      }
      else{
          echo "Never think you are smart";
      }
    }

}
