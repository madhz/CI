<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }
        function login($id,$pass)
    {
      $sql="SELECT * FROM user where email=? and password=?";
      $query= $this->db->query($sql,array($id,$pass));
      $result = $query->result();
          // print_r($result);
      return $result;
  

    }
    //insert into user table
    function insertProduct($data,$cp)
    {
       $res=$this->db->insert('tblProducts', $data);
       if($res)
       {
         $pid=$this->db->insert_id();
         $cp['p_id']=$pid;
         $result=$this->db->insert('tblCategoryProduct', $cp);
         return $result;
       }
       else
       {
        return $res;
       }
 
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
        function getCategory()
    {
  //     $this->db->select("*");
  // $this->db->from('tblCategory');
  // return $this->db->get();
      $sql="SELECT * from tblCategory";
      $query=$this->db->query($sql);
      return $query;

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
    

 function jtableconf()
 {
  $jtablefields = array(
   'id' => array (
    'key' => true,
    'create' => false,
    'edit' => false,
    'list' => false
   ),
   'p_name' => array (
    'title' => 'Product Name',
    'width' => '40%'
   ),
   'ISBN' => array (
    'title' => 'ISBN',
    'width' => '20%'
   ),
   'price' => array (
    'title' => 'Price',
    'width' => '10%'
   ),
   'quantity' => array (
    'title' => 'Quantity',
    'width' => '10%'
   ),
   'brand_name' => array (
    'title' => 'Brand name',
    'width' => '40%',
    // 'create' => false,
    // 'edit' => false
   )
  );

  $jtable = array (
  'title' => 'Table of product',
  'tablename' => 'tblProducts', // Important
  'idname' => 'id', // Important
  'paging' => true,
  'pageSize' => 5,
  'sorting' => true,
  'defaultSorting' => 'Name ASC',
  'actions' => array (
   'listAction' =>   base_url().'index.php/admin/cjtable/listrecord',
   'createAction' =>  base_url().'index.php/admincjtable/create',
   'updateAction' =>  base_url().'index.php/admin/cjtable/update',
   'deleteAction' =>  base_url().'index.php/admin/cjtable/deleterecord'
  ),
  'fields' => $jtablefields
  );
  
  return $jtable;
 }

 function listtable($tablename, $sorting = 'id', $start = '0', $size = '10')
 {
  
  $query = $this->db->get($tablename);
  $recordCount = $query->num_rows();
  
  $query = $this->db->query("SELECT * FROM ". $tablename ." ORDER BY  id"  . " LIMIT " . $start . "," . $size );
  
  $rows = array();
  foreach ($query->result() as $row)
  {
      $rows[] = $row;
  }

  $jTableResult = array();
  $jTableResult['Result'] = "OK";
  $jTableResult['TotalRecordCount'] = $recordCount;
  $jTableResult['Records'] = $rows;
  return json_encode($jTableResult);
 }
 
 function createrow($tablename, $dataset, $idname)
 {  
  $this->db->insert($tablename, $dataset, $idname);
    
  $query = $this->db->query("SELECT * FROM " . $tablename . " WHERE ". $idname ." = LAST_INSERT_ID();");
  $row = array();
  foreach($query->result_array() as $ro)
  {
   $row = $ro;
  }

  $jTableResult = array();
  $jTableResult['Result'] = "OK";
  $jTableResult['Record'] = $row;
  return json_encode($jTableResult);
 }
 
 function updaterow($tablename, $dataset, $idname, $id)
 {  
  $this->db->update($tablename, $dataset, $idname . " = " . $id);
  
  $jTableResult = array();
  $jTableResult['Result'] = "OK";
  return json_encode($jTableResult);
 }
 
 function deleterow($tablename, $idname, $id)
 {
  $this->db->delete($tablename, array($idname => $id));

  $jTableResult = array();
  $jTableResult['Result'] = "OK";
  return json_encode($jTableResult);
 } 
 function insertUser($data)
    {

       $res=$this->db->insert('user', $data);
       return $res;
    }
     function insertCategory($data)
    {

       $res=$this->db->insert('tblCategory', $data);
       return $res;
    }
   
}
?>
