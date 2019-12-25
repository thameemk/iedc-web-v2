<?php
class Profile extends CI_Controller {

    function __construct() {
    parent::__construct();
		$this->load->model('user_model');
		$this->load->library('googleplus');
    }

    public function complete(){
      $session_data['profileData'] = $this->session->userdata('userProfile');
      echo var_dump($profileData);
      // echo $profileData['email'];exit;
      echo $this->session->email;exit;

      if($this->user_model->is_registered($this->session->email,"Y") == TRUE OR $this->session->email == NULL) {
            redirect(base_url());
        }
        $data['title'] = ucfirst('Complete Profile');
        $this->load->view('dashboard/complete',$data);
          if( $this->input->post('branch') != NULL && $this->input->post('phone') != NULL ){
              $user['branch'] = $this->input->post('branch');
              $user['phone'] = $this->input->post('phone');
              $user['fullname'] = $this->input->post('fullname');
              echo $this->session->email;exit;
              $user['course_duration_from'] = $this->input->post('course_duration_from');
              $user['course_duration_to'] = $this->input->post('course_duration_to');
              $this->user_model->complete_signin($user);
              if(isset($_SESSION['back_url']) && strpos($_SESSION['back_url'], 'ico') == false){
                  $link=$_SESSION['back_url'];
                  unset($_SESSION['back_url']);
                  redirect($link);
              }else{
                  redirect(base_url("myprofile"));
              }

          }
    }


}
