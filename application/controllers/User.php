<?php
class User extends CI_Controller {

    function __construct() {
    parent::__construct();
		$this->load->model('user_model');
		$this->load->library('googleplus');
      if(!$this->session->userdata('sess_logged_in')==1 OR !$this->user_model->is_available($this->session->email) == TRUE){
          echo "You are not authorized . Wrong Access code !!!!<br><br>";
          $url = base_url('auth/logout');
          echo "<a href=\"$url\">Return To Home</a>";exit;
      }
    }

    public function complete(){
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
                      $user = array(
                        'branch' => $this->input->post('branch'),
                        'phone' => $this->input->post('phone'),
                        'fullname' => $this->input->post('fullname'),
                        'course_duration_from' => $this->input->post('course_duration_from'),
                        'course_duration_to' => $this->input->post('course_duration_to'),
                        'whyiedc' =>  $this->input->post('whyiedc'),
                        'profile_completed' => '1'
                      );
                      $this->user_model->complete_signin($user);
                      $this->session->set_flashdata('success', 'Your registration is Successfull!!');
                      redirect(base_url("user/dashboard"));
                  }
                  else{
                    $this->session->set_flashdata('fail', 'You are not authorized.<br> Wrong Access code !!');
                  }
              }
          }
    }

    public function dashboard(){
      if(isset($_SESSION['email'])){
          $data['userinfo']=$this->user_model->get_user_single($this->session->email);
          $data['profile_pic'] = $this->session->profile_pic;
          $data['link'] = $this->session->link;
          $data['loginURL'] = $this->googleplus->loginURL();
          if($this->user_model->is_profile_completed($this->session->email) == TRUE){
            $this->load->view('dashboard/sidebar',$data);
            $this->load->view('dashboard/header',$data);
            $this->load->view('dashboard/home',$data);
            $this->load->view('dashboard/footer',$data);
          }
          else{
            $data['title'] = ucfirst('Complete Profile');
            $this->load->view('dashboard/complete',$data);
          }
      }
      else{
        // set the expiration date to one hour ago
        setcookie("redir", "", time() + 3600);
        $data['loginURL']=$this->googleplus->loginURL();
        header('Location: '.$data['loginURL']);
        exit('');
      }

    }

}
