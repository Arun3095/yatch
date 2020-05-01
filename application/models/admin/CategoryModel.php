<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function insert_category($category_data)
	{
			$this->db->insert('category' , $category_data);
			return "Added Successfully  ";
	}

	public function get_all_view()
	{	
			   /*$this->db->order_by("ID", "desc");*/
		/*return $this->db->get_where('category', array('status' => 1) )->result();*/
		return $this->db->get('category')->result();
	}

	public function get_category_detail($id)
	{
		return $this->db->get_where('category', array('ID' => $id))->result();
		
	}

	public function update_category($edit_category_info , $id)
	{
		$this->db->where('ID' , $id)->update('category' , $edit_category_info);
		return "Record Updated Successfully ";
	}

		/*Delete User*/
	public function delete($id)
	{
		$this->db->where('ID' , $id)->delete('category');
		return "Record Deleted Successfully ";
	}


	/*Status Update*/
	public function update_status($id ,$data)
	{
		 $this->db->set($data);
         $this->db->where('ID', $id);
         $this->db->update('category');
	}
	/*End Here*/

}