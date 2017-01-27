<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cjtable extends CI_Controller {
function listrecord()
{

  $this->load->model('admin/product_model');
  $data = $this->product_model->jtableconf();
  $sorting = $this->input->get('jtSorting');
  $start = $this->input->get('jtStartIndex');
  $size = $this->input->get('jtPageSize'); 
  $id=$this->input->get('id') ;
  $data = $this->product_model->listtable($data['tablename'], $sorting, $start, $size,$id);
  echo $data;  
}
 
 function create()
 {
  $this->load->model('admin/product_model');
  $data = $this->product_model->jtableconf();
  $dataset = $this->getset_fields($data, 'create');     
  $data = $this->product_model->createrow($data['tablename'], $dataset, $data['idname']);
  echo $data;  
 }
 
 function update()
 {  
  $this->load->model('admin/product_model');
  $data = $this->product_model->jtableconf();
  $id = $this->input->post($data['idname']);
  $dataset = $this->getset_fields($data, 'edit');   
  $data = $this->product_model->updaterow($data['tablename'], $dataset, $data['idname'], $id);
  echo $data;
 }
 
 function deleterecord()
 {
  $this->load->model('admin/product_model');
  $data = $this->product_model->jtableconf();
  $id = $this->input->post($data['idname']);  
  $data = $this->product_model->deleterow($data['tablename'], $data['idname'], $id);
  echo $data;
 }
 
 function getset_fields($data, $type)
 {
  $dataset = array();
  foreach($data['fields'] as $key => $val) 
  {
   if(!isset($val[$type]))
   {
    $dataset[$key] = $this->input->post($key);
   }
   else
   {
    if( $val[$type] != false)
    {
     $dataset[$key] = $this->input->post($key);
    }
   }
  }
  return $dataset;  
 } 
}