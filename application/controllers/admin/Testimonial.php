<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/TestimonialModel');
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('file');
		$this->load->library('user_agent');
		$this->load->library('form_validation' ,'encrypt');
		$this->load->helper(array('form' ,'url'));
		$this->load->library('upload');
	}

	public function index()
	{
		$testimonial = $this->TestimonialModel->get_all_view();
		$testimonial_info['list_testimonial'] = $testimonial;
		$this->load->view('admin/testimonials/list_testimonial' , $testimonial_info);
	}

	/*public function index()
	{
		$this->load->view('admin/testimonials/add_testimonial');
	}*/


	public function add()
	{
		if ($this->input->server('REQUEST_METHOD') == 'GET')
		{
			$this->load->view('admin/testimonials/add_testimonial');
		}
		else if($this->input->server('REQUEST_METHOD') == 'POST')
		{


			$config['upload_path']          = './uploads/testimonial';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
          
			$this->upload->initialize($config);
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('image'))
			{

				$error = array('error' => $this->upload->display_errors());
				$error = $this->session->set_flashdata('msg','Imaage Not Uploaded');
				$this->load->view('admin/testimonials/add_testimonial', $error);

			}
			else
			{
				$data = $this->upload->data();
				$img = $data['raw_name'].$data['file_ext'];
			    $testimonial_data= array( 'title' =>$this->input->post('title'),
									'name' =>$this->input->post('name'),
									'designation' =>$this->input->post('designation'),
									'description' =>$this->input->post('description'),
									'status' =>$this->input->post('status'),
									'LocalIP' 	=>$this->input->ip_address(),
									'created_by' =>$this->input->post('created_by'),				
				);

				$testimonial_data['image'] = $img;
				$insert_record = $this->TestimonialModel->insert_testimonial($testimonial_data);
				$this->session->set_flashdata('msg', $insert_record);
				redirect(base_url().'admin/Testimonial');
			}
		}
	}

	/*Edit Record*/
	public function edit_testimonial_data()
		{
			if ($this->input->server('REQUEST_METHOD') == 'GET')
			{
				$testimonial_id = $this->encryption->decrypt($this->input->get('edit_id'));
				$testimonial_record['edit_testimonial_record'] = $this->TestimonialModel->get_testimonial_detail($testimonial_id);
				$this->load->view('admin/testimonials/edit_testimonial' , $testimonial_record);
			}

			elseif($this->input->server('REQUEST_METHOD') == 'POST')
			{

					$testimonial_id = $this->input->post('testimonial_id');
					$image = $_FILES['image']['name'];
					
	                	if($image == '')
	                	{
	                     	$edit_testimonial_info= array( 'title' =>$this->input->post('title'),
														'name' =>$this->input->post('name'),
														'designation' =>$this->input->post('designation'),
														'description' =>$this->input->post('description'),
														'status' =>$this->input->post('status'),
														'LocalIP' 	=>$this->input->ip_address(),
														'created_by' =>$this->input->post('created_by'),
					      				    		);
	                     	$edit_record = $this->TestimonialModel->update_testimonial($edit_testimonial_info,$testimonial_id);
	                     	$this->session->set_flashdata('msg', $edit_record);
	                     	redirect(base_url().'admin/Testimonial');

	                	}
	                	else
	                	{
	                		
	                		$config['upload_path']          = './uploads/testimonial';
			                $config['allowed_types']        = 'gif|jpg|png|jpeg';
			                $this->upload->initialize($config);
			               	$this->load->library('upload', $config);
			               	if(!$this->upload->do_upload('image'))
	                		{
	                        	$error = array('error' => $this->upload->display_errors());
	                        	$error = $this->session->set_flashdata('msg','Image Not Uploaded');
	                       		$this->load->view('admin/testimonials/edit_testimonial', $error); 
	                		}
	                		else
	                		{

	                			$imgpic = $this->db->get_where('testimonials' , array('ID' => $testimonial_id))->result();
								foreach ($imgpic as $img_delete)
								{
									$path  = "./uploads/testimonial/".$img_delete->image;
									unlink($path);
								}
	                			$data = $this->upload->data();
		                     	$img = $data['raw_name'].$data['file_ext'];
		                     	$edit_testimonial_info= array('title' =>$this->input->post('title'),
														'name' =>$this->input->post('name'),
														'designation' =>$this->input->post('designation'),
														'description' =>$this->input->post('description'),
														'status' =>$this->input->post('status'),
														'LocalIP' 	=>$this->input->ip_address(),
														'created_by' =>$this->input->post('created_by'),
						      				    		);

		                		$edit_testimonial_info['image'] = $img;
								$edit_record = $this->TestimonialModel->update_testimonial($edit_testimonial_info , $testimonial_id);
								redirect(base_url().'admin/Testimonial');
	                		}
	                	}    	
	                }
				}

	/*End Here*/

	public function delete_testimonial()
		{
			$testimonial_id = $this->encryption->decrypt($this->input->get('delete_id'));
			$imgpic = $this->db->get_where('testimonials' , array('ID' => $testimonial_id))->result();
			foreach ($imgpic as $img_delete)
			{
				$path  = './uploads/testimonial/'.$img_delete->image;
				unlink($path);
			}
			$this->TestimonialModel->delete($testimonial_id);
			redirect(base_url().'admin/Testimonial');
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
				$this->TestimonialModel->delete($id[$count]);
			}
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
					$this->TestimonialModel->update_status($status , $status_record);
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
					$this->TestimonialModel->update_status($status , $status_record);
				}
		 $this->session->set_flashdata('msg', 'Status Changed Successfully ');
	}


}