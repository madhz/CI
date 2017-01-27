<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Front extends MY_controller
{

	public function index()
	{
		$this->load->view('user/vfront');
	}
}