<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Chat extends CI_Controller{
    
    public function __construct() {
        parent::__construct();

        // This instruction initialize DB connection and allow to run queries.
        $this->load->database();
    }
    
    public function new_message() {

        $this->load->library('form_validation');
        $this->load->model('Chat_model');

        try {
            // Validation
            /*$this->form_validation->set_rules('usr', 'usr', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('pwd', 'pwd', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_userdata('error', 'Please enter a name, email and password');
                redirect('register', 'refresh');
            }*/
            // End validation
         
            $this->Chat_model->add_message($this->input->post('msg'), $this->session->userdata('user_id'));
                redirect('chat/home', 'refresh');
                
        } catch (Exception $exc) {
            $this->session->set_userdata('error', 'Please enter a message');
            redirect('chat/home', 'refresh');
        }
    }
    
    public function home() {
        // Is user is already logged?
        $this->load->model('Chat_model');
        
        if ($this->session->userdata('user_id')) {
            // User already logged in, let's get information from the session
            // and go to the profile page            
            $data = array('name' => $this->session->userdata('user_name'),
                'email' => $this->session->userdata('user_email'), 
                'messages' => $this->Chat_model->messages_list());
            
            //$messages = array('message'=>"dfsdf", 'date' => "sdfsdf");
            // Load the profile page
            
            $this->load->view('user_profile', $data);
                        
        } else {
            // Otherwise bring the login page
            // redirect causes the browser to load a new page
            redirect('login', 'refresh');
        }
    }
}