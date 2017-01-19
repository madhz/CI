<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Madhura_lib {
    var $CI;
    public function __construct($params = array())
    {
        $this->CI =& get_instance();

        $this->CI->load->helper('url');
        $this->CI->config->item('base_url');
        $this->CI->load->database();
       
    }

       public function getLogin($id,$password){
        $sql = "SELECT * FROM user WHERE email = ? and password = ?";
        $results = $this->CI->db->query($sql, array($id,$password));
        $pageMetadata = $results->row(); 
        if(!empty($pageMetadata)){
        $this->CI->load->view('welcome_message'); 
    }
    else
    {
        $data['error']="please enter proper email id or password";
         $this->CI->load->view('login',$data);
    }
        
       }
}