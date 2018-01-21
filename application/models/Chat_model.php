<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Chat_model extends CI_model {
    
    public function add_message($message, $user_id) {
        // Create connection
        if (trim($message) == "" || trim($user_id) == "") {
            throw new Exception("please add a message!");
        }
        $this->db->set('message', $message);
        $this->db->set('user_id', $user_id);
        $this->db->insert('chat');
    }
    
    public function messages_list() { 
        return $this->db->select('message, date') ->from('chat') ->order_by('id', 'DESC') ->get() ->result_array();
    }
    
}