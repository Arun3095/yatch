<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');
		$this->load->library('session','encryption');
		$this->load->database();
		$this->load->helper('file');
		$this->load->library('user_agent');
		$this->load->library('form_validation');
		$this->load->helper(array('form' ,'url'));
		$this->load->library('upload');
		
	}

	public function add()
	{
		if ($this->input->server('REQUEST_METHOD') == 'GET')
		{    
			$this->load->view('admin/add_user');
		}
		else if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('first_name','First Name','required|alpha|trim|min_length[3]');
			$this->form_validation->set_rules('last_name','Last Name','required|alpha|trim|min_length[3]');
			$this->form_validation->set_rules('name',' User Name','required|alpha|trim|min_length[3]');
			$this->form_validation->set_rules('email',' Email','required|trim|valid_email');
			$this->form_validation->set_rules('contact_no',' Contact Number','required|trim|is_natural|integer|min_length[10]|max_length[14]'); 
			$this->form_validation->set_rules('address',' Address','required');
			/*$this->form_validation->set_rules('created_by','Created By','required|trim|callback_created_by');*/
			/*$this->form_validation->set_message('created_by', 'You Need To Select Created By');*/
			/*$this->form_validation->set_rules('status','Status','required|trim|callback_Status');*/
			/*$this->form_validation->set_message('Status', 'You Need to Select Status');*/
			$this->form_validation->set_error_delimiters('<div class="text-danger" ','</div>');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin/add_user');
			}

			else
			{
				$config['upload_path']          = './uploads/admin/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
				$this->upload->initialize($config);
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('image'))
				{

					$error = array('error' => $this->upload->display_errors());
					$error = $this->session->set_flashdata('msg','Img Not Uploaded');
					$this->load->view('admin/add_user', $error);

				}
				else
				{
					$data = $this->upload->data();
					$img = $data['raw_name'].$data['file_ext'];
					$user_data= array( 'first_name' =>$this->input->post('first_name'),
										'last_name' =>$this->input->post('last_name'),
										'name' =>$this->input->post('name'),
										'email' =>$this->input->post('email'),
										'contact_no' =>$this->input->post('contact_no'),
										'address' =>$this->input->post('address'),
										'status' =>$this->input->post('status'),
										'LocalIP' 	=>$this->input->ip_address(),
										'created_by' =>$this->input->post('created_by'),		
					);

					$user_data['image'] = $img;
                     	// print_r($blog_data);die();
					$insert_record = $this->AdminModel->insert($user_data);
					$this->session->set_flashdata('msg', $insert_record);
					redirect(base_url().'AdminController/view_all_user');
				}
			}
		}
	}

	/*All User record Table*/
	public function view_all_user()
	{
		$user_records = $this->AdminModel->get_all_user();
		$all_user['all_record'] = $user_records;
		$this->load->view('admin/view_users' , $all_user);
	}

	/*----------------For Admin Updated----------------------*/
	public function index()
	{ 
		if ($this->input->server('REQUEST_METHOD') == 'GET')
		{
			$user_id=$this->session->user_id; 
			$admin_detail['admin'] = $this->AdminModel->get_admin_detail($user_id);
			/*$admin_detail['admin'] = $this->db->get_where('users' , array('ID' => $user_id))->result();*/
			$this->load->view('admin/profile',$admin_detail);
		}

		elseif($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$user_id = $this->input->post('user_id');
			$image = $_FILES['image']['name'];
			
			if ($image == '')
			{
				$admin_data = array('first_name' =>$this->input->post('first_name'),
					'last_name' =>$this->input->post('last_name'),
					'name' =>$this->input->post('name'),
					'email' =>$this->input->post('email'),
					'contact_no' =>$this->input->post('contact_no'),
					'address' =>$this->input->post('address'),
					'status' =>$this->input->post('status'),
					'LocalIP' 	=>$this->input->ip_address(),
					'created_by' =>$this->input->post('created_by'),
				);
				$admin_data = $this->AdminModel->update_admin($admin_data,$user_id);
				$this->session->set_flashdata('msg',$admin_data);
				redirect(base_url().'AdminController');
			}
			else
			{

				$config['upload_path']          = './uploads/admin/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$this->upload->initialize($config);
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('image'))
				{
					$error = array('error' => $this->upload->display_errors());
					$error = $this->session->set_flashdata('msg','Image Not Uploaded');
					$this->load->view('admin/profile', $error); 
				}
				else
				{

					$imgpic = $this->db->get_where('users' , array('ID' => $user_id))->result();

					foreach ($imgpic as $img_delete)
					{
						$path = './uploads/admin/'.$img_delete->image;
						unlink($path);
					}
					$data = $this->upload->data();
					$img = $data['raw_name'].$data['file_ext'];
					$admin_data= array('first_name' =>$this->input->post('first_name'),
						'last_name' =>$this->input->post('last_name'),
						'name' =>$this->input->post('name'),
						'email' =>$this->input->post('email'),
						'contact_no' =>$this->input->post('contact_no'),
						'address' =>$this->input->post('address'),
						'status' =>$this->input->post('status'),
						'created_by' =>$this->input->post('created_by'),
						'LocalIP' 	=>$this->input->ip_address(),
					);

					$admin_data['image'] = $img;
					/*print_r($edit_admin_info);die();*/
					$edit_record = $this->AdminModel->update_admin($admin_data , $user_id);
					$this->session->set_flashdata('msg', 'Record Updated Successfully ');
					redirect(base_url().'AdminController');
				}

			}
		}
	}
	/*----------------End Here----------------------*/


	/*----------------For User's Edit Function------------*/
	public function edit_user()
	{ 
		if ($this->input->server('REQUEST_METHOD') == 'GET')
		{
			$user_id= $this->encryption->decrypt($this->input->get('edit_id'));
			/*echo $user_id;die();*/
			$admin_detail['users'] = $this->AdminModel->get_admin_detail($user_id);
			$this->load->view('admin/edit_user',$admin_detail);
		}

		elseif($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$user_id = $this->input->post('user_id');
			$image = $_FILES['image']['name'];
			
			if ($image == '')
			{
				$user_data = array('first_name' =>$this->input->post('first_name'),
					'last_name' =>$this->input->post('last_name'),
					'name' =>$this->input->post('name'),
					'email' =>$this->input->post('email'),
					'contact_no' =>$this->input->post('contact_no'),
					'address' =>$this->input->post('address'),
					'status' =>$this->input->post('status'),
					'LocalIP' 	=>$this->input->ip_address(),
					'created_by' =>$this->input->post('created_by'),
				);
				$user_data = $this->AdminModel->update_admin($user_data,$user_id);
				$this->session->set_flashdata('msg',$user_data);
				redirect(base_url().'AdminController/view_all_user');
			}
			else
			{

				$config['upload_path']          = './uploads/admin/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$this->upload->initialize($config);
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('image'))
				{
					$error = array('error' => $this->upload->display_errors());
					$error = $this->session->set_flashdata('msg','Image Not Uploaded');
					$this->load->view('admin/edit_user', $error); 
				}
				else
				{

					$imgpic = $this->db->get_where('users' , array('ID' => $user_id))->result();

					foreach ($imgpic as $img_delete)
					{
						$path = './uploads/admin/'.$img_delete->image;
						unlink($path);
					}
					$data = $this->upload->data();
					$img = $data['raw_name'].$data['file_ext'];
					$admin_data= array('first_name' =>$this->input->post('first_name'),
						'last_name' =>$this->input->post('last_name'),
						'name' =>$this->input->post('name'),
						'email' =>$this->input->post('email'),
						'contact_no' =>$this->input->post('contact_no'),
						'address' =>$this->input->post('address'),
						'status' =>$this->input->post('status'),
						'created_by' =>$this->input->post('created_by'),
						'LocalIP' 	=>$this->input->ip_address(),
					);

					$admin_data['image'] = $img;
					/*print_r($edit_admin_info);die();*/
					$edit_record = $this->AdminModel->update_admin($admin_data , $user_id);
					$this->session->set_flashdata('msg', 'Record Updated Successfully ');
					redirect(base_url().'AdminController/view_all_user');
				}

			}
		}
	}
	/*----------------------End Here----------------*/

	public function delete_user()
	{
		$user_id =  $this->encryption->decrypt($this->input->get('delete_id'));
		$imgpic = $this->db->get_where('users' , array('ID' => $user_id))->result();
		foreach ($imgpic as $img_delete)
		{
			$path  = './uploads/admin/'.$img_delete->image;
			unlink($path);
			/*$path = unlink('uploads/admin'.$img_delete->image);*/
		}
		$this->AdminModel->delete_user($user_id);
		redirect(base_url().'AdminController/view_all_user');
	}

	/*For Delete Selected Users*/
	function delete_all()
	{
		if($this->input->post('checkbox_value'))
		{
			$id = $this->input->post('checkbox_value');
			/*$imgpic = $this->db->get_where('users' , array('ID' => $id))->result();
			foreach ($imgpic as $img_delete)
			{

				$path  = './uploads/admin/'.$img_delete->image;
				unlink($path);
			}*/
			for($count = 0; $count < count($id); $count++)
			{
				$this->AdminModel->delete_user($id[$count]);
			}
			$this->session->set_flashdata('msg', 'Selected Items Deleted Successfully ');
		}
	}
	/*End Here */

	/*---------Updae Status----------*/
	public function update_disactive()
	{	
		$change_status=$this->input->post('status_value');
		$status_record = array('status' => $this->input->post('status_record'));
		
		if ($status_record['status'] == 1) {
			$status_record['status'] = 0;
		}

		foreach ($change_status as $status) {
					$this->AdminModel->update_status($status , $status_record);
				}
		return $this->session->set_flashdata('msg', 'Status Changed Successfully ');
	}
	/*---------End Here----*/

	/*---------Updae Status----------*/
	public function update_active()
	{	
		$change_status=$this->input->post('status_value');
		$status_record = array('status' => $this->input->post('status_record'));
		
		if ($status_record['status'] == 0) {
			$status_record['status'] = 1;
		}

		foreach ($change_status as $status) {
					$this->AdminModel->update_status($status , $status_record);
				}
		 $this->session->set_flashdata('msg', 'Status Changed Successfully ');
	}
	/*---------End Here----*/
	
}
?>


