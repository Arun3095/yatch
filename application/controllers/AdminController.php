<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		/*$this->load->model('AdminModel');*/
		$this->load->library('session');
		$this->load->database();
		$this->load->library('form_validation');
		
	}
	public function index()
	{ 
		$this->load->view('admin/profile');
	}
	
}
?>


