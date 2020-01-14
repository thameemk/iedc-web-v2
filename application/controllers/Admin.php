<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
   function __construct() {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->model('admin_model');
      $this->load->helper(array('form', 'url'));
      $this->load->model('user_model');
  		$this->load->library('googleplus');
        if(!$this->session->userdata('sess_logged_in')==1 OR !$this->user_model->is_available($this->session->email) == TRUE OR !$this->admin_model->is_admin($this->session->email) == TRUE){
            echo "You are not authorized . Contact Web Admin !!!!<br><br>";
            $url = base_url('auth/logout');
            echo "<a href=\"$url\">Return To Home</a>";exit;
        }
    }

    public function dynamic_admin($admin){
      if ( ! file_exists(APPPATH.'views/dashboard/dynamic_admin/'.$admin.'.php')){
          show_404();
      }
      $data['admin'] = $this->admin_model->is_admin($this->session->email);
      $data['users_ai_ml']=$this->admin_model->get_ai_ml_users();
      $data['userinfo']=$this->user_model->get_user_single($this->session->email);
      $data['profile_pic'] = $this->session->profile_pic;
      $data['link'] = $this->session->link;
      $data['loginURL'] = $this->googleplus->loginURL();
      $this->load->view('dashboard/sidebar',$data);
      $this->load->view('dashboard/header',$data);
      $this->load->view('dashboard/dynamic_admin/'.$admin,$data);
      $this->load->view('dashboard/footer',$data);
    }

    public function ai_ml_paid(){
      $email = $this->input->post('email');
      $paid_email = $this->session->email;
      $this->admin_model->payment_verify_ai_ml($email,$paid_email);
      redirect('admin/dashboard/ai-ml');
    }

    public function add_user(){
      $data = $this->input->post();
      $data = $this->security->xss_clean($data);
      $this->form_validation->set_rules('email','User Email','required|is_unique[userRegister.email]');
      if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('fail', 'You have already registred');
        redirect('admin/dashboard/add-user');
      }
      else{
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('fail', 'Fill all fields');
            redirect('admin/dashboard/add-user');
        }
        else{
          $data = array(
            'email' => $this->input->post('email'),
            'user_hash' => password_hash($this->input->post('password'),PASSWORD_BCRYPT)
            );
            $this->admin_model->add_user($data);
            $this->session->set_flashdata('success', 'Success!');
            redirect('admin/dashboard/add-user');
        }
      }
    }

}
