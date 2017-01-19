<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }
    
    //insert into user table
    function insertUser($data)
    {
     // $query = $this->db->get('user');
     echo '<pre>';
     // print_r($query);
       print_r($data);
       // echo "hello";
       // $res=$this->db->insert('user', $data);
       // return $res;
    }
    function login($id,$pass)
    {
    $sql="SELECT * FROM user where email=? and password=?";
     $query= $this->db->query($sql,array($id,$pass));
      $result = $query->result();
          // print_r($result);
      return $result;
  

    }
    
   
}
?>
