	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class About extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/AboutModel');
			$this->load->library('session');
			$this->load->database();
			$this->load->helper('file');
			$this->load->library('user_agent');
			$this->load->library('form_validation');
			$this->load->helper(array('form' ,'url','text'));
			$this->load->library('upload');
		}


		public function index()
		{
			$about = $this->AboutModel->get_all_view();
			$about_info['list_about'] = $about;
			$this->load->view('admin/about/list_about' ,$about_info);
		}

		public function add()
		{
			if ($this->input->server('REQUEST_METHOD') == 'GET')
			{
				$this->load->view('admin/about/add_about');
			}
			else if($this->input->server('REQUEST_METHOD') == 'POST')
			{


				$config['upload_path']          = './uploads/about';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';

				$this->upload->initialize($config);
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('image'))
				{

					$error = array('error' => $this->upload->display_errors());
					$error = $this->session->set_flashdata('msg','Image Not Uploaded');
					$this->load->view('admin/about/add_about', $error);

				}
				else
				{
					$data = $this->upload->data();
					$img = $data['raw_name'].$data['file_ext'];
					$about_data= array( 'title' =>$this->input->post('title'),

						/*'slug' =>$this->input->post('slug'),*/
						/*'type' =>$this->input->post('type'),*/
						'description' =>$this->input->post('description'),
						'status' =>$this->input->post('status'),
						'created_by' =>$this->input->post('created_by'),
						'LocalIP' 	=>$this->input->ip_address(),			    					
					);

					$about_data['image'] = $img;
					$insert_record = $this->AboutModel->insert_about($about_data);
					$this->session->set_flashdata('msg', $insert_record);
					redirect(base_url().'admin/About');
				}
			}
		}


		/*Edit Record*/
		public function edit_about_data()
		{
			if ($this->input->server('REQUEST_METHOD') == 'GET')
			{
				$about_id = $this->input->get('edit_id');
				$about_record['edit_about_record'] = $this->AboutModel->get_about_detail($about_id);
				$this->load->view('admin/about/edit_about' , $about_record);
			}

			elseif($this->input->server('REQUEST_METHOD') == 'POST')
			{

				$about_id = $this->input->post('about_id');
				$image = $_FILES['image']['name'];

				if($image == '')
				{
					$edit_about_info= array( 'title' =>$this->input->post('title'),
											/*'slug' =>$this->input->post('slug'),*/
											/*'type' =>$this->input->post('type'),*/
											'description' =>$this->input->post('description'),
											'status' =>$this->input->post('status'),
											'created_by' =>$this->input->post('created_by'),
											'LocalIP' 	=>$this->input->ip_address(),	
										);
					$edit_record= $this->AboutModel->update_about($edit_about_info,$about_id);
					$this->session->set_flashdata('msg', $edit_record);
					redirect(base_url().'admin/About');

				}
				else
				{

					$config['upload_path']          = './uploads/about';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('image'))
					{
						$error = array('error' => $this->upload->display_errors());
						$error = $this->session->set_flashdata('msg','Image Not Uploaded');
						$this->load->view('admin/about/edit_about', $error); 
					}
					else
					{

						$imgpic = $this->db->get_where('about_us' , array('ID' => $about_id))->result();
						foreach ($imgpic as $img_delete)
						{
							$path  = "./uploads/about/".$img_delete->image;
							unlink($path);
						}
						$data = $this->upload->data();
						$img = $data['raw_name'].$data['file_ext'];
						$edit_about_info= array('title' =>$this->input->post('title'),
												/*'slug' =>$this->input->post('slug'),*/
												/*'type' =>$this->input->post('type'),*/
												'description' =>$this->input->post('description'),
												'status' =>$this->input->post('status'),
												'created_by' =>$this->input->post('created_by'),
												'LocalIP' 	=>$this->input->ip_address(),
											);

						$edit_about_info['image'] = $img;
						$edit_record = $this->AboutModel->update_about($edit_about_info , $about_id);
						$this->session->set_flashdata('msg', $edit_record);
						redirect(base_url().'admin/About');
					}
				}    	
			}
		}

		/*End Here*/

		public function delete_about()
		{
			$about_id = $this->input->get('delete_id');
			$imgpic = $this->db->get_where('abouts' , array('ID' => $about_id))->result();
			foreach ($imgpic as $img_delete)
			{
				$path  = './uploads/about/'.$img_delete->image;
				/*print_r($path);die();*/
				unlink($path);
			}
			$del = $this->AboutModel->delete($about_id);
			$this->session->set_flashdata('msg', $del);
			redirect(base_url().'admin/About');
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
				$this->AboutModel->delete($id[$count]);
			}
		}
	}

	/*---------Updae Status----------*/
	public function update_disactive()
	{	
		$change_status=$this->input->post('status_value');
		$status_record = array('status' => $this->input->post('status_record'));
		
		if ($status_record['status'] == 1) {
			$status_record['status'] = 0;
		}

		foreach ($change_status as $status) {
					$this->AboutModel->update_status($status , $status_record);
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
					$this->AboutModel->update_status($status , $status_record);
				}
		 $this->session->set_flashdata('msg', 'Status Changed Successfully ');
	}

}
?>



