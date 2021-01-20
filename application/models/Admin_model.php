<?php
class Admin_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function is_admin($email)
  {
    $query = $this->db->get_where('admin_users', "email='$email'");
    if ($query->num_rows() == 1) {
      return TRUE;
    }
    return FALSE;
  }

  public function is_super_admin($email)
  {
    $this->db->where('type', 'S');
    $this->db->where('email', $email);
    $query = $this->db->get('admin_users');
    if ($query->num_rows() == 1) {
      return TRUE;
    }
    return FALSE;
  }

  public function is_default_admin($email)
  {
    $this->db->where('type', 'U');
    $this->db->where('email', $email);
    $query = $this->db->get('admin_users');
    if ($query->num_rows() == 1) {
      return TRUE;
    }
    return FALSE;
  }

  public function is_local_admin($email)
  {
    $this->db->where('type', 'L');
    $this->db->where('email', $email);
    $query = $this->db->get('admin_users');
    if ($query->num_rows() == 1) {
      return TRUE;
    }
    return FALSE;
  }

  public function get_ai_ml_users()
  {
    $query = $this->db->get('users_ai_ml');
    return $query->result_array();
  }
  public function get_innovate_users()
  {
    $query = $this->db->get('users_innovate_4_tkm');
    return $query->result_array();
  }

  public function payment_verify_ai_ml($email, $paid_email)
  {
    $this->db->where('email', $email);
    $temp = array(
      'is_paid' => '1',
      'paid_email' => $paid_email
    );
    $query = $this->db->update('users_ai_ml', $temp);
  }

  public function add_user($data)
  {
    $this->db->insert('userRegister', $data);
  }

  public function get_all_maker_requests()
  {
    $query = $this->db->query("select u.fullname,u.branch,u.course_duration_from,u.course_duration_to,u.phone,m.user_email,m.req_date,m.issue_date,m.return_date,m.issued_admin,m.req_component,c.name from maker_lib_requests m,maker_library c,userRegister u where m.user_email = u.email and c.comp_num = m.req_component order by issue_date ASC");
    return  $query->result_array();
  }

  public function issue_maker_component($data)
  {
    $this->db->where('user_email', $this->input->post('user_email'));
    $this->db->where('req_component', $this->input->post('req_component'));
    $this->db->where('req_date', $this->input->post('req_date'));
    $query = $this->db->update('maker_lib_requests', $data);
  }

  public function change_count_lib_admin($data)
  {
    $this->db->select('available_count');
    $this->db->from('maker_library');
    $this->db->where('comp_num', $data);
    $query = $this->db->get();
    $num = $query->result_array();
    $total_count = $num[0]['available_count'] + 1;
    $this->admin_model->update_count_admin($total_count, $data);
  }

  public function update_count_admin($total_count, $data)
  {
    $this->db->where('comp_num', $data);
    $temp = array(
      'available_count' => $total_count
    );
    $this->db->update('maker_library', $temp);
  }

  public function return_maker_component($data)
  {
    $this->db->where('user_email', $this->input->post('user_email'));
    $this->db->where('req_component', $this->input->post('req_component'));
    $this->db->where('issue_date', $this->input->post('issue_date'));
    $query = $this->db->update('maker_lib_requests', $data);
  }

  public function save_component()
  {
    // $data = $this->input->post();
    // $data = $this->security->xss_clean($data);
    $data = array(
      'name' => $this->input->post('name'),
      'comp_num' => $this->input->post('comp_num'),
      'total_count' => $this->input->post('total_count'),
      'available_count' => $this->input->post('total_count')
    );
    $configss['allowed_types'] = '*';
    $configss['max_filename'] = '255';
    $configss['overwrite'] = TRUE;
    $configss['max_size'] = '1024';
    $configss['upload_path'] = 'assets/uploads/images/maker-library/';
    $temp = $_FILES["img_link"]['name'];
    $file_name = time() . "." . pathinfo($temp, PATHINFO_EXTENSION);
    $configss['file_name'] = $file_name;
    $this->load->library('upload', $configss);
    if (!$this->upload->do_upload('img_link')) {
      $error = array('error' => $this->upload->display_errors());
      print_r($error);
      exit;
      $this->session->set_flashdata('fail', 'Some error has been occured!');
      redirect("admin/dashboard/add-new-maker-component");
    } else {
      // print_r($data);
      $data['img_link'] = $file_name;
      $this->db->insert('maker_library', $data);
      $this->session->set_flashdata('success', 'Successfully added one component!');
      redirect("admin/dashboard/add-new-maker-component");
    }
  }

  public function get_execom_reg()
  {
    $query = $this->db->get('execom_reg');
    return $query->result_array();
  }

  public function get_all_project_proposals()
  {
    $query = $this->db->get('project_proposal');
    return $query->result_array();
  }

  public function get_project_team_details($project_id)
  {
    $this->db->where('project_id', $project_id);
    $query = $this->db->get('project_proposal_team_members');
    return json_encode($query->result());
  }

  public function get_project_requirements($project_id)
  {
    $this->db->where('project_id', $project_id);
    $query = $this->db->get('project_proposal_requirements');
    return json_encode($query->result());
  }
  public function get_project_summary($project_id)
  {
    $this->db->select('summary');
    $this->db->where('project_id', $project_id);
    $query = $this->db->get('project_proposal');
    return json_encode($query->result());
  }

  function add_volunteer()
  {
    $data = $this->input->post();
    $data = $this->security->xss_clean($data);
    $this->form_validation->set_rules('email', 'User Email', 'required');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('phone', 'Phone', 'required');
    $this->form_validation->set_rules('branch', 'Branch', 'required');
    $this->form_validation->set_rules('year', 'Year', 'required');
    $this->form_validation->set_rules('role', 'Role', 'required');
    $this->form_validation->set_rules('duration', 'Duration', 'required');
    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('fail', 'Fill all fields');
      redirect('admin/dashboard/add-user');
    } else {
      $data = array(
        'email' => $this->input->post('email'),
        'name' => $this->input->post('name'),
        'phone' => $this->input->post('phone'),
        'branch' => $this->input->post('branch'),
        'year' => $this->input->post('year'),
        'role' => $this->input->post('role'),
        'duration' => $this->input->post('duration'),
      );
      $this->db->insert('volunteers', $data);
      $this->session->set_flashdata('success', 'Success!');
      redirect('admin/dashboard/volunteer-database');
    }
  }

  function get_all_maker_components()
  {
    $query = $this->db->get('maker_library');
    return $query->result_array();
  }


  function updateMakerComponent($data)
  {
    $this->db->where('comp_num', $data['comp_num']);
    $temp = array(
      'name' => $data['comp_name'],
      'total_count' => $data['total_count']
    );
    $query = $this->db->update('maker_library', $temp);
    return true;
  }

  function get_all_new_membership_reg()
  {
    $query = $this->db->get('member_registration20');
    return $query->result_array();
  }

  function white_list_user($reg_id)
  {
    $this->db->where('reg_id', $reg_id);
    $query = $this->db->get('member_registration20');
    $user = $query->row();
    $data['email'] = $user->email;
    $data['user_hash'] = password_hash($user->email, PASSWORD_BCRYPT);
    $email = $user->email;
    $query1 = $this->db->get_where('userRegister', "email='$email'");
    $temp = $query1->num_rows();
    if ($temp != TRUE) {
      $this->db->insert('userRegister', $data);
      return true;
    } else {
      return false;
    }
  }

  function verify_membership_registration($reg_id)
  {
    $this->db->where('reg_id', $reg_id);
    $temp = array(
      'is_verified' => '1',
      'verified_user' => $this->session->email
    );
    $query = $this->db->update('member_registration20', $temp);
    if ($this->db->affected_rows() == 1) {
      $response = $this->white_list_user($reg_id);
      $data = array(
        'status' => true,
        'session_user' => $this->session->email,
        'white_list_status' => $response
      );
    } else {
      $data = array(
        'status' => false
      );
    }
    header('Content-Type: application/json');
    echo json_encode($data);
  }
}
