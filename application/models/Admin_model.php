<?php
class Admin_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getusertype($email)
    {
        $email = $this->security->xss_clean($email);
        $this->db->where('email', $email);
        $query = $this->db->get('userRegister');
        $data = $query->result_array();
        if ($query->num_rows() == 1) {
            $user_type = $data[0]['user_type'];
            return $user_type;
        } else {
            return false;
        }
    }

    function is_iedc_member($email)
    {
        $email = $this->security->xss_clean($email);
        $user_type = $this->getusertype($email);
        if ($user_type == 'super_admin' || $user_type == 'admin' || $user_type == 'iedc_member')
            return true;
        else
            return false;
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
        $query = $this->db->query("select m.id,u.fullname,u.branch,u.course_duration_from,u.course_duration_to,u.phone,m.user_email,m.req_date,m.issue_date,m.return_date,m.issued_admin,m.req_component,c.name from maker_lib_requests m,maker_library c,userRegister u where m.user_email = u.email and c.comp_num = m.req_component");
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
        $data['user_type'] = 'iedc_member';
        $email = $user->email;
        $query1 = $this->db->get_where('userRegister', "email='$email'");
        if ($query1->num_rows() == 1) {
            $data1['user_hash'] =  $data['user_hash'];
            $data1['user_type'] = 'iedc_member';
            $this->db->where('email', $email);
            $this->db->update('userRegister', $data1);
            return true;
        } else {
            $this->db->insert('userRegister', $data);
            return true;
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

    function get_server_access_requests()
    {
        $query = $this->db->query("select u.admission_number,u.fullname,u.branch,u.phone,s.id,s.time_stamp,s.user_email,s.title,s.domain,s.duration,s.purpose,s.tech_or_lang from server_accsess s,userRegister u where s.user_email = u.email order by s.time_stamp ASC");
        return  $query->result_array();
    }

    function get_pre_incubation_requests()
    {
        $query = $this->db->query("select p.reg_id,u.admission_number,u.fullname,u.branch,u.phone,p.time_stamp,p.reg_email,p.company_name from pre_incubation p,userRegister u where p.reg_email = u.email order by p.time_stamp ASC");
        return  $query->result_array();
    }

    function get_schedule_meeting_requests()
    {
        $query = $this->db->query("select u.*,s.* from schedule_meeting s,userRegister u where s.user_email = u.email order by s.id DESC");
        return  $query->result_array();
    }

    function get_all_events()
    {
        $query = $this->db->get('events');
        return $query->result_array();
    }

    function get_participants($event_id)
    {
        $event_id = $this->security->xss_clean($event_id);
        $this->db->select('er.reg_email,er.payment_verified_user,er.is_payment_verified,er.payment_id,er.file_link,er.added_email,er.id,er.cert_num,er.is_attended,er.reg_email,u.college,u.phone,u.fullname,u.course_duration_from,u.course_duration_to,u.branch')
            ->from('userRegister as u, events_registration as er')
            ->where('er.event_id', $event_id)
            ->where('er.reg_email=u.email');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_event_details($event_id)
    {
        $event_id = $this->security->xss_clean($event_id);
        $this->db->where('event_id', $event_id);
        $query = $this->db->get('events');
        return $query->row();
    }

    function mark_attendence($participant_id, $status)
    {
        $this->db->where('id', $participant_id);
        $query = $this->db->get('events_registration');
        if ($query->row()->is_attended == NULL) {
            $this->db->where('id', $participant_id);
            if ($status == 1) {
                $cert_num = 'IEDC_TKM_' . $participant_id . '_' . rand(10000, 99999);;
                $temp = array(
                    'is_attended' => $status,
                    'cert_num' => $cert_num
                );
            } else {
                $temp = array(
                    'is_attended' => $status,
                );
            }
            $query = $this->db->update('events_registration', $temp);
            if ($this->db->affected_rows() == 1) {
                $data = array(
                    'status' => true,
                );
            } else {
                $data = array(
                    'status' => false
                );
            }
        } else {
            $data = array(
                'status' => false
            );
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function verify_event_payment($participant_reg_id)
    {
        $this->db->where('id', $participant_reg_id);
        $temp = array(
            'is_payment_verified' => '1',
            'payment_verified_user' => $this->session->email
        );
        $this->db->update('events_registration', $temp);
        if ($this->db->affected_rows() == 1) {
            $data = array(
                'status' => true,
                'session_user' => $this->session->email,
            );
        } else {
            $data = array(
                'status' => false
            );
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function update_certificate_position($data)
    {
        if ($data['cert_type'] == 0) {
            $records = array(
                'cert_file_0_name_x' => $data['name_x'],
                'cert_file_0_name_y' => $data['name_y'],
                'cert_file_0_college_x' => $data['college_x'],
                'cert_file_0_college_y' => $data['college_y']
            );
        } else if ($data['cert_type'] == 1) {
            $records = array(
                'cert_file_1_name_x' => $data['name_x'],
                'cert_file_1_name_y' => $data['name_y'],
                'cert_file_1_college_x' => $data['college_x'],
                'cert_file_1_college_y' => $data['college_y'],
                'cert_file_1_merit_x' => $data['merit_x'],
                'cert_file_1_merit_y' => $data['merit_y'],
            );
        }
        $this->db->where('event_id', $data['event_id']);
        $this->db->update('events', $records);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('success', 'successfully updated the positions');
        } else {
            $this->session->set_flashdata('success', 'error updating the positions');
        }
        redirect(base_url() . "admin/upload-certificate/" . $data['event_id']);
    }
}
