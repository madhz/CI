<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

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
				$this->session->unset_userdata('email');
		$this->session->unset_userdata('fname');
		$this->session->unset_userdata('lname');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('image');

		$this->load->view('admin/login_admin');


	}
		public function index2()
	{

		$this->load->view('admin/index2');


	}
	
	    public function is_logged_in()
    {
        $user = $this->session->userdata('email');
        return isset($user);
    }
	public function add_user()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname', 'First Name',  'callback_username_check');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('pass', 'pass', 'required');
		// $this->form_validation->set_rules('imgd', 'imgd', 'required');
		$this->form_validation->set_rules('lname', 'last name', 'required',
                        array('required' => 'You must provide a %s.'));
		$name_file = $_FILES['img']['name'];

			if ($this->form_validation->run() == FALSE)
			{
				$result=array(
				'success'=>'',
				'error'=>'error...!!!!',
				);
				$this->load->view('admin/vregisteruser',$result);
			}
			else
			{
				$config = array(
				'upload_path' => "userimg/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf|txt",
				'overwrite' => TRUE,
				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'max_height' => "768",
				'max_width' => "1024"
				);
				$this->load->library('upload', $config);

				if($this->upload->do_upload('img'))
				{
				// $data = array('success' => $this->upload->data());
					$this->load->model('admin/product_model');

						$data = array(
				                'fname' => $this->input->post('fname'),
				                'lname' => $this->input->post('lname'),
				                'email' => $this->input->post('email'),
				                'password' => $this->input->post('pass'),
				                'image'=>$name_file,
				            );
						$this->load->helper("security");
						$xssdata=$this->security->xss_clean($data);
						$register=$this->product_model->insertUser($xssdata);
						if($register==1)
						{
							$result=array(
								'success'=>"user isnerted successfully...!!!",
								'error'=>'',
								);
							$this->load->view('admin/vregisteruser',$result);
						}
						else
						{
							$result=array(
								'success'=>'',
								'error'=>'error...!!!!',
								);
								$this->load->view('admin/vregisteruser',$result);
						}
					// 		// $this->load->view('welcome_message');
						// }
					
						// $this->load->helper('new_helper');
						// echo 'helper--->';
						// print_r(getuser());

						// $this->load->library('madhura_lib');
						// $this->madhura_lib->getMetadata(2);
				}
				else
				{
				$error = array('error' => $this->upload->display_errors(),'success'=>'');
				$this->load->view('admin/vregisteruser', $error);
				}

				
		
	}
}
public function username_check($str)
{
	if($str=="")
	{
		$this->form_validation->set_message('username_check','You must provide a %s');
		{
			return FALSE;
		}
	}
	else
	{
		return TRUE;
	}
}
public function _output($output)
{
        echo $output;
}
public function comments(){
	echo "this is the helper";
}

