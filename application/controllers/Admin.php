<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin_model');
        $this->load->model('upload_file');
        $this->load->helper(array('form', 'url'));
        $this->load->model('user_model');
        $this->load->library('googleplus');
        $user_type = $this->admin_model->getusertype($this->session->email);
        if ($user_type == 'super_admin' || $user_type == 'admin') {
            $user =  true;
        } else {
            $user = false;
        }
        if (!$this->session->userdata('sess_logged_in') == 1 or $user == false) {
            echo "You are not authorized . Contact Web Admin !!!!<br><br>";
            $login_url = $this->googleplus->loginURL();
            echo "<a href=\"$login_url\">Please login again !!</a><br><br>";
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
        $data['allevents'] = $this->admin_model->get_all_events();
        $data['schedule_meeting']  =  $this->admin_model->get_schedule_meeting_requests();
        $data['pre_incubation'] =  $this->admin_model->get_pre_incubation_requests();
        $data['maker_components'] =  $this->admin_model->get_all_maker_components();
        $data['server_access']  =  $this->admin_model->get_server_access_requests();
        $data['new_members'] = $this->admin_model->get_all_new_membership_reg();
        $data['project_proposals'] = $this->admin_model->get_all_project_proposals();
        $data['maker_req'] = $this->admin_model->get_all_maker_requests();
        $data['user_type'] = $this->admin_model->getusertype($this->session->email);
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
        if ($status == true) {
            $this->session->set_flashdata('success', 'Component updated');
            redirect('admin/dashboard/edit-maker-library');
        } else {
            $this->session->set_flashdata('fail', 'Component update failed');
            redirect('admin/dashboard/edit-maker-library');
        }
    }

    function verify_membership_reg($reg_id)
    {
        $reg_id = $this->security->xss_clean($reg_id);
        $this->admin_model->verify_membership_registration($reg_id);
    }

    function download_incubation_data()
    {
        $data = $this->input->post();
        $data = $this->security->xss_clean($data);
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $reg_id = $data['reg_id'];
        $query = $this->db->query("SELECT * FROM pre_incubation where reg_id='$reg_id'");
        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
        force_download('Incubation_details_' . $reg_id . '.csv', $data);
        redirect('admin/dashboard/pre-incubation');
    }

    function download_incubation_team_details()
    {
        $data = $this->input->post();
        $data = $this->security->xss_clean($data);
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $reg_id = $data['reg_id'];
        $query = $this->db->query("SELECT * FROM pre_incubation_team_members where incubation_reg_id='$reg_id'");
        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
        force_download('Incubation_team_details' . $reg_id . '.csv', $data);
        redirect('admin/dashboard/pre-incubation');
    }

    // Mark attendence for the events
    function mark_as_present($participant_id)
    {
        $participant_id = $this->security->xss_clean($participant_id);
        $this->admin_model->mark_attendence($participant_id, 1);
    }
    function mark_as_absent($participant_id)
    {
        $participant_id = $this->security->xss_clean($participant_id);
        $this->admin_model->mark_attendence($participant_id, 0);
    }

    
    function dynamic_admin_2($page,$event_id)
    {
        $data['eventDetails'] = $this->admin_model->get_event_details($event_id);
        $data['user_type'] = $this->admin_model->getusertype($this->session->email);
        $data['userinfo'] = $this->user_model->get_user_single($this->session->email);
        $data['profile_pic'] = $this->session->profile_pic;
        $data['link'] = $this->session->link;
        $data['loginURL'] = $this->googleplus->loginURL();
        $data['eventDetails'] = $this->admin_model->get_event_details($event_id);
        $data['participants'] = $this->admin_model->get_participants($event_id);
        $this->load->view('dashboard/sidebar', $data);
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/dynamic_admin/'.$page, $data);
        $this->load->view('dashboard/footer', $data);
    }
    
}
