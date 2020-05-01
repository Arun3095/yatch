<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlogModel extends CI_model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_blog($blog_data)
	{
			$this->db->insert('blogs' , $blog_data);
			return "Added Successfully  ";
	}

	public function get_all_view()
	{	
			   /*$this->db->order_by("ID", "desc");*/
		return $this->db->get('blogs')->result();
	}

	public function get_blog_detail($id)
	{
		return $this->db->get_where('blogs', array('ID' => $id))->result();
		
	}

	public function update_blog($edit_blog_info , $id)
	{
		$this->db->where('ID' , $id)->update('blogs' , $edit_blog_info);
		return "Record Updated Successfully ";
	}

	/*Status Update*/
	public function update_status($id ,$data)
	{
		 $this->db->set($data);
         $this->db->where('ID', $id);
         $this->db->update('blogs');
	}
	/*End Here*/

		/*Delete User*/
	public function delete($id)
	{
		$this->db->where('ID' , $id)->delete('blogs');
		return "Record Deleted Successfully ";
	}

	/*Pagination*/
	public function get_count() {
        return $this->db->count_all('blogs');
    }

    public function get_blogs($limit, $start = 0) {
        $query= $this->db->get("blogs", $limit, $start);
        return $query->result();
    }
	/*End Here*/



}
?>