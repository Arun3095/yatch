<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller 
{
public function __construct()
{
	parent::__construct();
	$this->load->model('admin/BlogModel');
	$this->load->library('session');
	$this->load->database();
	$this->load->helper('file');
	$this->load->library('user_agent');
	$this->load->library('form_validation');
	$this->load->helper(array('form' ,'url'));
	$this->load->library('upload');
}

public function index()
{
	$blog = $this->BlogModel->get_all_view();
	$blog_info['list_blog'] = $blog;
	$this->load->view('admin/blogs/list_blog' ,$blog_info);
}

public function add()
{
	if ($this->input->server('REQUEST_METHOD') == 'GET')
	{
		$this->load->view('admin/blogs/add_blog');
	}
	else if($this->input->server('REQUEST_METHOD') == 'POST')
	{


		$config['upload_path']          = './uploads/blog';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';

		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image'))
		{

			$error = array('error' => $this->upload->display_errors());
			$error = $this->session->set_flashdata('msg','Image Not Uploaded');
			$this->load->view('admin/blogs/add_blog', $error);

		}
		else
		{
			$data = $this->upload->data();
			$img = $data['raw_name'].$data['file_ext'];
			$blog_data= array( 'title' =>$this->input->post('title'),
							/*'slug' =>$this->input->post('slug'),*/
							/*'type' =>$this->input->post('type'),*/
							'description' =>$this->input->post('description'),
							'status' =>$this->input->post('status'),
							'created_by' =>$this->input->post('created_by'),
							'LocalIP' 	=>$this->input->ip_address(),			    					
			);

			$blog_data['image'] = $img;
			$insert_record = $this->BlogModel->insert_blog($blog_data);
			$this->session->set_flashdata('msg', $insert_record);
			redirect(base_url().'admin/Blog');
		}
	}
}


/*Edit Record*/
public function edit_blog_data()
{
	if ($this->input->server('REQUEST_METHOD') == 'GET')
	{
		$blog_id =  $this->encryption->decrypt($this->input->get('edit_id'));
		$blog_record['edit_blog_record'] = $this->BlogModel->get_blog_detail($blog_id);
		$this->load->view('admin/blogs/edit_blog' , $blog_record);
	}

	elseif($this->input->server('REQUEST_METHOD') == 'POST')
	{

		$blog_id = $this->input->post('blog_id');
		$image = $_FILES['image']['name'];

		if($image == '')
		{
			$edit_blog_info= array( 'title' =>$this->input->post('title'),
										/*'slug' =>$this->input->post('slug'),*/
										/*'type' =>$this->input->post('type'),*/
										'description' =>$this->input->post('description'),
										'status' =>$this->input->post('status'),
										'created_by' =>$this->input->post('created_by'),
										'LocalIP' 	=>$this->input->ip_address(),	
									);
			$edit_record= $this->BlogModel->update_blog($edit_blog_info,$blog_id);
			$this->session->set_flashdata('msg', $edit_record);
			redirect(base_url().'admin/Blog');

		}
		else
		{

			$config['upload_path']          = './uploads/blog';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('image'))
			{
				$error = array('error' => $this->upload->display_errors());
				$error = $this->session->set_flashdata('msg','Image Not Uploaded');
				$this->load->view('admin/blogs/edit_blog', $error); 
			}
			else
			{

				$imgpic = $this->db->get_where('blogs' , array('ID' => $blog_id))->result();
				foreach ($imgpic as $img_delete)
				{
					$path  = "./uploads/blog/".$img_delete->image;
					unlink($path);
				}
				$data = $this->upload->data();
				$img = $data['raw_name'].$data['file_ext'];
				$edit_blog_info= array('title' =>$this->input->post('title'),
											/*'slug' =>$this->input->post('slug'),*/
											/*'type' =>$this->input->post('type'),*/
											'description' =>$this->input->post('description'),
											'status' =>$this->input->post('status'),
											'created_by' =>$this->input->post('created_by'),
											'LocalIP' 	=>$this->input->ip_address(),
										   );

				$edit_blog_info['image'] = $img;
				$edit_record = $this->BlogModel->update_blog($edit_blog_info , $blog_id);
				$this->session->set_flashdata('msg', $edit_record);
				redirect(base_url().'admin/Blog');
			}
		}    	
	}
}

/*End Here*/

public function delete_blog()
{
	$blog_id =  $this->encryption->decrypt($this->input->get('delete_id'));
	$imgpic = $this->db->get_where('blogs' , array('ID' => $blog_id))->result();
	foreach ($imgpic as $img_delete)
	{
		$path  = './uploads/blog/'.$img_delete->image;
		/*print_r($path);die();*/
		unlink($path);
	}
	$del = $this->BlogModel->delete($blog_id);
	$this->session->set_flashdata('msg', $del);
	redirect(base_url().'admin/Blog');
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
			$this->BlogModel->delete($id[$count]);
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
					$this->BlogModel->update_status($status , $status_record);
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
					$this->BlogModel->update_status($status , $status_record);
				}
		 $this->session->set_flashdata('msg', 'Status Changed Successfully ');
	}

}

?>