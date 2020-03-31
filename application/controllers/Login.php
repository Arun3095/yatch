<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {
	
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('LoginModel');
		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view("login/login");
	}

	public function login()
	{
		$user_email = $this->input->post('email');
		$user_password = $this->input->post('password');
		$admin = $this->LoginModel->admin_login($user_email,$user_password);
		if($admin)
		{
			foreach ($admin as $key) 
			{
				$data1 = array(
				                'user_id' => $key->ID,
				                'user_name' => $key->name,
				                'user_email' => $key->email,
				                'user_mobile' => $key->contact_no,
				                /*'user_role' => $key->user_role,*/
				                'user_image' => $key->image,
				                'created_by' => $key->created_by,
				                'login_ind'=>true,
				               );
			}
				$this->session->set_userdata($data1);
				redirect(base_url(). "Dashboard");	
		}
		else
		{
			$this->session->set_flashdata('msg', 'Wrong Credentials');
			redirect(base_url(). 'Login');
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'Login');
	}


/*----------------Change Password-----------------*/
    public function change_password()
	{
		/*$this->authentication->check_permission();*/
		if($this->input->server('REQUEST_METHOD') == 'GET')
		{
			$id['id'] = $this->input->get('id');
			$this->load->view('login/change_password', $id);
		}
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$user_id = $this->input->post('user_id');
			$new_password = array('password' => crypt($this->input->post('new_password')));
			$old_password = $this->input->post('old_password');
			$msg = $this->LoginModel->validate_pass($user_id, $new_password, $old_password);
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url().'Login/change_password?='.$this->session->user_id);
		}
	}



}
?>
