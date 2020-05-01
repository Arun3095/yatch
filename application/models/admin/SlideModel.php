<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SlideModel extends CI_model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function insert_slide($slide_data)
	{
			$this->db->insert('slides' , $slide_data);
			return "Added Successfully  ";
	}

	public function get_all_view()
	{	
			   /*$this->db->order_by("ID", "desc");*/
		/*return $this->db->get_where('slides', array('status' => 1) )->result();*/
		return $this->db->get('slides')->result();
	}

	public function get_slide_detail($id)
	{
		return $this->db->get_where('slides', array('ID' => $id))->result();
		
	}

	public function update_slide($edit_slide_info , $id)
	{
		$this->db->where('ID' , $id)->update('slides' , $edit_slide_info);
		return "Record Updated Successfully ";
	}

		/*Delete User*/
	public function delete($id)
	{
		$this->db->where('ID' , $id)->delete('slides');
		return "Record Deleted Successfully ";
	}


	public function update_status($id , $data)
	{
		 $this->db->set($data);
         $this->db->where('ID', $id);
         $this->db->update('slides');
	}

	

}
?>