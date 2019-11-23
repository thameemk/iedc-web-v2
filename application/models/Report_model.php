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

    public function execomInfo(){
       $query = $this->db->get('execom');
       return $query->result_array();
    }
    public function execomYear(){
       $query = $this->db->get('execomYear');
       return $query->result_array();
    }
    
    public function messages($data){
      $this->db->insert('contacts', $data);
    }
}
