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

       public function getMetadata($pageid){
        $sql = "SELECT * FROM user WHERE id = ?";
        $results = $this->CI->db->query($sql, array($pageid));
        $pageMetadata = $results->row(); 
        $data['fname'] = $pageMetadata->fname;
        $data['lname'] = $pageMetadata->lname;
        // $this->CI->load->view('home_message',$data); 
        return($data);
        
       }
}