<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transport extends CI_Controller 
{
public function __construct()
{
	parent::__construct();
	$this->load->model('admin/TransportModel');
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
	$transport = $this->TransportModel->get_all_view();
	$transport_info['list_transport'] = $transport;
	$this->load->view('admin/transports/list_transport' ,$transport_info);
}

public function add()
{
	if ($this->input->server('REQUEST_METHOD') == 'GET')
	{
		$this->load->view('admin/transports/add_transport');
	}
	else if($this->input->server('REQUEST_METHOD') == 'POST')
	{


		$config['upload_path']          = './uploads/transport';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';

		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image'))
		{

			$error = array('error' => $this->upload->display_errors());
			$error = $this->session->set_flashdata('msg','Imaage Not Uploaded');
			$this->load->view('admin/transports/add_transport', $error);

		}
		else
		{
			$data = $this->upload->data();
			$img = $data['raw_name'].$data['file_ext'];
			$transport_data= array( 'name' =>$this->input->post('name'),
				/*'slug' =>$this->input->post('slug'),*/
				/*'type' =>$this->input->post('type'),*/
				'description' =>$this->input->post('description'),
				'status' =>$this->input->post('status'),
				'created_by' =>$this->input->post('created_by'),
				'LocalIP' 	=>$this->input->ip_address(),			    					
			);

			$transport_data['image'] = $img;
			$insert_record = $this->TransportModel->insert_transport($transport_data);
			$this->session->set_flashdata('msg', $insert_record);
			redirect(base_url().'admin/Transport');
		}
	}
}


/*Edit Record*/
public function edit_transport_data()
{
	if ($this->input->server('REQUEST_METHOD') == 'GET')
	{
		$transport_id = $this->encryption->decrypt($this->input->get('edit_id'));
		$transport_record['edit_transport_record'] = $this->TransportModel->get_transport_detail($transport_id);
		$this->load->view('admin/transports/edit_transport' , $transport_record);
	}

	elseif($this->input->server('REQUEST_METHOD') == 'POST')
	{

		$transport_id = $this->input->post('transport_id');
		$image = $_FILES['image']['name'];

		if($image == '')
		{
			$edit_transport_info= array( 'name' =>$this->input->post('name'),
										/*'slug' =>$this->input->post('slug'),*/
										/*'type' =>$this->input->post('type'),*/
										'description' =>$this->input->post('description'),
										'status' =>$this->input->post('status'),
										'created_by' =>$this->input->post('created_by'),
										'LocalIP' 	=>$this->input->ip_address(),	
									);
			$edit_record= $this->TransportModel->update_transport($edit_transport_info,$transport_id);
			$this->session->set_flashdata('msg', $edit_record);
			redirect(base_url().'admin/Transport');

		}
		else
		{

			$config['upload_path']          = './uploads/transport';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('image'))
			{
				$error = array('error' => $this->upload->display_errors());
				$error = $this->session->set_flashdata('msg','Image Not Uploaded');
				$this->load->view('admin/transports/edit_transport', $error); 
			}
			else
			{

				$imgpic = $this->db->get_where('transports' , array('ID' => $transport_id))->result();
				foreach ($imgpic as $img_delete)
				{
					$path  = "./uploads/transport/".$img_delete->image;
					unlink($path);
				}
				$data = $this->upload->data();
				$img = $data['raw_name'].$data['file_ext'];
				$edit_transport_info= array('name' =>$this->input->post('name'),
											/*'slug' =>$this->input->post('slug'),*/
											/*'type' =>$this->input->post('type'),*/
											'description' =>$this->input->post('description'),
											'status' =>$this->input->post('status'),
											'created_by' =>$this->input->post('created_by'),
											'LocalIP' 	=>$this->input->ip_address(),
										   );

				$edit_transport_info['image'] = $img;
				$edit_record = $this->TransportModel->update_transport($edit_transport_info , $transport_id);
				$this->session->set_flashdata('msg', $edit_record);
				redirect(base_url().'admin/Transport');
			}
		}    	
	}
}

/*End Here*/

public function delete_transport()
{
	$transport_id = $this->encryption->decrypt($this->input->get('delete_id'));
	$imgpic = $this->db->get_where('transports' , array('ID' => $transport_id))->result();
	foreach ($imgpic as $img_delete)
	{
		$path  = './uploads/transport/'.$img_delete->image;
		/*print_r($path);die();*/
		unlink($path);
	}
	$del = $this->TransportModel->delete($transport_id);
	$this->session->set_flashdata('msg', $del);
	redirect(base_url().'admin/Transport');
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
			$this->TransportModel->delete($id[$count]);
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
					$this->TransportModel->update_status($status , $status_record);
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
					$this->TransportModel->update_status($status , $status_record);
				}
		 $this->session->set_flashdata('msg', 'Status Changed Successfully ');
	}

}