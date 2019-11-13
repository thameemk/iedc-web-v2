<?php
class Report_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function ecellInfo($companyType){
        $this->db->select('companyHead,imageLink,companyData');
        $query = $this->db->get_where('eCell',array('companyType' => $companyType));
        return $query->result_array();
    }

    public function upcomingEvents(){
        $query = $this->db->get('upcomingEvents');
        return $query->result_array();
    }

    public function execomInfo($execomYear){
       $query = $this->db->get_where('execom',array('year' => $execomYear));
       return $query->result_array();
    }

}
