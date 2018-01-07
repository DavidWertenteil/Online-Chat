<?php // this instruction prevents direct access (without going thru CI routing system
defined('BASEPATH') OR exit('No direct script access allowed');

/* this controller demonstrates basic controller loading a view (no model) 
 * author: Solange Karsenty
 *  */
class Simple extends CI_Controller {

    // this is the class ctor. it calls the ctor of the base class
    // then you can add code to initalize such as loading libraries
    public function __construct() {
        parent::__construct();
        // this is loading one of CodeIgniter libraries called helpers
        // (full list here : https://www.codeigniter.com/user_guide/helpers/index.html)
        // In this case we are using the function site_url() that helps us get the base URL 
        // to build absolute path URLs (look at the "action" in the form for example)

        $this->load->helper('url_helper');
    }

    // this is the default function 
    // try with
    //  http://localhost/demos-ci/simple
    public function index() {
        // pass data to the view
        $data['title'] = "Simple Demo";
        // build and return the HTML to the browser
        $this->load->view('simple', $data);
    }

    // try with:
    // http://localhost/demos-ci/simple/withparam
    // http://localhost/demos-ci/simple/withparam/12345
    // note the default value of the parameter $param
    public function withparam($param = 'hello!!!') {
        // pass data to the view
        $data['title'] = "Simple Demo with parameter: " . $param;
        // build and return the HTML to the browser
        $this->load->view('simple', $data);
    }
    

}
