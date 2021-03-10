<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('admin_model');
    $this->load->helper(array('form', 'url'));
    $this->load->model('user_model');
    $this->load->library('googleplus');
    if (!$this->session->userdata('sess_logged_in') == 1 or !$this->user_model->is_available($this->session->email) == TRUE or !$this->admin_model->is_admin($this->session->email) == TRUE) {
      echo "You are not authorized . Contact Web Admin !!!!<br><br>";
      $url = base_url('auth/logout');
      echo "<a href=\"$url\">Return To Home</a>";
      exit;
    }
  }

  public function dynamic_admin($admin)
  {
    if (!file_exists(APPPATH . 'views/dashboard/dynamic_admin/' . $admin . '.php')) {
      show_404();
    }
    $data['maker_components'] =  $this->admin_model->get_all_maker_components();
    $data['server_access']  =  $this->admin_model->get_server_access_requests();
    $data['new_members'] = $this->admin_model->get_all_new_membership_reg();
    $data['project_proposals'] = $this->admin_model->get_all_project_proposals();
    $data['maker_req'] = $this->admin_model->get_all_maker_requests();
    $data['admin'] = $this->admin_model->is_admin($this->session->email);
    $data['users_ai_ml'] = $this->admin_model->get_ai_ml_users();
    $data['users_innovate'] = $this->admin_model->get_innovate_users();
    $data['userinfo'] = $this->user_model->get_user_single($this->session->email);
    $data['profile_pic'] = $this->session->profile_pic;
    $data['link'] = $this->session->link;
    $data['loginURL'] = $this->googleplus->loginURL();
    $data['execom_reg'] = $this->admin_model->get_execom_reg();
    $this->load->view('dashboard/sidebar', $data);
    $this->load->view('dashboard/header', $data);
    $this->load->view('dashboard/dynamic_admin/' . $admin, $data);
    $this->load->view('dashboard/footer', $data);
  }

  public function ai_ml_paid()
  {
    $email = $this->input->post('email');
    $paid_email = $this->session->email;
    $this->admin_model->payment_verify_ai_ml($email, $paid_email);
    redirect('admin/dashboard/ai-ml');
  }

  public function add_user()
  {
    $data = $this->input->post();
    $data = $this->security->xss_clean($data);
    if ($this->admin_model->is_super_admin($this->session->email) == TRUE) {
      $this->form_validation->set_rules('email', 'User Email', 'required|is_unique[userRegister.email]');
      if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('fail', 'Already registred');
        redirect('admin/dashboard/add-user');
      } else {
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
          $this->session->set_flashdata('fail', 'Fill all fields');
          redirect('admin/dashboard/add-user');
        } else {
          $data = array(
            'email' => $this->input->post('email'),
            'user_hash' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'added_user' => $this->session->email
          );
          $this->admin_model->add_user($data);
          $this->session->set_flashdata('success', 'Success!');
          redirect('admin/dashboard/add-user');
        }
      }
    } else {
      $this->session->set_flashdata('fail', 'You are not authorized. Please contact Web Admin');
      redirect('admin/dashboard/add-user');
    }
  }

  public function issue_component()
  {

    $data = $this->input->post();
    $data = $this->security->xss_clean($data);
    date_default_timezone_set('Asia/Kolkata');
    $issue_date = date('d-m-Y H:i');
    $data = array(
      'issue_date' => $issue_date,
      'issued_admin' => $this->session->email
    );
    $this->admin_model->issue_maker_component($data);
    $this->session->set_flashdata('success', 'Success! You have issued maker library component');
    redirect('admin/dashboard/maker-library-requests');
  }

  public function mark_as_return_component()
  {
    $data = $this->input->post();
    $data = $this->security->xss_clean($data);
    date_default_timezone_set('Asia/Kolkata');
    $return_date = date('d-m-Y H:i');
    $data = array(
      'return_date' => $return_date,
      'issued_admin' => $this->session->email
    );
    // print_r($data);exit;

    $this->admin_model->change_count_lib_admin($this->input->post('req_component'));
    $this->admin_model->return_maker_component($data);
    $this->session->set_flashdata('success', 'Successfully marked as user returned maker library component');
    redirect('admin/dashboard/maker-library-requests');
  }

  public function add_component()
  {
    $this->admin_model->save_component();
  }

  public function add_bulk_user()
  {
    $query = $this->db->get('member_registration20');
    $users = $query->result_array();
    // print_r($users);exit;
    foreach ($users as $row) {
      $data['email'] = $row['email'];
      $data['user_hash'] = password_hash($row['email'], PASSWORD_BCRYPT);
      $email = $row['email'];
      $query1 = $this->db->get_where('userRegister', "email='$email'");
      $temp = $query1->num_rows();
      if ($temp != TRUE) {
        $this->db->insert('userRegister', $data);
        echo "Success<br>";
      } else {
        echo "Error/Duplicate<br>";
      }
    }
  }

  function GetProjectTeamDetails($project_id)
  {
    echo $this->admin_model->get_project_team_details($project_id);
  }

  function GetProjectSummary($project_id)
  {
    echo $this->admin_model->get_project_summary($project_id);
  }
  
  function getProjectRequirements($project_id)
  {
    echo $this->admin_model->get_project_requirements($project_id);
  }
  function add_volunteer_post()
  {
    $this->admin_model->add_volunteer();
  }
  
  
  
  function updateComponent()
  {
    $data = $this->input->post();
    $data = $this->security->xss_clean($data);
    $status = $this->admin_model->updateMakerComponent($data);
    if($status==true)
    {
      $this->session->set_flashdata('success', 'Component updated');
      redirect('admin/dashboard/edit-maker-library');
    }
    else{
      $this->session->set_flashdata('fail', 'Component update failed');
      redirect('admin/dashboard/edit-maker-library');
    }
  }
  
  function verify_membership_reg($reg_id)
  {
    $reg_id = $this->security->xss_clean($reg_id);
    $this->admin_model->verify_membership_registration($reg_id);
  }
}
