<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* this controller demonstrates a bootstrap login form 
 * author: Solange Karsenty
 *  */

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // CodeIgniter does not connect necessarily to a database 
        // (you can write  a website witthout a database), so we explicitely do it
        // this instruction initialize DB connection and allow to run queries.
        $this->load->database();
    }

    // the default function: display the login form
    // http://localhost/demos-ci/login
    public function index() {
        // the view checks for an "error" so we initialize
        // empty string
        $data = array("error" => "");
        // if an error message was stored in the session,
        // we pass it to the view
        if ($this->session->userdata('error')) {
            $data['error'] = $this->session->userdata('error');
        }
        // this is the login form
        $this->load->view("bootstrap-form", $data);
        // we don't want to show the error more than once
        // so we erase it after using it
        $this->session->set_userdata('error', '');
    }

    // this is the restricted access home page of the user
    // http://localhost/demos-ci/login/home
    public function home() {
        // user is already logged?
        if ($this->session->userdata('user_id')) {
            // user already logged in, let's get information from the session
            // and go to the profile page
            $data = array('name' => $this->session->userdata('user_name'),
                'email' => $this->session->userdata('user_email'));
            // load the profile page
            $this->load->view('user_profile', $data);
        } else {
            // otherwise bring the login page
            // redirect causes the browser to load a new page
            redirect('login', 'refresh');
        }
    }

    // action of the login form
    // http://localhost/demos-ci/login/checkLogin
    // it redirects either to the login form or to the user home page
    public function checklogin() {

        $this->load->library('form_validation');

        $this->load->model('User_model');

        // this is how you write debugging output in application/controllers/logs
//        log_message('debug', "Form email: " . $this->input->post('email'));
        try {
            // Validation
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('pwd', 'pwd', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_userdata('error', 'Please enter an email and password');
                redirect('login', 'refresh');
            }
            // End Validation
            //
            // search the user in the DB - use form params (email,pwd)
            $data = $this->User_model->login($this->input->post('email'), $this->input->post('pwd'));

            if ($data) {
                // successful login, store user data in session (look at the code in the user_profile view)
                $this->session->set_userdata('user_id', $data['id']);
                $this->session->set_userdata('user_email', $data['email']);
                $this->session->set_userdata('user_name', $data['name']);
                redirect('login/home', 'refresh');
            } else {
                // failed login, put an error message in the session
                $this->session->set_userdata('error', 'Wrong credentials, try again.');
                // jump to login page to display the login form 
                redirect('login', 'refresh');
            }
        } catch (Exception $exc) {
            // model validation failed
            $this->session->set_userdata('error', $exc);
            redirect('login', 'refresh');
        }
    }

    // logout button action
    public function logout() {
        // delete the session (it will be automatically recreated)
        $this->session->sess_destroy();
        // we jump to the login page and it will recreate a new empty session
        redirect('login', 'refresh');
    }

}
