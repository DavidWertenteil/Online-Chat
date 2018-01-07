<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* this controller demonstrates basic controllers accessing a database 
 * author: Solange Karsenty
 *  */
class Car extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // CodeIgniter does not connect necessarily to a database 
        // (you can write  a website witthout a database), so we explicitely do it
        // this instruction initialize DB connection and allow to run queries.
        $this->load->database();
        // In order to use a model we need to load it:
        // we load the Car_model class in the constructor
        // this means that we can now write
        //  $this->Car_model->... 
        //  and access all Car_model methods
        $this->load->model('Car_model');
        // helpers are CI libraries. For example after
        // loading 'cookie' we can use the function get_cookie()
        $this->load->helper('cookie');
    }
    // BASIC DB select and display results: 
    // try 
    // http://localhost/demos-ci/car/car_list
    public function car_list() {
        // prepare an empty array
        $data = array();
        // request all list of cars from the DB and insert in the array
        $data['cars'] = $this->Car_model->car_list();
        // pass it and load the view
        $this->load->view('carlist', $data);
    }
    
    // BASIC DB select and display results using a view with links: 
    // try 
    // http://localhost/demos-ci/car/car_list
    public function car_list_links() {
        // same as car_list() but load a different view
        // where car numbers ar linked (href) to the other controller
        $data = array();
        $data['cars'] = $this->Car_model->car_list();
        $this->load->view('carlist_links', $data);
    }
    
    // USING PARAMETERS: try for example 
    // http://localhost/demos-ci/car/id/3
    // http://localhost/demos-ci/car/id
    public function id ($id = "") {
        // prepare data for the view
        $data = array();
        // check if $id is defined
        if (! empty($id)) {
            // get the car from the DB
            $data['cars'] = $this->Car_model->carWithId($id);
        } else {
            // missing id so no cars to pass, since the parameter
            // 'cars' is required in the view we assign an empty array
            $data['cars'] = array();
            $data['error'] = "please provide a car id!";
        }
        $this->load->view('carlist', $data);
    }
    
    // USING COOKIES: try for example
    // http://localhost/demos-ci/car/remember/3
    // http://localhost/demos-ci/car/remember/5
    public function remember($id) {
        // if this page was visited before, we stored a cookie
        // so let's get it and pass it to the view for display
        if (get_cookie("car_name") != "")
            $data["previous"] = get_cookie("car_name");
        
        $cars = $this->Car_model->carWithId($id);
        
        // we found the car? get its name
        if (count($cars)>0) 
            $data["car"] = $cars[0]["name"];
        
        // store it in a cookie for 5 minutes: the cookie is used in id()
        set_cookie("car_name", $data["car"], "300");
        
        // and pass the car name to the view and 
        // optionally the previous cookie value
        $this->load->view('cookie_demo', $data);
        
    }

}
