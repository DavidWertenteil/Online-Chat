<?php

// a class to handle users in the database
// CREATE TABLE `user` (
//  `id` int(11) NOT NULL,
//  `name` varchar(64) NOT NULL,
//  `email` varchar(64) NOT NULL,
//  `password` varchar(64) NOT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=utf8;

class User_model extends CI_model {

    // this function searches for the given email password user in the DB
    // returns the DB row (an array) or false
    public function login($email, $pass) {
        // validate params
        if (trim($email) == "" || trim($pass) == "")
            throw new Exception("Email or password empty!");
       
        // select * from user where email = $email and passord = $pwd
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->where('password', md5($pass));

        // execute the query
        if ($query = $this->db->get()) {
            // return an array
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    public function add_user($name, $email, $pass) {
        // Create connection
        if (trim($name) == "" || trim($email) == "" || trim($pass) == "") {
            throw new Exception("Name, email or password empty!");
        }
        $this->db->set('name', $name);
        $this->db->set('email', $email);
        $this->db->set('password', md5($pass));
        $this->db->insert('user');
    }

    public function check_user_in_db($email) {
        // validate params
        if (trim($email) == "") {
            throw new Exception("Email is empty!");
        }
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $is_in_db = $this->db->get();

        // Check email in db
        if ($is_in_db->num_rows() == 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
