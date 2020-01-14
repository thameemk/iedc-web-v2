<?php
class Admin_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function is_admin($email){
       $query = $this->db->get_where('admin_users',"email='$email'" );
       if ( $query->num_rows() == 1) {
         return TRUE;
       }
         return FALSE;
    }

    public function get_ai_ml_users(){
      $query = $this->db->get('users_ai_ml');
      return $query->result_array();
    }

    public function payment_verify_ai_ml($email,$paid_email){
     $this->db->where('email',$email);
     $temp = array('is_paid' => '1',
                   'paid_email' => $paid_email);
     $query = $this->db->update('users_ai_ml',$temp);
    }

    public function add_user($data){
      $this->db->insert('userRegister', $data);
    }

}
