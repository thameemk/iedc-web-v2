<?php
class Member extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->library('googleplus');
        $user_type = $this->admin_model->getusertype($this->session->email);
        if($user_type == 'super_admin' || $user_type == 'admin' || $user_type == 'iedc_member')
        {
            $user =  true;
        }
        else
        {
            $user = false;
        }
    
        if (!$this->session->userdata('sess_logged_in') == 1 || $user == FALSE) {
            // echo "You are not authorized . Join IEDC to access this page !!!!<br><br>";
            $data['login_url'] = $this->googleplus->loginURL();
            // echo "<a href=\"$login_url\">If you are alreay a member try login again !!</a><br><br>";
            $data['url'] = base_url('auth/logout');
            // echo "<a href=\"$url\">Return To Home</a>";
            redirect(base_url().'forbidden');
            exit;
        }
    }
    
    public function dynamic_member($member)
    {
        if (!file_exists(APPPATH . 'views/dashboard/dynamic_member/' . $member . '.php')) {
            show_404();
        }
        $data['admin'] = $this->admin_model->getusertype($this->session->email);
        $data['maker_user_req'] = $this->user_model->maker_user_req($this->session->email);
        $data['userinfo'] = $this->user_model->get_user_single($this->session->email);
        $data['profile_pic'] = $this->session->profile_pic;
        $data['link'] = $this->session->link;
        $data['loginURL'] = $this->googleplus->loginURL();
        $data['get_maker_items'] = $this->user_model->get_maker_items();
        $this->load->view('dashboard/sidebar', $data);
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/dynamic_member/' . $member, $data);
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


    public function server_accsess_post()
    {
        $status = $this->user_model->reg_for_server_accsess();
        if ($status == true) {
            $this->session->set_flashdata('success', 'Success! Contact IEDC officials to know more');
            redirect('user/dashboard/server-access');
        } elseif ($status == false) {
            $this->session->set_flashdata('fail', 'Fill all fields!!');
            redirect('user/dashboard/server-access');
        } else {
            $this->session->set_flashdata('fail', 'Some error has been occurred. Please try again later!!');
            redirect('user/dashboard/server-access');
        }
    }


    public function pre_incubation_app_post()
    {
        $status = $this->user_model->pre_incubation_reg();
          if ($status == true) {
              $this->session->set_flashdata('success', 'Success! Contact IEDC officials to know more');
              redirect('user/dashboard/incubation-application');
          } elseif ($status == false) {
              $this->session->set_flashdata('fail', 'Fill all fields!!');
              redirect('user/dashboard/incubation-application');
          } else {
              $this->session->set_flashdata('fail', 'Some error has been occurred. Please try again later!!');
              redirect('user/dashboard/incubation-application');
          }
      }
}