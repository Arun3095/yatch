	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class TourPackage extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/TourPackageModel');
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
			$tourpackage = $this->TourPackageModel->get_all_view();
			$tourpackage_info['list_tour_package'] = $tourpackage;
			$this->load->view('admin/tour_package/list_tourpackage' ,$tourpackage_info);
		}

		public function add()
		{
			if ($this->input->server('REQUEST_METHOD') == 'GET')
			{
				$category = $this->CategoryModel->get_all_view();
				$category_info['get_tour_category'] = $category;
				$this->load->view('admin/tour_package/add_tourpackage' ,$category_info);
			}
			else if($this->input->server('REQUEST_METHOD') == 'POST')
			{


				$config['upload_path']          = './uploads/tour_package';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';

				$this->upload->initialize($config);
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('image'))
				{

					$error = array('error' => $this->upload->display_errors());
					$error = $this->session->set_flashdata('msg','Image Not Uploaded');
					$this->load->view('admin/tour_package/add_tourpackage', $error);

				}
				else
				{
					$data = $this->upload->data();
					$img = $data['raw_name'].$data['file_ext'];
					$tourpackage_data= array( 'category_id' =>$this->input->post('category_id'),
										'title' =>$this->input->post('title'),
										'base_price' =>$this->input->post('base_price'),
										'deal_price' =>$this->input->post('deal_price'),
										'short_description'=>$this->input->post('short_description'),
										'description' =>$this->input->post('description'),
										'status' =>$this->input->post('status'),
										'created_by' =>$this->input->post('created_by'),
										'LocalIP' 	=>$this->input->ip_address(),			    					
									);

					$tourpackage_data['image'] = $img;
					$insert_record = $this->TourPackageModel->insert_tourpackage($tourpackage_data);
					$this->session->set_flashdata('msg', $insert_record);
					redirect(base_url().'admin/TourPackage');
				}
			}
		}


		/*Edit Record*/
		public function edit_tourpackage_data()
		{
			if ($this->input->server('REQUEST_METHOD') == 'GET')
			{
				$tourpackage_id = $this->encryption->decrypt($this->input->get('edit_id'));
				$tourpackage_record['edit_tourpackage_record'] = $this->TourPackageModel->get_tourpackage_detail($tourpackage_id);
				/*Get All Category*/
				$category = $this->CategoryModel->get_all_view();
				$tourpackage_record['get_tour_category'] = $category;
				/*echo "<pre/>";print_r($tourpackage_record);*/
				$this->load->view('admin/tour_package/edit_tourpackage' , $tourpackage_record);
			}

			elseif($this->input->server('REQUEST_METHOD') == 'POST')
			{

				$tourpackage_id = $this->input->post('tourpackage_id');
				$image = $_FILES['image']['name'];

				if($image == '')
				{
					$edit_tourpackage_info= array( 'category_id' =>$this->input->post('category_id'),
						'title' =>$this->input->post('title'),
						'base_price' =>$this->input->post('base_price'),
						'deal_price' =>$this->input->post('deal_price'),
						'short_description'=>$this->input->post('short_description'),
						'description' =>$this->input->post('description'),
						'status' =>$this->input->post('status'),
						'created_by' =>$this->input->post('created_by'),
						'LocalIP' 	=>$this->input->ip_address(),	
					);
					$edit_record= $this->TourPackageModel->update_tourpackage($edit_tourpackage_info,$tourpackage_id);
					$this->session->set_flashdata('msg', $edit_record);
					redirect(base_url().'admin/TourPackage');

				}
				else
				{

					$config['upload_path']          = './uploads/tour_package';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('image'))
					{
						$error = array('error' => $this->upload->display_errors());
						$error = $this->session->set_flashdata('msg','Image Not Uploaded');
						$this->load->view('admin/tour_package/edit_tourpackage', $error); 
					}
					else
					{

						$imgpic = $this->db->get_where('tour_packages' , array('ID' => $tourpackage_id))->result();
						foreach ($imgpic as $img_delete)
						{
							$path  = "./uploads/tour_package/".$img_delete->image;
							unlink($path);
						}
						$data = $this->upload->data();
						$img = $data['raw_name'].$data['file_ext'];
						$edit_tourpackage_info= array('title' =>$this->input->post('title'),
										/*'slug' =>$this->input->post('slug'),*/
										'base_price' =>$this->input->post('base_price'),
										'deal_price' =>$this->input->post('deal_price'),
										'short_description'=>$this->input->post('short_description'),
										'description' =>$this->input->post('description'),
										'status' =>$this->input->post('status'),
										'created_by' =>$this->input->post('created_by'),
										'LocalIP' 	=>$this->input->ip_address(),
									);

						$edit_tourpackage_info['image'] = $img;
						$edit_record = $this->TourPackageModel->update_tourpackage($edit_tourpackage_info , $tourpackage_id);
						$this->session->set_flashdata('msg', $edit_record);
						redirect(base_url().'admin/TourPackage');
					}
				}    	
			}
		}


		/*Get All Tour Package*/

		/*End Here*/

		public function delete_tourpackage()
		{
			$tourpackage_id = $this->encryption->decrypt($this->input->get('delete_id'));
			$imgpic = $this->db->get_where('tour_packages' , array('ID' => $tourpackage_id))->result();
			foreach ($imgpic as $img_delete)
			{
				$path  = './uploads/tour_package/'.$img_delete->image;
				/*print_r($path);die();*/
				unlink($path);
			}
			$del = $this->TourPackageModel->delete($tourpackage_id);
			$this->session->set_flashdata('msg', $del);
			redirect(base_url().'admin/TourPackage');
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
				$this->TourPackageModel->delete($id[$count]);
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
					$this->TourPackageModel->update_status($status , $status_record);
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
					$this->TourPackageModel->update_status($status , $status_record);
				}
		 $this->session->set_flashdata('msg', 'Status Changed Successfully ');
	}
	

}
?>



