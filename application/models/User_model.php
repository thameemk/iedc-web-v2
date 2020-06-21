<?php
class User_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_user_single($email)
  {
    $this->db->select('*');
    $this->db->from('userRegister');
    $this->db->where('email', $email);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function is_available($email)
  {
    $query = $this->db->get_where('userRegister', "email='$email'");
    if ($query->num_rows() == 1) {
      return TRUE;
    }
    return FALSE;
  }

  public function is_profile_completed($email)
  {
    $query = $this->db->get_where('userRegister', "email='$email'")->row()->profile_completed;
    if ($query == 1) {
      return TRUE;
    }
    return FALSE;
  }

  public function check_access($email, $access_code)
  {
    $this->db->where('email', $email);
    $query = $this->db->get('userRegister');
    $num_rows = $query->num_rows();
    if ($num_rows == 1) {
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

  public function complete_signin($data)
  {
    $data['google_user_name'] = $this->session->name;
    $this->db->where('email', $this->session->email);
    $this->db->update('userRegister', $data);
  }

  public function get_maker_items()
  {
    $query = $this->db->get('maker_library');
    return $query->result_array();
  }

  public function add_maker_request($data)
  {
    $this->db->insert('maker_lib_requests', $data);
  }

  public function change_count_lib($data)
  {
    $this->db->select('available_count');
    $this->db->from('maker_library');
    $this->db->where('comp_num', $data);
    $query = $this->db->get();
    $num = $query->result_array();
    $total_count = $num[0]['available_count'] - 1;
    // print_r($num);exit;
    $this->user_model->update_count($total_count, $data);
  }

  public function update_count($total_count, $data)
  {
    $this->db->where('comp_num', $data);
    $temp = array(
      'available_count' => $total_count
    );
    $this->db->update('maker_library', $temp);
  }

  public function maker_user_req($email)
  {
    $query = $this->db->query("select m.req_date,m.issue_date,m.return_date,m.req_component,c.name from maker_lib_requests m,maker_library c where c.comp_num = m.req_component and m.user_email= '" . $email . "' order by req_date DESC");
    return $query->result_array();
  }

  public function reg_schedule_meeting()
  {
    $data = $this->input->post();
    $data = $this->security->xss_clean($data);
    $this->form_validation->set_rules('date', 'date', 'required');
    $this->form_validation->set_rules('time', 'time', 'required');
    $this->form_validation->set_rules('phone', 'phone', 'required');
    $this->form_validation->set_rules('meeting_agenda', 'meeting_agenda ', 'required');
    $this->form_validation->set_rules('attendees', 'attendees', 'required');
    $this->form_validation->set_rules('description', 'description', 'required');
    if ($this->form_validation->run() == FALSE) {
      return false;
    } else {
      $data = array(
        'user_email' => $_SESSION['email'],
        'date' => $this->input->post('date'),
        'time' => $this->input->post('time'),
        'phone' => $this->input->post('phone'),
        'meeting_agenda' => $this->input->post('meeting_agenda'),
        'attendees' => $this->input->post('attendees'),
        'description' => $this->input->post('description'),
      );
      $this->db->insert('schedule_meeting', $data);
      return true;
    }
  }

  public function reg_project_proposal()
  {
    $data = $this->input->post();
    $data = $this->security->xss_clean($data);
    $this->form_validation->set_rules('title', 'title', 'required');
    $this->form_validation->set_rules('summary', 'summary', 'required');
    $this->form_validation->set_rules('faculty_recommend', 'faculty_recommend', 'required');
    if ($this->form_validation->run() == FALSE) {
      return false;
    } else {
      $project_id = "pro_" . time();
      $data = array(
        'reg_email' => $_SESSION['email'],
        'project_id' => $project_id,
        'title' => $this->input->post('title'),
        'summary' => $this->input->post('summary'),
        'faculty_recommend' => $this->input->post('faculty_recommend'),
      );
      $this->db->insert('project_proposal', $data);
      for ($x = 0; $x < count($this->input->post('name')); $x++) {
        $data_1 = array(
          'name' => $this->input->post('name')[$x],
          'class' =>  $this->input->post('class')[$x],
          'contact_no' =>  $this->input->post('contact_no')[$x],
          'project_id' => $project_id
        );
        $this->db->insert('project_proposal_team_members', $data_1);
      }
      for ($y = 0; $y < count($this->input->post('requirement')); $y++) {
        $data_2 = array(
          'requirement' => $this->input->post('requirement')[$y],
          'amount' =>  $this->input->post('amount')[$y],
          'remarks' =>  $this->input->post('remarks')[$y],
          'project_id' => $project_id
        );
        $this->db->insert('project_proposal_requirements', $data_2);
      }
      return true;
    }
  }

  public function reg_for_server_accsess()
  {
    $data = $this->input->post();
    $data = $this->security->xss_clean($data);
    $this->form_validation->set_rules('tech_or_lang', 'tech_or_lang', 'required');
    $this->form_validation->set_rules('purpose', 'purpose', 'required');
    $this->form_validation->set_rules('title', 'title', 'required');   
    if ($this->form_validation->run() == FALSE) {
      return false;
    } else {
      $data = array(
        'user_email' => $_SESSION['email'],
        'tech_or_lang' => $this->input->post('tech_or_lang'),
        'purpose' => $this->input->post('purpose'),
        'title' => $this->input->post('title'),
        'domain' => $this->input->post('domain'),
        'duration' => $this->input->post('duration'),        
      );
      $this->db->insert('server_accsess', $data);
      return true;
    }
  }
}
