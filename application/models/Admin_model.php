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
    public function get_innovate_users(){
      $query = $this->db->get('users_innovate_4_tkm');
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

    public function get_all_maker_requests(){
      $query = $this->db->query("select u.fullname,u.branch,u.course_duration_from,u.course_duration_to,u.phone,m.user_email,m.req_date,m.issue_date,m.return_date,m.issued_admin,m.req_component,c.name from maker_lib_requests m,maker_library c,userRegister u where m.user_email = u.email and c.comp_num = m.req_component order by issue_date ASC");
      return  $query->result_array();
    }

    public function issue_maker_component($data){
      $this->db->where('user_email',$this->input->post('user_email'));
      $this->db->where('req_component',$this->input->post('req_component'));
      $this->db->where('req_date',$this->input->post('req_date'));
      $query = $this->db->update('maker_lib_requests',$data);
    }

    public function change_count_lib_admin($data){   
      $this->db->select ( 'available_count' );  
      $this->db->from('maker_library');
      $this->db->where('comp_num', $data);
      $query = $this->db->get();
      $num = $query->result_array();
      $total_count = $num[0]['available_count'] + 1; 
      $this->admin_model->update_count_admin($total_count,$data);      
     }

     public function update_count_admin($total_count,$data){
       $this->db->where('comp_num', $data);
       $temp = array(
        'available_count' => $total_count
       );
       $this->db->update('maker_library', $temp);
     }

     public function return_maker_component($data){
      $this->db->where('user_email',$this->input->post('user_email'));
      $this->db->where('req_component',$this->input->post('req_component'));
      $this->db->where('issue_date',$this->input->post('issue_date'));
      $query = $this->db->update('maker_lib_requests',$data);
     }

}
