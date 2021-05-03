<?php
class Report_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function ecellInfo($companyType)
    {
        $this->db->select('companyHead,imageLink,companyData');
        $query = $this->db->get_where('eCell', array('companyType' => $companyType));
        return $query->result_array();
    }

    public function upcomingEvents()
    {
        $query = $this->db->get('events');
        return $query->result_array();
    }

    public function execomInfo()
    {
        $query = $this->db->get('execom');
        return $query->result_array();
    }
    public function execomYear()
    {
        $query = $this->db->get('execomYear');
        return $query->result_array();
    }
    public function podcast_series()
    {
        $query = $this->db->get('dare2develop');
        return $query->result_array();
    }
    public function web_team_info()
    {
        $query = $this->db->get('web_team');
        return $query->result_array();
    }
    public function webYear()
    {
        $query = $this->db->get('web_team_years');
        return $query->result_array();
    }

    public function messages($data)
    {
        $this->db->insert('contacts', $data);
    }
    public function registration_innovate4tkm($data)
    {
        $this->db->insert('users_innovate_4_tkm', $data);
    }
    public function registration_ai_ml($data)
    {
        $this->db->insert('users_ai_ml', $data);
    }
    
    public function new_user_registration($data)
    {
        $this->db->insert('member_registration20', $data);
        return 201;
    }
    
    public function start_up_registration($data)
    {
        $this->db->insert('startup_call_2020', $data);
        return 201;
    }

    public function execom_reg($data)
    {
        $configss['allowed_types'] = 'pdf';
        $configss['max_filename'] = '255';
        $configss['overwrite'] = TRUE;
        $configss['max_size'] = '10240';
        $configss['upload_path'] = 'assets/uploads/execom_reg/';
        $temp = $_FILES["coverletter"]['name'];
        $file_name = $data['phone'].".".pathinfo($temp,PATHINFO_EXTENSION);
        $configss['file_name'] = $file_name;    
        $this->load->library('upload', $configss);
        if (!$this->upload->do_upload('coverletter')) {
            $error = array('error' => $this->upload->display_errors());
            // print_r($error);exit;
            $this->session->set_flashdata('fail', 'Some error while uploading file / Check your file type. !!');
            redirect(base_url() . "application-for-excom-20-21");
        } else {
            $url = base_url("assets/uploads/execom_reg/");
            $data['coverletter'] = $url.$file_name;
            $this->db->insert('execom_reg', $data);
            return 201;
        }
    }

    public function google_recaptcha($recaptcha){
        $recaptchaResponse = trim($recaptcha);    
        $secret = '';
        $credential = array(
            'secret' => $secret,
            'response' => $recaptcha
        );
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        return $response;
    }

    function get_event_details($event_link)
    {
        $event_link = $this->security->xss_clean($event_link);
        $this->db->where('event_link', $event_link);
        $query = $this->db->get('events');
        return $query->row();
    }

    function get_cert_details($cert_no)
    {
        $query = $this->db->query('select er.cert_num,e.event_title,u.fullname,u.college from events_registration er, events e, userRegister u where er.reg_email=u.email and er.event_id=e.event_id and er.cert_num="'.$cert_no.'"');
        return  json_encode($query->row());
    }
}