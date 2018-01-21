<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* this controller demonstrates a bootstrap login form 
 * author: DavidWertenteil ReutTzadok
 *  */

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // this instruction initialize DB connection and allow to run queries.
        $this->load->database();
    }

    // The default function: display the login form
    public function index() {
        // The view checks for an "error" so we initialize
        // empty string
        $data = array("error" => "");
        // If an error message was stored in the session,
        // we pass it to the view
        if ($this->session->userdata('error')) {
            $data['error'] = $this->session->userdata('error');
        }
        // This is the login form
        $this->load->view("user_login", $data);
        // We don't want to show the error more than once
        // so we erase it after using it
        $this->session->set_userdata('error', '');
    }

    // This is the restricted access home page of the user
    

    // Action of the login form
    // It redirects either to the login form or to the user home page
    public function checklogin() {

        $this->load->library('form_validation');

        $this->load->model('User_model');

        try {
            // Validation
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('pwd', 'pwd', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_userdata('error', 'Please enter an email and password');
                redirect('login', 'refresh');
            }
            // End Validation]
            // 
            // Search the user in the DB - use form params (email,pwd)
            $data = $this->User_model->login($this->input->post('email'), $this->input->post('pwd'));

            if ($data) {
                // Successful login, store user data in session (look at the code in the user_profile view)
                $this->session->set_userdata('user_id', $data['id']);
                $this->session->set_userdata('user_email', $data['email']);
                $this->session->set_userdata('user_name', $data['name']);
                redirect('chat/home', 'refresh');
            } else {
                // Failed login, put an error message in the session
                $this->session->set_userdata('error', 'Wrong credentials, try again.');
                // Jump to login page to display the login form 
                redirect('login', 'refresh');
            }
        } catch (Exception $exc) {
            // Model validation failed
            $this->session->set_userdata('error', 'Please enter an email and password');
            redirect('login', 'refresh');
        }
    }

    // Logout button action
    public function logout() {
        // Delete the session (it will be automatically recreated)
        $this->session->sess_destroy();
        // We jump to the login page and it will recreate a new empty session
        redirect('login', 'refresh');
    }

}
