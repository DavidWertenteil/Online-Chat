<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*  
 * Authors: DavidWertenteil ReutTzadok
*/

//controller........................... 

class Chat extends CI_Controller{
    
    public function __construct() {
        parent::__construct();

        // This instruction initialize DB connection and allow to run queries.
        $this->load->database();
    }
    
    //this function send the new message from the view to the model,
    //for the model add the new message to the data base
    public function new_message() {
        $this->load->model('Chat_model');
        $this->load->library('form_validation');
        try {
            // Validation
            $this->form_validation->set_rules('msg', 'new_message', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_userdata('error', 'Please enter a message');
                redirect('chat/home', 'refresh');
            }
            // End validation
         
            $this->Chat_model->add_message($this->input->post('msg'), $this->session->userdata('user_id'));
                redirect('chat/home', 'refresh');
                
        } catch (Exception $exc) {
            $this->session->set_userdata('error', $exc);
            redirect('chat/home', 'refresh');
        }
    }
    
    //this function load to the view all the information to the chat - 
    //user name, messages and details, etc.
    public function home() { 
        $this->load->model('Chat_model');
        
        if ($this->session->userdata('user_id')) {
            // User already logged in, let's get information from the session
            // and the data base and go to the profile page            
            $data = array('name' => $this->session->userdata('user_name'),
                'email' => $this->session->userdata('user_email'), 
                'messages' => $this->Chat_model->messages_list());
            
            // Load the profile page
            $this->load->view('user_profile', $data);
                        
        } else {
            // Otherwise bring the login page
            // redirect causes the browser to load a new page
            redirect('login', 'refresh');
        }
    }
    
    //this function send to the model the id of ths message that the
    //user want to delete.
    public function delete_msg($id){
        //validation
        if ($id == ""){
            $this->session->set_userdata('error', 'Error! please try again');
            redirect('chat/home', 'refresh');
        }
        
        $this->load->model('Chat_model');
        $this->Chat_model->delete($id);
        redirect('chat/home', 'refresh');
    }
}