<?php
class Logs extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    function get_client_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    function auth($data)
    {
        $data = $this->security->xss_clean($data);
        $log = array(
            'email' => $data['email'],
            'name' => $data['name'],
            'user_type' => $data['user_type'],
            'user_ip' => $this->get_client_ip()
        );
        $this->db->insert('logs_auth', $log);
    }

    function certificate($event_id, $email)
    {
        $event_id = $this->security->xss_clean($event_id);
        $email = $this->security->xss_clean($email);

        $log = array(
            'email' => $email,
            'event_id' => $event_id,
            'user_ip' => $this->get_client_ip()
        );
        $this->db->insert('logs_cert', $log);
    }
}
