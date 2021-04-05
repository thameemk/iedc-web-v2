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
        if ($user_type == 'super_admin' || $user_type == 'admin' || $user_type == 'iedc_member') {
            $user =  true;
        } else {
            $user = false;
        }

        if (!$this->session->userdata('sess_logged_in') == 1 || $user == FALSE) {
            // echo "You are not authorized . Join IEDC to access this page !!!!<br><br>";
            $data['login_url'] = $this->googleplus->loginURL();
            // echo "<a href=\"$login_url\">If you are alreay a member try login again !!</a><br><br>";
            $data['url'] = base_url('auth/logout');
            // echo "<a href=\"$url\">Return To Home</a>";
            redirect(base_url() . 'forbidden');
            exit;
        }
    }

    public function maker_request($comp_id)
    {
        $comp_id = $this->security->xss_clean($comp_id);
        date_default_timezone_set('Asia/Kolkata');
        $data = array(
            'user_email' => $this->session->email,
            'req_component' => $comp_id,
            'req_date' => date('d-m-Y H:i')
        );
        $this->user_model->change_count_lib($comp_id);
        $this->user_model->add_maker_request($data);    
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
