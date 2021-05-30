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
      redirect("admin/dashboard/edit-maker-library");
    } else {
      // print_r($data);
      $data['img_link'] = $file_name;
      $this->db->insert('maker_library', $data);
      $this->session->set_flashdata('success', 'Successfully added one component!');
      redirect("admin/dashboard/edit-maker-library");
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



  function add_event_details()
  {
    $data = $this->input->post();
    $data = $this->security->xss_clean($data);
    $this->form_validation->set_rules('event_title', 'Event title', 'required');
    $this->form_validation->set_rules('event_desc', 'Event Description', 'required');
    $this->form_validation->set_rules('img_link_public', 'Public Image Link', '');
    $this->form_validation->set_rules('is_public', 'Is Public', 'required');
    $this->form_validation->set_rules('image_link_reg', 'Registration Image Link', '');
    $this->form_validation->set_rules('event_date', 'Evetn Date', '');
    $this->form_validation->set_rules('event_time', 'Evetn time', '');
    $this->form_validation->set_rules('event_venue', 'Event Venue', '');
    $this->form_validation->set_rules('contact_1_name', 'Contact name 1', '');
    $this->form_validation->set_rules('contact_1_num', 'Contact number 1', '');
    $this->form_validation->set_rules('contact_2_name', 'Contact name 2', '');
    $this->form_validation->set_rules('contact_2_num', 'Contact number 2', '');
    $this->form_validation->set_rules('event_link', 'Event Link', '');
    $this->form_validation->set_rules('event_fee', 'Event Fee', '');
    $this->form_validation->set_rules('max_members', 'Maximum Members', '');
    $this->form_validation->set_rules('is_iedc_member', 'Is IEDC Member', '');
    $this->form_validation->set_rules('is_reg_open', 'Is Registration Open', '');
    $this->form_validation->set_rules('is_certificate_published', 'Is certificate Published', '');
    $this->form_validation->set_rules('is_file_submission', 'Is File Submission', '');
    $this->form_validation->set_rules('is_team', 'Is Team', '');
    $this->form_validation->set_rules('is_payment_id', 'Is Paid', '');
    $this->form_validation->set_rules('cert_file_0', 'Cerfifcate 0', '');
    $this->form_validation->set_rules('cert_file_1', 'Cerfifcate 1', '');
    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('fail', 'Fill required fields');
      redirect('admin/dashboard/add-event');
    } else {
      $data = array(
        'event_title' => $this->input->post('event_title'),
        'event_desc' => $this->input->post('event_desc'),
        'img_link_public' => $this->input->post('img_link_public'),
        'is_public' => $this->input->post('is_public'),
        'image_link_reg' => $this->input->post('image_link_reg'),
        'event_date' => $this->input->post('event_date'),
        'event_time' => $this->input->post('event_time'),
        'event_venue' => $this->input->post('event_venue'),
        'contact_1_name' => $this->input->post('contact_1_name'),
        'contact_1_num' => $this->input->post('contact_1_num'),
        'contact_2_name' => $this->input->post('contact_2_name'),
        'contact_2_num' => $this->input->post('contact_2_num'),
        'event_link' => $this->input->post('event_link'),
        'event_fee' => $this->input->post('event_fee'),
        'max_members' => $this->input->post('max_members'),
        'is_iedc_member' => $this->input->post('is_iedc_member'),
        'is_reg_open' => $this->input->post('is_reg_open'),
        'is_certificate_published' => $this->input->post('is_certificate_published'),
        'is_file_submission' => $this->input->post('is_file_submission'),
        'is_team' => $this->input->post('is_team'),
        'is_payment_id' => $this->input->post('is_payment_id'),
        'cert_file_0' => $this->input->post('cert_file_0'),
        'cert_file_1' => $this->input->post('cert_file_1'),
      );
      $this->db->insert('events', $data);
      $this->session->set_flashdata('success', 'Success!');
      redirect('admin/dashboard/add-event');
    }
  }


}
