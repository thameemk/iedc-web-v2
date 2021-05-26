<?php
class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->library('googleplus');
        if (!$this->session->userdata('sess_logged_in') == 1) {
            echo "You are not authorized . Contact Web Admin !!!!<br><br>";
            $login_url = $this->googleplus->loginURL();
            echo "<a href=\"$login_url\">Please login again !!</a><br><br>";
            $url = base_url('auth/logout');
            echo "<a href=\"$url\">Return To Home</a>";
            exit;
        }
    }

    public function complete()
    {
        if ($this->user_model->is_available($this->session->email) == TRUE) {
            $this->complete_next();
        } else {
            $data['google_user_name'] = $this->session->name;
            $data['email'] = $this->session->email;
            $this->db->insert('userRegister', $data);
            $this->complete_next();
        }
    }

    public function complete_next()
    {
        if ($this->user_model->is_profile_completed($this->session->email) == TRUE) {
            if ($this->session->userdata('last_page') == base_url()) {
                redirect(base_url() . 'user/dashboard');
            } else {
                redirect($this->session->userdata('last_page'));
            }
        } else {
            $data['title'] = ucfirst('Complete Profile');
            $this->load->view('dashboard/complete', $data);
            $this->complete_profile_post();
        }
    }

    function complete_profile_post()
    {
        $user = $this->input->post();
        $user = $this->security->xss_clean($user);
        $this->form_validation->set_rules('branch', 'Branch', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('course_duration_from', 'Course Duration ', 'required');
        $this->form_validation->set_rules('course_duration_to', 'Course Duration To ', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('fail', 'Fill all required fields !!');
        } else {
            if ($this->input->post('college') == null)
                $college = "TKM College of Engineering";
            else
                $college = $this->input->post('college');

            $user = array(
                'branch' => $this->input->post('branch'),
                'phone' => $this->input->post('phone'),
                'fullname' => $this->input->post('fullname'),
                'course_duration_from' => $this->input->post('course_duration_from'),
                'course_duration_to' => $this->input->post('course_duration_to'),
                'admission_number' => $this->input->post('admission_number'),
                'whyiedc' =>  $this->input->post('whyiedc'),
                'college' => $college,
                'profile_completed' => '1'
            );
            $this->user_model->complete_signin($user);
            if ($this->session->userdata('last_page') == base_url()) {
                redirect(base_url() . 'user/dashboard');
            } else {
                redirect($this->session->userdata('last_page'));
            }
        }
    }

    public function dashboard()
    {
        if (isset($_SESSION['email'])) {
            $data['user_type'] = $this->admin_model->getusertype($this->session->email);
            $data['userinfo'] = $this->user_model->get_user_single($this->session->email);
            $data['profile_pic'] = $this->session->profile_pic;
            $data['link'] = $this->session->link;
            $data['loginURL'] = $this->googleplus->loginURL();
            if ($this->user_model->is_profile_completed($this->session->email) == TRUE) {
                $this->load->view('dashboard/sidebar', $data);
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/home', $data);
                $this->load->view('dashboard/footer', $data);
            } else {
                $data['title'] = ucfirst('F2');
                $this->load->view('dashboard/complete', $data);
                $this->complete_profile_post();
            }
        } else {
            // set the expiration date to 24 hour ago
            setcookie("redir", "", time() + 86400);
            $data['loginURL'] = $this->googleplus->loginURL();
            header('Location: ' . $data['loginURL']);
            exit('');
        }
    }


    public function dynamic_user($page)
    {
        if ($this->user_model->is_profile_completed($this->session->email) == TRUE) {
            if (!file_exists(APPPATH . 'views/dashboard/dynamic_user/' . $page . '.php')) {
                show_404();
            }
            $data['events'] = $this->user_model->get_event_details(NULL);
            $data['myevents'] = $this->user_model->get_user_registred_events($this->session->email);
            $data['user_type'] = $this->admin_model->getusertype($this->session->email);
            $data['maker_user_req'] = $this->user_model->maker_user_req($this->session->email);
            $data['userinfo'] = $this->user_model->get_user_single($this->session->email);
            $data['profile_pic'] = $this->session->profile_pic;
            $data['link'] = $this->session->link;
            $data['loginURL'] = $this->googleplus->loginURL();
            $data['get_maker_items'] = $this->user_model->get_maker_items();
            $this->load->view('dashboard/sidebar', $data);
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/dynamic_user/' . $page, $data);
            $this->load->view('dashboard/footer', $data);
        } else {
            $data['title'] = ucfirst('F1');
            $this->load->view('dashboard/complete', $data);
            $this->complete_profile_post();
        }
    }

    public function project_proposal_post()
    {
        $status = $this->user_model->reg_project_proposal();
        if ($status == true) {
            $this->session->set_flashdata('success', 'Success! Contact IEDC officials to know more');
            redirect('user/dashboard/project-proposal');
        } elseif ($status == false) {
            $this->session->set_flashdata('fail', 'Fill all fields!!');
            redirect('user/dashboard/project-proposal');
        } else {
            $this->session->set_flashdata('fail', 'Some error has been occurred. Please try again later!!');
            redirect('user/dashboard/project-proposal');
        }
    }

    function get_event_details($event_id)
    {
        echo $this->user_model->get_event_details($event_id);
    }

    function event_registration()
    {
        $data = $this->input->post();
        $data = $this->security->xss_clean($data);
        $is_iedc_member = $this->user_model->is_iedc_member($this->session->email);
        $is_event_for_iedc_members = $this->user_model->is_event_for_iedc_members($data['event_id']);
        $duplicate = $this->user_model->check_duplicate_reg_events($this->session->email, $data['event_id']);
        $is_reg_open = $this->user_model->check_if_event_closed($data['event_id']);
        $is_reg_count_max = $this->user_model->check_is_reg_count_max($data['event_id']);
        if ($is_reg_count_max == false) {
            if ($is_reg_open == true) {
                if ($duplicate == false) {
                    if ($is_event_for_iedc_members == true) {
                        if ($is_iedc_member == true) {

                            $this->user_model->event_registration($data);
                        } else {
                            $this->session->set_flashdata('fail', 'You are not an IEDC member!!');
                            redirect($this->session->userdata('last_page'));
                        }
                    } else {
                        $this->user_model->event_registration($data);
                    }
                } else {

                    $this->session->set_flashdata('fail', 'You are already registred for this event!!');
                    redirect($this->session->userdata('last_page'));
                }
            } else {
                $this->session->set_flashdata('fail', 'Registration Closed!!');
                redirect($this->session->userdata('last_page'));
            }
        } else {
            $this->session->set_flashdata('fail', 'Registration count exceeded!!');
            redirect($this->session->userdata('last_page'));
        }
    }
}
