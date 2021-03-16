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
        if($this->user_model->is_available($this->session->email) == TRUE )
        {
            $this->complete_next();
        }
        else
        {
            $data['google_user_name'] = $this->session->name;
            $data['email'] = $this->session->email;
            $this->db->insert('userRegister', $data);
            $this->complete_next();
        }
       
    }

    public function complete_next()
    {
        if ($this->user_model->is_profile_completed($this->session->email) == TRUE) {
            redirect(base_url("user/dashboard"));
        } else {
            $data['title'] = ucfirst('Complete Profile');
            $this->load->view('dashboard/complete', $data);
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
                    $user = array(
                        'branch' => $this->input->post('branch'),
                        'phone' => $this->input->post('phone'),
                        'fullname' => $this->input->post('fullname'),
                        'course_duration_from' => $this->input->post('course_duration_from'),
                        'course_duration_to' => $this->input->post('course_duration_to'),
                        'admission_number' => $this->input->post('admission_number'),
                        'whyiedc' =>  $this->input->post('whyiedc'),
                        'profile_completed' => '1'
                    );
                    $this->user_model->complete_signin($user);
                    $this->session->set_flashdata('success', 'Your registration is Successfull!!');
                    redirect(base_url("user/dashboard"));                
            }
        }
    }

    public function dashboard()
    {
        if (isset($_SESSION['email'])) {
              $data['admin'] = $this->admin_model->getusertype($this->session->email);
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
                  $data['title'] = ucfirst('Complete Profile');
                  $this->load->view('dashboard/complete', $data);
              }
          } else {
              // set the expiration date to one hour ago
              setcookie("redir", "", time() + 3600);
              $data['loginURL'] = $this->googleplus->loginURL();
              header('Location: ' . $data['loginURL']);
              exit('');
        }
    }


    public function public_user_pages($page)
    {
        if (!file_exists(APPPATH . 'views/dashboard/public_user/' . $page . '.php')) {
            show_404();
        }       
        $data['admin'] = $this->admin_model->getusertype($this->session->email);
        $data['maker_user_req'] = $this->user_model->maker_user_req($this->session->email);
        $data['userinfo'] = $this->user_model->get_user_single($this->session->email);
        $data['profile_pic'] = $this->session->profile_pic;
        $data['link'] = $this->session->link;
        $data['loginURL'] = $this->googleplus->loginURL();
        $data['get_maker_items'] = $this->user_model->get_maker_items();
        $this->load->view('dashboard/sidebar', $data);
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/public_user/'.$page, $data);
        $this->load->view('dashboard/footer', $data);
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

}