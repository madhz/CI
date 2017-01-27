<?php
class MY_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session'); // loading session class
        // $this->load->library('my_custom_library'); // loading library class
    }
}