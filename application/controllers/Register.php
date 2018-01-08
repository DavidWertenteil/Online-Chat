<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* this controller demonstrates a bootstrap login form 
 * author: Solange Karsenty
 *  */

class Register extends CI_Controller {

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
        $this->load->view("user_register", $data);
        // we don't want to show the error more than once
        // so we erase it after using it
        $this->session->set_userdata('error', '');
    }

    // this is the restricted access home page of the user
    // http://localhost/demos-ci/login/home
    // logout button action
    public function checkregister() {

        // Validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('usr', 'usr', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pwd', 'pwd', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_userdata('error', 'Please enter a name, email and password');
            redirect('register', 'refresh');
        }
        // End validation
        
        $this->load->model('User_model');
        try {
            // search the user in the DB - use form params (email,pwd)
            $this->User_model->add_user($this->input->post('usr'), $this->input->post('email'), $this->input->post('pwd'));
            redirect('login/home', 'refresh');
        } catch (Exception $exc) {
            // model validation failed
            $this->session->set_userdata('error', 'Please enter a name, email and password');
            redirect('register/registerhome', 'refresh');
        }
    }

}