// public function username_check($str)
// 	{
// 		if ($str == 'test')
// 		{
// 			$this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
// 			return FALSE;
// 		}
// 		else
// 		{
// 			return TRUE;
// 		}
// 	}
	public function login()
	{
		
		$id=$this->input->post('email');
		$password=$this->input->post('pass');
		$this->load->model('admin/product_model');
		$result=$this->product_model->login($id,$password);
		if(count($result)>0)
		{
		
					// echo '<pre>';
					// print_r($result);
					// echo $result[0]->id;
					$this->session->set_userdata('id', $result[0]->id);
					$this->session->set_userdata('email', $result[0]->email);
					$this->session->set_userdata('fname', $result[0]->fname);
					$this->session->set_userdata('lname', $result[0]->lname);
					$this->session->set_userdata('image', $result[0]->image);
								$this->load->view('admin/index2');

		}
		else
		{
			$this->load->view("admin/login_admin");
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
				$this->load->model('admin/product_model');
				$data['category_table']=$this->product_model->getCategory();
				$res=array_merge($result, $data);
				$this->load->view('admin/vproduct',$res);
		}
		else
		{	
		$this->load->model('admin/product_model');

		$data=array(
		
			'p_name'=>$this->input->post('productname'),
			'ISBN'=>$this->input->post('ISBN'),
			'price'=>$this->input->post('price'),
			'quantity'=>$this->input->post('quantity'),
			'brand_name'=>$this->input->post('brand'),
			
		);
		$cp=array('c_id'=>$this->input->post('catlist'));
		$productinsert=$this->product_model->insertProduct($data,$cp);
		if($productinsert==1)
		{
			$result=array(
				'success'=>"Product inserted successfully...!!!",
				'error'=>'',
				);
			$this->load->model('admin/product_model');
			$data['category_table']=$this->product_model->getCategory();
			$res=array_merge($result, $data);
			$this->load->view('admin/vproduct',$res);
		}
		else
		{
			$result=array(
				'success'=>'',
				'error'=>'error...!!!!',
				);
			$this->load->model('admin/product_model');
			$data['category_table']=$this->product_model->getCategory();
			$res=array_merge($result, $data);
			$this->load->view('admin/vproduct',$res);	
		}
	}
	}
	public function updateP()
	{
		if ($this->is_logged_in())
        {
			$result=array(
					'success'=>'',
					'error'=>'',
					);
			$this->load->view('admin/vupdate',$result);
		}
		else
		{
			$this->load->view('admin/login_admin');
		}
	}
	public function updateproduct()
	{
		$isbn=$this->input->post('ISBN');
		$this->load->model('admin/product_model');
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
			$this->load->model('admin/product_model');
			$res=$this->product_model->updateProductResult($data);
			$data=array('res'=>$res);
			echo json_encode($data);
		}



	}
	public function deletP()
	{
		if ($this->is_logged_in())
        {
			$result=array(
					'success'=>'',
					'error'=>'',
					);
			$this->load->view("admin/vdelete",$result);
		}
		else
		{
			$this->load->view("admin/login_admin");
		}

	}
	public function deleteres(){
		$this->load->model('admin/product_model');
		$isbn=$this->input->post('isbnd');
		$res=$this->product_model->deleteproduct($isbn);
		$data=array('res'=>$res);
		echo json_encode($data);

	}
	public function showP()
	{
		if ($this->is_logged_in())
        {
			$this->load->model('adin/product_model');  
 			$data['jtablescript'] = $this->product_model->jtableconf();
  			$this->load->view('admin/showjtable', $data);
  		}
  		else
  		{
  			$this->load->view('admin/login_admin');
  		}
		// $this->load->view('showjtable');
	}
		public function showPdt()
	{
		if ($this->is_logged_in())
        {
			// $this->load->model('product_model');  
 		// 	$data['jtablescript'] = $this->product_model->jtableconf();
  			$this->load->view('admin/person_view');
  		}
  		else
  		{
  			$this->load->view('admin/login_admin');
  		}
		// $this->load->view('showjtable');
	}
		public function adduser()
	{
					$result=array(
					'success'=>'',
					'error'=>'',
					);
		if ($this->is_logged_in())
        {
  			$this->load->view('admin/vregisteruser',$result);
  		}
  		else
  		{
  			$this->load->view('admin/login_admin');
  		}
		// $this->load->view('showjtable');
	}
	public function userdatadt()
	{
		if ($this->is_logged_in())
        {
			// $this->load->model('user_model');  
 		// 	$data['jtablescript'] = $this->user_model->jtableconf();
  			$this->load->view('admin/vuserdata');
  		}
  		else
  		{
  			$this->load->view('admin/login_admin');
  		}
	}
	public function updatePselect()	
	{
		$id=$this->input->get('id');
		$this->load->model('admin/product_model');
		$data['res']=$this->product_model->SelectProduct($id);
		// print_r($data);
		$this->load->view('admin/updateproduct',$data);
	}
	public function deletePselect()
	{
		$this->load->model('adin/product_model');
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
		$this->load->model('admin/product_model');
		$data['category_table']=$this->product_model->getCategory();
		$res=array_merge($result, $data);
		$this->load->view('admin/vproduct',$res);
	}
		public function callInsertCategory()
	{
				$result=array(
				'success'=>'',
				'error'=>'',
				);
		$this->load->view('admin/vcategory',$result);
	}
	public function addCategory()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('categoryname', 'Category',  'required|is_unique[tblCategory.cat_name]',array('required' => '* You must provide a %s.','is_unique'=>'*You must provide a unique %s name'));
		$this->form_validation->set_rules('desc', 'desc', 'required',array('required' => '* You must provide a %s.')); 
		$name_file = $_FILES['img']['name'];

			if ($this->form_validation->run() == FALSE)
			{
				$result=array(
				'success'=>'',
				'error'=>'error...!!!!',
				);
				$this->load->view('admin/vcategory',$result);
			}
			else
			{
				$config = array(
				'upload_path' => "userimg/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf|txt",
				'overwrite' => TRUE,
				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'max_height' => "768",
				'max_width' => "1024"
				);
				$this->load->library('upload', $config);
				if($this->upload->do_upload('img'))
				{
				// $data = array('success' => $this->upload->data());
					$this->load->model('admin/product_model');

						$data = array(
				                'cat_name' => $this->input->post('categoryname'),
				                'description' => $this->input->post('desc'),
				                'image'=>$name_file,
				            );
						$this->load->helper("security");
						$xssdata=$this->security->xss_clean($data);
						$register=$this->product_model->insertCategory($xssdata);
						if($register==1)
						{
							$result=array(
								'success'=>"category isnerted successfully...!!!",
								'error'=>'',
								);
							$this->load->view('admin/vcategory',$result);
						}
						else
						{
							$result=array(
								'success'=>'',
								'error'=>'error...!!!!',
								);
								$this->load->view('admin/vcategory',$result);
						}
					// 		// $this->load->view('welcome_message');
						// }
					
						// $this->load->helper('new_helper');
						// echo 'helper--->';
						// print_r(getuser());

						// $this->load->library('madhura_lib');
						// $this->madhura_lib->getMetadata(2);
				}
				else
				{
				$error = array('error' => $this->upload->display_errors(),'success'=>'');
				$this->load->view('admin/vcategory', $error);
				}

				
		
	}
}


}