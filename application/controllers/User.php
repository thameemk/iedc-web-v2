<?php
class User extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('user_model');
    $this->load->model('admin_model');
    $this->load->library('googleplus');
    if (!$this->session->userdata('sess_logged_in') == 1 or !$this->user_model->is_available($this->session->email) == TRUE) {
      echo "You are not authorized . Contact Web Admin !!!!<br><br>";
      $url = base_url('auth/logout');
      echo "<a href=\"$url\">Return To Home</a>";
      exit;
    }
  }

  public function complete()
  {
    if ($this->user_model->is_profile_completed($this->session->email) == TRUE) {
      redirect(base_url("user/dashboard"));
    } else {
      $data['title'] = ucfirst('Complete Profile');
      $this->load->view('dashboard/complete', $data);
      $user = $this->input->post();
      $user = $this->security->xss_clean($user);
      $this->form_validation->set_rules('branch', 'Branch', 'required');
      $this->form_validation->set_rules('phone', 'Phone', 'required');
      $this->form_validation->set_rules('fullname', 'Full Name', 'required');
      $this->form_validation->set_rules('course_duration_from', 'Course Duration ', 'required');
      $this->form_validation->set_rules('course_duration_to', 'Course Duration To ', 'required');
      if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('fail', 'Fill all required fields.<br>OR<br> Check your Access code !!');
      } else {
        if ($this->user_model->check_access($this->session->email, $this->input->post('access_code')) == TRUE) {
          $user = array(
            'branch' => $this->input->post('branch'),
            'phone' => $this->input->post('phone'),
            'fullname' => $this->input->post('fullname'),
            'course_duration_from' => $this->input->post('course_duration_from'),
            'course_duration_to' => $this->input->post('course_duration_to'),
            'admission_number' => $this->input->post('admission_number'),
            'whyiedc' =>  $this->input->post('whyiedc'),
            'profile_completed' => '1'
          );
          $this->user_model->complete_signin($user);
          $this->session->set_flashdata('success', 'Your registration is Successfull!!');
          redirect(base_url("user/dashboard"));
        } else {
          $this->session->set_flashdata('fail', 'Fill all required fields.<br>OR<br> Check your Access code !!');
        }
      }
    }
  }

  public function dashboard()
  {
    if (isset($_SESSION['email'])) {
      $data['admin'] = $this->admin_model->is_admin($this->session->email);
      $data['userinfo'] = $this->user_model->get_user_single($this->session->email);
      $data['profile_pic'] = $this->session->profile_pic;
      $data['link'] = $this->session->link;
      $data['loginURL'] = $this->googleplus->loginURL();
      $data['get_maker_items'] = $this->user_model->get_maker_items();
      if ($this->user_model->is_profile_completed($this->session->email) == TRUE) {
        $this->load->view('dashboard/sidebar', $data);
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/home', $data);
        $this->load->view('dashboard/footer', $data);
      } else {
        $data['title'] = ucfirst('Complete Profile');
        $this->load->view('dashboard/complete', $data);
      }
    } else {
      // set the expiration date to one hour ago
      setcookie("redir", "", time() + 3600);
      $data['loginURL'] = $this->googleplus->loginURL();
      header('Location: ' . $data['loginURL']);
      exit('');
    }
  }

  public function dynamic_user($user)
  {
    if (!file_exists(APPPATH . 'views/dashboard/dynamic_user/' . $user . '.php')) {
      show_404();
    }
    $data['admin'] = $this->admin_model->is_admin($this->session->email);
    $data['maker_user_req'] = $this->user_model->maker_user_req($this->session->email);
    $data['userinfo'] = $this->user_model->get_user_single($this->session->email);
    $data['profile_pic'] = $this->session->profile_pic;
    $data['link'] = $this->session->link;
    $data['loginURL'] = $this->googleplus->loginURL();
    $data['get_maker_items'] = $this->user_model->get_maker_items();
    $this->load->view('dashboard/sidebar', $data);
    $this->load->view('dashboard/header', $data);
    $this->load->view('dashboard/dynamic_user/' . $user, $data);
    $this->load->view('dashboard/footer', $data);
  }

  public function maker_request()
  {
    $data = $this->input->post();
    $data = $this->security->xss_clean($data);
    date_default_timezone_set('Asia/Kolkata');
    $data = array(
      'user_email' => $this->session->email,
      'req_component' => $this->input->post('comp_num'),
      'req_date' => date('d-m-Y H:i')
    );
    $this->user_model->change_count_lib($this->input->post('comp_num'));
    $this->user_model->add_maker_request($data);
    $this->session->set_flashdata('success', 'Success! Contact IEDC officials to get the component');
    redirect('user/dashboard/maker-library');
  }

  public function schedule_meeting_post()
  {
    $status = $this->user_model->reg_schedule_meeting();
    if ($status == true) {
      $this->session->set_flashdata('success', 'Success! Contact IEDC officials to know more');
      redirect('user/dashboard/schedule-meeting');
    } elseif ($status == false) {
      $this->session->set_flashdata('fail', 'Fill all fields!!');
      redirect('user/dashboard/schedule-meeting');
    } else {
      $this->session->set_flashdata('fail', 'Some error has been occurred. Please try again later!!');
      redirect('user/dashboard/schedule-meeting');
    }
  }

  public function project_proposal_post()
  {
    $status = $this->user_model->reg_project_proposal();
    if ($status == true) {
      $this->session->set_flashdata('success', 'Success! Contact IEDC officials to know more');
      redirect('user/dashboard/project-proposal');
    } elseif ($status == false) {
      $this->session->set_flashdata('fail', 'Fill all fields!!');
      redirect('user/dashboard/project-proposal');
    } else {
      $this->session->set_flashdata('fail', 'Some error has been occurred. Please try again later!!');
      redirect('user/dashboard/project-proposal');
    }
  }
}
