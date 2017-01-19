<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }
    
    //insert into user table
    function insertProduct($data)
    {
       $res=$this->db->insert('tblProducts', $data);
       return $res;
    }
    function updateProduct($data)
    {
       $sql="SELECT * from tblProducts where ISBN='$data'";
        $query= $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    function updateProductResult($data)
    {
      $sql="UPDATE tblProducts set p_name='".$data['p_name']."',ISBN='".$data['ISBN']."', price='".$data['price']."', quantity='".$data['quantity']."', brand_name='".$data['brand_name']."' where ISBN='".$data['ISBN']."'";
      $res=$this->db->query($sql);
      return $res;
    }
    function deleteproduct($data)
    {
      $sql="DELETE FROM tblProducts where ISBN='$data'";
      $this->db->query($sql);
      $res=$this->db->affected_rows(); 
      return $res;
    }
    function showProductRes()
    {
  //     $this->db->select("*");
  // $this->db->from('tblProducts');
  // $query = $this->db->get();
      $sql="SELECT * from tblProducts";
      $query=$this->db->query($sql);
      return $query->result();

    }
        function SelectProduct($data)
    {
       $sql="SELECT * from tblProducts where id='$data'";
        $query= $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
     function deleteproductselect($data)
    {
      $sql="DELETE FROM tblProducts where id='$data'";
      $this->db->query($sql);
      $res=$this->db->affected_rows(); 
      return $res;
    }
    
   
}
?>
