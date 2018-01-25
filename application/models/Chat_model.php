<?php

//This class is responsible for the messages data base.
class Chat_model extends CI_model {
    
    //This function get a message and id of user and add the message to the
    //data base
    public function add_message($message, $user_id) {
        // validate params
        if (trim($message) == "" || trim($user_id) == "") {
            throw new Exception("please add a message!");
        }
        
        $this->db->set('message', $message);
        $this->db->set('user_id', $user_id);
        $this->db->insert('chat');
    }
    
    //The function return all messages from the data base
    public function messages_list() { 
        return $this->db->select('chat.*,user.name')->from('chat')->join('user', 'chat.user_id = user.id')
                ->order_by('id', 'DESC')->get()->result_array();
    }
    
    //The function get an id of a message, and delete this message from the data base
    public function delete ($id) {
        if (trim($id) == "") {
            throw new Exception("Error! please try again");
        }
        $this->db->where('id',$id)->delete('chat');
    }
    
}