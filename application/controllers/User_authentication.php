<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Authentication extends CI_Controller {

    function __construct(){
        parent::__construct();

        // Load google oauth library
        $this->load->library('google');

        // Load user model
        $this->load->model('user');
    }

    public function index(){
        // Redirect to profile page if the user already logged in
        if($this->session->userdata('loggedIn') == true){
            redirect('user_authentication/profile/');
        }

        if(isset($_GET['code'])){

            // Authenticate user with google
            if($this->google->getAuthenticate()){

                // Get user info from google
                $gpInfo = $this->google->getUserInfo();

                // Preparing data for database insertion
                $userData['oauth_provider'] = 'google';
                $userData['oauth_uid']      = $gpInfo['id'];
                $userData['first_name']     = $gpInfo['given_name'];
                $userData['last_name']      = $gpInfo['family_name'];
                $userData['email']          = $gpInfo['email'];
                $userData['gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:'';
                $userData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:'';
                $userData['link']           = !empty($gpInfo['link'])?$gpInfo['link']:'';
                $userData['picture']        = !empty($gpInfo['picture'])?$gpInfo['picture']:'';

                // Insert or update user data to the database
                $userID = $this->user->checkUser($userData);

                // Store the status and user profile info into session
                $this->session->set_userdata('loggedIn', true);
                $this->session->set_userdata('userData', $userData);

                // Redirect to profile page
                redirect('user_authentication/profile/');
            }
        }

        // Google authentication url
        $data['loginURL'] = $this->google->loginURL();

        // Load google login view
        $this->load->view('user_authentication/index',$data);
    }

    public function profile(){
        // Redirect to login page if the user not logged in
        if(!$this->session->userdata('loggedIn')){
            redirect('/user_authentication/');
        }

        // Get user info from session
        $data['userData'] = $this->session->userdata('userData');

        // Load user profile view
        $this->load->view('user_authentication/profile',$data);
    }

    public function logout(){
        // Reset OAuth access token
        $this->google->revokeToken();

        // Remove token and user data from the session
        $this->session->unset_userdata('loggedIn');
        $this->session->unset_userdata('userData');

        // Destroy entire session data
        $this->session->sess_destroy();

        // Redirect to login page
        redirect('/user_authentication/');
    }

}
