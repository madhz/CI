<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/person_model','person');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('person_view');
	}

	public function ajax_list()
	{
		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->p_name;
			$row[] = $person->ISBN;
			$row[] = $person->price;
			$row[] = $person->quantity;
			$row[] = $person->brand_name;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all(),
						"recordsFiltered" => $this->person->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		// $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'p_name' => $this->input->post('pnm'),
				'ISBN' => $this->input->post('isbn'),
				'price' => $this->input->post('price'),
				'quantity' => $this->input->post('qty'),
				'brand_name' => $this->input->post('bname'),
			);
		$insert = $this->person->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'p_name' => $this->input->post('pnm'),
				'ISBN' => $this->input->post('isbn'),
				'price' => $this->input->post('price'),
				'quantity' => $this->input->post('qty'),
				'brand_name' => $this->input->post('bname'),
			);
		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('pnm') == '')
		{
			$data['inputerror'][] = 'pnm';
			$data['error_string'][] = 'Product name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('isbn') == '')
		{
			$data['inputerror'][] = 'isbn';
			$data['error_string'][] = 'ISBN is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('price') == '')
		{
			$data['inputerror'][] = 'price';
			$data['error_string'][] = 'price is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('qty') == '')
		{
			$data['inputerror'][] = 'qty';
			$data['error_string'][] = 'qty is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('bname') == '')
		{
			$data['inputerror'][] = 'bname';
			$data['error_string'][] = 'bname is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
