<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuperAdmin extends CI_Controller
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
        if ($user_type == 'super_admin') {
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

    function issue_cert()
    {
        $data = $this->security->xss_clean($this->input->post());
        if ($data['cet_status'] == 1) {

            $records = array(
                'is_cert_published' => 0,
            );
        } else {
            $records = array(
                'is_cert_published' => 1,
            );
        }
        $this->db->where('event_id', $data['event_id']);
        $this->db->update('events', $records);
        $this->session->set_flashdata('success', 'Certificate status updated successfully!!');
        redirect(base_url() . "admin/upload-certificate/" . $data['event_id']);
    }

    function upload_cert()
    {
        $data = $this->security->xss_clean($this->input->post());
        $eventDetails = $this->admin_model->get_event_details($data['event_id']);
        if ($eventDetails->is_cert_published == 1) {
            $this->session->set_flashdata('fail', 'Certificate already published');
        } else {
            $status = $this->upload_file->do_upload('assets/uploads/cert/', $_FILES["userfile"]['name']);           
            if ($status['status'] == true) {
                if ($data['cert_type'] == 0) {
                    $temp = array(
                        'cert_file_0' => $status['file_name'],
                    );
                } else if ($data['cert_type'] == 1) {
                    $temp = array(
                        'cert_file_1' => $status['file_name'],
                    );
                }
                $this->db->where('event_id', $data['event_id']);
                $this->db->update('events', $temp);

                $this->session->set_flashdata('success', $status['message']);
            } else {
                $this->session->set_flashdata('fail', $status['message']['error']);
            }
        }
        redirect(base_url() . "admin/upload-certificate/" . $data['event_id']);
    }

    function update_cert_position()
    {
        $data = $this->security->xss_clean($this->input->post());
        $this->admin_model->update_certificate_position($data);
    }
}
