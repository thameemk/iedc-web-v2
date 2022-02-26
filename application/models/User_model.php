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

    function pre_incubation_reg()
    {
        $data = $this->input->post();
        $data = $this->security->xss_clean($data);
        $this->form_validation->set_rules('company_name', 'company_name', 'required');
        $this->form_validation->set_rules('parent_name', 'parent_name', 'required');
        $this->form_validation->set_rules('parent_mobile_number', 'parent_mobile_number', 'required');
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            $project_id = "PRE_" . time();
            $data = array(
                'reg_email' => $_SESSION['email'],
                'reg_id' => $project_id,
                'company_name' => $this->input->post('company_name'),
                'parent_name' => $this->input->post('parent_name'),
                'parent_mobile_number' => $this->input->post('parent_mobile_number'),
                'parent_email' => $this->input->post('parent_email'),
                'comm_address' => $this->input->post('comm_address'),
                'perm_address' => $this->input->post('perm_address'),
                'business_category_1' => $this->input->post('business_category_1'),
                'business_category_2' => $this->input->post('business_category_2'),
                'business_category_3' => $this->input->post('business_category_3'),
                'business_idea' => $this->input->post('business_idea'),
                'business_time' => $this->input->post('business_time'),
                'business_ownership' => $this->input->post('business_ownership'),
                'problem_statement' => $this->input->post('problem_statement'),
                'solution' => $this->input->post('solution'),
                'targeted_customer' => $this->input->post('targeted_customer'),
                'description' => $this->input->post('description'),
                'possible_application' => $this->input->post('possible_application'),
                'ser_workspace' => $this->input->post('ser_workspace'),
                'ser_lab' => $this->input->post('ser_lab'),
                'ser_web' => $this->input->post('ser_web'),
                'ser_res' => $this->input->post('ser_res'),
                'ser_adv' => $this->input->post('ser_adv'),
                'ser_oth' => $this->input->post('ser_oth'),
                'bus_experience' => $this->input->post('bus_experience'),
                'business_plan' => $this->input->post('business_plan'),
                'business_plan_outline' => $this->input->post('business_plan_outline'),
                'maket_feasibility_study' => $this->input->post('maket_feasibility_study'),
                'intellectual_property_strategy' => $this->input->post('intellectual_property_strategy'),
                'bus_machinary_capital' => $this->input->post('bus_machinary_capital'),
                'bussiness_estimate' => $this->input->post('bussiness_estimate'),
                'funding_needs_source' => $this->input->post('funding_needs_source'),
                'intend_finance' => $this->input->post('intend_finance'),
                'market_survey' => $this->input->post('market_survey'),
                'tech_own_other' => $this->input->post('tech_own_other'),
                'bus_reason' => $this->input->post('bus_reason'),
                'already_invested' => $this->input->post('already_invested'),
                'space' => $this->input->post('space'),
                'bus_hazardous' => $this->input->post('bus_hazardous'),
                'ass_strategy' => $this->input->post('ass_strategy'),
                'ass_managemet' => $this->input->post('ass_managemet'),
                'ass_marketing' => $this->input->post('ass_marketing'),
                'ass_hr' => $this->input->post('ass_hr'),
                'ass_commercialization' => $this->input->post('ass_commercialization'),
                'ass_legal' => $this->input->post('ass_legal'),
                'ass_other' => $this->input->post('ass_other'),
                'staff_mentors' => $this->input->post('staff_mentors'),

            );
            $this->db->insert('pre_incubation', $data);
            for ($x = 0; $x < count($this->input->post('team_name')); $x++) {
                $data_1 = array(
                    'member_id' => "PRE_MEM_" . time(),
                    'team_name' =>  $this->input->post('team_name')[$x],
                    'team_adm_num' =>  $this->input->post('team_adm_num')[$x],
                    'incubation_reg_id' => $project_id,
                    'team_email' =>  $this->input->post('team_email')[$x],
                    'team_phone' =>  $this->input->post('team_phone')[$x],
                    'team_department	' =>  $this->input->post('team_department')[$x],
                    'team_year' =>  $this->input->post('team_year')[$x],
                );
                $this->db->insert('pre_incubation_team_members', $data_1);
            }
            return true;
        }
    }

    public function get_event_details($event_id)
    {
        if ($event_id == NULL) {
            $this->db->where('need_registration', 1);
            $query = $this->db->get('events');
            return $query->result_array();
        } else {
            $this->db->where('event_id', $event_id);
            $query = $this->db->get('events');
            return json_encode($query->result());
        }
    }

    public function is_iedc_member($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('userRegister');
        $data = $query->result_array();
        $user_type = $data[0]['user_type'];
        if ($user_type == 'super_admin' || $user_type == 'admin' || $user_type == 'iedc_member') {
            return true;
        } else {
            return false;
        }
    }

    public function is_event_for_iedc_members($event_id)
    {
        $this->db->where('event_id', $event_id);
        $query = $this->db->get('events');
        $data = $query->result_array();
        $is_type = $data[0]['is_iedc_member'];
        if ($is_type == 1) {
            return true;
        } else {
            return false;
        }
    }

    function event_reg_duplicate_email($email, $event_id)
    {
        $this->db->where('reg_email', $email);
        $this->db->where('event_id', $event_id);
        $query = $this->db->get('events_registration');
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function event_reg_duplicate_phone($email, $event_id)
    {
        $query = $this->db->query('select phone from userRegister where email="' . $email . '"');
        $phone = $query->row()->phone;
        if ($phone == null) {
            return false;
        } else {
            $query_1 = $this->db->query('select email from userRegister where phone="' . $phone . '" and email!="' . $email . '"');
            if ($query_1->num_rows() >= 1) {
                $email_2  = $phone = $query_1->row()->email;
                $this->db->where('reg_email', $email_2);
                $this->db->where('event_id', $event_id);
                $query_3 = $this->db->get('events_registration');
                if ($query_3->num_rows() == 1) {
                    return true;
                } else {
                    return false;                    
                }
            } else {
                return false;
            }
        }
    }

    function check_duplicate_reg_events($email, $event_id)
    {
        $status_1 = $this->event_reg_duplicate_email($email, $event_id);
        $status_2 = $this->event_reg_duplicate_phone($email, $event_id);
        if ($status_1 == false && $status_2 == false) {
            return false;
        } else {
            return true;
        }
    }

    function check_if_event_closed($event_id)
    {
        $this->db->where('event_id', $event_id);
        $query = $this->db->get('events');
        $data = $query->result_array();
        $is_reg_open = $data[0]['is_reg_open'];
        if ($is_reg_open == 1) {
            return true;
        } else {
            return false;
        }
    }

    function get_total_reg($event_id)
    {
        $this->db->where('event_id', $event_id);
        $query = $this->db->get('events_registration');
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    function check_is_reg_count_max($event_id)
    {
        $this->db->where('event_id', $event_id);
        $query = $this->db->get('events');
        $data = $query->result_array();
        $max_count = $data[0]['max_members'];
        $total_reg = $this->get_total_reg($event_id);
        if ($max_count == $total_reg) {
            return true;
        } else {
            return false;
        }
    }

    function get_user_registred_events($email)
    {
        $query = $this->db->query('select er.*,e.* from events_registration er, events e where e.event_id = er.event_id and er.reg_email="' . $email . '"');
        return  $query->result_array();
    }

    function is_cert_published($event_id)
    {
        $this->db->where('event_id', $event_id);
        $query = $this->db->get('events');
        $result = $query->row();
        if ($result->is_cert_published == 1)
            return true;
        else
            return false;
    }

    function is_user_attended($email, $event_id)
    {
        $this->db->where('event_id', $event_id);
        $this->db->where('reg_email', $email);
        $query = $this->db->get('events_registration');
        $result = $query->row();
        if ($result->is_attended == 1 || $result->is_attended == 101 || $result->is_attended == 102)
            return true;
        else
            return false;
    }


    function is_team($event_id)
    {
        $this->db->where('event_id', $event_id);
        $query = $this->db->get('events');
        $result = $query->row();
        if ($result->is_team == 1)
            return true;
        else
            return false;
    }

    function event_registration($data,$team_lead_email)
    {
        $status = $this->is_team($data['event_id']);
        $temp = array(
            'event_id' => $data['event_id'],
            'reg_email' => $team_lead_email,
            'team_lead_email' => $team_lead_email,
            'file_link' => $data['file_link'],
            'payment_id' => $data['payment_id'],
            'added_by'=>$this->session->email
        );
        if ($status == false) {
            $this->db->insert('events_registration', $temp);
            $this->session->set_flashdata('success', 'Registration Successfull!! We Will inform the instructions through email.');
            redirect($this->session->userdata('last_page'));
        } else {
            $teamMembers[] = $data['team_email'];
            $team_status = 1;
            foreach ($teamMembers[0] as $member) {
                if ($this->check_duplicate_reg_events($member, $data['event_id']) == true) {
                    $team_status = 0;
                }
                #todo - check iedc membership
            }
            if ($team_status == 1) {
                $this->db->insert('events_registration', $temp);
                foreach ($teamMembers[0] as $member) {
                    if ($this->is_available($member) == false) {
                        $user_data = array(
                            'email' => $member,
                        );
                        $this->db->insert('userRegister', $user_data);
                    }
                    $memberData = array(
                        'event_id' => $data['event_id'],
                        'reg_email' => $member,
                        'team_lead_email' => $team_lead_email,
                        'file_link' => $data['file_link'],
                        'payment_id' => $data['payment_id'],
                        'added_by'=>$this->session->email
                    );
                    $this->db->insert('events_registration', $memberData);
                }
                $this->session->set_flashdata('success', 'Registration Successfull!! We Will inform the instructions through email.');
                redirect($this->session->userdata('last_page'));
            } else {
                $this->session->set_flashdata('fail', 'One of your team member is already registred for the event!!');
                redirect($this->session->userdata('last_page'));
            }
        }
    }


    function get_event_reg_data($event_id, $email)
    {
        $this->db->select('e.*,u.fullname,u.college,er.is_attended,er.cert_num')
            ->from('userRegister as u,events_registration as er,events as e')
            ->where('u.email', $email)
            ->where('er.reg_email',$email)
            ->where('er.event_id',$event_id)
            ->where('e.event_id',$event_id);
        $query = $this->db->get();
        return $query->row();
    }
}
