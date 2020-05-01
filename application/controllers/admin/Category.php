	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Category extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/CategoryModel');
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
			$category = $this->CategoryModel->get_all_view();
			$category_info['list_category'] = $category;
			$this->load->view('admin/category/list_category' ,$category_info);
		}

		public function add()
		{
			if ($this->input->server('REQUEST_METHOD') == 'GET')
			{
				$this->load->view('admin/category/add_category');
			}
			else if($this->input->server('REQUEST_METHOD') == 'POST')
			{


				$config['upload_path']          = './uploads/category/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';

				$this->upload->initialize($config);
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('image'))
				{

					$error = array('error' => $this->upload->display_errors());
					$error = $this->session->set_flashdata('msg','Image Not Uploaded');
					$this->load->view('admin/category/add_category', $error);

				}
				else
				{
					$data = $this->upload->data();
					$img = $data['raw_name'].$data['file_ext'];
					$category_data= array( 'title' =>$this->input->post('title'),
										/*'slug' =>$this->input->post('slug'),*/
										'short_description'=>$this->input->post('short_description'),
										'description' =>$this->input->post('description'),
										'status' =>$this->input->post('status'),
										'created_by' =>$this->input->post('created_by'),
										'LocalIP' 	=>$this->input->ip_address(),			    					
									);

					$category_data['image'] = $img;
					$insert_record = $this->CategoryModel->insert_category($category_data);
					$this->session->set_flashdata('msg', $insert_record);
					redirect(base_url().'admin/Category');
				}
			}
		}


		/*Edit Record*/
		public function edit_category_data()
		{
			if ($this->input->server('REQUEST_METHOD') == 'GET')
			{
				$category_id = $this->encryption->decrypt($this->input->get('edit_id'));
				/*echo $category_id;die();*/
				$category_record['edit_category_record'] = $this->CategoryModel->get_category_detail($category_id);
				$this->load->view('admin/category/edit_category' , $category_record);
			}

			elseif($this->input->server('REQUEST_METHOD') == 'POST')
			{

				$category_id = $this->input->post('category_id');
				$image = $_FILES['image']['name'];

				if($image == '')
				{
					$edit_category_info= array( 'title' =>$this->input->post('title'),
						/*'slug' =>$this->input->post('slug'),*/
						'short_description'=>$this->input->post('short_description'),
						'description' =>$this->input->post('description'),
						'status' =>$this->input->post('status'),
						'created_by' =>$this->input->post('created_by'),
						'LocalIP' 	=>$this->input->ip_address(),	
					);
					$edit_record= $this->CategoryModel->update_category($edit_category_info,$category_id);
					$this->session->set_flashdata('msg', $edit_record);
					redirect(base_url().'admin/Category');

				}
				else
				{

					$config['upload_path']          = './uploads/category/';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('image'))
					{
						$error = array('error' => $this->upload->display_errors());
						$error = $this->session->set_flashdata('msg','Image Not Uploaded');
						$this->load->view('admin/category/edit_category', $error); 
					}
					else
					{

						$imgpic = $this->db->get_where('category' , array('ID' => $category_id))->result();
						foreach ($imgpic as $img_delete)
						{
							$path  = "./uploads/category/".$img_delete->image;
							unlink($path);
						}
						$data = $this->upload->data();
						$img = $data['raw_name'].$data['file_ext'];
						$edit_category_info= array('title' =>$this->input->post('title'),
										/*'slug' =>$this->input->post('slug'),*/
										'short_description'=>$this->input->post('short_description'),
										'description' =>$this->input->post('description'),
										'status' =>$this->input->post('status'),
										'created_by' =>$this->input->post('created_by'),
										'LocalIP' 	=>$this->input->ip_address(),
									);

						$edit_category_info['image'] = $img;
						$edit_record = $this->CategoryModel->update_category($edit_category_info , $category_id);
						$this->session->set_flashdata('msg', $edit_record);
						redirect(base_url().'admin/Category');
					}
				}    	
			}
		}

		/*End Here*/

		public function delete_category()
		{
			$category_id =  $this->encryption->decrypt($this->input->get('delete_id'));
			$imgpic = $this->db->get_where('category' , array('ID' => $category_id))->result();
			foreach ($imgpic as $img_delete)
			{
				$path  = './uploads/category/'.$img_delete->image;
				/*print_r($path);die();*/
				unlink($path);
			}
			$del = $this->CategoryModel->delete($category_id);
			$this->session->set_flashdata('msg', $del);
			redirect(base_url().'admin/Category');
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
				$this->CategoryModel->delete($id[$count]);
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
					$this->CategoryModel->update_status($status , $status_record);
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
					$this->CategoryModel->update_status($status , $status_record);
				}
		 $this->session->set_flashdata('msg', 'Status Changed Successfully ');
	}

}
?>



