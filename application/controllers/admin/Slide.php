	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Slide extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/SlideModel');
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
			$slide = $this->SlideModel->get_all_view();
			$slide_info['list_slide'] = $slide;
			$this->load->view('admin/slides/list_slide' ,$slide_info);
		}

		public function add()
		{
			if ($this->input->server('REQUEST_METHOD') == 'GET')
			{
				$this->load->view('admin/slides/add_slide');
			}
			else if($this->input->server('REQUEST_METHOD') == 'POST')
			{


				$config['upload_path']          = './uploads/slide/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';

				$this->upload->initialize($config);
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('image'))
				{

					$error = array('error' => $this->upload->display_errors());
					$error = $this->session->set_flashdata('msg','Image Not Uploaded');
					$this->load->view('admin/slides/add_slide', $error);

				}
				else
				{
					$data = $this->upload->data();
					$img = $data['raw_name'].$data['file_ext'];
					$slide_data= array( 'title' =>$this->input->post('title'),
										/*'slug' =>$this->input->post('slug'),*/
										'short_description'=>$this->input->post('short_description'),
										'description' =>$this->input->post('description'),
										'status' =>$this->input->post('status'),
										'created_by' =>$this->input->post('created_by'),
										'LocalIP' 	=>$this->input->ip_address(),			    					
									);

					$slide_data['image'] = $img;
					$insert_record = $this->SlideModel->insert_slide($slide_data);
					$this->session->set_flashdata('msg', $insert_record);
					redirect(base_url().'admin/Slide');
				}
			}
		}


		/*Edit Record*/
		public function edit_slide_data()
		{
			if ($this->input->server('REQUEST_METHOD') == 'GET')
			{
				$slide_id = $this->encryption->decrypt($this->input->get('edit_id'));
				$slide_record['edit_slide_record'] = $this->SlideModel->get_slide_detail($slide_id);
				$this->load->view('admin/slides/edit_slide' , $slide_record);
			}

			elseif($this->input->server('REQUEST_METHOD') == 'POST')
			{

				$slide_id = $this->input->post('slide_id');
				$image = $_FILES['image']['name'];

				if($image == '')
				{
					$edit_slide_info= array( 'title' =>$this->input->post('title'),
						/*'slug' =>$this->input->post('slug'),*/
						'short_description'=>$this->input->post('short_description'),
						'description' =>$this->input->post('description'),
						'status' =>$this->input->post('status'),
						'created_by' =>$this->input->post('created_by'),
						'LocalIP' 	=>$this->input->ip_address(),	
					);
					$edit_record= $this->SlideModel->update_slide($edit_slide_info,$slide_id);
					$this->session->set_flashdata('msg', $edit_record);
					redirect(base_url().'admin/Slide');

				}
				else
				{

					$config['upload_path']          = './uploads/slide/';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('image'))
					{
						$error = array('error' => $this->upload->display_errors());
						$error = $this->session->set_flashdata('msg','Image Not Uploaded');
						$this->load->view('admin/slides/edit_slide', $error); 
					}
					else
					{

						$imgpic = $this->db->get_where('slides' , array('ID' => $slide_id))->result();
						foreach ($imgpic as $img_delete)
						{
							$path  = "./uploads/slide/".$img_delete->image;
							unlink($path);
						}
						$data = $this->upload->data();
						$img = $data['raw_name'].$data['file_ext'];
						$edit_slide_info= array('title' =>$this->input->post('title'),
										/*'slug' =>$this->input->post('slug'),*/
										'short_description'=>$this->input->post('short_description'),
										'description' =>$this->input->post('description'),
										'status' =>$this->input->post('status'),
										'created_by' =>$this->input->post('created_by'),
										'LocalIP' 	=>$this->input->ip_address(),
									);

						$edit_slide_info['image'] = $img;
						$edit_record = $this->SlideModel->update_slide($edit_slide_info , $slide_id);
						$this->session->set_flashdata('msg', $edit_record);
						redirect(base_url().'admin/Slide');
					}
				}    	
			}
		}

		/*End Here*/
		public function delete_slide()
		{
			$slide_id = $this->encryption->decrypt($this->input->get('delete_id'));
			$imgpic = $this->db->get_where('slides' , array('ID' => $slide_id))->result();
			foreach ($imgpic as $img_delete)
			{
				$path  = './uploads/slide/'.$img_delete->image;
				unlink($path);
			}
			$del = $this->SlideModel->delete($slide_id);
			$this->session->set_flashdata('msg', $del);
			redirect(base_url().'admin/Slide');
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
				$this->SlideModel->delete($id[$count]);
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
					$this->SlideModel->update_status($status , $status_record);
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
					$this->SlideModel->update_status($status , $status_record);
				}
		 $this->session->set_flashdata('msg', 'Status Changed Successfully ');
	}

		
}
?>



