<?php
class User_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_user_single($email){
      $this->db->select('*');
      $this->db->from('userRegister');
      $this->db->where('email', $email);
      $query=$this->db->get();
      return $query->result_array();
    }

    public function is_available($email){
       $query = $this->db->get_where('userRegister',"email='$email'" );
       if ( $query->num_rows() == 1) {
         return TRUE;
       }
         return FALSE;
    }

    public function is_profile_completed($email){
      $query = $this->db->get_where('userRegister',"email='$email'" )->row()->profile_completed;
      if($query==1){
        return TRUE;
      }
      return FALSE;
    }

    public function check_access($email,$access_code){
       $this->db->where('email',$email);
       $query=$this->db->get('userRegister');
       $num_rows=$query->num_rows();
       if($num_rows == 1){
            $row = $query->row();
            if (password_verify($access_code, $row->user_hash)) {
                $data = array(
                    'email' => $row->email,
                    'validated' => TRUE
                );
                return TRUE;
            } else {
                return FALSE;
            }
            return TRUE;
        }
        return FALSE;
     }

     public function complete_signin($data){
       $data['google_user_name'] = $this->session->name;
       $this->db->where('email', $this->session->email);
       $this->db->update('userRegister', $data);
     }

     public function get_maker_items(){
       $query = $this->db->get('maker_library');
       return $query->result_array();
     }

     public function add_maker_request($data){
      $this->db->insert('maker_lib_requests', $data);    
     }

     public function change_count_lib($data){   
      $this->db->select ( 'available_count' );  
      $this->db->from('maker_library');
      $this->db->where('comp_num', $data);
      $query = $this->db->get();
      $num = $query->result_array();
      $total_count = $num[0]['available_count'] - 1;      
      $this->user_model->update_count($total_count,$data);      
     }
     public function update_count($total_count,$data){
       $this->db->where('comp_num', $data);
       $temp = array(
        'available_count' => $total_count
       );
       $this->db->update('maker_library', $temp);              
     }

}
