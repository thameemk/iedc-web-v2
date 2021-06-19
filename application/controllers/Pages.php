<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('report_model');
        $this->session->set_userdata('last_page', current_url());
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['loginURL'] = $this->googleplus->loginURL();
        $data['page_title'] = 'Home';
        $data['upcomingInfo'] = $this->report_model->upcomingEvents();
        $this->load->view('templates/header', $data);
        $this->load->view('static/home', $data);
        $this->load->view('templates/footer');
    }

    function view($page)
    {
        if (!file_exists(APPPATH . 'views/static/' . $page . '.php')) {
            show_404();
        }
        $temp = str_replace("-", " ", $page);
        $temp1 = ucfirst($temp);
        $data['page_title'] = $temp1;
        $data['loginURL'] = $this->googleplus->loginURL();
        $data['upcomingInfo'] = $this->report_model->upcomingEvents();
        $data['getStories'] = $this->report_model->getStories();        
        $data['incubated'] = $this->report_model->ecellInfo('incubated');
        $data['incubating'] = $this->report_model->ecellInfo('incubating');
        $data['execomYear'] = $this->report_model->execomYear();
        $data['execom'] = $this->report_model->execomInfo();
        $data['webYear'] = $this->report_model->webYear();
        $data['web_team'] = $this->report_model->web_team_info();
        $data['certrecords'] = $this->report_model->get_cert_details('0');
        $this->load->view('templates/header', $data);
        $this->load->view('static/' . $page, $data);
        $this->load->view('templates/footer');
    }

    function view_event($page)
    {
        $temp = str_replace("-", " ", $page);
        $temp1 = ucfirst($temp);
        $data['page_title'] = $temp1;
        $data['loginURL'] = $this->googleplus->loginURL();
        $data['eventDetails'] = $this->report_model->get_event_details($page);
        $this->load->view('templates/header', $data);
        $this->load->view('static/event-single', $data);
        $this->load->view('templates/footer');
    }

    //archieved function
    function view_events($page)
    {
        if (!file_exists(APPPATH . 'views/events/' . $page . '.php')) {
            show_404();
        }
        $temp = str_replace("-", " ", $page);
        $temp1 = ucfirst($temp);
        $data['page_title'] = $temp1;
        $data['loginURL'] = $this->googleplus->loginURL();
        $this->load->view('templates/header', $data);
        $this->load->view('events/' . $page, $data);
        $this->load->view('templates/footer');
    }

    function innovate_reg()
    {

        $data = $this->input->post();
        $data = $this->security->xss_clean($data);
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->report_model->google_recaptcha($recaptcha);
        $status = json_decode($response, true);


        if (!$status['success']) {
            $this->session->set_flashdata('fail', 'Sorry Google Recaptcha Unsuccessful!!');
            redirect(base_url() . "innovate4tkm");
        } else {
            $this->form_validation->set_rules('tlemail', 'Email', 'required|is_unique[users_innovate_4_tkm.tlemail]');
            $this->form_validation->set_rules('tlphone', 'Phone', 'required|is_unique[users_innovate_4_tkm.tlphone]');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('fail', 'You have already registred');
                redirect(base_url() . "events/innovate4tkm");
            } else {
                $this->form_validation->set_rules('tlname', 'Name', 'required');
                $this->form_validation->set_rules('tlyear', 'year of Study', 'required');
                $this->form_validation->set_rules('abstract', 'Abstract', 'required');
                $this->form_validation->set_rules('accept_rule', 'Rules and Regulations', 'required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('fail', 'Fill all fields! ');
                    redirect(base_url() . "events/innovate4tkm");
                } else {
                    $data = array(
                        'tlname' => $this->input->post('tlname'),
                        'tlemail' => $this->input->post('tlemail'),
                        'tlphone' => $this->input->post('tlphone'),
                        'tlyear' => $this->input->post('tlyear'),
                        'abstract' => $this->input->post('abstract'),
                        'member_one' => $this->input->post('member_one'),
                        'member_two' => $this->input->post('member_two'),
                        'member_three' => $this->input->post('member_three'),
                    );
                    $this->report_model->registration_innovate4tkm($data);
                    $this->session->set_flashdata('success', 'Registration successful! ');
                    redirect(base_url() . "events/innovate4tkm");
                }
            }
        }
    }

    function ai_ml_reg()
    {

        $data = $this->input->post();
        $data = $this->security->xss_clean($data);
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->report_model->google_recaptcha($recaptcha);
        $status = json_decode($response, true);


        if (!$status['success']) {
            $this->session->set_flashdata('fail', 'Sorry Google Recaptcha Unsuccessful!!');
            redirect(base_url() . "workshops/ai-ml");
        } else {
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users_ai_ml.email]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|is_unique[users_ai_ml.phone]');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('fail', 'You have already registred');
                redirect(base_url() . "workshops/ai-ml");
            } else {
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('year', 'year of Study', 'required');
                $this->form_validation->set_rules('branch', 'branch', 'required');
                $this->form_validation->set_rules('is_iedc_member', 'iedc_member', 'required');
                $this->form_validation->set_rules('accept_rule', 'Rules and Regulations', 'required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('fail', 'Fill all fields! ');
                    redirect(base_url() . "workshops/ai-ml");
                } else {
                    $data = array(
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                        'year' => $this->input->post('year'),
                        'branch' => $this->input->post('branch'),
                        'is_iedc_member' => $this->input->post('is_iedc_member'),
                    );
                    $this->report_model->registration_ai_ml($data);
                    $this->session->set_flashdata('success', 'Registration successful! ');
                    redirect(base_url() . "workshops/ai-ml");
                }
            }
        }
    }

    function execom_reg()
    {
        $data = $this->input->post();
        $data = $this->security->xss_clean($data);
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->report_model->google_recaptcha($recaptcha);
        $status = json_decode($response, true);
        if (!$status['success']) {
            $this->session->set_flashdata('fail', 'Sorry Google Recaptcha Unsuccessful!!');
            redirect(base_url() . "application-for-excom");
        } else {
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[execom_reg.email]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|is_unique[execom_reg.phone]');
            $this->form_validation->set_rules('admission_number', 'admission_number', 'required|is_unique[execom_reg.admission_number]');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('fail', 'You have already registred');
                redirect(base_url() . "application-for-excom");
            } else {
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('year', 'year of Study', 'required');
                $this->form_validation->set_rules('branch', 'branch', 'required');
                $this->form_validation->set_rules('position_1', 'position_1', 'required');
                $this->form_validation->set_rules('accept_rule', 'Rules and Regulations', 'required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('fail', 'Fill all fields! ');
                    redirect(base_url() . "application-for-excom");
                } else {
                    $data = array(
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                        'year' => $this->input->post('year'),
                        'branch' => $this->input->post('branch'),
                        'position_1' => $this->input->post('position_1'),
                        'position_2' => $this->input->post('position_2'),
                        'admission_number' => $this->input->post('admission_number'),
                        'excomYear' => $this->input->post('excomYear')
                    );
                    $status = $this->report_model->execom_reg($data);
                    if ($status == 201) {
                        $this->session->set_flashdata('success', 'Registration successful! ');
                        redirect(base_url() . "application-for-excom");
                    } else {
                        $this->session->set_flashdata('fail', 'Some error has been occurred ! Contact Web Admin ');
                        redirect(base_url() . "application-for-excom");
                    }
                }
            }
        }
    }


    public function new_user_registration()
    {
        $data = $this->input->post();
        $data = $this->security->xss_clean($data);
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->report_model->google_recaptcha($recaptcha);
        $status = json_decode($response, true);
        if (!$status['success']) {
            $this->session->set_flashdata('fail', 'Sorry Google Recaptcha Unsuccessful!!');
            redirect(base_url() . "membership-registration");
        } else {

            $this->form_validation->set_rules('admission_number', 'admission_number', 'required|is_unique[member_registration20.admission_number]');
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[member_registration20.email]');
            $this->form_validation->set_rules('phone_number', 'Phone', 'required|is_unique[member_registration20.phone_number]');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('fail', 'You are already registred! ');
                redirect(base_url() . "membership-registration");
            } else {

                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('year', 'year of Study', 'required');
                $this->form_validation->set_rules('branch', 'branch', 'required');
                $this->form_validation->set_rules('transaction_id', 'transaction_id', 'required');
                $this->form_validation->set_rules('extras', 'extras', 'required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('fail', 'Fill all fields! ');
                    redirect(base_url() . "membership-registration");
                } else {
                    $data = array(
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'phone_number' => $this->input->post('phone_number'),
                        'admission_number' => $this->input->post('admission_number'),
                        'year' => $this->input->post('year'),
                        'branch' => $this->input->post('branch'),
                        'transaction_id' => $this->input->post('transaction_id'),
                        'extras' => $this->input->post('extras')
                    );
                    $status = $this->report_model->new_user_registration($data);
                    if ($status == 201) {
                        $this->session->set_flashdata('success', 'Registration successful! ');
                        redirect(base_url() . "membership-registration");
                    } else {
                        $this->session->set_flashdata('fail', 'Some error has been occurred ! Please try after some time ');
                        redirect(base_url() . "membership-registration");
                    }
                }
            }
        }
    }

    public function start_up_call()
    {
        $data = $this->input->post();
        $data = $this->security->xss_clean($data);
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->report_model->google_recaptcha($recaptcha);
        $status = json_decode($response, true);
        if (!$status['success']) {
            $this->session->set_flashdata('fail', 'Sorry Google Recaptcha Unsuccessful!!');
            redirect(base_url() . "events/startup-call");
        } else {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('phone_number', 'Phone', 'required');
            $this->form_validation->set_rules('year', 'year of Study', 'required');
            $this->form_validation->set_rules('branch', 'branch', 'required');
            $this->form_validation->set_rules('stage_of_idea', 'Stage of your idea', 'required');
            $this->form_validation->set_rules('problem', 'Problem', 'required');
            $this->form_validation->set_rules('solution', 'Solution', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('fail', 'Fill all fields! ');
                redirect(base_url() . "events/startup-call");
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'phone_number' => $this->input->post('phone_number'),
                    'year' => $this->input->post('year'),
                    'branch' => $this->input->post('branch'),
                    'stage_of_idea' => $this->input->post('stage_of_idea'),
                    'problem' => $this->input->post('problem'),
                    'solution' => $this->input->post('solution'),
                );
                $status = $this->report_model->start_up_registration($data);
                if ($status == 201) {
                    $this->session->set_flashdata('success', 'Registration successful! ');
                    redirect(base_url() . "events/startup-call");
                } else {
                    $this->session->set_flashdata('fail', 'Some error has been occurred ! Please try after some time ');
                    redirect(base_url() . "events/startup-call");
                }
            }
        }
    }

    function dare2develop()
    {
        $data['page_title'] = 'Dare2Develop';
        $data['loginURL'] = $this->googleplus->loginURL();
        $data['podcast_series'] = $this->report_model->podcast_series();
        $this->load->view('events/dare2develop', $data);
    }

    function loadmore()
    {
        echo 123;
        $limit = $this->input->get('limit');
        $offset = $this->input->get('offset');
        $result  = $this->report_model->load_more($offset, $limit);
        $data['view'] = $result;
        $data['offset'] = $offset + 10;
        $data['limit'] = $limit;
        echo json_encode($data);
    }

    function forbidden()
    {
        $data['login_url'] = $this->googleplus->loginURL();
        $data['url'] = base_url('auth/logout');
        $this->load->view('forbidden', $data);
    }

    public function verify($cert_no)
    {
        $cert_no = $this->security->xss_clean($cert_no);
        $data['certrecords'] = $this->report_model->get_cert_details($cert_no);
        $data['page_title'] = 'Verify Certificate';
        $data['loginURL'] = $this->googleplus->loginURL();
        $this->load->view('templates/header', $data);
        $this->load->view('static/verify', $data);
        $this->load->view('templates/footer');
    }
}
