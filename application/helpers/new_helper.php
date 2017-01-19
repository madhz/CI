<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('getuser'))
{
  function getuser(){
       $ci=& get_instance();
        $ci->load->database(); 

        $sql = "select * from user"; 
        $query = $ci->db->query($sql);
       return $row = $query->result();

 }
   }
?>