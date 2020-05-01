<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutModel extends CI_model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function insert_about($vision_data)
	{
			$this->db->insert('about_us' , $vision_data);
			return "Added Successfully  ";
	}

	public function get_all_view()
	{	
			   /*$this->db->order_by("ID", "desc");*/
		return $this->db->get('about_us')->result();
	}

	public function get_about_detail($id)
	{
		return $this->db->get_where('about_us', array('ID' => $id))->result();
		
	}

	public function update_about($edit_vision_info , $id)
	{
		$this->db->where('ID' , $id)->update('about_us' , $edit_vision_info);
		return "Record Updated Successfully ";
	}

		/*Delete User*/
	public function delete($id)
	{
		$this->db->where('ID' , $id)->delete('about_us');
		return "Record Deleted Successfully ";
	}

	
	/*Status Update*/
	public function update_status($id ,$data)
	{
		 $this->db->set($data);
         $this->db->where('ID', $id);
         $this->db->update('about_us');
	}
	/*End Here*/

}