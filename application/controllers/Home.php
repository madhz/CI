<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/intval(var)dex.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $result=array(
		// 		'success'=>'',
		// 		'error'=>'',
		// 		);
		// $this->load->view('vproduct',$result);
		// $this->load->model('user_model');
		$this->load->view('login_admin');

 		// print_r($data);
 		//jtable
 		$this->load->model('product_model');  
 		$data['jtablescript'] = $this->product_model->jtableconf();
  	// 	$this->load->view('showjtable', $data);

	}
	public function add_user(){
		// $this->output->cache(10);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('fname', 'First Name',  'callback_username_check');
		// $this->form_validation->set_rules('lname', 'lname', 'required');
		// $this->form_validation->set_rules('email', 'email Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('pass', 'pass', 'required');
		$this->form_validation->set_rules('lname', 'last name', 'required',
                        array('required' => 'You must provide a %s.'));


			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('login');
			}
			else
			{
				$this->load->model('user_model');
		$data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('pass')
            );

		// $this->load->view('home_message',$data);
 // 
		$this->load->helper("security");



		$xssdata=$this->security->xss_clean($data);
		echo 'result-->'.$register=$this->user_model->insertUser($xssdata);
		if($register==1)
		{
			$result=array(
				'success'=>"user isnerted successfully...!!!",
				'error'=>'',
				);
			$this->load->view('welcome_message');
		}
		else
		{
			$result=array(
				'success'=>'',
				'error'=>'error...!!!!',
				);
			$this->load->view('login',$result);	
		}
			// $this->load->view('welcome_message');
		}
	
		// $this->load->helper('new_helper');
		// echo 'helper--->';
		// print_r(getuser());

		// $this->load->library('madhura_lib');
		// $this->madhura_lib->getMetadata(2);
		
	}
	public function _output($output)
{
        echo $output;
}
public function comments(){
	echo "this is the helper";
}

public function username_check($str)
	{
		if ($str == 'test')
		{
			$this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	public function login()
	{
		
		$id=$this->input->post('email');
		$password=$this->input->post('pass');
		$this->load->model('product_model');
		$result=$this->product_model->login($id,$password);
		if(count($result)>0)
		{
					$this->load->view('index2');
		}
		else
		{
			$this->load->view("login_admin");
		}
		
	}
	public function addPrdouct()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('productname', 'Product',  'required',array('required' => '* You must provide a %s.'));
		$this->form_validation->set_rules('ISBN', 'ISBN', 'required|is_unique[tblProducts.ISBN]',array('required' => '* You must provide a %s.','is_unique'=>"* This %s is exsits")); 
		$this->form_validation->set_rules('price', 'Price', 'required|numeric',array('required' => '* You must provide a %s.','numeric' => '* The %s must contain only numbers.'));
		$this->form_validation->set_rules('quantity', 'quantity', 'required|numeric',array('required' => '* You must provide a %s.','numeric' => '* The %s must contain only numbers.'));
		$this->form_validation->set_rules('brand', 'Brand Name', 'required',array('required' => '* You must provide a %s.'));
		if ($this->form_validation->run() == FALSE)
		{
			$result=array(
				'success'=>'',
				'error'=>'',
				);
			$this->load->view('vproduct',$result);	
		}
		else
		{
		$this->load->model('product_model');

		$data=array(
		
			'p_name'=>$this->input->post('productname'),
			'ISBN'=>$this->input->post('ISBN'),
			'price'=>$this->input->post('price'),
			'quantity'=>$this->input->post('quantity'),
			'brand_name'=>$this->input->post('brand'),
		);
		$productinsert=$this->product_model->insertProduct($data);
		if($productinsert==1)
		{
			$result=array(
				'success'=>"Product isnerted successfully...!!!",
				'error'=>'',
				);
			$this->load->view('vproduct',$result);	
		}
		else
		{
			$result=array(
				'success'=>'',
				'error'=>'error...!!!!',
				);
			$this->load->view('vproduct',$result);	
		}
	}
	}
	public function updateP()
	{
		$result=array(
				'success'=>'',
				'error'=>'',
				);
		$this->load->view('vupdate',$result);
	}
	public function updateproduct()
	{
		$isbn=$this->input->post('ISBN');
		$this->load->model('product_model');
		$res=$this->product_model->updateProduct($isbn);
		echo json_encode($res);

	}
	public function updateproductres()
	{
		$error=array();
		$data=array(
			'p_name'=>$this->input->post('productname'),
			'ISBN'=>$this->input->post('isbn'),
			'price'=>$this->input->post('price'),
			'quantity'=>$this->input->post('quantity'),
			'brand_name'=>$this->input->post('brand'),
		);
		
		if($data['p_name']=='')
		{
			$error['ProductName']='* please enter product name';
		}
		if($data['price']=='')
		{
			$error['price']='* please enter price';
		}
		else if(!is_numeric($data['price']))
		{
			$error['price']='* please enter numeric value for price';	
		}
		if($data['quantity']=='')
		{
			$error['qty']='* please enter quantity';
		}
		else if(!is_numeric($data['quantity']))
		{
			$error['qty']='* please enter numeric value for price';	
		}
		if($data['ISBN']=='')
		{
			$error['isbn']='* please enter ISBN';
		}

		if($data['brand_name']=='')
		{
			$error['BrandName']='* please enter Brand name';
		}
		if (!empty($error))
		{
			$result=array(
				'success'=>'not',
				'error'=>'',
				);
			echo json_encode($error);
		}
		else
		{
			$this->load->model('product_model');
			$res=$this->product_model->updateProductResult($data);
			$data=array('res'=>$res);
			echo json_encode($data);
		}



	}
	public function deletP()
	{
		$result=array(
				'success'=>'',
				'error'=>'',
				);
		$this->load->view("vdelete",$result);
	}
	public function deleteres(){
		$this->load->model('product_model');
		$isbn=$this->input->post('isbnd');
		$res=$this->product_model->deleteproduct($isbn);
		$data=array('res'=>$res);
		echo json_encode($data);

	}
	public function showP()
	{

			$this->load->model('product_model');  
 		$data['jtablescript'] = $this->product_model->jtableconf();
  		$this->load->view('showjtable', $data);
		// $this->load->view('showjtable');
	}
	public function updatePselect()	
	{
		$id=$this->input->get('id');
		$this->load->model('product_model');
		$data['res']=$this->product_model->SelectProduct($id);
		// print_r($data);
		$this->load->view('updateproduct',$data);
	}
	public function deletePselect()
	{
		$this->load->model('product_model');
		$id=$this->input->post('id');
		$res=$this->product_model->deleteproductselect($id);
		$data=array('res'=>$res);
		echo json_encode($data);

	}
	public function callInsertProduct()
	{
				$result=array(
				'success'=>'',
				'error'=>'',
				);
		$this->load->view('vproduct',$result);
	}




}