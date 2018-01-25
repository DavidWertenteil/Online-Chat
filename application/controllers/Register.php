<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*  
 * Authors: DavidWertenteil ReutTzadok
*/

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // This instruction initialize DB connection and allow to run queries.
        $this->load->database();
    }

    public function index() {
        // the view checks for an "error" so we initialize
        // empty string
        $data = array("error" => "", "name" => "", "email" => "", "password" => "");
        // if an error message was stored in the session,
        // we pass it to the view
        if ($this->session->userdata('error')) {
            $data['error'] = $this->session->userdata('error');
        }

        $this->load->view("user_register", $data);
        // We don't want to show the error more than once
        // so we erase it after using it
        $this->session->set_userdata('error', '');
    }

    // Check the registeration
    public function checkregister() {

        $this->load->library('form_validation');
        $this->load->model('User_model');

        try {
             // Validation
            if(trim($this->input->post('usr')) == "" || trim($this->input->post('email')) == "" || trim($this->input->post('pwd')) == ""){
                throw new Exception("Name, email or password empty!"); 
            }
            $this->form_validation->set_rules('usr', 'usr', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('pwd', 'pwd', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_userdata('error', 'Please enter a name, email and password');
                redirect('register', 'refresh');
            }
            // End validation
            // Check if user is in database
            if ($this->User_model->check_user_in_db($this->input->post('email')) == TRUE) {
                $this->User_model->add_user($this->input->post('usr'), $this->input->post('email'), $this->input->post('pwd'));
                redirect('login', 'refresh');
            } else {
                // If user is in database: save the session and print error
                $this->session->set_userdata('user_name', $this->input->post('usr'));
                $this->session->set_userdata('user_email', $this->input->post('email'));
                $this->session->set_userdata('user_password', $this->input->post('pwd'));
                $this->session->set_userdata('error', "Email in use!");
                redirect('register/user_in_DB', 'refresh');
            }
        } catch (Exception $exc) {
            $this->session->set_userdata('error', 'Please enter a name, email and password');
            redirect('register', 'refresh');
        }
    }

    // If users email is already in the database
    public function user_in_DB() {
        // Display the data the user filled in the form
        $data = array('name' => $this->session->userdata('user_name'),
            'email' => $this->session->userdata('user_email'),
            'password' => $this->session->userdata('user_password'),
            'error' => $this->session->userdata('error'));

        $this->load->view("user_register", $data);
        $this->session->set_userdata('error', '');
    }

}
