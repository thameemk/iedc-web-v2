<?php
class User_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function is_registered($email,$isnotnull="Y"){
        if($isnotnull=="Y"){
            $query = $this->db->get_where('userRegister',"email='$email' and (phone is not null and branch is not null)" );

        }else{
            $query = $this->db->get_where('userRegister',"email='$email'" );

        }
        if( $query->num_rows() == 1 ){
            return TRUE;
        }
        return FALSE;
    }

    public function complete_signin($data){
        $data['google_user_name'] = $this->session->name;
        if($this->is_registered($this->session->email,"N")==FALSE){
            $data['email'] = $this->session->email;
            $data['hashcode'] =password_hash($data['email'],PASSWORD_BCRYPT);
            // $this->create($data);
            foreach ($data as $row) {
              echo $row;
              echo "<br>";
            }
            exit;
        }
        else{
            $this->modify($this->session->email,$data);
        }
    }

}
